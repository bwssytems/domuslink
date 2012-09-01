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
 * List dir contents - be it directories or files
 *
 * Description: List's a specified directories contents, while excluding README files, ., .., and .svn
 *
 * @param $dir to get listing from
 */
function list_dir_content($dir) {
	$dn = opendir($dir);
	$exclude = array("README", ".", "..", ".svn");

	while($fn = readdir($dn)) {
		if ($fn == $exclude[0] || $fn == $exclude[1] || $fn == $exclude[2] || $fn == $exclude[3]) continue;
		$files[] = $fn;
	}

	sort($files);
	closedir($dn);
	return $files;
}

/**
 * Label Parse
 *
 * Description: Parses labels so that underscores (_) are either removed or added in substituition of spaces.
 * Letters are also converted to lowercase or first letter is capitilized.
 *
 * @param $str represent string to parse
 * @param $add boolean if true add "_" and change case to lower case, if false remove "_" and capitalize first letter of each word)
 */
function label_parse($str, $add = false) {
	if ($add) {
		$strf2 = str_replace(" ", "_", $str);
//		$strf2 = strtolower($strf1);
	}
	else {
		$strf1 = str_replace("_", " ", $str);
		$strf1a = str_replace(".", " ", $strf1);
		$strf2 = str_replace("-", " ", $strf1a);
//		$strf2 = ucwords($strf1);
	}
	
	return $strf2;
}

/**
 * Uptime
 * 
 * Description: Return the result for the uptime command
 * 
 */
function uptime() {
	try {
		$rs = execute_cmd("uptime", true);
		return $rs[0];
	}
	catch(Exception $e) {
		return "";
	}
}

/**
 * Description: Generate error page.
 * 
 * @param $cmd represent command being executed (if any)
 * @param $rs represents an array with error messages
 */
function gen_error($cmd, $rs) {
	global $config;
	if (!is_array($rs)) $rs = array($rs);
	if ($cmd) array_push($rs, "Exec: ".$cmd);
	$_SESSION['errors'] = array_reverse($rs);
	header("Location: ".$config['url_path']."/error.php");
}

function yesnoopt($value) {
	if (strtoupper($value) == "YES") {
		return "<option selected value='YES'>YES</option>\n" .
				"<option value='NO'>NO</option>\n";
	} 
	else {
		return "<option value='YES'>YES</option>\n" .
				"<option selected value='NO'>NO</option>\n";
	}
}

function dawnduskopt($value) {
	if (strtoupper($value) == "FIRST") {
		return "<option selected value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif (strtoupper($value) == "EARLIEST") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option selected value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif (strtoupper($value) == "LATEST") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option selected value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif (strtoupper($value) == "AVERAGE") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option selected value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif (strtoupper($value) == "MEDIAN") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value=LATEST>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option selected value='MEDIAN'>MEDIAN</option>\n";
	}
}


/**
 * Description: Checks if function mb_substr exists and if not create a mb_substr function
 *
 * @param $str The string being checked. 
 * @param $start The first position used in str . 
 * @param $length The maximum length of the returned string
 * @param $enconding The encoding parameter is the character encoding. 
 */
if (!function_exists("mb_substr")) {
	function mb_substr ($str,$start,$length='',$encoding='') {
		return substr($str,$start,$length);
	}
}
?>
