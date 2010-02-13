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
require_once('..'.DIRECTORY_SEPARATOR.'include.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=admin/utility");
	exit();
}

## Set template parameters
$tpl->set('title', $lang['utility']);
$tpl->set('page', 'utility');

$commands = array("help","version", "setclock", "readclock", "show", "reset", "catchup", "trigger", "macro", "logtail", "modlist", "enginestate", "allon", "alloff");

$tpl_body = & new Template(TPL_FILE_LOCATION.'utility.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('commands', $commands);

if ($_GET["action"] != "execute") {
	$tpl_body->set('lines', " ");
}
else {
		$tpl_body->set('lines', execute_cmd($config['heyuexec']." ".$_POST["command"]." ".$_POST["arguments"]));
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>