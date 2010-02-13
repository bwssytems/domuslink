<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

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
		$this->macrobegin = '';
		$this->macroend = '';
		$this->timerbegin = '';
		$this->timerend = '';
		$this->triggerbegin = '';
		$this->triggerend = '';
		
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
	 * Get Macros
	 *
	 * Description: Returns an array containing all the macros along
	 * with their respective line numbers in the schedule file.
	 */
	function getMacros($i = 0) {
		foreach ($this->heyusched as $num => $line) {
			list($section, $label) = explode(" ", $line, 2);
			$check_str = strtolower($section." ".$label);
			if (substr($line, 0, 5) == "macro" || substr($line, 0, 6) == "#macro") {
				$macros[$i] = $line."@".$num;
				$i++;
			}
			elseif (trim($check_str) == "section macros") {
				$this->macrobegin = $num + 1;
			}
			elseif (strtolower(trim($section)) == "section" && $this->macrobegin) {
				$this->macroend = $num - 1;
				break;
			}
		}
		
		if(!$this->macroend)
			$this->macroend = $num; 
	
		if (!empty($macros)) return $macros;
		else return $macros = array();
	}
	
	/**
	 * Get Macro Begin Line
	 * 
	 * Description: Returns the line number at which macros
	 * begin.
	 */
	function getMacroBeginLine() {
		if (!$this->macrobegin)
			$this->getMacros();
		
			return $this->macrobegin;
	}
	
	/**
	 * Get Macro End Line
	 * 
	 * Description: Returns the line number at which macros
	 * finish and timers start.
	 */
	function getMacroEndLine() {
		if (!$this->macroend)
			$this->getMacros();
		
			return $this->macroend;
	}
	
	/**
	 * Get Timers
	 * 
	 * Description: Returns an array containing all timers along
	 * with their respective line numbers in the schedule file
	 */
	function getTimers($i = 0) {
		foreach ($this->heyusched as $num => $line) {
			list($section, $label) = explode(" ", $line, 2);
			$check_str = strtolower($section." ".$label);
			if (substr($line, 0, 5) == "timer" || substr($line, 0, 6) == "#timer") {
				$timers[$i] = $line."@".$num;
				$i++;
			}
			elseif (trim($check_str) == "section timers") {
				$this->timerbegin = $num + 1;
			}
			elseif (strtolower(trim($section)) == "section" && $this->timerbegin) {
				$this->timerend = $num - 1;
				break;
			}
		}

		if(!$this->timerend)
			$this->timerend = $num; 
		
		if (!empty($timers)) return $timers;
		else return $timers = array();
	}
	
	/**
	 * Get Timer Begin Line
	 * 
	 * Description: Returns the line number at which timers
	 * begin.
	 */
	function getTimerBeginLine() {
		if (!$this->timerbegin)
			$this->getTimers();
			
		return $this->timerbegin;
	}
	
	/**
	 * Get Timer End Line
	 * 
	 * Description: Returns the line number at which timers
	 * finish.
	 */
	function getTimerEndLine() {
		if (!$this->timerend)
			$this->getTimers();
			
		return $this->timerend;
	}
	
	/** Get Triggers
	 * 
	 * Description: Returns an array containing all the triggers along
	 * with their respective line numbers in the schedule file.
	 */
	function getTriggers($i = 0) {
		foreach ($this->heyusched as $num => $line) {
			list($section, $label) = explode(" ", $line, 2);
			$check_str = strtolower($section." ".$label);
			if (substr($line, 0, 7) == "trigger" || substr($line, 0, 8) == "#trigger") {
				$triggers[$i] = $line."@".$num;
				$i++;
			}
			elseif (trim($check_str) == "section triggers") {
				$this->triggerbegin = $num + 1;
			}
			elseif (strtolower(trim($section)) == "section" && $this->triggerbegin) {
				$this->triggerend = $num - 1;
				break;
			}
		}
		
		if(!$this->triggerend)
			$this->triggerend = $num; 

		if (!empty($triggers)) return $triggers;
		else return $triggers = array();
	}


	/**
	 * Get Trigger Begin Line
	 * 
	 * Description: Returns the line number at which triggers
	 * begin.
	 */
	function getTriggerBeginLine() {
		if (!$this->triggerbegin)
			$this->getTriggers();
			
		return $this->triggerbegin;
	}
	
	/**
	 * Get Trigger End Line
	 * 
	 * Description: Returns the line number at which triggers
	 * finish.
	 */
	function getTriggerEndLine() {
		if (!$this->triggerend)
			$this->getTriggers();
			
		return $this->triggerend;
	}
}

?>