<?php

//$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');

// Instantiate the page class $title, $theme
$html = new Page('Admin', $config, $lang);

/* *
 *
 * Frontend administration
 *
 * */
$html->addContent("<h1>Frontend Administration</h1>\n\n");
$html->addContent("<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>
heyuconf: <input type='text' name='heyuconf' value=".$config['heyuconf']." /><br />\n
heyuexec: <input type='text' name='heyuexec' value=".$config['heyuexec']." /><br />\n
pass: <input type='text' name='password' value=".$config['password']." /><br />\n");

## Language dropdown
$files = list_dir_content(LANG_FILE_LOCATION);
$html->addContent("lang: <select name='lang'>\n");
$found = false;
foreach ($files as $file)
{
	$name = substr($file, 0, -4);  // remove file extension
	if ($name == $config['lang'])
	{
		$html->addContent("<option selected value='$name'>$name</option>\n");
		$found = true;
	}
	else
	{
		$html->addContent("<option value='$name'>$name</option>\n");
	}
}
if (!$found)
{
	$html->addContent("<option selected value=''>auto</option>\n");
}
else
{
	$html->addContent("<option value=''>auto</option>\n");
}
$html->addContent("</select><br />\n");
## End language selection

## Theme dropdown
$subdir = list_dir_content(FULL_THEME_FILE_LOCATION);
$html->addContent("theme: <select name='theme'>\n");
foreach ($subdir as $dir)
{
	if ($dir == $config['theme'])
	{
		$html->addContent("<option selected value='$dir'>$dir</option>\n");
	}
	else
	{
		$html->addContent("<option value='$dir'>$dir</option>\n");
	}
}
$html->addContent("</select><br />\n");
## End theme selection

$html->addContent("url_path: <input type='text' name='url_path' value=".$config['url_path']." /><br />\n
<input type='submit' value='Save' />
</form>");

$html->addContent("<form action='".$_SERVER['PHP_SELF']."' method='post'>\n" .
	"<input type='submit' value='Cancel' /></form>\n");

## If saving values
if ($_GET["action"] == "save")
{
	$newconfig['heyuconf'] = $_POST["heyuconf"];
	$newconfig['heyuexec'] = $_POST["heyuexec"];
	$newconfig['password'] = $_POST["password"];
	$newconfig['lang'] = $_POST["lang"];
	$newconfig['theme'] = $_POST["theme"];
	$newconfig['url_path'] = $_POST["url_path"];

	$configfile = CONFIG_FILE_LOCATION;
	## build the content for config file

	if ((file_exists($configfile) && is_writable($configfile)) || !file_exists($configfile))
	{
		config_save($newconfig);
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else
	{
		echo "Error: Cannot write to $configfile.<br />\n";
		exit;
    }
}

/* *
 *
 * Modules administration
 *
 * */
if (!isset($_GET["maction"]))
{
	$html->addContent("<h1>MODULES</h1>\n\n");

	$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center'>\n" .
		"<tr><td width='70'>MODULES</td>\n" .
		"<td colspan='2' width='100'>ACTIONS</td></tr>\n");

	$modules = load_file(MODULE_FILE_LOCATION);
	foreach ($modules as $line_num => $modulenf)
	{
		$modulef = rtrim($modulenf);
		$html->addContent("<tr>\n<td>".$modulef."</td>\n" .
			"<td><a href='".$_SERVER['PHP_SELF']."?medit=$line_num'>EDIT</a></td>\n" .
			"<td><a href='".$_SERVER['PHP_SELF']."?maction=mdel&line=$line_num' onclick=\"return confirm('ARE YOU SURE?')\">DELETE</a></td>\n</tr>\n");
	}
	$html->addContent("</table>");

	## Form Headers
	if (isset($_GET["medit"]))
	{
		$editline = $_GET["medit"];
		$html->addContent("<h2>EDIT MODULE</h2>\n\n");
		$module = $modules[$editline];
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?maction=msave' method='post'>");
		$html->addContent("<input type='hidden' name='line' value='$editline' / >");
	}
	else
	{
		$html->addContent("<h2>ADD MODULE</h2>\n\n");
		$module = null;
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?maction=madd' method='post'>");
	}

	## Form TEXT fields (with values to edit or not)
	$html->addContent("MODULE: <input type='text' name='module' value='$module' /><br />\n");

	if (isset($_GET["medit"]))
	{
		$html->addContent("<input type='submit' value='SAVE' /></form>\n");
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."' method='post'>\n");
		$html->addContent("<input type='submit' value='CANCEL' /></form>\n");
	}
	else
	{
		$html->addContent("<input type='submit' value='ADD' /></form>\n");
	}
}
elseif (isset($_GET["maction"]))
{
	$file = MODULE_FILE_LOCATION;
	$modules = load_file($file);

	if ($_GET["maction"] == "madd")
	{
		add_line($modules, $file, 'module');
	}
	elseif ($_GET["maction"] == "msave")
	{
		edit_line($modules, $file, 'module');
	}
	elseif ($_GET["maction"] == "mdel")
	{
		delete_line($modules, $file, $_GET["line"]);
	}
}

/* *
 *
 * Types administration
 *
 * */
if (!isset($_GET["taction"]))
{
	$html->addContent("<h1>TYPES</h1>\n\n");

	$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center'>\n" .
		"<tr><td width='70'>TYPES</td>\n" .
		"<td colspan='2' width='100'>ACTIONS</td></tr>\n");

	$types = load_file(TYPE_FILE_LOCATION);
	foreach ($types as $line_num => $typenf)
	{
		$typef = rtrim($typenf);
		$html->addContent("<tr>\n<td>".$typef."</td>\n" .
			"<td><a href='".$_SERVER['PHP_SELF']."?tedit=$line_num'>EDIT</a></td>\n" .
			"<td><a href='".$_SERVER['PHP_SELF']."?taction=tdel&line=$line_num' onclick=\"return confirm('ARE YOU SURE?')\">DELETE</a></td>\n</tr>\n");
	}
	$html->addContent("</table>");

	## Form Headers
	if (isset($_GET["tedit"]))
	{
		$editline = $_GET["tedit"];
		$html->addContent("<h2>EDIT TYPE</h2>\n\n");
		$type = $types[$editline];
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?taction=tsave' method='post'>");
		$html->addContent("<input type='hidden' name='line' value='$editline' / >");
	}
	else
	{
		$html->addContent("<h2>ADD TYPE</h2>\n\n");
		$type = null;
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?taction=tadd' method='post'>");
	}

	## Form TEXT fields (with values to edit or not)
	$html->addContent("TYPE: <input type='text' name='type' value='$type' /><br />\n");

	if (isset($_GET["tedit"]))
	{
		$html->addContent("<input type='submit' value='SAVE' /></form>\n");
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."' method='post'>\n");
		$html->addContent("<input type='submit' value='CANCEL' /></form>\n");
	}
	else
	{
		$html->addContent("<input type='submit' value='ADD' /></form>\n");
	}
}
elseif (isset($_GET["taction"]))
{
	$file = TYPE_FILE_LOCATION;
	$types = load_file($file);

	if ($_GET["taction"] == "tadd")
	{
		add_line($types, $file, 'type');
	}
	elseif ($_GET["taction"] == "tsave")
	{
		edit_line($types, $file, 'type');
	}
	elseif ($_GET["taction"] == "tdel")
	{
		delete_line($types, $file, $_GET["line"]);
	}
}

## Display the page
echo $html->get();

?>