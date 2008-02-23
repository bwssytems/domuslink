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
 * Description: This function loads a file and returns the whole content
 *
 * @param $file represent's file to load
 */
function load_file($file)
{
	if (is_readable($file) == true)
	{
		$content = file($file);
	}
	else
	{
		header("Location: ".check_url()."/error.php?msg=".$file." not found or not readable!");
		die();
	}
	return $content;
}

/**
 * Add line to file
 *
 * @param $content file contents being received
 * @param $file complete file location
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function add_line($content, $file, $editing)
{
	array_push($content, build_new_line($editing));
	save_file($content, $file);
}

/**
 * Edit line in file
 *
 * @param $content file contents
 * @param $file being edited
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function edit_line($content, $file, $editing)
{
	$line = $_POST["line"]; // line being edited

	if ($line == 0 || (count($content) - 1) == $line) // first or last line editing
	{
		array_splice($content, $line, 1, build_new_line($editing));
	}
	else // when editing line in middle
	{
		$end = array_splice($content, $line+1);
		array_splice($content, $line, 1, build_new_line($editing));
		$content = array_merge($content, $end);
	}
	
	save_file($content, $file);
}

/**
 * Build line to add or alter in a file
 * 
 * @param $type represents type of line being created
 */
function build_new_line($type)
{
	switch ($type)
	{
		case "alias":
			return "ALIAS ".label_parse($_POST["label"], true)." ".$_POST["code"]." ".$_POST["module"]." # ".$_POST["type"].",".$_POST["loc"]."\n";
			break;
		case "floorplan":
			return $_POST["location"]."\n";
			break;
		case "module":
			return $_POST["module"]."\n";
			break;
		case "type":
			return $_POST["type"]."\n";
			break;	
	}
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

/**
 * Changes position of two lines in array
 * 
 * @param $array original array to use
 * @param $org_pos initial position of line
 * @param $final_pos final position of line
 * @param $file in which array contents are located
 */
function reorder_array($array, $org_pos, $final_pos, $file) 
{
	$tmp = $array[$org_pos];
	$array[$org_pos] = $array[$final_pos];
	$array[$final_pos] = $tmp;
	
	save_file($array, $file);
}

/**
 * Save file
 * 
 * Description: This function saves a file to the specified filename
 *
 * @param $content new content to be saved
 * @param $filename of file to save to
 * @param $isheyuconf boolean that represent's if changes being saved
 *         are from the heyu settings. If true then force a reload
 */
function save_file($content, $filename, $isheyuconf)
{
	$fp = fopen($filename,'w');

	if (is_writable($filename) == true)
	{
		foreach ($content as $line)
		{
			$write = fwrite($fp, $line);
		}
		if ($isheyuconf)
			header("Location: ".check_url()."/admin/reload.php");
		else
			header("Location: ".$_SERVER['PHP_SELF']);

	}
	else
	{
		header("Location: ".check_url()."/error.php?msg=".$filename." not found or not writable!");
		die();
	}
	fclose($fp);
}

?>