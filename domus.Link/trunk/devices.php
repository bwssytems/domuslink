<?php

$del = $_GET["del"];
$edit = $_GET["edit"];
$action = $_GET["action"];

// Actions
if ($del != "") { delete($del); }
elseif ($action == "add") { add(); }
else { main(); }

// Main fucntion displays HTML
function main() {
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

	echo "<form action='".$_SERVER['PHP_SELF']."?action=add' method='post'>";
	echo "Device: <input type=text name=device /><br />\n";
	echo "Description: <input type=text name=description /><br />\n";
	echo "Type: <input type=text name=type /><br />\n";
	echo "<input type='submit' value='Add' />\n";
	echo "</form>";
}

// Add device by adding line to array then writing
function add(){
	$device = $_POST["device"];
	$desc = $_POST["description"];
	$type = $_POST["type"];
	$lines = get_file();
	$new_line = $device."##".$desc."##".$type."//\n";
	array_push($lines, $new_line);
	write($lines);
}

// Delets device by removing line from array then writing
function delete($del) {
	$lines = get_file();
	array_splice($lines, $del, 1);
	write($lines);
}

// Write array to file
function write($lines) {
	$fp = fopen(get_devicefile(),'w');

	if (is_writable(get_devicefile()) == true) {
		foreach ($lines as $line) {
			$write = fwrite($fp, $line);
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