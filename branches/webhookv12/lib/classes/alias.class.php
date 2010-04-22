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
require_once(CLASS_FILE_LOCATION."configelement.class.php");
require_once(CLASS_FILE_LOCATION."aliasmapelement.class.php");

class Alias extends ConfigElement {
	private $label;
	private $houseCode;
	private $devices;
	private $moduleType;
	private $moduleOptions;
	private $aliasMapElement;

	/**
	 * Constructor
	 *
	 * @args[0] represents label and house/unit code and mod types
	 */
	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			if($this->getType() == ALIAS_D) {
				$this->parseAliasLine($this->getElementLine());
				$this->rebuildElementLine();
			}
			else
				throw new Exception("This is not an alias line!");
        }
        else {
        	parent::__construct();
        	$this->setType(ALIAS_D);
        	$this->label = 'light';
        	$this->houseCode = 'A';
        	$this->devices = '1';
        	$this->moduleType = 'STDLM';
        	$this->moduleOptions = '';
        	$this->aliasMapElement = new AliasMapElement();
        	$this->aliasMapElement->setAliasLabel($this->label);
        	$this->aliasMapElement->rebuildElementLine();
        	$this->enabled = true;
			$this->rebuildElementLine();
        }
	}

	function rebuildElementLine() {
		$anArray = array($this->getType(),$this->label,$this->houseCode.$this->devices,$this->moduleType,$this->moduleOptions);
		$this->setElementLine($anArray);
	}
	
	function parseAliasLine($aliasLine) {
		$elements = preg_split('/\s{1,}/', $aliasLine);
		$elementCount = count($elements);

		$this->label = $elements[1];
		$this->parseHouseUnitCodes($elements[2]);
		$this->moduleType = $elements[3];
	}
	
	function parseHouseUnitCodes($houseUnitCodes) {
		// FIX ME
//		$elements = preg_split('/(^[a-pA-P])[0-9\-,]*/', $houseUnitCodes, -1, PREG_SPLIT_DELIM_CAPTURE);
		preg_match('/(^[a-pA-P])[0-9\-,]*/', $houseUnitCodes, $elements);
//		pr($elements);
		if(count($elements) > 1) {
			$this->houseCode = $elements[1];
			$this->devices = substr($houseUnitCodes, 1);
		}
		else
			throw new Exception("Invalid alias house-unit codes: ".print_r($elements, true));
	}
	
	function getLabel() {
		return $this->label;
	}

	function setAliasMap($anAliasMap) {
		$this->aliasMapElement = $anAliasMap;
	}
	
	function getAliasMap() {
		return $this->aliasMapElement;
	}
	
	function getHouseDevice() {
		return $this->houseCode.$this->devices;
	}
	
	function getModuleType() {
		return $this->moduleType;
	}
	
	function getCodeAndLabel() {
//			list($temp, $label, $code, $module_type_loc) = split(" ", $line, 4);
			$cl	= $houseCode.$devices."@".$label;
		
		return $cl;
	}
}
?>