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

function save_file($content, $filename) {
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

?>