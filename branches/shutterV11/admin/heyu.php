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

## Includes
$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) { 
	header("Location: ../login.php?from=admin/heyu");
	exit();
}

## Instantiate HeyuConf class
$heyuconf = new heyuConf($config['heyuconf']);
## Get heyu (x10.conf) file contents/settings
$settings = $heyuconf->get();

## Set template parameters
$tpl->set('title', 'Heyu Setup');

if (!isset($_GET["action"])) {
	$tpl_body = & new Template(TPL_FILE_LOCATION.'heyuconf_view.tpl');
	$tpl_body->set('config', $config);
	$tpl_body->set('lang', $lang);
	$tpl_body->set('settings', $settings);
}
else {
	if ($_GET["action"] == "edit") {
		$tpl_body = & new Template(TPL_FILE_LOCATION.'heyuconf_edit.tpl');
		$tpl_body->set('config', $config);
		$tpl_body->set('lang', $lang);
		$tpl_body->set('settings', $settings);
	}
	elseif ($_GET["action"] == "save") {
		$i = 0;
		
		// $_POST contains all lines in heyu conf file.
		// $key represents each directive, alias (with #, so ALIAS1,ALIAS2,etc), etc
		// $value represents directive value or full string of ALIAS,SCENE,etc
		foreach ($_POST as $key => $value) {
			$primary = substr($key, 0, 5);
			switch ($primary) {
				case "ALIAS":
					$newcontent[$i] = $primary." ".$value."\n";
					break;
				case "SCENE":
					$newcontent[$i] = $primary." ".$value."\n";
					break;
				case "USERS": // USERSYN
					$newcontent[$i] = substr($key, 0, 7)." ".$value."\n";
					break;
				default:
					$newcontent[$i] = $key." ".$value."\n";
					break;
			}
			$i++;
		}
		save_file($newcontent, $config['heyuconf'], true);
	}
}

function yesnoopt($value) {
	if ($value == "YES") {
		return "<option selected value='YES'>YES</option>\n" .
				"<option value='NO'>NO</option>\n";
	} 
	else {
		return "<option value='YES'>YES</option>\n" .
				"<option selected value='NO'>NO</option>\n";
	}
}

function dawnduskopt($value) {
	if ($value == "FIRST") {
		return "<option selected value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "EARLIEST") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option selected value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "LATEST") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option selected value='LATEST'>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "AVERAGE") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value='LATEST'>LATEST</option>\n" .
				"<option selected value='AVERAGE'>AVERAGE</option>\n" .
				"<option value='MEDIAN'>MEDIAN</option>\n";
	}
	elseif ($value == "MEDIAN") {
		return "<option value='FIRST'>FIRST</option>\n" .
				"<option value='EARLIEST'>EARLIEST</option>\n" .
				"<option value=LATEST>LATEST</option>\n" .
				"<option value='AVERAGE'>AVERAGE</option>\n" .
				"<option selected value='MEDIAN'>MEDIAN</option>\n";
	}
}

## Display the page
if (!isset($tpl_body)) $tpl_body = null;
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>