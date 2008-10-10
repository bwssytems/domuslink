<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

class heyuConf {

	var $heyuconf;
	var $filename;

	/**
	 * Constructor
	 *
	 * @param $filename represents name and location
	 */
	function heyuConf($filename)
	{
		$this->heyuconf = '';
		$this->filename = $filename;

		$this->load();
	}

	/**
	 * Load heyu settings from defined file in config.php
	 */
	function load()
	{
		$this->heyuconf = load_file($this->filename);
	}

	/**
	 * Return heyu settings from defined file in config.php
	 */
	function get()
	{
		return $this->heyuconf;
	}

	/**
	 * Get Aliases
	 *
	 * @param $number boolean, if true add line number of original file
	 */
	function getAliases($number, $i = 0)
	{
		foreach ($this->heyuconf as $num => $line)
		{
			if (substr($line, 0, 5) == "ALIAS")
			{
				//if $number = true, store alias in new array along with line numb of original file
				$aliases[$i] = ($number) ? $aliases[$i] = $line."@".$num : $aliases[$i] = $line;
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
	function getAliasesByLocation($loc, $i = 0)
	{
		foreach ($this->getAliases(false) as $line)
		{
			list($temp, $label, $code, $module_type_loc) = split(" ", $line, 4);
			list($module, $type_loc) = split(" # ", $module_type_loc, 2);
			list($type, $orgloc) = split(",", $type_loc, 2);
			
			if ($orgloc == $loc) 
			{
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
	function getAliasesByType($aliases, $type, $i = 0)
	{
		foreach ($aliases as $alias)
		{
			list($label, $code, $orgtype) = split (" ", $alias, 3);
			
			if ($orgtype == $type)
			{
				$request[$i] = $label." ".$code." ".$type;
				$i++;
			}
		}
		
		if (!empty($request)) return $request;
	} 
}

?>