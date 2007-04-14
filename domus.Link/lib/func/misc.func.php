<?php

// Load text file and returns it
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

?>