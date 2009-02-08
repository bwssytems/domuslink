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
		$this->filename = $filename;
		$this->heyusched = '';
		$this->macroend = '';
		$this->timerend = '';

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
	 * Description:
	 */
	function getMacros($i = 0)
	{
		foreach ($this->heyusched as $num => $line)
		{
			if (substr($line, 0, 5) == "macro" || substr($line, 0, 6) == "#macro")
			{
				$macros[$i] = $macros[$i] = $line."@".$num;
				$i++;
			}
			elseif (trim($line) == "## TIMERS ##") 
			{
				$this->macroend = $num;
				break;
			}
		}
		
		return $macros;
	}
	
	/**
	 * Get Macro End Line
	 * 
	 * Description: Returns the line number at which macros
	 * finish and timers start.
	 */
	function getMacroEndLine()
	{
		return $this->macroend;
	}
	
	/**
	 * Get Timers
	 * 
	 * Description:
	 */
	function getTimers($i = 0)
	{
		foreach ($this->heyusched as $num => $line)
		{
			if (substr($line, 0, 5) == "macro") continue;
			if (substr($line, 0, 5) == "timer" || substr($line, 0, 6) == "#timer")
			{
				$timers[$i] = $timers[$i] = $line."@".$num;
				$i++;
			}
			elseif (trim($line) == "## TRIGGERS ##") 
			{
				$this->timerend = $num;
				break;
			}
		}
		
		return $timers;
	}
	
	/**
	 * Get Timer End Line
	 * 
	 * Description: Returns the line number at which timer
	 * finish and triggers start.
	 */
	function getTimerEndLine()
	{
		return $this->timerend;
	}
}

?>