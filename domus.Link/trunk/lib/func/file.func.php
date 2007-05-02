<?php

function load_file($file)
{
	if (is_readable($file) == true) {
		$content = file($file);
	}
	else {
		header("Location: error.php?msg=".$file." not found or not readable!");
		die();
	}
	return $content;
}

function save_file($content, $filename)
{
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

function add_alias($content, $file)
{
	$newline = "ALIAS ".$_POST["label"]." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";
	array_push($content, $newline);
	save_file($content, $file);
}

function edit_alias($content, $file)
{
	$line = $_POST["line"]; // line being edited
	$newline = "ALIAS ".$_POST["label"]." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";

	if ($line == 0 || (count($content) - 1) == $line) { // first or last line editing
		array_splice($content, $line, 1, $newline);
	}
	else { // editing line in middle
		$end = array_splice($content, $line+1);
		array_splice($content, $line, 1, $newline);
		$content = array_merge($content, $end);
	}
	save_file($content, $file);
}

function delete_line($content, $file, $line)
{
	array_splice($content, $line, 1);
	save_file($content, $file);
}

function list_dir_content($dir)
{
	$dn = opendir($dir);
	$exclude = array("README", ".", "..", ".svn");
	
	while($fn = readdir($dn)) {
		if ($fn == $exclude[0] || $fn == $exclude[1] || $fn == $exclude[2] || $fn == $exclude[3]) continue;
		$directories[] = $fn;
	}
	
	sort($directories);
	closedir($dn);
	return $directories;
}

?>