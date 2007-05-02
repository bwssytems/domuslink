<?php

$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page pass config and lang values
$html = new Page('Setup', $config, $lang);

$html->addContent("SETUP");

// Display the page
echo $html->get();

?>