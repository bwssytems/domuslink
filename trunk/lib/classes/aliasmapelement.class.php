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

require_once(CLASS_FILE_LOCATION."element.class.php");
require_once(CLASS_FILE_LOCATION."user.const.php");

class AliasMapElement extends Element {
	
	protected $aliasLabel;
	protected $floorPlanLabel;
	protected $hiddenFromHome;
	protected $accessLevel;
	protected $group;
	
	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			$this->parseMapLine($this->getElementLine());
			$this->rebuildElementLine();
        }
        else {
        	parent::__construct();
        	$this->setType("Other");
        	$this->floorPlanLabel = 'unknown';
        	$this->aliasLabel = 'unknown';
        	$this->hiddenFromHome = "visible";
        	$this->group = 'other';
        	$this->accessLevel = 99999999;
			$this->rebuildElementLine();
        }
	}
	
	function rebuildElementLine() {
		$this->setElementLine($this->aliasLabel.",".$this->getType().",".$this->floorPlanLabel.",".$this->hiddenFromHome.",".$this->group.",".strval($this->accessLevel));
	}
	
	function parseMapLine($line) {
		$elements = explode(",", $line);
		if(count($elements) < 4 && count($elements) > 6) {
			throw new Exception("Alias Map element has wrong number of entries - ".$line );
		}
		else {
			// map line is - Alias_Label Type Floorplan_Location HiddenFromHome[hidden,visible],[group name],[numeric access level]
			$this->aliasLabel = trim($elements[0]);
			$this->setType(trim($elements[1]));
			$this->floorPlanLabel = trim($elements[2]);
			$this->hiddenFromHome = trim($elements[3]);
			if(count($elements) == 4) {
				$this->group = trim($elements[1]);
				$this->accessLevel = 99;
			}
			elseif(count($elements) == 5) {
				$this->group = trim($elements[4]);
				$this->accessLevel = 99;
			}
			else {
				$this->group = trim($elements[4]);
				$this->accessLevel = intval($elements[5]);
			}
		}
	}
	
	function setAliasLabel($aLabel) {
		$this->aliasLabel = $aLabel;
	}
	
	function getAliasLabel() {
		return $this->aliasLabel;
	}

	function setFloorPlanLabel($aLabel) {
		$this->floorPlanLabel = $aLabel;
	}
	
	function getFloorPlanLabel() {
		return $this->floorPlanLabel;
	}
	
	function setHiddenFromHome($aValue) {
			$this->hiddenFromHome = $aValue;
	}

	function getHiddenFromHome() {
		return $this->hiddenFromHome;
	}

	function isHiddenFromHome() {
		return ($this->hiddenFromHome == "hidden") ? true : false;
	}

	function getAccessLevel() {
		return $this->accessLevel;
	}
	
	function setAccessLevel($anAccessLevel) {
		$this->accessLevel = $anAccessLevel;
	}
	
	function hasAccess($anAccessLevel, $accessType) {
		if($anAccessLevel == $this->accessLevel)
			return true;
		elseif(trim($accessType) != SEC_LEVEL_EXACT_D && $anAccessLevel <= $this->accessLevel)
			return true;
		
		return false; 
	}

	function setGroup($aName) {
		$this->group = $aName;
	}
	
	function getGroup() {
		return $this->group;
	}

	protected function validateType($theType) {
		return true;
	}
}
?>