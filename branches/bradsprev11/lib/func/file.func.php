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
 * Load file
 * 
 * Description: This function loads a file and returns the whole content
 *
 * @param $fileloc represent's file to load
 */
function load_file($fileloc) {
	global $lang;
	if (is_readable($fileloc) == true) {
		$content = file($fileloc);
	}
	else {
		gen_error(null, $fileloc." ".$lang['error_filer']);
	}
	
	return $content;
}

/**
 * Add line to file
 *
 * @param $content file contents being received
 * @param $fileloc complete file location
 * @param $linenum line to add after
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function add_line($content, $fileloc, $linenum, $editing) {
	array_splice($content, $linenum, 0, build_new_line($editing));
	save_file($content, $fileloc);
}

/**
 * Add quick timer line (and maybe macros) to file
 *
 * @param $content file contents being received
 * @param $fileloc complete file location
 */
function add_quick_timer_line($content, $fileloc, $macros, $macro_end_line, $timer_end_line) {
	$res = build_new_line("timer");
	$tline = $res[0];
	$onmacro = $res[1];
	$offmacro = $res[2];
	// if on/off macros exist then make sure they are enabled and add new timer
	// else create macro lines, add them to file and finally add new timer
	$sm = get_specific_macros($macros, $onmacro, $offmacro);
	if ($sm) {
		$content = change_macro_states($sm, "enable", $content);
		array_splice($content,$timer_end_line+1,0,$tline);
	}
	else {
		$onml = "macro $onmacro 0 on ".strtolower($_POST["module"])."\n";
		$offml = "macro $offmacro 0 off ".strtolower($_POST["module"])."\n";
		array_splice($content,$macro_end_line+1,0,$onml);
		array_splice($content,$macro_end_line+1,0,$offml);
		array_splice($content,$timer_end_line+3,0,$tline);
	}
	save_file($content, $fileloc);
}

/**
 * Add line to end of file
 *
 * @param $content file contents being received
 * @param $fileloc complete file location
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function add_line_end($content, $fileloc, $editing) {
	
	array_push($content, build_new_line($editing));
	save_file($content, $fileloc);
}

/**
 * Edit line in file
 *
 * @param $content file contents
 * @param $fileloc being edited
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function edit_line($content, $fileloc, $editing) {
	$line = $_POST["line"]; // line being edited
	direct_replace_line($content, $fileloc, build_new_line($editing), $line);
}

/**
 * Edit quick timer line in file
 *
 * @param $content file contents
 * @param $fileloc being edited
 */
function edit_quick_timer_line($content, $fileloc) {
	$line = $_POST["line"]; // line being edited
	$res = build_new_line("timer");
	$tline = $res[0];
	$onmacro = $res[1];
	$offmacro = $res[2];
	direct_replace_line($content, $fileloc, $tline, $line);
}

/**
 * Build line to add or alter in a file
 * 
 * @param $type represents type of line being created
 */
