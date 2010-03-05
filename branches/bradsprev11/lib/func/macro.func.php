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
 		return strtolower(substr($macro, 0, $thePos));
 	else
 		return strtolower($macro);
 	
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
		//$macro format [MACROLINE]@[LINENUM]
		if (stripos($macro, $onmacro) || stripos($macro, $offmacro)) 
			array_push($fmacros, $macro);
	}
	
	return $fmacros;
}

/**
 * Description: Checks against active timers if macros are
 * used by any other timer.
 * 
 * @param $timers the timer array
 * @param $onmacro the onmacro name
 * @param $offmacro the offmacro name
 * @param $line the command originating line number
 */
function multiple_timer_macro_use($timers, $onmacro, $offmacro, $line) {
	foreach ($timers as $timer) {
		//split line into timer and line number then
		list($t, $l) = split("@", $timer, 2);
		
		if ($line == $l) continue; //ignore originating timer
		else {
			if (stripos($t, $onmacro) || stripos($t, $offmacro)) {
				//timer found that use on/off macro
				if (substr($t, 0, 1) != "#") 
					return 2; //active timer exists
				else 
					return 1; //disabled timer exists
			}
		}
	}
	
	return 0;
	
	//return values
	//0 - no timer in use that uses on/off macros
	//1 - disabled timer exists that uses on/off macro
	//2 - active timer exists that uses on/off macro
}

/**
 * Description: Checks against active triggers if macros are
 * used by any other timer.
 * 
 * @param $triggers the trigger array
 * @param $amacro the macro name
 * @param $line the command originating line number
 */
function multiple_trigger_macro_use($triggers, $amacro, $line) {
	foreach ($triggers as $trigger) {
		//split line into trigger and line number then
		list($t, $l) = split(ARRAY_DELIMITER_D, $trigger, 2);
		
		if ($line == $l) continue; //ignore originating timer
		else {
			if (stripos($t, $amacro)) {
				//trigger found that use on/off macro
				if (substr($t, 0, 1) != COMMENT_SIGN_D) 
					return 2; //active trigger exists
				else 
					return 1; //disabled trigger exists
			}
		}
	}
	
	return 0;
	
	//return values
	//0 - no trigger in use that uses on/off macros
	//1 - disabled trigger exists that uses on/off macro
	//2 - active trigger exists that uses on/off macro
}

/**
 * Description: Function to enable or disable macros
 * 
 * @param $macros array of macros that matched in get_specific_macros
 * @param $estate end state (enable/disable)
 * @param $file contents such as schedule file
 */
function change_macro_states($macros, $estate, $file) {
	foreach ($macros as $macro) {
		//split line into macro and line number then
		list($m, $l) = split("@", $macro, 2);
		
		//if first char is # (disabled) and estate is enabled
		//replace line in $file with the #
		if (substr($macro, 0, 1) == "#" && $estate == "enable") {
			$file[$l] = substr($m, 1); //enable
		}
		elseif (substr($macro, 0, 1) != "#" && $estate == "disable") {
			$file[$l] = "#".$m; //disable
		}
	}
	
	return $file;
}

/**
 * 
 */
function clean_and_translate_macros($macros, $i = 0) {
	global $lang;
	foreach ($macros as $macro_line) {
		//macro [label] [optional_delay] [[command]+[code]...] 
		//macro tv_set_on 0 on tv_set
		list($macro, $line) = explode("@", $macro_line, 2);
		list($tmp, $macro_name, $delay, $commands) = explode(" ", $macro, 4);
		//array = [label]@[code]@[on/off translated]
		
		//$onp = strpos(strtolower($macron), "_on");
		//$offp = strpos(strtolower($macron), "_off");
		
		if (strpos(strtolower($macro_name), "_on"))
			$mc[$i] = trim($macro_name)."@".$commands."@".$lang["on"];
		else
			$mc[$i] = trim($macro_name)."@".$commands."@".$lang["off"];
			
		$i++;
	}
	
	if (!empty($mc)) return $mc;
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
		//$macro format [MACROLINE]@[LINENUM]
		if (stripos($macro, $amacro)) 
			array_push($fmacros, $macro);
	}
	
	return $fmacros;
}

?>