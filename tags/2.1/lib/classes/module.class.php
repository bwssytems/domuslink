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
require_once(CLASS_FILE_LOCATION."module.const.php");

class Module extends Element {
	
	protected $moduleType;
	protected $moduleImage;
	
	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			$this->parseModuleLine($this->getElementLine());
			$this->rebuildElementLine();
        }
        else {
        	parent::__construct();
        	$this->setType('unknown');
        	$this->moduleType = ON_OFF_D;
        	$this->moduleImage = 'other';
        	$this->rebuildElementLine();
        }
	}
	
	function rebuildElementLine() {
		$this->setElementLine($this->getType().",".$this->moduleType.",".$this->moduleImage);
	}
	
	function parseModuleLine($line) {
		$elements = explode(",", $line);
		if(count($elements) != 3) {
			throw new Exception("Module element has wrong number of entries - ".$line );
		}
		else {
			// module line is - _Label,Type[toggle, on_off, dimmable, hvac, shutter, status].[image file qualifier]
			$this->setType(trim($elements[0]));
			$this->moduleType = trim($elements[1]);
			$this->moduleImage = trim($elements[2]);
		}
	}
	
	function setModuleType($aType) {
		$this->moduleType = $aType;
	}
	
	function getModuleType() {
		return $this->moduleType;
	}

	function setModuleImage($aName) {
		$this->moduleImage = $aName;
	}
	
	function getModuleImage() {
		return $this->moduleImage;
	}

	protected function validateType($theType) {
		return true;
	}
}
?>