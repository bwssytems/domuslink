<?php

$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page pass config and lang values
$html = new Page('Main', $config, $lang);


//substr_count($config['url_path'], '/' );
//list($directivenf, $valuenf) = split(" ", $line, 2);
//$newstring =strstr ($string, "That");
$newstring =strstr($_SERVER['REQUEST_URI'], "admin");

$html->addContent("test".$newstring);
//$html->addContent("<br>test".substr_count($config['url_path'], '/'));


// Display the page
echo $html->get();

?>