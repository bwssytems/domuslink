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
require_once(CLASS_FILE_LOCATION."aliasable.class.php");

class Scene extends Aliasable {
	protected $commands;

	/**
	 * Constructor
	 *
	 * @args[0] represents label and commands
	 */
	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			if(strtolower(trim($this->getType())) == SCENE_D) {
				$this->parseSceneLine($this->getElementLine());
				$this->rebuildElementLine();
			}
			else
				throw new Exception("This is not a scene line!");
        }
        else {
        	parent::__construct();
        	$this->setType(SCENE_D);
        	$this->label = 'sceneX';
        	$this->commands = 'on a1';
        	$this->aliasMapElement = new AliasMapElement();
        	$this->aliasMapElement->setAliasLabel($this->label);
        	$this->aliasMapElement->rebuildElementLine();
        	$this->enabled = true;
			$this->rebuildElementLine();
        }
	}

	function rebuildElementLine() {
		$anArray = array($this->getType(),$this->label,$this->commands);
		$this->setElementLine($anArray);
	}
	
	function parseSceneLine($sceneLine) {
		$elements = preg_split('/\s{1,}/', $sceneLine);
		$elementCount = count($elements);

		if($elementCount < 3)
			throw new Exception("Scene line does not have enough elements [".$sceneLine."]");

		$this->label = $elements[1];
		for($i = 2; $i < $elementCount; $i++) {
			$this->commands = $this->commands." ".$elements[$i]; 
		}
		$this->commands = trim($this->commands);
	}
	
	function getCommands() {
		return($this->commands);
	}
	
	function setCommands($setOfCommands) {
		$this->commands = $setOfCommands;
	}
	
	function statusAbility() {
		return false;
	}

	function isMultiAlias() {
		return false;
	}

	function isHVACAlias() {
		return false;
	}

	function isAlias() {
		return false;
	}
	
	function isScene() {
		return true;
	}
}
?>