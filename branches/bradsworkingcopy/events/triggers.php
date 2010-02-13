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
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=events/triggers");
	exit();
}

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
$tpl->set('title', $lang['triggers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'trigger_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('triggers', $triggers);
$tpl_body->set('config', $config);
print("start initialize line");
$tpl_body->set('first_line', $heyusched->getTriggerBeginLine());
print("got begin");
$tpl_body->set('last_line', $heyusched->getTriggerEndLine());
print("initialized");

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'trigger_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('codelabels', $codelabels);
	$tpl_add->set('cmacs', clean_and_translate_macros($macros));
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			direct_replace_line($schedfile, $schedfileloc, substr($schedfile[$_GET['line']], 1), $_GET['line']);
			break;
			
		case "disable":
			direct_replace_line($schedfile, $schedfileloc, "#".$schedfile[$_GET['line']], $_GET['line']);
			break;
			
		case "edit":
			list($lbl, $tunit, $command, $macro) = split(" ", $schedfile[$_GET['line']], 4);
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'trigger_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('enabled', (substr($lbl, 0, 1) == "#") ? false : true);
			$tpl_edit->set('tcommand', strtolower($command));
			$tpl_edit->set('codelabels', $codelabels);
			$tpl_edit->set('unit', $tunit);
			$tpl_edit->set('cmacs', clean_and_translate_macros($macros));
			$tpl_edit->set('selmacro', $macro);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
			
		case "add":
			add_line($schedfile, $schedfileloc, $heyusched->getTriggerEndLine()+1, 'trigger');
			break;
			
		case "save":
			edit_line($schedfile, $schedfileloc, 'trigger');
			break;
			
		case "del":
			delete_line($schedfile, $schedfileloc, $_GET["line"]);
			break;
		
		case "move":
			if ($_GET["dir"] == "up") reorder_array($schedfile, $_GET['line'], $_GET['line']-1, $schedfileloc);
			if ($_GET["dir"] == "down") reorder_array($schedfile, $_GET['line'], $_GET['line']+1, $schedfileloc);
			break;
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>