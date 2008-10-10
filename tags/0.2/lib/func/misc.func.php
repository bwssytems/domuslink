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
 * List dir contents - be it directories or files
 *
 * Description: List's a specified directories contents, while excluding README files, ., .., and .svn
 *
 * @param $dir to get listing from
 */
function list_dir_content($dir)
{
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
 * 				Letters are also converted to lowercase or first letter is capitilized.
 *
 * @param $str represent string to parse
 * @param $add boolean if true add "_" and change case to lower case, if false remove "_" and capitalize first letter of each word)
 */
function label_parse($str, $add)
{
	if ($add)
	{
		$strf1 = str_replace(" ", "_", $str);
		$strf2 = strtolower($strf1);
	}
	else
	{
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
function check_url()
{
	return substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], '/admin'));	
}

/**
 * Check is alias contains various modules
 * 
 * Description: This function received an alias and check's if string contain's a ","
 * If it does, then string has various aliases
 * 
 * @param $alias represents alias received
 * 
 */
function is_multi_alias($alias)
{
	return strpos($alias, ",");
	
	/*
	$housecode = substr($alias, 0, 1);
	$tok = strtok($alias, ",");
	$i = 0;

	while ($tok !== false) {
    	if ($i==0) $array[$i] = $tok;
    	else $array[$i] = $housecode.$tok;
    	$tok = strtok(",");
	    $i++;
	}

	if (sizeof($array) > 1) return $array;
	else return false;
	*/
}

?>