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

class heyuSched {

	var $heyusched;
	var $filename;

	/**
	 * Constructor
	 *
	 * @param $filename represents name and location
	 */
	function heyuSched($filename) {
		$this->filename = $filename;
		$this->heyusched = '';
		$this->lineStore = array(END_D => array(), BEGIN_D => array());
		$this->load();
	}

	/**
	 * Load heyu settings from defined file in config.php
	 */
	function load() {
		$this->heyusched = load_file($this->filename);
	}

	/**
	 * Return heyu settings from defined file in config.php
	 */
	function get() {
		return $this->heyusched;
	}

	/**
	 * Get Sched File Objects
	 *
	 * Description: Returns an array containing all the objects specified along
	 * with their respective line numbers in the schedule file.
	 */
	function getSchedObjects($objectType, $i = 0) {
		$objectArray = array();
		$beginLine = 0;
		$endLine = 0;
		$commentedType = COMMENT_SIGN_D.$objectType;
		$sectionType = SECTION_D." ".$objectType."s";
		foreach ($this->heyusched as $num => $line) {
			list($section, $label) = explode(" ", $line, 2);
			$checkStr = strtolower($section." ".$label);
//			pr("getSchedObjects - foreach - section - label - check str - linenum: ".$section." - ".$label." - ".$checkStr." - ".$num." - ".strcmp(trim($checkStr), $sectionType));
			if (strtolower(substr($line, 0, strlen($objectType))) == $objectType || strtolower(substr($checkStr, 0, strlen($commentedType))) == $commentedType) {
				$objectArray[$i] = $line.ARRAY_DELIMETER_D.$num.ARRAY_DELIMETER_D.$i;
				$i++;
			}
			elseif (!strcmp(trim($checkStr), $sectionType)) {
				$this->setLine($objectType, ($num + 1), BEGIN_D);
				$beginLine = $num + 1;
			}
			elseif (!strcmp(strtolower(trim($section)), SECTION_D) && $beginLine && !$endLine) {
				$this->setLine($objectType, ($num - 1), END_D);
				$endLine = $num - 1;
			}
//			pr("Begin - End: ".$beginLine." - ".$endLine);
		}
		
		if(!$endLine) {
			$this->setLine($objectType, $num, END_D);
		} 
//		pr($this->lineStore);
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
	 * Get Macros
	 *
	 * Description: Returns an array containing all the macros along
	 * with their respective line numbers in the schedule file.
	 */
	function getMacros() {
		return $this->getSchedObjects(MACRO_D);
	}

	/**
	 * Get Timers
	 * 
	 * Description: Returns an array containing all timers along
	 * with their respective line numbers in the schedule file
	 */
	function getTimers() {
		return $this->getSchedObjects(TIMER_D);
	}
	
	/** Get Triggers
	 * 
	 * Description: Returns an array containing all the triggers along
	 * with their respective line numbers in the schedule file.
	 */
	function getTriggers() {
		return $this->getSchedObjects(TRIGGER_D);
	}

	/** Get Sched Config Overrides
	 * 
	 * Description: Returns an array containing all the config items along
	 * with their respective line numbers in the schedule file.
	 */
	function getSchedConfig() {
		return $this->getSchedObjects(CONFIG_D);
	}
}
?>