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
require_once(CLASS_FILE_LOCATION.'heyusched.class.php');

## Instantiate HeyuConf class and get schedule file with absolute path
$heyuconf = new HeyuConf($config['heyuconf']);
$schedfile = $config['heyu_base'].$heyuconf->getSchedFile();

## Instantiate HeyuSched class
$heyusched = new HeyuSched($schedfile);

## Security validation's
if ($config['seclevel'] != "0") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: ../login.php?from=events/timmers");
}

## Set template parameters
$tpl->set('title', $lang['timmers']);

$tpl_body = "timmers go here. sched file is:".$schedfile.".";

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>