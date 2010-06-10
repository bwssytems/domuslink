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
		throw new Exception($fileloc." ".$lang['error_filer']);
	}
	
	return $content;
}

/**
 * Save file
 * 
 * Description: This function saves a file to the specified filename
 *
 * @param $content new content to be saved
 * @param $fileloc name of file to save to
 */

function save_file($content, $fileloc) {
	global $lang;
	if(file_exists($fileloc)) {
		if (!is_writable($fileloc))
			throw new Exception($fileloc." ".$lang['error_filerw']);
	}

	$fp = fopen($fileloc,'w');
	if(!$fp) {
		throw new Exception($fileloc." ".$lang['error_filerw']);
	}
	
	foreach ($content as $line) {
		$write = fwrite($fp, $line);
	}
	fclose($fp);
}
?>
