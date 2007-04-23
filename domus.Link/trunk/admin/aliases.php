<?php

$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

// Instantiate classes
$heyuconf = new HeyuConf($config['heyuconf']);
$html = new Page('Heyu Conf', $config['url_path'], $config['theme']);

// Get heyu (x10.conf) file contents
$content = $heyuconf->get();

// Table start
$html->addContent("<table border='0' cellspacing='2' cellpadding='2' align='center' class='table_outline'>\n" .
	"<tr><td class='td_header' width='70'>CODE</td>\n" .
	"<td class='td_header' width='280'>LABEL</td>\n" .
	"<td class='td_header' width='70'>MODULE</td>\n" .
	"<td class='td_header' width='70'>TYPE</td>\n" .
	"<td class='td_header' colspan='2' width='100'>ACTIONS</td></tr>\n");

if (!isset($_GET["action"])) {

	// Aliases
	foreach ($content as $line_num => $line) {
		if (substr($line, 0, 5) == "ALIAS") {
			list($alias, $label, $code, $module_type) = split(" ", $line, 4);
			list($module, $type) = split(" # ", $module_type, 2);
			$html->addContent("<tr>\n<td class='td_center'>".$code."</td>\n" .
				"<td>".$label."</td>\n" .
				"<td class='td_center'>".$module."</td>\n" .
				"<td class='td_center'>".$type."</td>\n" .
				"<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?edit=$line_num'>EDIT</a></td>\n" .
				"<td class='td_link'><a href='".$_SERVER['PHP_SELF']."?del=$line_num' onclick=\"return confirm('ARE YOU SURE?')\">DELETE</a></td>\n</tr>\n");
		}
	}
	$html->addContent("</table>");

	// Form Headers
	if (isset($_GET["edit"])) {
		$editline = $_GET["edit"];
		$html->addContent("<h1>EDIT ALIAS</h1>\n\n");
		list($alias, $label, $code, $module_type) = split(" ", $content[$editline], 4);
		list($module, $type) = split(" # ", $module_type, 2);
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>");
		$html->addContent("<input type='hidden' name='line' value='$editline' / >");
	}
	else {
		$html->addContent("<h1>ADD ALIAS</h1>\n\n");
		$code = null; $label = null; $type = null; $comment = null;
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."?action=add' method='post'>");
	}

	// Form TEXT fields (with values to edit or not)
	$html->addContent("CODE: <input type='text' name='code' value='$code' /><br />\n");
	$html->addContent("LABEL: <input type='text' name='label' value='$label' /><br />\n");
	$html->addContent("MODULE: <select name='module'>\n");
	foreach (load_file(MODULE_FILE_LOCATION) as $modulenf) {
		$modulef = rtrim($modulenf);
		if ($module == $modulef) {
			$html->addContent("<option selected value='$modulef'>$modulef</option>\n");
		} else {
			$html->addContent("<option value='$modulef'>$modulef</option>\n");
		}
	}
	$html->addContent("</select><br />\n");
	$html->addContent("Type: <select name='type'>\n");
	foreach (load_file(TYPE_FILE_LOCATION) as $typenf) {
		$typef = rtrim($typenf);
		if (rtrim($type) == $typef) {
			$html->addContent("<option selected value='$typef'>$typef</option>\n");
		} else {
			$html->addContent("<option value='$typef'>$typef</option>\n");
		}
	}
	$html->addContent("</select><br />\n");

	// Form Buttons (ADD/SAVE)
	if (isset($_GET["edit"])) {
		$html->addContent("<input type='submit' value='SAVE' /></form>\n");
		$html->addContent("<form action='".$_SERVER['PHP_SELF']."' method='post'>\n");
		$html->addContent("<input type='submit' value='CANCEL' /></form>\n");
	}
	else {
		$html->addContent("<input type='submit' value='ADD' /></form>\n");
	}
}
else {
	if ($_GET["action"] == "add") {

	}
	elseif ($_GET["action"] == "save") {

	}
}

// Display the page
echo $html->get();

?>