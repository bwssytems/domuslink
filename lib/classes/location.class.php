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

class location {

	var $heyuconf;

	/**
	 * Constructor
	 *
	 * @param $heyuconf represents name and location
	 */
	function location($heyuconf)
	{
		$this->heyuconf = $heyuconf;
	}

	function buildLocations($type_filter,$modtypes,$config,$type='localized') {
		// loop through each location in floorplan file
		foreach (load_file(FPLAN_FILE_LOCATION) as $loc => $location)
		{
			// get all aliases specific to location
			$localized_aliases = $this->heyuconf->getAliasesByLocation($location);
			
			// if location contains aliases/modules then display them
			if (count($localized_aliases) > 0)
			{
				
				if ($type=='typed')
				{
					$typed_aliases = $this->heyuconf->getAliasesByType($localized_aliases, $type_filter);
					if (count($typed_aliases) > 0)
					{
						$html .= $this->buildLocationTable($location, $typed_aliases, $modtypes, $config);	
					}		
				}
				else
				{
					$html .= $this->buildLocationTable($location, $localized_aliases, $modtypes, $config);
				}
			}
		}
		
		return $html;		
	}
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
	function buildLocationTable($loc, $aliases, $modtypes, $config)
	{
		global $page;
		$html = null;
		$zone_tpl = & new Template(TPL_FILE_LOCATION.'floorplan_table.tpl');
		$zone_tpl->set('header', $loc);
		if (empty($_GET['page']))
		{
			$_GET['page']='home';
		}
		$zone_tpl->set('page', $_GET['page']);
		
		// iterate array specific to a house zone
		foreach ($aliases as $alias) 
		{
			$html .= $this->buildModuleTable($alias, $modtypes, $config);
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
	function buildModuleTable($alias, $modtypes, $config)
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
		
		if (!isset($_GET['page']))
		{
			$_GET['page']='home';
		}
		else 
			$mod->set('page', $_GET['page']);
		
		if (!$multi_alias)
		{
			$mod->set('action', $action);
			$mod->set('state', $state);	
		}
		
		if ($type == $modtypes['lights']) 
		{
			$mod->set('level', $this->level_calc(curr_dim_level($code, $config['heyuexec'])));
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

}

?>