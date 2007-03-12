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
	echo "<td><a href='".$_SERVER['PHP_SELF']."?edit=$line_num'>$l_edit</a> | <a href='".$_SERVER['PHP_SELF']."?del=$line_num'>$l_delete</a> </td>\n";
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
echo "$l_device: <input type=text name=device value='$code' / ><br />\n";
echo "$l_description: <input type=text name=description value='$desc' /><br />\n";
echo "$l_type: <input type=text name=type value='$typeformated' / ><br />\n";

if ($editline != "") {
	echo "<input type='submit' value='$l_save' />\n";
	echo "</form>";
	echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>\n";
	echo "<input type='submit' value='$l_cancel' />\n";
	echo "</form>\n";
}
else {
	echo "<input type='submit' value='$l_add' />\n";
	echo "</form>";
}
echo "</div>";
include ('footer.php');

?>