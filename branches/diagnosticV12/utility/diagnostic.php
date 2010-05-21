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
require_once('..'.DIRECTORY_SEPARATOR.'include.php');

## Security validation must be checked
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=utility/diagnostic");
	exit();
}

$fileCheck = array();

$fileCheck[0]["targetname"] = DB_FILE_LOCATION;
$fileCheck[0]["exists"] = file_exists(DB_FILE_LOCATION);
$fileCheck[0]["writable"] = is_writable(DB_FILE_LOCATION);
$fileCheck[1]["targetname"] = CONFIG_FILE_LOCATION;
$fileCheck[1]["exists"] = true; // We wouldn't get here if this did not exist
$fileCheck[1]["writable"] = is_writable(CONFIG_FILE_LOCATION);
$fileCheck[2]["targetname"] = $config["heyu_base_real"];
$fileCheck[2]["exists"] = file_exists($config["heyu_base_real"]);
$fileCheck[2]["writable"] = is_writable($config["heyu_base_real"]);
$fileCheck[3]["targetname"] = $config["heyuconfloc"];
$fileCheck[3]["exists"] = file_exists($config["heyuconfloc"]);
$fileCheck[3]["writable"] = is_writable($config["heyuconfloc"]);
$fileCheck[4]["targetname"] = $config['heyuexec'];
$fileCheck[4]["exists"] = file_exists($config['heyuexec']);
$fileCheck[4]["executable"] = is_executable($config['heyuexec']);

if($fileCheck[3]["exists"] && $fileCheck[3]["writable"]) {
	$heyuConf = new heyuConf($config["heyuconfloc"]);
	$ttyObjects = $heyuConf->getElementObjects("tty");
	$i = 4;
	foreach($ttyObjects as $ttyObject) {
		if($ttyObject->isEnabled()) {
			list($label, $device) = explode(" ", $ttyObject->getElementLine());
			if(strtolower($device) != "dummy") {
				$i++;
				$fileCheck[$i]["targetname"] = $device;
				$fileCheck[$i]["exists"] = file_exists($device);
				$fileCheck[$i]["writable"] = is_writable($device);
				break;
			}
		}
	}

	$ttyObjects = $heyuConf->getElementObjects("tty_aux");
	foreach($ttyObjects as $ttyObject) {
		if($ttyObject->isEnabled()) {
			list($label, $device) = explode(" ", $ttyObject->getElementLine());
			if(strtolower($device) != "dummy") {
				$i++;
				$fileCheck[$i]["targetname"] = $device;
				$fileCheck[$i]["exists"] = file_exists($device);
				$fileCheck[$i]["writable"] = is_writable($device);
				break;
			}
		}
	}
}

$errorCount = 0;
for($i = 0; $i < count($fileCheck); $i++) {
	if(!$fileCheck[$i]["exists"])
		$errorCount++;
		
	if(isset($fileCheck[$i]["writable"]) && !$fileCheck[$i]["writable"])
		$errorCount++;
	
	if(isset($fileCheck[$i]["executable"]) && !$fileCheck[$i]["executable"])
		$errorCount++;
}

if(!$errorCount) {
	$_SESSION['filesChecked'] = true;

	header("Location: ../index.php");
	exit();	
}
## Set template parameters
$tpl->set('title', $lang['diagnostic']);
$tpl->set('lang', $lang);


$tpl_body = & new Template(TPL_FILE_LOCATION.'diagnostic.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('fileCheck', $fileCheck);

if (!isset($_GET["action"])) {
	$junk = 1;
}
else {
	$_SESSION['filesChecked'] = true;
	
	header("Location: ../index.php");
	exit();
}

## Display the page
if (!empty($tpl_body)) {
	$tpl->set('content', $tpl_body);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>