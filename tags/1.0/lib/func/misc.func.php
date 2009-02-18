<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
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

	while($fn = readdir($dn))
	{
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
function label_parse($str, $add) {
	
	if ($add) {
		$strf1 = str_replace(" ", "_", $str);
		$strf2 = strtolower($strf1);
	}
	else {
		$strf1 = str_replace("_", " ", $str);
		$strf2 = ucwords($strf1);
	}
	
	return $strf2;
}

/**
 * Check URL
 * 
 * Description: This function is used primarily due to error.php. Since error's could be thrown from either
 * the root or from the admin section a way is needed to detect where and only return the url path if any.
 * 
 */
function check_url() {
	
	if (strpos($_SERVER['PHP_SELF'], '/admin') > 0)
		return substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], '/admin'));
	elseif (strpos($_SERVER['PHP_SELF'], '/events') > 0)
		return substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], '/events'));
	else 
		return substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], '/index.php'));
}

/**
 * Check if alias contains various modules
 * 
 * Description: This function received an alias and check's if string contain's a ","
 * If it does, then string has various aliases
 * 
 * @param $alias represents alias received
 * 
 */
function is_multi_alias($alias) {
	if (strpos($alias, ",") || strpos($alias, "-"))
		return true;
}

/**
 * Uptime
 * 
 * Description: Return the result for the uptime command
 * 
 */
function uptime() {
	
	$rs = execute_cmd("uptime");
	return $rs[0];
}

/**
 * Description: Generate error page.
 * 
 * @param $cmd represent command being executed (if any)
 * @param $rs represents an array with error messages
 */
function gen_error($cmd, $rs) {
	if (!is_array($rs)) $rs = array($rs);
	if ($cmd) array_push($rs, "Exec: ".$cmd);
	$_SESSION['errors'] = array_reverse($rs);
	header("Location: ".check_url()."/error.php");
}


/**
 * Description: Checks if function mb_substr exists and if not create a mb_substr function
 *
 * @param $str The string being checked. 
 * @param $start The first position used in str . 
 * @param $length The maximum length of the returned string
 * @param $enconding The encoding parameter is the character encoding. 
 */
if (!function_exists("mb_substr"))
{
	function mb_substr ($str,$start,$length='',$encoding='') {
		return substr($str,$start,$length);
	}
}
?>
