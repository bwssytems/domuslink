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
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'login.class.php');

## Instantiate login class
$login = new login();

## Set template parameters
$tpl->set('title', $lang['login']);
$tpl->set('lang', $lang);

if (isset($_GET["action"])) {
	if ($_GET["action"] == "logout") {
		$login->logout();
		header("Location: login.php?from=index");
		exit();
	}
}

if (isset($_POST['password'])) {
	if(isset($_POST['remember']))
		$remember = true;
	else
		$remember = false;
	if ($login->checkLogin($_POST['password'],$remember)) {
			header("Location: ".$config['url_path']."/".$_POST['from'].".php");
	}
	else {
		header("Location: login.php?from=".$_POST['from']."&failed=true");
	}
	exit();
}

$tpl_body = new Template(TPL_FILE_LOCATION.'login.tpl');
$tpl_body->set('lang', $lang);

## Display the page
if (!empty($tpl_body)) {
	$tpl->set('content', $tpl_body);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>