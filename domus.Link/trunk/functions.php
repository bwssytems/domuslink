<?php
/*
 * functions.php
 *
 */


function execheyucmd() {
	$unit = $_GET["device"];
	$value = $_GET["value"];
	$action = $_GET["action"];

	if ($action=="on"||$action=="off"){
		$cmd = getheyupath()." ".$action." ".$unit;
	} elseif ($action=="dim" || $action=="bright" || $action=="dimb"){
		//$cmd .= $action." ".$unit." ".$value;
	}
	//echo "<br />".$cmd;
	exec($cmd, $result, $retval);
	header("Location: ".$_SERVER['PHP_SELF']);
}

function checkonstate($unit) {
	$cmd = getheyupath()." onstate ".$unit;
	exec($cmd, $result, $retval);
	return $result[0];
}

function getheyupath() {
	include ('config.inc.php');
	return $heyuexec;
}

/* Get File - reads and returns file contents in an array */
function getfile($filename) {
	if (is_readable($filename) == true) {
		$content = file($filename);
	}
	else {
		header("Location: error.php?file=".$filename."&msg=nread");
		die();
	}
	return $content;
}

/* Write File - receives array and filename to write to */
function writefile($content, $filename) {
	$fp = fopen($filename,'w');

	if (is_writable($filename) == true) {
		foreach ($content as $line) {
			$write = fwrite($fp, $line);
		}
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else {
		header("Location: error.php?file=".$filename."&msg=nwrite");
		die();
	}
	fclose($fp);
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
