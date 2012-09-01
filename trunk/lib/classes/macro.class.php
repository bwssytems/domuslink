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
require_once(CLASS_FILE_LOCATION."scheduleelement.class.php");

class Macro extends ScheduleElement {
	protected $label;
	protected $delay;
	protected $command;

	/**
	 * Constructor
	 *
	 * @args[0] represents label, delay and command
	 */
	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			if(strtolower(trim($this->getType())) == MACRO_D) {
				$this->parseMacroLine($this->getElementLine());
				$this->rebuildElementLine();
			}
			else
				throw new Exception("This is not a macro line!");
        }
        else {
        	parent::__construct();
        	$this->setType(MACRO_D);
        	$this->label = 'macro_x';
        	$this->delay = '0';
        	$this->command = 'off junk';
			$this->rebuildElementLine();
        }
	}

	function rebuildElementLine() {
		$anArray = array($this->getType(),$this->label,$this->delay,$this->command);
		$this->setElementLine($anArray);
	}
	
	function parseMacroLine($macroLine) {
		$elements = preg_split('/\s{1,}/', $macroLine);
		$elementCount = count($elements);

		if($elementCount < 5)
			throw new Exception("Macro line does not have enough elements [".$macroLine."]");

		$this->label = $elements[1];
		$this->delay = $elements[2];
		$this->command = $elements[3];
		for($i = 4; $i < count($elements); $i++) {
			$this->command = $this->command." ".$elements[$i]; 
		}
	}

	function getLabel() {
		return $this->label;
	}

	function getDelay() {
		return $this->delay;
	}
	
	function getCommand() {
		return $this->command;
	}
	
	function setLabel($aLabel) {
		$this->label = $aLabel;
	}
	
	function setDelay($aDelay) {
		$this->delay = $aDelay;
	}
	
	function setCommand($aCommand) {
		$this->command = $aCommand;
	}
}
?>