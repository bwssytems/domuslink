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
		return "<font color=green>$l_heyu_up</font>";
	} else {
		return "<font color=red>$l_heyu_down</font>";
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

function addalias($file){
	$contents = getfile($file);

	$newline = "ALIAS ".$_POST["label"]." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";
	array_push($contents, $newline);
	writefile($contents, $file);
}

function editalias($file) {
	$line = $_POST["line"]; // line being edited
	$newline = "ALIAS ".$_POST["label"]." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";
	$contents = getfile($file);

	if ($line == 0 || (count($contents) - 1) == $line) { // first or last line editing
		array_splice($contents, $line, 1, $newline);
	}
	else { // editing line in middle
		$end = array_splice($contents, $line+1);
		array_splice($contents, $line, 1, $newline);
		$contents = array_merge($contents, $end);
	}
	writefile($contents, $file);
}

/* Delete Line - receives line and file to delete from */
function deleteline($line, $file) {
	$contents = getfile($file);
	array_splice($contents, $line, 1);
	writefile($contents, $file);
}

?>
