<?php
/*
 * Created on 2007/03/06
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

$deline = $_GET["del"];
$editline = $_GET["edit"];
$action = $_GET["action"];

// Actions
if ($deline != "") { delete($deline); }
elseif ($action == "add") { add(); }
elseif ($action == "save") { save(); }
else { main($editline); }

// Main fucntion displays HTML
function main($editline) {
	echo "<table border=1 cellspacing=0 cellpadding=0 width=50% align=center>\n";

	foreach (get_file() as $line_num => $line) {
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
		$devices = get_file();
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
}

// Add device by adding line to array then writing
function add(){
	$device = $_POST["device"];
	$desc = $_POST["description"];
	$type = $_POST["type"];
	$devices = get_file();
	$new_line = $device."##".$desc."##".$type."//\n";
	array_push($devices, $new_line);
	write($devices);
}

function save() {
	$line = $_POST["line"];
	$device = $_POST["device"];
	$desc = $_POST["description"];
	$type = $_POST["type"];

	$newarray[0] = $device."##".$desc."##".$type."//\n";

	$devices = get_file(); // original device file contents

	$size = count($devices) - 1;

	if ($line == 0) { // first line editing
		array_splice($devices, $line, 1);
		$final = array_merge($newarray, $devices);
	}
	elseif ($size == $line) { // last line editing
		array_splice($devices, $line, 1);
		$final = array_merge($devices, $newarray);
	}
	else {
		//echo "something else\nsize: $size";

	}

	//$devpartone = array_splice($devices, $line-1); // 1st part of array
	//$devparttwo = array_slice($devices, $line+1); // 2nd part of array
	//array_push($devpartone, $edited_line);
	//$final = array_merge($devpartone, $devparttwo);

	write($final);
}

// Delets device by removing line from array then writing
function delete($line) {
	$devices = get_file();
	array_splice($devices, $line, 1);
	write($devices);
}

// Write array to file
function write($devices) {
	$fp = fopen(get_devicefile(),'w');

	if (is_writable(get_devicefile()) == true) {
		foreach ($devices as $device) {
			$write = fwrite($fp, $device);
		}
	}
	else {
		die('devices file not writable!');
	}
	fclose($fp);
	header("Location: ".$_SERVER['PHP_SELF']);
}

// Returns array with file contents
function get_file() {
	if (is_readable(get_devicefile()) == true) {
		$lines = file(get_devicefile());
	}
	else {
		die('device file dosent exist or isnt readable!');
	}
	return $lines;
}

// Return device file
function get_devicefile() {
	include 'config.inc.php';
	return $devicefile;
}

?>