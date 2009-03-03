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
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) 
	header("Location: ../login.php?from=events/upload");

## Instantiate heyuConf class
$heyuconf = new heyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'upload.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('config', $config);

if (isset($_GET["action"])) {
	switch ($_GET["action"]) {
		case "upload":
			$rs = heyu_upload();
			$tpl_body->set('type', 'upload');
			break;
		case "erase":
			$rs = heyu_erase();
			$tpl_body->set('type', 'erase');
			break;
	}
	$tpl_body->set('out', $rs);
}
else {
	$tpl_body->set('type', 'none');
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>