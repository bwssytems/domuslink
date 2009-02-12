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

## Instantiate heyuConf class and get schedule file with absolute path
$heyuconf = new heyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Load aliases and parse so that only code and labels remain
$aliases = $heyuconf->getAliases();
$codelabels = $heyuconf->getCodesAndLabels($aliases);

## Instantiate heyuSched class, get contents and parse timers
$heyusched = new heyuSched($schedfileloc);
$schedfile = $heyusched->get();
$macros = $heyusched->getMacros();
$triggers = $heyusched->getTriggers();

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'trigger_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('triggers', $triggers);
$tpl_body->set('config', $config);
$tpl_body->set('first_line', $heyusched->getTimerEndLine()+1);
$tpl_body->set('last_line', $heyusched->getTimerEndLine()+count($triggers));

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'trigger_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('codelabels', $codelabels);
	$tpl_add->set('macros', clean_and_translate_macros($macros));
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			break;
			
		case "disable":
			break;
			
		case "edit":
			break;
			
		case "add":
			break;
			
		case "save":
			break;
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

function clean_and_translate_macros($macros, $i = 0) {
	global $lang;
	foreach ($macros as $macro) {
		//macro [label] [optional_delay] [command]+[code] 
		//macro tv_set_on 0 on a1
		list($tmp, $label, $delay, $command, $code) = split(" ", $macro, 5);
		//array = [label]@[code]@[on/off translated]
		
		$onp = strpos(strtolower($macro), "_on");
		$offp = strpos(strtolower($macro), "_off");
		
		if ($onp)
			$mc[$i] = "$onp@$code@".$lang["on"];
		else
			$mc[$i] = "$offp@$code@".$lang["off"];
	}
	
	return $mc;
}

?>