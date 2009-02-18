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

/**
 * Load file
 * 
 * Description: This function loads a file and returns the whole content
 *
 * @param $file represent's file to load
 */
function load_file($file) {
	
	global $lang;
	if (is_readable($file) == true) {
		$content = file($file);
	}
	else {
		gen_error(null, $file." ".$lang['error_filer']);
	}
	
	return $content;
}

/**
 * Add line to file
 *
 * @param $content file contents being received
 * @param $file complete file location
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function add_line($content, $file, $editing) {
	
	array_push($content, build_new_line($editing));
	save_file($content, $file);
}

/**
 * Edit line in file
 *
 * @param $content file contents
 * @param $file being edited
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function edit_line($content, $file, $editing) {
	
	$line = $_POST["line"]; // line being edited

	if ($line == 0 || (count($content) - 1) == $line) {
		// first or last line editing
		array_splice($content, $line, 1, build_new_line($editing));
	}
	else {
		// when editing line in middle
		$end = array_splice($content, $line+1);
		array_splice($content, $line, 1, build_new_line($editing));
		$content = array_merge($content, $end);
	}
	
	save_file($content, $file);
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
			if (isset($_POST["status"]))
			{
				$tline = $_POST["status"]."timer $wdaystr $ondate-$offdate $ontime $offtime $onmacro $offmacro\n";
			}
			else
			{
				$tline = "timer $wdaystr $ondate-$offdate $ontime $offtime $onmacro $offmacro\n";

			}
			
			return array($tline,$onmacro,$offmacro);
			break;
	}
}

/**
 * 
 */
function replace_line($file, $filecontent, $linecontent, $linenumber) {
	
	$filecontent[$linenumber] = $linecontent;
	save_file($filecontent, $file);
}

/**
 * Delete line from file
 *
 * @param $content file contents
 * @param $file being edited
 * @param $line to be deleted
 */
function delete_line($content, $file, $line) {
	
	array_splice($content, $line, 1);
	save_file($content, $file);
}

/**
 * Changes position of two lines in array
 * 
 * @param $array original array to use
 * @param $org_pos initial position of line
 * @param $final_pos final position of line
 * @param $file in which array contents are located
 */
function reorder_array($array, $org_pos, $final_pos, $file) {
	
	$tmp = $array[$org_pos];
	$array[$org_pos] = $array[$final_pos];
	$array[$final_pos] = $tmp;
	
	save_file($array, $file);
}

/**
 * Save file
 * 
 * Description: This function saves a file to the specified filename
 *
 * @param $content new content to be saved
 * @param $file nome of file to save to
 * @param $isheyuconf boolean that represent's if changes being saved
 *         are from the heyu settings. If true then force a reload
 */
function save_file($content, $file, $isheyuconf=false) {
	
	global $lang;
	$fp = fopen($file,'w');

	if (is_writable($file) == true)
	{
		foreach ($content as $line)
		{
			$write = fwrite($fp, $line);
		}
		if ($isheyuconf)
			header("Location: ".check_url()."/admin/reload.php");
		else
			header("Location: ".$_SERVER['PHP_SELF']);

	}
	else
	{
		gen_error(null, $file." ".$lang['error_filerw']);
	}
	fclose($fp);
}

?>
