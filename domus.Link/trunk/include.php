<?php

# Load definitions
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'fileloc.php');

# Make new frontend object
require_once(CLASS_FILE_LOCATION.'global.class.php');
$frontObj =& new frontObject();

require($dirname.DIRECTORY_SEPARATOR.'version.php');

#Load the config file
require(FUNC_FILE_LOCATION.'config.func.php');

#Load other functions
require_once(FUNC_FILE_LOCATION.'lang.func.php');
require_once(FUNC_FILE_LOCATION.'file.func.php');
require_once(FUNC_FILE_LOCATION.'misc.func.php');

#Grab the current configuration
$config =& $frontObj->GetConfig();

#Load language file
$lang =& $frontObj->GetLanguageFile();

?>