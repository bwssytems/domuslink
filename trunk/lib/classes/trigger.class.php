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

class Trigger extends ScheduleElement {
	protected $label;
	protected $command;
	protected $macroLabel;

	/**
	 * Constructor
	 *
	 * @args[0] represents label (alias or houseUnitCode), command (on/off), execute macro
	 */
	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			if($this->getType() == TRIGGER_D) {
				$this->parseTriggerLine($this->getElementLine());
				$this->rebuildElementLine();
			}
			else
				throw new Exception("This is not a Trigger line!");
        }
        else {
        	parent::__construct();
        	$this->setType(TRIGGER_D);
        	$this->label = 'trigger_x';
        	$this->command = 'off';
        	$this->macroLabel = 'junk';
			$this->rebuildElementLine();
        }
	}

	function rebuildElementLine() {
		$anArray = array($this->getType(),$this->label,$this->command,$this->macroLabel);
		$this->setElementLine($anArray);
	}
	
	function parseTriggerLine($triggerLine) {
		$elements = preg_split('/\s{1,}/', $triggerLine);
		$elementCount = count($elements);

		if($elementCount != 4)
			throw new Exception("Trigger line does not have enough elements [".$triggerLine."]");

		$this->label = $elements[1];
		if($elements[2] == 'on')
			$this->command = $elements[2];
		elseif($elements[2] == 'off')
			$this->command = $elements[2];
		else
			throw new Exception("Trigger line can only have on/off as a command. [".$triggerLine."]");

		$this->macroLabel = $elements[3];
	}

	function getLabel() {
		return $this->label;
	}

	function getMacroLabel() {
		return $this->macroLabel;
	}
	
	function getCommand() {
		return $this->command;
	}
	
	function setLabel($aLabel) {
		$this->label = $aLabel;
	}
	
	function setMacroLabel($anMacroLabel) {
		$this->macroLabel = $anMacroLabel;
	}
	
	function setCommand($aCommand) {
		$this->command = $aCommand;
	}
}
?>