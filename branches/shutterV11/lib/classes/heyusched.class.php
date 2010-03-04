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
		$this->macroend = '';
		$this->timerend = '';

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
			if (substr($line, 0, 5) == "macro" || substr($line, 0, 6) == "#macro") {
				$macros[$i] = $line."@".$num;
				$i++;
			}
			elseif (trim($line) == "## TIMERS ##") {
				$this->macroend = $num;
				break;
			}
		}
		
		if (!empty($macros)) return $macros;
		else return $macros = array();
	}
	
	/**
	 * Get Macro End Line
	 * 
	 * Description: Returns the line number at which macros
	 * finish and timers start.
	 */
	function getMacroEndLine() {
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
			if (substr($line, 0, 5) == "timer" || substr($line, 0, 6) == "#timer") {
				$timers[$i] = $line."@".$num;
				$i++;
			}
			elseif (trim($line) == "## TRIGGERS ##") {
				$this->timerend = $num;
				break;
			}
		}
		
		if (!empty($timers)) return $timers;
		else return $timers = array();
	}
	
	/**
	 * Get Timer End Line
	 * 
	 * Description: Returns the line number at which timers
	 * finish and triggers start.
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
			if (substr($line, 0, 7) == "trigger" || substr($line, 0, 8) == "#trigger") {
				$triggers[$i] = $line."@".$num;
				$i++;
			}
		}
		
		if (!empty($triggers)) return $triggers;
		else return $triggers = array();
	}
}

?>