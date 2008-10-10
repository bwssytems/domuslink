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
 * @param $dir to get listing from
 */
function list_dir_content($dir)
{
	$dn = opendir($dir);
	$exclude = array("README", ".", "..", ".svn");

	while($fn = readdir($dn))
	{
		if ($fn == $exclude[0] || $fn == $exclude[1] || $fn == $exclude[2] || $fn == $exclude[3]) continue;
		$directories[] = $fn;
	}

	sort($directories);
	closedir($dn);
	return $directories;
}

/**
 * Label Parse
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

?>