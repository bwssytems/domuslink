<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page class $title, $theme
$html = new Page('Admin', $config['theme']);

// Add something to the body of the page
$html->addContent("
<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>
heyuconf: <input type='text' name='heyuconf' value=".$config['heyuconf']." /><br />\n
heyuexec: <input type='text' name='heyuexec' value=".$config['heyuexec']." /><br />\n
pass: <input type='text' name='password' value=".$config['password']." /><br />\n");

if ($config['lang'] == "") {
	$html->addContent("lang: <input type='text' name='lang' value='' /><br />\n");
}
else {
	$html->addContent("lang: <input type='text' name='lang' value=".$config['lang']." /><br />\n");
}

$html->addContent("
theme: <input type='text' name='theme' value=".$config['theme']." /><br />\n
<input type='submit' value='Save Changes' class='formbtn' />
</form>");

$html->addContent("<form action='".$_SERVER['PHP_SELF']."' method='post'>\n" .
	"<input type='submit' value='Cancel' class='formbtn' /></form>\n");

if ($_GET["action"] == "save") {
	$newconfig['heyuconf'] = $_POST["heyuconf"];
	$newconfig['heyuexec'] = $_POST["heyuexec"];
	$newconfig['password'] = $_POST["password"];
	$newconfig['lang'] = $_POST["lang"];
	$newconfig['theme'] = $_POST["theme"];

	$configfile = CONFIG_FILE_LOCATION;
	## build the content for config file

	if ((file_exists($configfile) && is_writable($configfile)) || !file_exists($configfile)) {
		config_save($newconfig);
		header("Location: ".$_SERVER['PHP_SELF']);
	} else {
		echo "Error: Cannot write to $configfile.<br />\n";
		exit;
    } ## if
}

// Display the page
echo $html->get();

?>