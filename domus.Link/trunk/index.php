<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page pass config and lang values
$html = new Page('Main', $config, $lang);

$html->addContent("test".substr($_SERVER['REQUEST_URI'], -9, 9));

// Display the page
echo $html->get();

?>