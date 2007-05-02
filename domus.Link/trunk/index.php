<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

// Instantiate classes
$html = new Page('Home', $config, $lang);
$heyuconf = new HeyuConf($config['heyuconf']);

// Get aliases from x10.conf file
$aliases = $heyuconf->get_aliases();


foreach ($aliases as $alias)
{
	$html->addContent("alias: $alias<br>");
}


// Display the page
echo $html->get();

?>