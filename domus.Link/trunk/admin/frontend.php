<?php

$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page class $title, $theme
$html = new Page('Admin', $config, $lang);

$html->addContent("<h1>Frontend Administration</h1>\n\n");
$html->addContent("<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>
heyuconf: <input type='text' name='heyuconf' value=".$config['heyuconf']." /><br />\n
heyuexec: <input type='text' name='heyuexec' value=".$config['heyuexec']." /><br />\n
pass: <input type='text' name='password' value=".$config['password']." /><br />\n");

// Language dropdown
$files = list_dir_content(LANG_FILE_LOCATION);
$html->addContent("lang: <select name='lang'>\n");
$found = false;
foreach ($files as $file) {
	$name = substr($file, 0, -4);  // remove file extension
	if ($name == $config['lang']) {
		$html->addContent("<option selected value='$name'>$name</option>\n");
		$found = true;
	} else {
		$html->addContent("<option value='$name'>$name</option>\n");
	}
}
if (!$found) {
	$html->addContent("<option selected value=''>auto</option>\n");
} else {
	$html->addContent("<option value=''>auto</option>\n");
}
$html->addContent("</select><br />\n");
// End language selection

// Theme dropdown
$subdir = list_dir_content(FULL_THEME_FILE_LOCATION);
$html->addContent("theme: <select name='theme'>\n");
foreach ($subdir as $dir) {
	if ($dir == $config['theme']) {
		$html->addContent("<option selected value='$dir'>$dir</option>\n");
	} else {
		$html->addContent("<option value='$dir'>$dir</option>\n");
	}
}
$html->addContent("</select><br />\n");
// End theme selection

$html->addContent("
url_path: <input type='text' name='url_path' value=".$config['url_path']." /><br />\n
<input type='submit' value='Save Changes' />
</form>");

$html->addContent("<form action='".$_SERVER['PHP_SELF']."' method='post'>\n" .
	"<input type='submit' value='Cancel' /></form>\n");

// If saving values
if ($_GET["action"] == "save") {
	$newconfig['heyuconf'] = $_POST["heyuconf"];
	$newconfig['heyuexec'] = $_POST["heyuexec"];
	$newconfig['password'] = $_POST["password"];
	$newconfig['lang'] = $_POST["lang"];
	$newconfig['theme'] = $_POST["theme"];
	$newconfig['url_path'] = $_POST["url_path"];

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