<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
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
	}
}

if (isset($_POST['password'])) {
	if ($login->checkLogin($_POST['password'],$_POST['remember'])) {
			header("Location: ".$config['url_path']."/".$_POST['from'].".php");
	}
	else {
		header("Location: login.php?from=".$_POST['from']."&failed=true");
	}
}

$tpl_body = & new Template(TPL_FILE_LOCATION.'login.tpl');
$tpl_body->set('lang', $lang);

## Display the page
if (!empty($tpl_body)) {
	$tpl->set('content', $tpl_body);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>