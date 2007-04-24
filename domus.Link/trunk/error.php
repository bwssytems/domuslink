<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page pass config and lang values
$html = new Page('Main', $config, $lang);

$html->addContent("<h1>Error</h1>");
$html->addContent("<div id='centered'>");
$html->addContent("<b>".stripslashes($_GET["msg"])."</b>");
$html->addContent("</div>");

// Display the page
echo $html->get();

?>