<?php
/**
 * translate.Link Configuration File
 *
 * An open source PHP Translation Center
 *
 * @package		translate.Link
 * @author		Istvan Hubay Cebrian
 * @copyright	Copyright (c) 2008, Istvan Hubay Cebrian
 * @license		/license/translatelink.txt
 * @link		http://translate.link.co.pt
 */

/*
| Database settings
|--------------------------------------------------------------------------
|
| @db_hostname	- Hostname of database server, usually localhost
| @database		- Database name
| @db_username	- Username with privileges to access database
| @db_password	- Password for database user
|
| Note: If you have not changed the provided SQL file, then the defaults
| should work.
|
*/
$config['db_hostname'] = "cerebellum";
$config['database'] = "translatelink";
$config['db_username'] = "tluser";
$config['db_password'] = "tlpass";


/*
| Base Site URL
|--------------------------------------------------------------------------
*/
$config['base_url']	= "http://glia-0a/translate.Link/";


/*
| Page and Header Title
|--------------------------------------------------------------------------
*/
$config['title'] = "Translation Center";


/*
| Project Logo
|--------------------------------------------------------------------------
*/
$config['logo'] = "translatelink_logo.gif";


/*
| Original Language Name
|--------------------------------------------------------------------------
*/
$config['org_lang'] = "English";


/*
| Original Language File
|--------------------------------------------------------------------------
*/
$config['org_lang_file'] = "English.php";

?>
