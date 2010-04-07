<?php
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

/**
 * Load file
 * 
 * Description: This function loads a file and returns the whole content
 *
 * @param $fileloc represent's file to load
 */
function load_file($fileloc) {
	global $lang;
	if (is_readable($fileloc) == true) {
		$content = file($fileloc);
	}
	else {
		gen_error(null, $fileloc." ".$lang['error_filer']);
	}
	
	return $content;
}

/**
 * Add line to file
 *
 * @param $content file contents being received
 * @param $fileloc complete file location
 * @param $linenum line to add after
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function add_line($content, $fileloc, $linenum, $editing) {
	array_splice($content, $linenum, 0, build_new_line($editing));
	save_file($content, $fileloc);
}

/**
 * Add line to end of file
 *
 * @param $content file contents being received
 * @param $fileloc complete file location
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function add_line_end($content, $fileloc, $editing) {
	
	array_push($content, build_new_line($editing));
	save_file($content, $fileloc);
}

/**
 * Edit line in file
 *
 * @param $content file contents
 * @param $fileloc being edited
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function edit_line($content, $fileloc, $editing) {
	$line = $_POST["line"]; // line being edited
	direct_replace_line($content, $fileloc, build_new_line($editing), $line);
}

/**
 * Build line to add or alter in a file
 * 
 * @param $type represents type of line being created
 */
function build_new_line($type) {
	
	switch ($type)
	{
		case "alias":
			return "ALIAS ".label_parse($_POST["label"], true)." ".strtoupper($_POST["code"])." ".$_POST["module"]." # ".$_POST["type"].",".$_POST["loc"]."\n";
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
 * 
 */
function direct_replace_line($content, $fileloc, $linecontent, $linenumber) {
	$content[$linenumber] = $linecontent;
	save_file($content, $fileloc);
}

/**
 * Direct Add line to file
 *
 * @param $content file contents being received
 * @param $fileloc complete file location
 * @param $linenum line to add after
 * @param $editing represents what type is being edited (alias, location, etc)
 */
function direct_add_line($content, $fileloc, $linecontent, $linenum) {
	array_splice($content, $linenum, 0, $linecontent);
	save_file($content, $fileloc);
}

/**
 * Delete line from file
 *
 * @param $content file contents
 * @param $fileloc being edited
 * @param $line to be deleted
 */
function delete_line($content, $fileloc, $line) {
	array_splice($content, $line, 1);
	save_file($content, $fileloc);
}

/**
 * Changes position of two lines in array
 * 
 * @param $array original array to use
 * @param $org_pos initial position of line
 * @param $final_pos final position of line
 * @param $fileloc in which array contents are located
 */
function reorder_array($array, $org_pos, $final_pos, $fileloc) {
	$tmp = $array[$org_pos];
	$array[$org_pos] = $array[$final_pos];
	$array[$final_pos] = $tmp;
	
	save_file($array, $fileloc);
}

/**
 * Save file
 * 
 * Description: This function saves a file to the specified filename
 *
 * @param $content new content to be saved
 * @param $fileloc name of file to save to
 * @param $isheyuconf boolean that represent's if changes being saved
 *         are from the heyu settings. If true then force a reload
 */
function save_file($content, $fileloc, $isheyuconf = false) {
	global $config;
	global $lang;
	$fp = fopen($fileloc,'w');

	if (is_writable($fileloc) == true) {
		foreach ($content as $line) {
			$write = fwrite($fp, $line);
		}
		if ($isheyuconf)
			header("Location: ".$config['url_path']."/admin/reload.php");
		else
			header("Location: ".$_SERVER['PHP_SELF']);

	}
	else {
		gen_error(null, $fileloc." ".$lang['error_filerw']);
	}
	fclose($fp);
}

?>
