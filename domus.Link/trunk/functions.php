<?php
/*
 * functions.php
 *
 */

function getfile($filename) {
	if (is_readable($filename) == true) {
		$lines = file($filename);
	}
	else {
		die($filename.' dosent exist or isnt readable!');
	}
	return $lines;
}

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

function adddevice($devicefile){
	$device = $_POST["device"];
	$desc = $_POST["description"];
	$type = $_POST["type"];
	$devices = getfile($devicefile);
	$new_line = $device."##".$desc."##".$type."//\n";
	array_push($devices, $new_line);
	writefile($devices, $devicefile);
}

function savedevices($devicefile) {
	$line = $_POST["line"];
	$device = $_POST["device"];
	$desc = $_POST["description"];
	$type = $_POST["type"];

	$newarray[0] = $device."##".$desc."##".$type."//\n";

	$devices = getfile($devicefile); // original device file contents

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
		$devpartone = array_splice($devices, $line-1);
		$devparttwo = array_slice($devices, $line+1);
		$b4final = array_merge($devpartone, $newarray);
		$final = array_merge($b4final, $devparttwo);
	}

	//$devpartone = array_splice($devices, $line-1); // 1st part of array
	//$devparttwo = array_slice($devices, $line+1); // 2nd part of array
	//array_push($devpartone, $edited_line);
	//$final = array_merge($devpartone, $devparttwo);

	writefile($final, $devicefile);
}

function deleteline($line, $file) {
	$contents = getfile($file);
	array_splice($contents, $line, 1);
	writefile($contents, $file);
}

?>
