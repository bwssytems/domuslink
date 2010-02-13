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
	header("Location: ../login.php?from=events/macros");
	exit();
}

## Instantiate heyuConf class and get schedule file with absolute path
$heyuconf = new heyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Load aliases and parse so that only code and labels remain
$aliases = $heyuconf->getAliases();
$codelabels = $heyuconf->getCodesAndLabels($aliases);

## Instantiate heyuSched class, get contents and parse macros
$heyusched = new heyuSched($schedfileloc);
$schedfile = $heyusched->get();
$macros = $heyusched->getMacros();

## Set template parameters
$tpl->set('title', $lang['macros']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'macro_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('macros', $macros);
$tpl_body->set('config', $config);
$tpl_body->set('first_line', $heyusched->getMacroBeginLine());
$tpl_body->set('last_line', $heyusched->getMacroEndLine());

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'macro_add.tpl');
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
			list($lbl, $named_macro, $delay, $execute_command) = explode(" ", $schedfile[$_GET['line']], 4);
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'macro_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('enabled', (substr($lbl, 0, 1) == "#") ? false : true);
			$tpl_edit->set('macro_command', $execute_command);
			$tpl_edit->set('macro_name', $named_macro);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
			
		case "add":
			// if macro exist then don't add the macro else create macro lines,
			// add them to file
			$sm = get_specific_macro($macros, strtolower($_POST["macro_name"]));
			if (!$sm) {
				add_line($schedfile, $schedfileloc,$heyusched->getMacroEndLine()+1, "macro" );
			}
			break;
			
		case "save":
			//build macro line with POST results	
			edit_line($schedfile, $schedfileloc, "macro");
			break;
			
		case "del":
			delete_line($schedfile, $schedfileloc, $_GET["line"]);
			break;
		
		case "cancel":
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