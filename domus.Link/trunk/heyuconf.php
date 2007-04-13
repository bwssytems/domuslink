<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

// Instantiate classes
$heyuconf = new HeyuConf();
$html = new Page('Heyu Conf', $config['theme']);

// Get heyu (x10.conf) file contents
$content = $heyuconf->get($config['heyuconf']);

// Add html body
$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n");

foreach ($content as $line_num => $line) {
	if (substr($line, 0, 1) != "#" && $line != "\n" && substr($line, 0, 5) != "ALIAS" &&
	substr($line, 0, 5) != "SCENE" && substr($line, 0, 7) != "USERSYN" && $line != " \n") {
		list($directivenf, $valuenf) = split(" ", $line, 2);
		$value = rtrim($valuenf, "\n");
		$html->addContent("<tr>\n");
		$directive = str_replace("_", " ", $directivenf); //removes "_"
		$html->addContent("<td width='200' class='td_right'><b>".$directive." :&nbsp;</b></td>\n");
		$html->addContent("<td width='100'>".$value."</td>\n");
		$html->addContent("</tr>\n");
	}
}

$html->addContent("" .
		"<tr><td colspan='3'>\n" .
		"<form action='".$_SERVER['PHP_SELF']."?action=edit' method='post'>\n" .
		"<input type='submit' value='Edit' class='formbtn' /></form>\n" .
		"</td></tr>\n" .
		"</table>\n");

// Display the page
echo $html->get();

?>