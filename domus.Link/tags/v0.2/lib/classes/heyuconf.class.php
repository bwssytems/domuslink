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
		$content = $this->heyuconf;
		return $content;
	}

	/**
	 * Get Aliases
	 *
	 * @param $req_type Type of alias requested
	 */
	function get_aliases($req_type)
	{
		$i = 0;
		foreach ($this->heyuconf as $line)
		{
			if (substr($line, 0, 5) == "ALIAS")
			{
				$aliases[$i] = $line;
				$i++;
			}
		}
		if ($req_type != "ALL") 
		{
			$i = 0;
			$array = array();
			foreach ($aliases as $line)
			{
				list($alias, $label, $code, $module_type) = split(" ", $line, 4);
				list($module, $typenf) = split(" # ", $module_type, 2);
				$type = rtrim($typenf);
	
				if ($req_type == "Lights" && $type == "Light")
				{
					$array[$i] = $code." ".$label;
					$i++;
				}
				elseif ($req_type == "Appliances" && $type == "Appliance")
				{
					$array[$i] = $code." ".$label;
					$i++;
				}
				elseif ($req_type == "Irrigation" && $type == "Irrigation")
				{
					$array[$i] = $code." ".$label;
					$i++;
				}
				elseif ($req_type == "HVAC" && $type == "HVAC")
				{
					$array[$i] = $code." ".$label;
					$i++;
				}
	
			}
			return $array;	// Specific type of ALIAS		
		}
		else
			return $aliases; // All ALIASES

	}
}

?>