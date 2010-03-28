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
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

function createHeyuSubdir($dirNum) {
	global $config;
	
	if($dirNum == "default")
		return false;
	if(!file_exists($config['heyu_base_real'].$dirNum)) {
		mkdir($config['heyu_base_real']."/".$dirNum);
		if(file_exists($config['heyu_base_real'].$config['heyuconf'])) {
			copy($config['heyu_base_real'].$config['heyuconf'], $config['heyu_base_real'].$dirNum."/".$config['heyuconf']);
		}
		else {
			touch($config['heyu_base_real'].$dirNum."/".$config['heyuconf']);
		}
		## Instantiate heyuConf class and get schedule file with absolute path
		$heyuconf = new heyuConf($config['heyuconfloc']);
		$schedfileloc = $config['heyu_base_real'].$heyuconf->getSchedFileValue();
		if(file_exists($schedfileloc)) {
			copy($schedfileloc, $config['heyu_base_real'].$dirNum."/".$heyuconf->getSchedFileValue());
		}
		else {
			touch($config['heyu_base_real'].$dirNum."/".$heyuconf->getSchedFileValue());
		}
		return true;
	}
	else
		return false;
}

function getHeyuConfDirModifier() {
	global $config;
	if($config['heyu_subdir'] != "default")
		return strtolower($config['heyu_subdir'])."/";
	else
		return "";
}
?>