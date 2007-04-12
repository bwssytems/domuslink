<?php
/*
 * functions.php
 *
 */

function heyustartstop ($heyuexec, $action) {
	if ($action == "start") $cmd = $heyuexec." start 2>&1";
	elseif ($action == "stop") $cmd = $heyuexec." stop 2>&1";
	elseif ($action == "restart") $cmd = $heyuexec." restart 2>&1";

	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if ($result[0] == "starting heyu_relay" || $result[0] == "")
		header("Location: ".$_SERVER['PHP_SELF']);
	else
		header("Location: error.php?msg=".$result[0]);
}

function chkheyustate() {
	$cmd = "ps x | grep [h]eyu_";
	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if (count($result) == 2) {
		return "<font color=green>UP</font>";
	} else {
		return "<font color=red>DOWN</font>";
	}
}

function execheyucmd($heyuexec) {
	$unit = $_GET["device"];
	$value = $_GET["value"];
	$action = $_GET["action"];

	if ($action=="on"||$action=="off"){
		$cmd = $heyuexec." ".$action." ".$unit." 2>&1";
	} elseif ($action=="dim" || $action=="bright" || $action=="dimb"){
		//$cmd = $heyuexec." ".$action." ".$unit." ".$value;
	}
	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if ($result[0] == "") {
		header("Location: ".$_SERVER['PHP_SELF']);
	} else {
		header("Location: error.php?msg=".$result[0]);
	}
}

function checkonstate($unit, $heyuexec) {
	$cmd = $heyuexec." onstate ".$unit." 2>&1";
	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if ($result[0] == "1" || $result[0] == "0") {
		return $result[0];
	} else {
		header("Location: error.php?msg=".$result[0]);
	}
}

/* Get File - reads and returns file contents in an array */
function getfile($filename) {
	if (is_readable($filename) == true) {
		$content = file($filename);
	}
	else {
		header("Location: error.php?msg=".$filename." not found or not readable!");
		die();
	}
	return $content;
}

/* Write File - receives array with contents and filename to write to */
function writefile($content, $filename) {
	$fp = fopen($filename,'w');

	if (is_writable($filename) == true) {
		foreach ($content as $line) {
			$write = fwrite($fp, $line);
		}
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else {
		header("Location: error.php?msg=".$filename." not writable!");
		die();
	}
	fclose($fp);
}

/* Add Device to device file - receives device file to add to */
function adddevice($devicefile){
	$devices = getfile($devicefile);

	$newdevice = "ALIAS ".$_POST["description"]." ".$_POST["device"]." ".$_POST["type"]." # ".$_POST["unit"]."\n";
	array_push($devices, $newdevice);
	writefile($devices, $devicefile);
}

/* Edit Device - receives device file */
function editdevice($devicefile) {
	$line = $_POST["line"]; // line being edited
	$editeddev = "ALIAS ".$_POST["description"]." ".$_POST["device"]." ".$_POST["type"]." # ".$_POST["unit"]."\n";
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
