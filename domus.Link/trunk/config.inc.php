<?php

/* File locations */
$heyuconf = "db/heyu.conf";
$devicefile = "db/devices";

/* Default language for frontend
 * Leave blank for automatic browser setting detection
 * Available options: 'en_GB' or 'pt_PT'
 * Default: 'en'
 * */
$lang = "";


/* No edit from here */

if ($lang != "")
{
   include('lang/'.$lang.'.php');
}
else
{
	include('lang/en_GB.php');
}

?>