<?php

$password = "123";

/* File locations */
$heyuconf = "db/heyu.conf";
$devicefile = "db/devices.db";
$styledir = "styles/";

/* Default language for frontend
 * Leave blank for automatic browser setting detection
 * Available options: 'en_GB' or 'pt_PT'
 * Default: 'en'
 */
$lang = "";

/* Style */
$style = "default.css";


/* ###########################
 * DO NOT EDIT ANYTHING BELLOW
 * ###########################
 */

require_once('lang.php');

if ($lang != "")
{
	include('lang/'.$lang.'.php');
}
else // auto browser detection
{
	include('lang/'.get_languages('header').'.php');
}

?>