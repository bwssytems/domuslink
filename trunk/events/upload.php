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

require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new heyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Security validation's
if ($config['seclevel'] != "0") {
	require_once(CLASS_FILE_LOCATION.'login.class.php');
	$autentication = new login();
	if (!$autentication->login())
		header("Location: ../login.php?from=events/timers");
}

## Set template parameters
$tpl->set('title', $lang['timers']);

if (!isset($_GET["action"])) {
	$tpl_body = & new Template(TPL_FILE_LOCATION.'upload.tpl');
	$tpl_body->set('lang', $lang);
	$tpl_body->set('config', $config);
	$tpl_body->set('schedfile', $schedfileloc);
}
else {
	$rs = heyu_upload();
	$tpl_body = & new Template(TPL_FILE_LOCATION.'upload_res.tpl');
	$tpl_body->set('uptitle', $lang["uploadsuccess"]);
	$tpl_body->set('msg', $lang["uploadsuccess_txt"]);
	$tpl_body->set('divstate', "display:none");
	$tpl_body->set('out', $rs);
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>