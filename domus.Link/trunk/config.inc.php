<?php

/* Frontend password */
$password = "123";

/* File locations */
$heyuconf = "/etc/heyu/x10.conf";
$heyuexec = "/usr/local/bin/heyu";
$modulefile = "db/modules";
$typefile = "db/types";

/* Default language for frontend
 * Leave blank for automatic browser setting detection
 * Available options: 'en_GB' or 'pt_PT'
 * Default: 'en'
 */
$lang = "";

/* Themes */
$theme = "default";


/* ##########################
 * DO NOT EDIT ANYTHING BELOW
 * ##########################
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