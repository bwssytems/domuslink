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

##
## Load definitions - These must be at the head before session start !!!!
##
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'fileloc.php');
## Load all other required functions
require_once(FUNC_FILE_LOCATION.'file.func.php');
require_once(FUNC_FILE_LOCATION.'misc.func.php');
require_once(FUNC_FILE_LOCATION.'cmd.func.php');
require_once(FUNC_FILE_LOCATION.'debug.func.php');
require_once(FUNC_FILE_LOCATION.'macro.func.php');
require_once(FUNC_FILE_LOCATION.'timer.func.php');
require_once(FUNC_FILE_LOCATION.'heyumgmt.func.php');
require($dirname.DIRECTORY_SEPARATOR.'version.php');
require(FUNC_FILE_LOCATION.'config.func.php');
require_once(FUNC_FILE_LOCATION.'lang.func.php');

require_once(CLASS_FILE_LOCATION.'tpl.class.php');
require_once(CLASS_FILE_LOCATION.'global.class.php');
require_once(CLASS_FILE_LOCATION.'login.class.php');

## Start session for error messages and login
if (!isset($_SESSION)) {
	session_start();
	$_SESSION['sessid'] = session_id();
}


## Instantiate frontend object
if(!isset($_SESSION['frontObj'])) {
	$_SESSION['frontObj'] = new frontObject();
}


## Load config file functions and grab settings
//$config =& parse_config($frontObj->getConfig());
$config =& $_SESSION['frontObj']->getConfig();

## Clean url_path config variable
if (substr($config['url_path'], -1) == '/') 
	$config['url_path'] = substr($config['url_path'], 0, -1);

## Load language file
$lang =& $_SESSION['frontObj']->getLanguageFile();

## instantiate cached lists
## $frontObj->getDirectives();
## $frontObj->getModList();

## iPhone theme autodetection
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone')) {
	# Theme - GUI's Theme
	$config['theme'] = 'iPhone';
}

## Theme definition for template loading
define("TPL_FILE_LOCATION", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'theme' . DIRECTORY_SEPARATOR . $config['theme'] . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR);

## Make new template object
$tpl = new Template(TPL_FILE_LOCATION.'layout.tpl');
$tpl->set('config', $config);
$tpl->set('lang', $lang);
$tpl->set('ver', $FRONTEND_VERSION);

## Security validation's
$authenticated = false;
if ($config['seclevel'] != "0") {
	$authentication = new Login($config['password']);
	if ($authentication->login()) $authenticated = true;
}

## Set authentication state
$tpl->set('authenticated', $authenticated);

## Constants
$modtypes['lights'] = 'Light';
$modtypes['appliances'] = 'Appliance';
$modtypes['irrigation'] = 'Irrigation';
$modtypes['shutters'] = 'Shutter';
$modtypes['hvac'] = 'HVAC';
$modtypes['other'] = 'Other';

?>