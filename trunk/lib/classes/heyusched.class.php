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

class heyuSched {

	var $heyusched;
	var $filename;

	/**
	 * Constructor
	 *
	 * @param $filename represents name and location
	 */
	function heyuSched($filename)
	{
		$this->heyusched = '';
		$this->filename = $filename;

		$this->load();
	}

	/**
	 * Load heyu settings from defined file in config.php
	 */
	function load()
	{
		$this->heyusched = load_file($this->filename);
	}

	/**
	 * Return heyu settings from defined file in config.php
	 */
	function get()
	{
		return $this->heyusched;
	}

	/**
	 * Get Macros
	 *
	 * @param $number boolean, if true add line number of original file
	 */
	function getMacros($number, $i = 0)
	{
		foreach ($this->heyusched as $num => $line)
		{
			if (substr($line, 0, 5) == "macro")
			{
				//if $number = true, store alias in new array along with line numb of original file
				$macros[$i] = ($number) ? $macros[$i] = $line."@".$num : $macros[$i] = $line;
				$i++;
			}
		}
		
		return $macros;
	}
	
	/**
	 * Get Timers
	 *
	 * @param $number boolean, if true add line number of original file
	 */
	function getTimers($number, $i = 0)
	{
		foreach ($this->heyusched as $num => $line)
		{
			if (substr($line, 0, 5) == "timer")
			{
				//if $number = true, store alias in new array along with line numb of original file
				$timers[$i] = ($number) ? $timers[$i] = $line."@".$num : $timers[$i] = $line;
				$i++;
			}
		}
		
		return $timers;
	}
	
}

?>