function build_new_line($type) {
	global $wdayo;
	
	switch ($type)
	{
		case "alias":
			return "ALIAS ".label_parse($_POST["label"], true)." ".strtoupper($_POST["code"])." ".$_POST["module"]." # ".$_POST["type"].",".$_POST["loc"]."\n";
			break;
		case "floorplan":
			return $_POST["location"]."\n";
			break;
		case "module":
			return $_POST["module"]."\n";
			break;
		case "type":
			return $_POST["type"]."\n";
			break;
		case "trigger":
			$str = "trigger ".$_POST["unit"]." ".$_POST["command"]." ".$_POST["macro"]."\n";
			if ($_POST["status"] == "#") return "#$str";
			else return $str;
			break;
		case "macro":
			$str = "macro ".$_POST["macro_name"]." 0 ".$_POST["macro_command"]."\n";
			if ($_POST["status"] == "#") return "#$str";
			else return $str;
			break;
		case "timer":
			//build weekday string (ie: s.tw...)
			$wdaystr = "";
			foreach ($wdayo as $num => $day) {
				if (isset($_POST[$num.$day])) 
					$wdaystr .= $_POST[$num.$day]; 
				else 
					$wdaystr .= ".";
			}
			
			$onmonth = (strlen($_POST["onmonth"]) == 1) ? "0".$_POST["onmonth"] : $_POST["onmonth"];
			$onday = (strlen($_POST["onday"]) == 1) ? "0".$_POST["onday"] : $_POST["onday"];
			$offmonth = (strlen($_POST["offmonth"]) == 1) ? "0".$_POST["offmonth"] : $_POST["offmonth"];
			$offday = (strlen($_POST["offday"]) == 1) ? "0".$_POST["offday"] : $_POST["offday"];
			
			$ondate = "$onmonth/$onday";
			$offdate = "$offmonth/$offday";
			$ontime = $_POST["onhour"].":".$_POST["onmin"];
			$offtime = $_POST["offhour"].":".$_POST["offmin"];
			
			$onmacro = strtolower($_POST["module"])."_on";
			$offmacro = strtolower($_POST["module"])."_off";
			if (isset($_POST["status"])) {
				$tline = $_POST["status"]."timer $wdaystr $ondate-$offdate $ontime $offtime $onmacro $offmacro\n";
			}
			else {
				$tline = "timer $wdaystr $ondate-$offdate $ontime $offtime $onmacro $offmacro\n";

			}
			
			return array($tline,$onmacro,$offmacro);
			break;

		case "timermacro":
			//build weekday string (ie: s.tw...)
			$wdaystr = "";
			foreach ($wdayo as $num => $day) {
				if (isset($_POST[$num.$day])) 
					$wdaystr .= $_POST[$num.$day]; 
				else 
					$wdaystr .= ".";
			}
			
			$onmonth = (strlen($_POST["onmonth"]) == 1) ? "0".$_POST["onmonth"] : $_POST["onmonth"];
			$onday = (strlen($_POST["onday"]) == 1) ? "0".$_POST["onday"] : $_POST["onday"];
			$offmonth = (strlen($_POST["offmonth"]) == 1) ? "0".$_POST["offmonth"] : $_POST["offmonth"];
			$offday = (strlen($_POST["offday"]) == 1) ? "0".$_POST["offday"] : $_POST["offday"];
			
			$ondate = "$onmonth/$onday";
			$offdate = "$offmonth/$offday";
			$ontime = $_POST["onhour"].":".$_POST["onmin"];
			$offtime = $_POST["offhour"].":".$_POST["offmin"];
			$onmacro = $_POST["macro_on"];
			$offmacro = trim($_POST["macro_off"]);
			
			if (isset($_POST["status"])) {
				$tline = $_POST["status"]."timer $wdaystr $ondate-$offdate $ontime $offtime $onmacro $offmacro\n";
			}
			else {
				$tline = "timer $wdaystr $ondate-$offdate $ontime $offtime $onmacro $offmacro\n";

			}
			
			return $tline;
			break;
	}
}

/**
 * 
 */
function direct_replace_line($content, $fileloc, $linecontent, $linenumber) {
	$content[$linenumber] = $linecontent;
	save_file($content, $fileloc);
}

/**
 * Delete line from file
 *
 * @param $content file contents
 * @param $fileloc being edited
 * @param $line to be deleted
 */
function delete_line($content, $fileloc, $line) {
	array_splice($content, $line, 1);
	save_file($content, $fileloc);
}

/**
 * Changes position of two lines in array
 * 
 * @param $array original array to use
 * @param $org_pos initial position of line
 * @param $final_pos final position of line
 * @param $fileloc in which array contents are located
 */
function reorder_array($array, $org_pos, $final_pos, $fileloc) {
	$tmp = $array[$org_pos];
	$array[$org_pos] = $array[$final_pos];
	$array[$final_pos] = $tmp;
	
	save_file($array, $fileloc);
}

/**
 * Save file
 * 
 * Description: This function saves a file to the specified filename
 *
 * @param $content new content to be saved
 * @param $fileloc name of file to save to
 * @param $isheyuconf boolean that represent's if changes being saved
 *         are from the heyu settings. If true then force a reload
 */
function save_file($content, $fileloc, $isheyuconf = false) {
	global $config;
	global $lang;
	$fp = fopen($fileloc,'w');

	if (is_writable($fileloc) == true) {
		foreach ($content as $line) {
			$write = fwrite($fp, $line);
		}
		if ($isheyuconf)
			header("Location: ".$config['url_path']."/admin/reload.php");
		else
			header("Location: ".$_SERVER['PHP_SELF']);

	}
	else {
		gen_error(null, $fileloc." ".$lang['error_filerw']);
	}
	fclose($fp);
}

?>
