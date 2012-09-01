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

/**
 * Strip code
 * 
 * Description: Receives macro name in format 'tv_on' or 'tv_off',
 * strips and returns only alias name
 * 
 * @param $macro represents complete macro name
 */
 function strip_code($macro) {
 	$thePos = strrpos($macro, "_");
 	if ($thePos)
 		return substr($macro, 0, $thePos);
 	else
 		return $macro;
 	
 	//1. lower case $macro
 	//2. find position of last occurrence of "_"
	//3. get substr from pos 0 to position returned from 2
 	//4. place all in lowercase
}

/**
 * Description: Receives array of all macros along with
 * on and off macro. It will then search same array and return
 * another array with matching on/off macros.
 * 
 * @param $macros complete array of macros
 * @param $onmacro the on macro name
 * @param $offmacro the off macro name
 */
function get_specific_macros($macros, $onmacro, $offmacro) {
	$fmacros = array(); 
	
	foreach ($macros as $macro) {
		if ($macro->getLabel() == $onmacro || $macro->getLabel() == $offmacro) 
			array_push($fmacros, $macro);
	}
	
	return $fmacros;
}

/**
 * Description: Checks against triggers and timers if macros are
 * used by any other timer or trigger.
 * 
 * @param $scheds the schedule Obkect array
 * @param $onmacro the onmacro name
 * @param $offmacro the offmacro name
 * @param $line the command originating line number
 */
function multiple_macro_use($scheds, $onmacro, $offmacro, $line) {
	foreach ($scheds as $sched) {
		if ($sched->getLineNum() == $line) continue; //ignore originating item
		elseif(strtolower(trim($sched->getType())) == TRIGGER_D) {
			if ($sched->getLabel() == $onmacro && $onmacro != "null") {
				//item found that use on/off macro
				if ($sched->isEnabled()) 
					return 2; //active item exists
				else 
					return 1; //disabled item exists
			}
			elseif ($sched->getLabel() == $offmacro && $offmacro != "null") {
				//item found that use on/off macro
				if ($sched->isEnabled()) 
					return 2; //active item exists
				else 
					return 1; //disabled item exists
			}
		}
		elseif(strtolower(trim($sched->getType())) == TIMER_D) {
			if ($sched->getStartMacro() == $onmacro && $onmacro != "null") {
				//item found that use on/off macro
				if ($sched->isEnabled()) 
					return 2; //active item exists
				else 
					return 1; //disabled item exists
			}
			elseif ($sched->getStopMacro() == $onmacro && $onmacro != "null") {
				//item found that use on/off macro
				if ($sched->isEnabled()) 
					return 2; //active item exists
				else 
					return 1; //disabled item exists
			}
			elseif ($sched->getStartMacro() == $offmacro && $offmacro != "null") {
				//item found that use on/off macro
				if ($sched->isEnabled()) 
					return 2; //active item exists
				else 
					return 1; //disabled item exists
			}
			elseif ($sched->getStopMacro() == $offmacro && $offmacro != "null") {
				//item found that use on/off macro
				if ($sched->isEnabled()) 
					return 2; //active item exists
				else 
					return 1; //disabled item exists
			}
		}
	}
	
	return 0;
	
	//return values
	//0 - no item in use that uses on/off macros
	//1 - disabled item exists that uses on/off macro
	//2 - active item exists that uses on/off macro
}

/**
 * Description: Function to enable or disable macros
 * 
 * @param $macros array of macros that matched in get_specific_macros
 * @param $estate end state (enable/disable)
 * @param $file contents such as schedule file
 */
function change_macro_states($macros, $estate) {
	foreach ($macros as $macro) {
		if($estate == "enable") {
			$macro->setEnabled(true);
		}
		elseif($estate == "disable") {
			$macro->setEnabled(false);
		}
	}
}

/**
 * Description: Receives array of all macros along with
 * a macro. It will then search same array and return
 * another array with matching macros.
 * 
 * @param $macros complete array of macros
 * @param $amacro the on macro name
 */
function get_specific_macro($macros, $amacro) {
	$fmacros = array(); 
	
	foreach ($macros as $macro) {
		if ($macro->getLabel() == $amacro) 
			array_push($fmacros, $macro);
	}
	
	return $fmacros;
}
?>