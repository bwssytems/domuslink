<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page class $title, $theme
$html = new Page('Main', $config['theme']);

$html->addContent("test".$lang['title']);

// Add something to the body of the page
$html->addContent("<p align='center'>It's so easy to use!</p>\n" .
		"<p align=center>It's so easy to use!</p>\n" .
		"<p align=center>It's so easy to use!</p>\n"); // end content

$html->addContent("<p align=center>It's so easy to use2!</p>\n" .
		"<p align=center>It's so easy to use2!</p>\n" .
		"<p align=center>It's so easy to use2!</p>\n"); // end content


// Display the page
echo $html->get();

?>