<?php

/*
 * File locations
 */
$heyuconf = "db/heyu.conf";
$devicefile = "db/devices";
$themedir = "themes/";

/* Default language for frontend
 * Leave blank for automatic browser setting detection
 * Available options: 'en_GB' or 'pt_PT'
 * Default: 'en'
 * */
#$lang = "pt_PT";
$lang = "";

/*
 * Theme Section
 */
$theme = "default";


/* ###########################
 * DO NOT EDIT ANYTHING BELLOW
 * ###########################
 */

if ($lang != "")
{
	// TODO Automatic broswer detection
	include('lang/'.$lang.'.php');
}
else
{
	include('lang/en_GB.php');
}

?>