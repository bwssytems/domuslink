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

class heyuConf {

	var $heyuconf;
	var $filename;

	/**
	 * Constructor
	 *
	 * @param $filename represents name and location
	 */
	function heyuConf($filename) {
		$this->heyuconf = '';
		$this->filename = $filename;

		$this->load();
	}

	/**
	 * Load heyu settings from defined file in config.php
	 */
	function load() {
		$this->heyuconf = load_file($this->filename);
	}

	/**
	 * Return heyu settings from defined file in config.php
	 */
	function get() {
		return $this->heyuconf;
	}
	
	/**
	 * Get defined schedule file from heyu configuration file without directory modifier
	 */
	function getSchedFileValue() {
		foreach ($this->heyuconf as $num => $line) {
			if (substr($line, 0, 13) == "SCHEDULE_FILE") {
				$schedfile = trim(substr($line, 14));
				break;
			}			
		}
		
		return $schedfile;
	}
	
	/**
	 * Get defined schedule file from heyu configuration file for current configured directory
	 */
	function getSchedFile() {
		return getHeyuConfDirModifier().$this->getSchedFileValue();
	}

	/**
	 * Get first section directive. This is used for naming config file for display. 
	 *
	 */
	function getFirstSection() {
		$firstSection = "";
		foreach ($this->heyuconf as $num => $line) {
			if (strtolower(substr($line, 0, 7)) == "section") {
				$firstSection = trim(substr($line, 8));
				break;
			}			
		}
		
		return $firstSection;		
	}
	
	/**
	 * Get Aliases
	 *
	 * @param $number boolean, if true add line number of original file
	 */
	function getAliases($number = false, $i = 0) {
		foreach ($this->heyuconf as $num => $line) {
			if (substr($line, 0, 5) == "ALIAS") {
				//if $number = true, store alias in new array along with line numb of original file
				$aliases[$i] = ($number) ? $line."@".$num : $line;
				$i++;
			}
		}
		
		return $aliases;
	}
	
	/**
	 * Get Aliases By Location
	 * 
	 * @param $loc represents the wanted location
	 */
	function getAliasesByLocation($loc, $i = 0) {
		foreach ($this->getAliases(false) as $line) {
			list($temp, $label, $code, $module_type_loc) = split(" ", $line, 4);
			list($module, $type_loc) = split(" # ", $module_type_loc, 2);
			list($type, $orgloc) = split(",", $type_loc, 2);
			
			if (trim($orgloc) == trim($loc)) {
				$request[$i] = $label." ".$code." ".$type; // $type is kept to use in getAliasesByType
				$i++;
			}
		}
		
		if (!empty($request)) return $request;
	}
	
	/**
	 * Get Aliases By Type
	 * 
	 * @param $aliases represents an array of aliases built by getAliasesByLocation
	 * @param $type represents the type os module (light, appliance, etc)
	 */
	function getAliasesByType($aliases, $type, $i = 0) {
		foreach ($aliases as $alias) {
			list($label, $code, $orgtype) = split (" ", $alias, 3);
			
			if (trim($orgtype) == trim($type)){
				$request[$i] = $label." ".$code." ".$type;
				$i++;
			}
		}
		
		if (!empty($request)) return $request;
	}
	
	/**
	 * 
	 * @param $aliases array
	 */
	function getCodesAndLabels($aliases, $i = 0) {
		foreach ($aliases as $line) {
			list($temp, $label, $code, $module_type_loc) = split(" ", $line, 4);
			$cl[$i]	= $code."@".$label;
			$i++;
		}
		
		return $cl;
	}
}

?>