<?php

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

#Load config file functions and grab settings
require($dirname.DIRECTORY_SEPARATOR.'version.php');
require(FUNC_FILE_LOCATION.'config.func.php');
$config =& $frontObj->GetConfig();

# Make new template object
require_once(CLASS_FILE_LOCATION.'tpl.class.php');
$tpl = & new Template(TPL_FILE_LOCATION.'layout.tpl');
$tpl->set('urlpath', $config['url_path']);
$tpl->set('theme', $config['theme']);
$tpl->set('heyuexec', $config['heyuexec']);

//setcookie("heyuexec", $config['heyuexec'], 0);

#Load language file
require_once(FUNC_FILE_LOCATION.'lang.func.php');
$lang =& $frontObj->GetLanguageFile();

?>