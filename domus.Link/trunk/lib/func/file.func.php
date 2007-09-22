<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

/**
 * Load file
 *
 * @param $file represent file to load
 */
function load_file($file)
{
	if (is_readable($file) == true)
	{
		$content = file($file);
	}
	else
	{
		header("Location: error.php?msg=".$file." not found or not readable!");
		die();
	}
	return $content;
}

/**
 * Save file
 *
 * @param $content new content to be saved
 * @param $filename of file to save to
 */
function save_file($content, $filename)
{
	$fp = fopen($filename,'w');

	if (is_writable($filename) == true)
	{
		foreach ($content as $line)
		{
			$write = fwrite($fp, $line);
		}

		header("Location: ".$_SERVER['PHP_SELF']);

	}
	else
	{
		header("Location: ../error.php?msg=".$filename." not writable!");
		die();
	}
	fclose($fp);
}

/**
 * Add line to file
 *
 * @param $content file contents being received
 * @param $file complete file location
 * @param $editing represents what is being edited
 */
function add_line($content, $file, $editing)
{
	if ($editing == "alias")
	{
		$newline = "ALIAS ".label_parse($_POST["label"], true)." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";
	}
	elseif ($editing == "module")
		$newline = $_POST["module"]."\n";
	elseif ($editing == "type")
		$newline = $_POST["type"]."\n";

	array_push($content, $newline);
	save_file($content, $file);
}

/**
 * Edit line in file
 *
 * @param $content file contents
 * @param $file being edited
 * @param $editing represents what is being edited
 */
function edit_line($content, $file, $editing)
{
	$line = $_POST["line"]; // line being edited

	if ($editing == "alias")
	{
		$newline = "ALIAS ".label_parse($_POST["label"], true)." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"]."\n";
	}
	elseif ($editing == "module")
		$newline = $_POST["module"]."\n";
	elseif ($editing == "type")
		$newline = $_POST["type"]."\n";


	if ($line == 0 || (count($content) - 1) == $line) // first or last line editing
	{
		array_splice($content, $line, 1, $newline);
	}
	else // when editing line in middle
	{
		$end = array_splice($content, $line+1);
		array_splice($content, $line, 1, $newline);
		$content = array_merge($content, $end);
	}
	save_file($content, $file);
}

/**
 * Delete line from file
 *
 * @param $content file contents
 * @param $file being edited
 * @param $line to be deleted
 */
function delete_line($content, $file, $line)
{
	array_splice($content, $line, 1);
	save_file($content, $file);
}

?>