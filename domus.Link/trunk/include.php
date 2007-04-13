<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'fileloc.php');
//require_once(CONFIG_FILE_LOCATION);

# Make new frontend object
require_once(CLASS_FILE_LOCATION.'global.class.php');

$frontObj =& new frontObject();

#Load the config file (or defaults if it doesn't exist)
require($dirname.DIRECTORY_SEPARATOR.'version.php');
require(FUNC_FILE_LOCATION.'config.func.php');

#Grab the current configuration
$config =& $frontObj->GetConfig();

?>