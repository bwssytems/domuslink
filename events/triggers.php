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
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');
require_once(CLASS_FILE_LOCATION.'heyusched.class.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) 
	header("Location: ../login.php?from=events/triggers");

## Instantiate HeyuConf class
$heyuconf = new heyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Instantiate HeyuSched class, get contents and parse timers
$heyusched = new heyuSched($schedfileloc);
$triggers = $heyusched->getTriggers();
$firstline = $heyusched->getTimerEndLine();

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'trigger_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('triggers', $triggers);
$tpl_body->set('config', $config);
$tpl_body->set('first_line', $firstline+1);
$tpl_body->set('last_line', $firstline+count($triggers));

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>