<?php 
## Start session for error messages and login
if (!isset($_SESSION)) {
	session_start();
	$_SESSION['sessid'] = session_id();
}

## Load definitions
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'fileloc.php');

## Instantiate frontend object
require_once(CLASS_FILE_LOCATION.'global.class.php');
$frontObj =& new frontObject();

## Load all other required functions
require_once(FUNC_FILE_LOCATION.'file.func.php');
require_once(FUNC_FILE_LOCATION.'misc.func.php');
require_once(FUNC_FILE_LOCATION.'cmd.func.php');
require_once(FUNC_FILE_LOCATION.'debug.func.php');

## Load config file functions and grab settings
require($dirname.DIRECTORY_SEPARATOR.'version.php');
require(FUNC_FILE_LOCATION.'config.func.php');
$config =& parse_config($frontObj->getConfig());

## Clean url_path config variable
if (substr($config['url_path'], -1) == '/') 
	$config['url_path'] = substr($config['url_path'], 0, -1);

## Load language file
require_once(FUNC_FILE_LOCATION.'lang.func.php');
$lang =& $frontObj->getLanguageFile();

## iPhone theme autodetection
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone')) {
	# Theme - GUI's Theme
	$config['theme'] = 'iPhone';
}

## Theme definition for template loading
define("TPL_FILE_LOCATION", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'theme' . DIRECTORY_SEPARATOR . $config['theme'] . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR);

## Make new template object
require_once(CLASS_FILE_LOCATION.'tpl.class.php');
$tpl = & new Template(TPL_FILE_LOCATION.'layout.tpl');
$tpl->set('config', $config);
$tpl->set('lang', $lang);
$tpl->set('ver', $FRONTEND_VERSION);

## Security validation's
$authenticated = false;
if ($config['seclevel'] != "0") {
	require_once(CLASS_FILE_LOCATION.'login.class.php');
	$authentication = new login();
	if ($authentication->login()) $authenticated = true;
}

## Set authentication state
$tpl->set('authenticated', $authenticated);

## Constants
$modtypes['lights'] = 'Light';
$modtypes['appliances'] = 'Appliance';
$modtypes['irrigation'] = 'Irrigation';

?>