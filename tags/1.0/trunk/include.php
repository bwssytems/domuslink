<?php 
# Start session for error messages
session_start();

# Load definitions
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'fileloc.php');

# Make new frontend object
require_once(CLASS_FILE_LOCATION.'global.class.php');
$frontObj =& new frontObject();

#Load other functions
require_once(FUNC_FILE_LOCATION.'file.func.php');
require_once(FUNC_FILE_LOCATION.'misc.func.php');
require_once(FUNC_FILE_LOCATION.'cmd.func.php');
require_once(FUNC_FILE_LOCATION.'debug.func.php');

#Load config file functions and grab settings
require($dirname.DIRECTORY_SEPARATOR.'version.php');
require(FUNC_FILE_LOCATION.'config.func.php');
$config =& parse_config($frontObj->getConfig());

#Load language file
require_once(FUNC_FILE_LOCATION.'lang.func.php');
$lang =& $frontObj->getLanguageFile();

## Define templates location acording to theme and user agent for auto detection
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone'))
{
	# Theme - GUI's Theme
	$config['theme'] = 'iPhone';	
}

define("TPL_FILE_LOCATION", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'theme' . DIRECTORY_SEPARATOR . $config['theme'] . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR);

# Make new template object
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

$tpl->set('authenticated', $authenticated);

# Constants
$modtypes['lights'] = 'Light';
$modtypes['appliances'] = 'Appliance';
$modtypes['irrigation'] = 'Irrigation';

?>