<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

// Instantiate classes
$heyuconf = new HeyuConf($config['heyuconf']);
$html = new Page('Heyu Conf', $config['theme']);

// Get heyu (x10.conf) file contents
$content = $heyuconf->get();

// Add html body
$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n");

if (!isset($_GET["action"])) {
	foreach ($content as $line_num => $line) {
		if (substr($line, 0, 1) != "#" && $line != "\n" && substr($line, 0, 5) != "ALIAS" &&
		substr($line, 0, 5) != "SCENE" && substr($line, 0, 7) != "USERSYN" && $line != " \n") {
			list($directivenf, $valuenf) = split(" ", $line, 2);
			$value = rtrim($valuenf, "\n");
			$html->addContent("<tr>\n");
			$directive = str_replace("_", " ", $directivenf); //removes "_"
			$html->addContent("<td width='200' class='td_right'><b>".$directive." :&nbsp;</b></td>\n" .
					"<td width='100'>".$value."</td>\n" .
					"</tr>\n");
		}
	}

	$html->addContent("<tr><td colspan='3'>\n" .
		"<form action='".$_SERVER['PHP_SELF']."?action=edit' method='post'>\n" .
		"<input type='submit' value='Edit' class='formbtn' /></form>\n" .
		"</td></tr>\n" .
		"</table>\n");
}
else {
	if ($_GET["action"] == "edit") {
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>");
		$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n");

		$act = 0; $sct = 0; $usct = 0; // alias, scene and usersyn counts for posts
	}
}


// Display the page
echo $html->get();

?>