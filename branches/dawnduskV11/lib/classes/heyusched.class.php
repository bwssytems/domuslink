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
require_once(CLASS_FILE_LOCATION.'heyusched.const.php');
require_once(CLASS_FILE_LOCATION.'scheduleelementfactory.class.php');

class heyuSched {

	var $heyusched;
	var $filename;
	var $lineStore;
	private $heyuSchedObjects;

	/**
	 * Constructor
	 *
	 * @args[0] $filename represents name and location
	 */
	function __construct() {
    	$args = func_get_args();
        if(!empty($args))
        {
			$this->filename = $args[0];
			$this->heyusched = '';
			$this->lineStore = array(END_D => array(), BEGIN_D => array());
			$this->load();
        }
	}

	/**
	 * Load heyu settings from defined file in config.php
	 */
	function load() {
		$this->heyusched = load_file($this->filename);

		$i = 0;
		foreach ($this->heyusched as $num => $line) {
			try {
				$this->heyuSchedObjects[$i] = ScheduleElementFactory::createElement($line);
				$this->heyuSchedObjects[$i]->setLineNum($num);
				$i++;
			}
			catch(Exception $e ) {
				gen_error("load schedule file - line ".$num, $e->getMessage());
			}
		}
	}

	/**
	 * Return heyu objects from defined file in config.php
	 */
	function getObjects() {
		return $this->heyuSchedObjects;
	}
	
	/**
	 * Get Sched File Objects
	 *
	 * Description: Returns an array containing the Objects of the specified types along
	 * with their respective line numbers in the schedule file.
	 */
	function getSchedObjects($objectType) {
		$i = 0;
		$objectArray = array();
		$beginLine = 0;
		$endLine = 0;
		foreach($this->heyuSchedObjects as $schedElement) {
			if ($schedElement->getType() == $objectType) {
				$objectArray[$i] = $schedElement;
				$objectArray[$i]->setArrayNum($i);
				$i++;
				if (!$beginLine) {
					$this->setLine($objectType, $schedElement->getLineNum(), BEGIN_D);
					$beginLine = $schedElement->getLineNum();
				}
				elseif ($beginLine) {
					$this->setLine($objectType, $schedElement->getLineNum(), END_D);
					$endLine = $schedElement->getLineNum();
				}
			}
		}
		
		if(!$endLine) {
			$this->setLine($objectType, $schedElement->getLineNum(), END_D);
		} 
		return $objectArray;
	}
	
	function setLine($theObjType, $theLine, $theLocation) {
		$this->lineStore[$theLocation] = array_merge($this->lineStore[$theLocation], array($theObjType => $theLine));
	}

	function getLine($theObjType, $theLocation) {
		$theLineLocation = $this->lineStore[$theLocation];
		return $theLineLocation[$theObjType];
	}

	/**
	 * Get Macro Objects
	 * 
	 * Description: Returns an array containing all macro Objects
	 * 
	 */
	function getMacroObjects() {
		return $this->getSchedObjects(MACRO_D);
	}
	
	/**
	 * Get Timer Objects
	 * 
	 * Description: Returns an array containing all timer Objects
	 * 
	 */
	function getTimerObjects() {
		return $this->getSchedObjects(TIMER_D);
	}
	
	/**
	 * Get Trigger Objects
	 * 
	 * Description: Returns an array containing all trigger Objects
	 * 
	 */
	function getTriggerObjects() {
		return $this->getSchedObjects(TRIGGER_D);
	}
	
	/**
	 * Get Config Objects
	 * 
	 * Description: Returns an array containing all config Objects
	 * 
	 */
	function getConfigObjects() {
		return $this->getSchedObjects(CONFIG_D);
	}
}
?>