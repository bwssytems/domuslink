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

## Instantiate HeyuSched class, get contents and parse timers
$heyusched = new HeyuSched($schedfileloc);
$triggers = $heyusched->getTriggers();

## Security validation's
if ($config['seclevel'] != "0") {
	if (!isset($_COOKIE["dluloged"]))
		header("Location: ../login.php?from=events/timers");
}

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = "triggers go here";

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>