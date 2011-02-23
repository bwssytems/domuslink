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
require_once(CLASS_FILE_LOCATION."module.const.php");

class location {

	private $heyuconfObj;

	/**
	 * Constructor
	 *
	 * @param $heyuconf represents heyuconf object
	 */

	function __construct() {
    	$args = func_get_args();
        if(!empty($args))
        {
			$this->heyuconfObj = $args[0];
        }
        else
        	throw new Exception("heyu conf object argument required");
	}

	/**
	 * Description:
	 * 
	 * @param $type_filter represents the name of the group to be used. IF empty then all are returned.
	 * @param $type this cane be 'typed' for module types, 'grouped' for custom layout, or 'localized' by location
	 * @param $user represents the user to check access for
	 */
	function buildLocations($type_filter, $type = 'localized', $user) {
		$html = null;
		// loop through each location in floorplan file
		foreach ($this->heyuconfObj->getFloorPlan($user) as $location) {
			// get all aliases specific to location
			$localized_aliases = $this->getAliasesByLocation($location, $user);
			
			// if location contains aliases/modules then display them
			if (count($localized_aliases) > 0) {
				if ($type == 'typed') {
					$typed_aliases = $this->getAliasesByType($localized_aliases, $type_filter, $user);
					if (count($typed_aliases) > 0) {
						$html .= $this->buildLocationTable($location, $typed_aliases, $type);
					}		
				}
				elseif ($type == 'grouped') {
					$typed_aliases = $this->getAliasesByGroup($localized_aliases, $type_filter, $user);
					if (count($typed_aliases) > 0) {
						$html .= $this->buildLocationTable($location, $typed_aliases, $type);
					}		
				}
				else {
					$html .= $this->buildLocationTable($location, $localized_aliases, $type);
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
	 * @param $location represents the location we are building
	 * @param $aliases represents the alias list
	 * @param $type represents selection for localized if for iPhone
	 */
	function buildLocationTable($location, $aliases, $type, $html = null) {
		
		$zone_tpl = new Template(TPL_FILE_LOCATION.'floorplan_table.tpl');
		$zone_tpl->set('header', label_parse($location));
		
		if (empty($_GET['page'])) {
			$_GET['page']='domus_home_page';
		}
		
		$zone_tpl->set('page', $_GET['page']);
		
		// iterate array specific to a house zone
		foreach ($aliases as $alias) {
			if($type == 'localized') {
				if(!($alias->getAliasMap()->isHiddenFromHome()))
					$html .= $this->buildModuleTable($alias);
			}
			else
				$html .= $this->buildModuleTable($alias);
		}
		
		if($html == null)
			return;

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
		$lang = $_SESSION['frontObj']->getLanguageFile();
		$config = $_SESSION['frontObj']->getConfig();
		$modTypes = $_SESSION['frontObj']->getModuleTypes();
		
		$multi_alias = $alias->isMultiAlias(); // check if A1,2 or just A1
		
		// check if is a multi alias, if true, use modules.tpl, if not use template acording to $type
		$tpl = ($multi_alias) ? "modules.tpl" : $modTypes->getModuleType($alias->getAliasMap()->getType())->getModuleImage().".tpl";
		
		// create new template
		$mod = new Template(TPL_FILE_LOCATION.$tpl);
		$mod->set('config', $config);
		$mod->set('label', label_parse($alias->getLabel(), false));
		$mod->set('code', $alias->getHouseDevice());
		$mod->set('lang', $lang);
		
		if (!isset($_GET['page'])) {
			$_GET['page']='domus_home_page';
		}
		else {
			$mod->set('page', $_GET['page']);
		}
		
		// if alias is a multi alias, module state & dimlevel are not checked
		if (!$multi_alias) {
			if (on_state($config, $alias->getHouseDevice())) {
				$state = 'on';
				$action = $config['cmd_off']; 
			}
			else { 
				$state = 'off';
				$action = $config['cmd_on']; 
			}
			
			$mod->set('action', $action);
			$mod->set('state', $state);
				
			if ($modTypes->getModuleType($alias->getAliasMap()->getType())->getModuleType() == DIMMABLE_D) {
				$mod->set('level', $this->level_calc(dim_level($config, $alias->getHouseDevice())));
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
		elseif ($dimpercent > "80" && $dimpercent <= "100") 
			return 5;
		elseif ($dimpercent > "60" && $dimpercent <= "80") 
			return 4;
		elseif ($dimpercent > "40" && $dimpercent <= "60") 
			return 3;
		elseif ($dimpercent > "20" && $dimpercent <= "40") 
			return 2;
		elseif ($dimpercent > "0" && $dimpercent <= "20") 
			return 1;
	}

	/**
	 * Get Aliases By Location
	 * 
	 * @param $loc represents the wanted location
	 * @param $user represents the user to check access for
	 * @param $json option parameter to specify we are going to encode in json format
	 * @param $onlyVisible parameter to return only home visible items.
	 */
	function getAliasesByLocation($loc, $user, $json = false, $onlyVisible = false) {
		$i = 0;
		foreach ($this->heyuconfObj->getAliases($user, true) as $line) {
			if($line->getAliasMap()->getFloorPlanLabel() == trim($loc) && $line->getAliasMap()->hasAccess($user->getSecurityLevel(), $user->getSecurityLevelType())) {
				if(!$onlyVisible || !$line->getAliasMap()->isHiddenFromHome())
				{
				if($json)
					$request[$i] = $line->encodeJSON();
				else
					$request[$i] = $line;
				$i++;
				}
			}
		}
		
		if (!empty($request)) return $request;
	}
	
	/**
	 * Get Aliases By Type
	 * 
	 * @param $aliases represents an array of aliases built by getAliasesByLocation
	 * @param $type represents the type os module (light, appliance, etc)
	 * @param $user represents the user to check access for
	 * @param $json option parameter to specify we are going to encode in json format
	 */
	function getAliasesByType($aliases, $type, $user, $json = false) {
		$i = 0;
		foreach ($aliases as $alias) {
			if($alias->getAliasMap()->getType() == $type && $alias->getAliasMap()->hasAccess($user->getSecurityLevel(), $user->getSecurityLevelType())) {
				if($json)
					$request[$i] = $alias->encodeJSON();
				else
					$request[$i] = $alias;
				$i++;
			}
		}
		
		if (!empty($request)) return $request;
	}

	/**
	 * Get Aliases By Group
	 * 
	 * @param $aliases represents an array of aliases built by getAliasesByLocation
	 * @param $group represents the group of the module (light, appliance, etc)
	 * @param $user represents the user to check access for
	 * @param $json option parameter to specify we are going to encode in json format
	 */
	function getAliasesByGroup($aliases, $group, $user, $json = false) {
		$i = 0;
		foreach ($aliases as $alias) {
			if($alias->getAliasMap()->getGroup() == $group && $alias->getAliasMap()->hasAccess($user->getSecurityLevel(), $user->getSecurityLevelType())) {
				if($json)
					$request[$i] = $alias->encodeJSON();
				else
					$request[$i] = $alias;
				$i++;
			}
		}
		
		if (!empty($request)) return $request;
	}
}
?>