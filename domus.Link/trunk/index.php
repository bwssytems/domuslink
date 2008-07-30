<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

## Includes
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);

// Security validation's
if ($config['seclevel'] == "2") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: admin/login.php?from=index");
}

// start/stop controls for heyu
if (isset($_GET["daemon"])) 
{
	switch ($_GET["daemon"])
	{
		case "start":
			heyu_ctrl($config['heyuexec'], 'start');
			break;
		case "stop":
			heyu_ctrl($config['heyuexec'], 'stop');
			break;
		case "restart":
			heyu_ctrl($config['heyuexec'], 'restart');
			break;
	}
}

// get which page is open
if (isset($_GET['page'])) $page = $_GET['page'];
else header("Location: ".$_SERVER['PHP_SELF']."?page=home");

// set page title
$tpl->set('title', ucwords($page));

// check if heyu is running, if true display modules
if (heyu_running())
{
	// if any action set, act on it
	if (isset($_GET['action']))
	{
		switch ($_GET['action'])
		{
			case "info":
				$info = & new Template(TPL_FILE_LOCATION.'info.tpl');
				$info->set('lang', $lang);
				$info->set('lines', heyu_info($config['heyuexec']));
				$html = $info->fetch(TPL_FILE_LOCATION.'info.tpl');
				break;
			default:
				heyu_action($config);
				break;
		}
	}
	// else display modules
	else
	{
		// loop through each location in floorplan file
		foreach (load_file(FPLAN_FILE_LOCATION) as $loc => $location)
		{
			// get all aliases specific to location
			$localized_aliases = $heyuconf->getAliasesByLocation($location);
			
			// if location contains aliases/modules then display them
			if (count($localized_aliases) > 0)
			{
				switch($page)
				{
					case "home":
						$html .= build_location_tb($location, $localized_aliases, $modtypes, $config);
						break;
					
					case "lights":
						$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, $modtypes['light']);
						if (count($typed_aliases) > 0) 
							$html .= build_location_tb($location, $typed_aliases, $modtypes, $config);
						break;
						
					case "appliances":
						$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, $modtypes['appliance']);
						if (count($typed_aliases) > 0) 
							$html .= build_location_tb($location, $typed_aliases, $modtypes, $config);
						break;
					
					case "irrigation":
						$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, $modtypes['irrigation']);
						if (count($typed_aliases) > 0) 
							$html .= build_location_tb($location, $typed_aliases, $modtypes, $config);
						break;
						
				} // end switch
			} // end if count > 0
		} // end foreach
	}
	
	// add complete template to content area in layout
	$tpl->set('content', $html);
	
} // end if heyu running
else
{
	$tpl->set('content', $lang['error_not_running']);
}

// display the page
echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');



/**
 * Build Location Table
 * 
 * Description:
 * 
 * @param $loc
 * @param $aliases
 * @param $modtypes
 * @param $config
 */
function build_location_tb($loc, $aliases, $modtypes, $config)
{
	$html = null;
	$zone_tpl = & new Template(TPL_FILE_LOCATION.'floorplan_table.tpl');
	$zone_tpl->set('header', $loc);
	
	// iterate array specific to a house zone
	foreach ($aliases as $alias) 
	{
		$html .= build_module_tb($alias, $modtypes, $config);
	}
	
	$zone_tpl->set('modules',$html);
	
	return $zone_tpl->fetch(TPL_FILE_LOCATION.'floorplan_table.tpl');
}

/**
 * Build Module Table
 * 
 * Description:
 * 
 * @param $alias
 * @param $modtypes
 * @param $config
 */
function build_module_tb($alias, $modtypes, $config)
{
	list($label, $code, $type) = split(" ", $alias, 3);
	$multi_alias = is_multi_alias($code); // check if A1,2 or just A1
	
	// if alias is a multi alias, module state is not checked
	if (!$multi_alias) 
	{
		if (on_state($code, $config['heyuexec'])) 
		{
			$state = 'on';
			$action = $config['cmd_off']; 
		}
		else 
		{ 
			$state = 'off';
			$action = $config['cmd_on']; 
		}	
	}
	
	// check if is a multi alias, if true, use modules.tpl, if not use template acording to type
	$tpl = ($multi_alias) ? "modules.tpl" : strtolower($type).".tpl";
	
	// create new template
	$mod = & new Template(TPL_FILE_LOCATION.$tpl);
	$mod->set('config', $config);
	$mod->set('label', label_parse($label, false));
	$mod->set('code', $code);
	$mod->set('page', $_GET['page']);
	
	if (!$multi_alias)
	{
		$mod->set('action', $action);
		$mod->set('state', $state);	
	}
	
	if ($type == $modtypes['light']) 
	{
		$mod->set('level', level_calc(curr_dim_level($code, $config['heyuexec'])));	
	}
	
	// return as html
	return $mod->fetch(TPL_FILE_LOCATION.$tpl);
}

/**
 * Level Calc
 * 
 * Description: Calculates a readable level between 1-5.
 * Only used in index.php when building the template.
 * 
 * @param $dimpercent represents current dim level of specific module
 */
function level_calc($dimpercent) 
{
	if ($dimpercent == "0") return 0;
	elseif ($dimpercent > "82" && $dimpercent <= "100") return 5;
	elseif ($dimpercent > "60" && $dimpercent <= "82") return 4;
	elseif ($dimpercent > "40" && $dimpercent <= "60") return 3;
	elseif ($dimpercent > "20" && $dimpercent <= "40") return 2;
	elseif ($dimpercent > "0" && $dimpercent <= "20") return 1;
}

?>