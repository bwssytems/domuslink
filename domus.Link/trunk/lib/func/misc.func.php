<?php

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
 *
 *
 */
function label_parse()
{

}

?>