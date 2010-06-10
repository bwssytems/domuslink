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
require_once(CLASS_FILE_LOCATION."alias.class.php");
require_once(CLASS_FILE_LOCATION."aliasmap.class.php");
require_once(CLASS_FILE_LOCATION."heyuconf.const.php");
require_once(CLASS_FILE_LOCATION."elementfile.class.php");
require_once(CLASS_FILE_LOCATION."configelementfactory.class.php");


class heyuConf extends ElementFile {
	
	private $aliasMap;

	function __construct() {
		$args = func_get_args();
        if(!empty($args)) {
        	parent::__construct($args[0]);
        }
        else {
        	parent::__construct();
        }
        
		if(!file_exists(ALIASMAP_FILE_LOCATION)) {
			$this->aliasMap = new AliasMap();
			$this->aliasMap->setFileName(ALIASMAP_FILE_LOCATION);
		}
		else
			$this->aliasMap = new AliasMap(ALIASMAP_FILE_LOCATION);
			
		$this->getAliases();
	}

	protected function createElement($aLine) {
		return ConfigElementFactory::createElement($aLine);
	}
	
	/**
	 * Heyu Config Save
	 * 	Need to override parent to save alias map contained within this class
	 */
	function save() {
		$this->rebuildAliasMap();
		$this->getAliasMap()->save();
		parent::save();		
	}
	/**
	 * Get defined schedule file from heyu configuration file without directory modifier
	 */
	function getSchedFileValue() {
		$schedFileObjs = $this->getElementObjects("schedule_file");			
		if(count($schedFileObjs) > 0) {
			foreach($schedFileObjs as $schedFileObj) {
				if($schedFileObj->isEnabled()) {
					$schedfile = trim(substr($schedFileObjs[0]->getElementLine(), 14));
					break;
				}
			}
			
			if(!isset($schedfile))
				throw new EXception("Schedule file not enabled");
		}
		else
			throw new Exception("Schedule_file not defined");
		
		return $schedfile;
	}
	
	/**
	 * Get defined schedule file from heyu configuration file for current configured directory
	 */
	function getSchedFile() {
		return getHeyuConfDirModifier().$this->getSchedFileValue();
	}

	/**
	 * Get first section directive. This is used for naming config file for display. 
	 *
	 */
	function getFirstSection() {
		$firstSection = "";

		$schedFileObjs = $this->getElementObjects("section");
		if(count($schedFileObjs) > 0)
			$firstSection = trim(substr($schedFileObjs[0]->getElementLine(), 8));
		
		
		return $firstSection;		
	}
	
	/**
	 * Get Aliases
	 *
	 * @param $onlyEnabled boolean, if true, return only enabled aliases
	 */
	function getAliases($onlyEnabled = false) {
//		$aliasLines = execute_cmd($config['heyuexecreal']." webhook config_dump -L\"%V@\" -d\"%V \" -b\"%V\" alias");
		$aliases = $this->getElementObjects(ALIAS_D);
		$request = array();
		$x = 0;
		for($i = 0; $i < count($aliases); $i++) {
			$aliases[$i]->setAliasMap($this->getAliasMapForLabel($aliases[$i]->getLabel()));
			if($aliases[$i]->isEnabled()|| !$onlyEnabled ) {
				$request[$x] = $aliases[$i];
				$x++;
			}
		}
		return $request;
	}

	function getAliasMapForLabel($aLabel) {
		foreach($this->aliasMap->getElementObjects("ALL_OBJECTS") as $anAliasMapElement) {
			if($aLabel == $anAliasMapElement->getAliasLabel())
				return $anAliasMapElement;
		}
		
		$anAliasMapElement = new AliasMapElement();
		$anAliasMapElement->setAliasLabel($aLabel);
		$anAliasMapElement->rebuildElementLine();
		return $anAliasMapElement;
	}
	
	/*
	 * When a change is made to aliases, we need to rebuild the aliasmap object elements
	 * from the aliases that could be changed. This will ensure the alias map only contains
	 * the current definitions for the aliases that are saved in the elementObjects.
	 */
	function rebuildAliasMap() {
		$listOfElements = $this->getElementObjects(ALIAS_D);
		$i = 0;
		$newAliasMap = array();
		foreach($listOfElements as $anAlias) {
			if($anAlias->getType() == ALIAS_D) {
				$newAliasMap[$i] = $anAlias->getAliasMap();
				$i++;
			}
		}
		
		$this->aliasMap->setObjects($newAliasMap);
		$junk = $this->getAliases();
	}
	
	function getAliasMap() {
		return $this->aliasMap;
	}

	/*
	 * Dynamically build the floorplan from saved alias map definitions
	 */
	function getFloorPlan() {
		$floorPlan = array();
		$i = 0;
		$isUnknown = false;
		foreach($this->aliasMap->getObjects() as $anAliasMap) {
			$isFound = false;
			$fpLabel = $anAliasMap->getFloorPlanLabel();
			for($x = 0; $x < count($floorPlan); $x++) {
				if($fpLabel == $floorPlan[$x]) {
					$isFound = true;
					break;
				}
			}

			if(!$isFound) {
				$floorPlan[$i] = $fpLabel;
				$i++;
			}
				
			if($fpLabel == 'unknown')
				$isUnknown = true;
		}
		
		if(!$isUnknown)
			$floorPlan[$i] = "unknown";
			
		return $floorPlan;
	}
}
?>