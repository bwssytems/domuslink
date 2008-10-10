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

## Includes
$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);
## Get heyu (x10.conf) file contents/settings
$settings = $heyuconf->get();

if ($config['password'] != "" && !isset($_COOKIE["dluloged"]))
	header("Location: login.php?from=heyu");
else
{
	$tpl->set('title', 'Restarting Heyu');

	$tpl_body = & new Template(TPL_FILE_LOCATION.'reload.tpl');
	$tpl_body->set('config', $config);
	//$tpl_body->set('lang', $lang);

	## Display the page
	$tpl->set('content', $tpl_body);

	echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

	//sleep(3);
	//heyu_ctrl($config['heyuexec'], 'stop');
	//header("Location: heyu.php");
}


?>
