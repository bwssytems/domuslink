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
$heyuconf = new HeyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Security validation's
if ($config['seclevel'] != "0") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: ../login.php?from=events/timers");
}

## Set template parameters
$tpl->set('title', $lang['timers']);

if (!isset($_GET["state"]))
{
	$tpl_body = & new Template(TPL_FILE_LOCATION.'upload.tpl');
	$tpl_body->set('lang', $lang);
	$tpl_body->set('config', $config);
	$tpl_body->set('schedfile', $schedfileloc);
}
else
{
	switch ($_GET["state"])
	{ 
		case "uploading":
			heyu_upload($config['heyuexec']);
			break;
		case "error":
			$tpl_body = & new Template(TPL_FILE_LOCATION.'upload_res.tpl');
			$tpl_body->set('uptitle', $lang["uploaderror"]);
			$tpl_body->set('msg', $lang["uploaderror_txt"]);
			$tpl_body->set('divstate', "");
			$tpl_body->set('out', load_file("/tmp/heyu_upload.out"));
			break;
		case "completed":
			$tpl_body = & new Template(TPL_FILE_LOCATION.'upload_res.tpl');
			$tpl_body->set('uptitle', $lang["uploadsuccess"]);
			$tpl_body->set('msg', $lang["uploaderror_txt"]);
			$tpl_body->set('divstate', "display:none");
			$tpl_body->set('out', load_file("/tmp/heyu_upload.out"));
			break;
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>