<?php 

# Load definitions
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'fileloc.php');
require_once($dirname.DIRECTORY_SEPARATOR.'constants.php');

# Make new frontend object
require_once(CLASS_FILE_LOCATION.'global.class.php');
$frontObj =& new frontObject();

#Load other functions
require_once(FUNC_FILE_LOCATION.'file.func.php');
require_once(FUNC_FILE_LOCATION.'misc.func.php');
require_once(FUNC_FILE_LOCATION.'cmd.func.php');

#Load config file functions and grab settings
require($dirname.DIRECTORY_SEPARATOR.'version.php');
require(FUNC_FILE_LOCATION.'config.func.php');
$config =& parse_config($frontObj->GetConfig());

#Load language file
require_once(FUNC_FILE_LOCATION.'lang.func.php');
$lang =& $frontObj->GetLanguageFile();

# Make new template object
require_once(CLASS_FILE_LOCATION.'tpl.class.php');
$tpl = & new Template(TPL_FILE_LOCATION.'layout.tpl');
$tpl->set('config', $config);
$tpl->set('lang', $lang);
$tpl->set('ver', $FRONTEND_VERSION);

## Define templates location acording to theme and user agent for auto detection
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone'))
	define("TPL_FILE_LOCATION", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'theme' . DIRECTORY_SEPARATOR . 'iPhone' . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR);
else
	define("TPL_FILE_LOCATION", dirname(__FILE__) . DIRECTORY_SEPARATOR . 'theme' . DIRECTORY_SEPARATOR . $config['theme'] . DIRECTORY_SEPARATOR . 'tpl' . DIRECTORY_SEPARATOR);

?>