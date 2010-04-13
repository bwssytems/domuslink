<?php
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

class location {

	var $heyuconf;

	/**
	 * Constructor
	 *
	 * @param $heyuconf represents heyuconf object
	 */
	function location($heyuconf) {
		$this->heyuconf = $heyuconf;
	}

	/**
	 * Description:
	 * 
	 * @param $type_filter
	 * @param $type
	 */
	function buildLocations($type_filter, $type = 'localized') {
		$html = null;
		// loop through each location in floorplan file
		foreach (load_file(FPLAN_FILE_LOCATION) as $location) {
			// get all aliases specific to location
			$localized_aliases = $this->heyuconf->getAliasesByLocation($location);
			
			// if location contains aliases/modules then display them
			if (count($localized_aliases) > 0) {
				if ($type == 'typed') {
					$typed_aliases = $this->heyuconf->getAliasesByType($localized_aliases, $type_filter);
					if (count($typed_aliases) > 0) {
						$html .= $this->buildLocationTable($location, $typed_aliases);
					}		
				}
				else {
					$html .= $this->buildLocationTable($location, $localized_aliases);
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
	 * @param $location
	 * @param $aliases
	 * @param $modtypes
	 */
	function buildLocationTable($location, $aliases, $html = null) {
		//global $config;
		//global $modtypes;
		
		$zone_tpl = & new Template(TPL_FILE_LOCATION.'floorplan_table.tpl');
		$zone_tpl->set('header', $location);
		
		if (empty($_GET['page'])) {
			$_GET['page']='home';
		}
		
		$zone_tpl->set('page', $_GET['page']);
		
		// iterate array specific to a house zone
		foreach ($aliases as $alias) {
			$html .= $this->buildModuleTable($alias);
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
	 */
	function buildModuleTable($alias) {
		global $lang;
		global $config;
		global $modtypes;
		
		list($label, $code, $type) = split(" ", $alias, 3);
		$multi_alias = is_multi_alias($code); // check if A1,2 or just A1
		
		// check if is a multi alias, if true, use modules.tpl, if not use template acording to $type
		$tpl = ($multi_alias) ? "modules.tpl" : strtolower($type).".tpl";
		
		// create new template
		$mod = & new Template(TPL_FILE_LOCATION.$tpl);
		$mod->set('config', $config);
		$mod->set('label', label_parse($label, false));
		$mod->set('code', $code);
		$mod->set('lang', $lang);
		
		if (!isset($_GET['page'])) {
			$_GET['page']='home';
		}
		else {
			$mod->set('page', $_GET['page']);
		}
		
		// if alias is a multi alias, module state & dimlevel are not checked
		if (!$multi_alias) {
			if (on_state($code)) {
				$state = 'on';
				$action = $config['cmd_off']; 
			}
			else { 
				$state = 'off';
				$action = $config['cmd_on']; 
			}
			
			$mod->set('action', $action);
			$mod->set('state', $state);
				
			if ($type == $modtypes['lights']) {
				$mod->set('level', $this->level_calc(dim_level($code)));
			}
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
	function level_calc($dimpercent) {
		if ($dimpercent == "0") 
			return 0;
		elseif ($dimpercent > "82" && $dimpercent <= "100") 
			return 5;
		elseif ($dimpercent > "60" && $dimpercent <= "82") 
			return 4;
		elseif ($dimpercent > "40" && $dimpercent <= "60") 
			return 3;
		elseif ($dimpercent > "20" && $dimpercent <= "40") 
			return 2;
		elseif ($dimpercent > "0" && $dimpercent <= "20") 
			return 1;
	}

}

?>