<?php
/*
 * functions.php
 *
 */

/* Get File - reads and return file contents in an array */
function getfile($filename) {
	if (is_readable($filename) == true) {
		$lines = file($filename);
	}
	else {
		die($filename.' dosent exist or isnt readable!');
	}
	return $lines;
}

/* Write File - receives array and filename to write to */
function writefile($content, $filename) {
	$fp = fopen($filename,'w');

	if (is_writable($filename) == true) {
		foreach ($content as $line) {
			$write = fwrite($fp, $line);
		}
	}
	else {
		die($filename.' file not writable!');
	}
	fclose($fp);
	header("Location: ".$_SERVER['PHP_SELF']);
}

/* Add Device to device file - receives device file to add to */
function adddevice($devicefile){
	$devices = getfile($devicefile);

	$newdevice = $_POST["device"]."##".$_POST["description"]."##".$_POST["type"]."//\n";
	array_push($devices, $newdevice);
	writefile($devices, $devicefile);
}

/* Edit Device - receives device file */
function editdevice($devicefile) {
	$line = $_POST["line"]; // line being edited
	$editeddev = $_POST["device"]."##".$_POST["description"]."##".$_POST["type"]."//\n";
	$devices = getfile($devicefile); // get original device file contents

	if ($line == 0 || (count($devices) - 1) == $line) { // first or last line editing
		array_splice($devices, $line, 1, $editeddev);
	}
	else { // editing line in middle
		$end = array_splice($devices, $line+1);
		array_splice($devices, $line, 1, $editeddev);
		$devices = array_merge($devices, $end);
	}

	writefile($devices, $devicefile);
}

/* Delete Line - receives line and file to delete from */
function deleteline($line, $file) {
	$contents = getfile($file);
	array_splice($contents, $line, 1);
	writefile($contents, $file);
}

?>
