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
else $page = "home";

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
				heyu_exec($config['heyuexec']);
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
						$html .= buildLocationTable($location, $localized_aliases, $modtypes, $config);
						break;
					
					case "lights":
						$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, $modtypes['light']);
						if (count($typed_aliases) > 0) $html .= buildLocationTable($location, $typed_aliases, $modtypes, $config);
						break;
						
					case "appliances":
						$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, $modtypes['appliance']);
						if (count($typed_aliases) > 0) $html .= buildLocationTable($location, $typed_aliases, $modtypes, $config);
						break;
					
					case "irrigation":
						$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, $modtypes['irrigation']);
						if (count($typed_aliases) > 0) $html .= buildLocationTable($location, $typed_aliases, $modtypes, $config);
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
 * 
 */
function buildLocationTable($loc, $aliases, $modtypes, $config)
{
	$html = null;
	$zone_tpl = & new Template(TPL_FILE_LOCATION.'floorplan_table.tpl');
	$zone_tpl->set('header', $loc);
	
	// iterate array specific to a house zone
	foreach ($aliases as $alias) 
	{
		$html .= buildModuleCtrl($alias, $modtypes, $config);
	}
	
	$zone_tpl->set('modules',$html);
	
	return $zone_tpl->fetch(TPL_FILE_LOCATION.'floorplan_table.tpl');
}

/**
 * 
 */
function buildModuleCtrl($alias, $modtypes, $config)
{
	list($label, $code, $type) = split(" ", $alias, 3);
	$multi_alias = is_multi_alias($code); // check if A1,2 or just A1
	
	if (on_state($code, $config['heyuexec'])) { $txtlabel = 'off'; $state = 'on'; $action = $config['cmd_off']; }
	else { $txtlabel = 'on'; $state = 'off'; $action = $config['cmd_on']; }

	switch ($type)
	{
		case $modtypes['light']:
			$mod = & new Template(TPL_FILE_LOCATION.'module.tpl');
			$mod->set('label', $label);
			$mod->set('code', $code);
			$mod->set('action', $action);
			$mod->set('state', $state);
			$mod->set('config', $config);
			//$mod->set('txtlabel', $txtlabel);
			break;
			
		case $modtypes['appliance']:
			$mod = & new Template(TPL_FILE_LOCATION.'module.tpl');
			$mod->set('label', $label);
			$mod->set('code', $code);
			$mod->set('action', $action);
			$mod->set('state', $state);
			$mod->set('config', $config);
			//$mod->set('txtlabel', $txtlabel);
			break;
		
		case $modtypes['irrigation']:
			$mod = & new Template(TPL_FILE_LOCATION.'module.tpl');
			$mod->set('label', $label);
			$mod->set('code', $code);
			$mod->set('action', $action);
			$mod->set('state', $state);
			$mod->set('config', $config);
			//$mod->set('txtlabel', $txtlabel);
			break;
	}
	
	return $mod->fetch(TPL_FILE_LOCATION.'module.tpl');
}

?>