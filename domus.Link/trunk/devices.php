<?php

$deline = $_GET["del"];
$editline = $_GET["edit"];
$action = $_GET["action"];

require ('config.inc.php');
include('functions.php');

// Actions
if ($deline != "") { deleteline($deline, $devicefile); }
elseif ($action == "add") { adddevice($devicefile); }
elseif ($action == "save") { savedevices($devicefile); }

// Main
include ('header.php');
include ('menu.php');

echo "<div id='content'>";
echo "<table border=1 cellspacing=0 cellpadding=0 align=center>\n";

foreach (getfile($devicefile) as $line_num => $line) {
	list($code, $desc, $type) = split("##", $line, 3);
	$typeformated = substr($type, 0, -3);
	echo "<tr>\n";
	echo "<td>".$code."</td>\n";
	echo "<td>".$desc."</td>\n";
	echo "<td>".$typeformated."</td>\n";
	echo "<td><a href='".$_SERVER['PHP_SELF']."?edit=$line_num'>EDIT</a> | <a href='".$_SERVER['PHP_SELF']."?del=$line_num'>DELETE</a> </td>\n";
	echo "</tr>\n";
}

echo "</table>\n";

if ($editline != "") {
	$devices = getfile($devicefile);
	list($code, $desc, $type) = split("##", $devices[$editline], 3);
	$typeformated = substr($type, 0, -3);
	echo "<form action='".$_SERVER['PHP_SELF']."?action=save' method='post'>";
	echo "<input type=hidden name=line value='$editline' / >";
}
else {
	$code = "";
	$desc = "";
	$typeformated = "";
	echo "<form action='".$_SERVER['PHP_SELF']."?action=add' method='post'>";
}
echo "Device: <input type=text name=device value='$code' / ><br />\n";
echo "Description: <input type=text name=description value='$desc' /><br />\n";
echo "Type: <input type=text name=type value='$typeformated' / ><br />\n";

if ($editline != "") {
	echo "<input type='submit' value='Save' />\n";
	echo "</form>";
	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>\n";
	echo "<input type='submit' value='Cancel' />\n";
	echo "</form>\n";
}
else {
	echo "<input type='submit' value='Add' />\n";
	echo "</form>";
}
echo "</div>";
include ('footer.php');

?>