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

## Security validation's
if ($config['seclevel'] != "0") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: ../login.php?from=events/timmers");
}

## Instantiate HeyuConf class and get schedule file with absolute path
$heyuconf = new HeyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Load aliases and parse so that only code and labels remain
$aliases = $heyuconf->getAliases(false);
$codelabels = $heyuconf->getCodesAndLabels($aliases);

## Instantiate HeyuSched class, get contents and parse timmers
$heyusched = new HeyuSched($schedfileloc);
$schedfile = $heyusched->get();
$timmers = $heyusched->getTimers($schedfile);

## Set-up arrays
$months = array (1 => $lang["jan"], $lang["feb"], $lang["mar"], $lang["apr"], $lang["may"], $lang["jun"], $lang["jul"], $lang["aug"], $lang["sep"], $lang["oct"], $lang["nov"], $lang["dec"]);
$days = range(1,31);
$mins = range(0,59);
$hours = range(00,23);

## Set template parameters
$tpl->set('title', $lang['timmers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'timmers_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timmers', $timmers);
$tpl_body->set('config', $config);
$tpl_body->set('aliases', $aliases);

if (!isset($_GET["action"]))
{
	$tpl_add = & new Template(TPL_FILE_LOCATION.'timmer_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('codelabels', $codelabels);
	$tpl_add->set('months', $months);
	$tpl_add->set('days', $days);
	$tpl_add->set('hours', $hours);
	$tpl_add->set('mins', $mins);
	$tpl_body->set('form', $tpl_add);
}
else
{
	switch ($_GET["action"])
	{
		case "enable":
			replace_line($schedfileloc, $schedfile, substr($schedfile[$_GET['line']], 1), $_GET['line']);
			break;
		case "disable":
			replace_line($schedfileloc, $schedfile, "#".$schedfile[$_GET['line']], $_GET['line']);
			break;
		/*
		case "edit":
			list($temp, $label, $code, $module_type_loc) = split(" ", $settings[$_GET['line']], 4);
			list($module, $type_loc) = split(" # ", $module_type_loc, 2);
			list($type, $loc) = split(",", $type_loc, 2);
			
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'aliases_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('label', $label);
			$tpl_edit->set('code', $code);
			$tpl_edit->set('module', $module);
			$tpl_edit->set('modtypes', $modtypes);
			$tpl_edit->set('type', $type);
			$tpl_edit->set('loc', $loc);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			if (preg_match($chars, $_POST["label"]))
				header("Location: ".check_url()."/error.php?msg=".$lang['error_special_chars']);
			else
				add_line($settings, $config['heyuconf'], 'alias');
			break;
		
		case "save":
			if (preg_match($chars, $_POST["label"]))
				header("Location: ".check_url()."/error.php?msg=".$lang['error_special_chars']);
			else
				edit_line($settings, $config['heyuconf'], 'alias');
			break;
		
		case "del":
			delete_line($settings, $config['heyuconf'], $_GET["line"]);
			break;
		
		case "move":
			if ($_GET["dir"] == "up") reorder_array($settings, $_GET['line'], $_GET['line']-1, $config['heyuconf']);
			if ($_GET["dir"] == "down") reorder_array($settings, $_GET['line'], $_GET['line']+1, $config['heyuconf']);
			break;
		*/	
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');


/**
 * Weekdays
 * 
 * Description: This function generated the weekday's table. It can
 * be used for viewing existing timmers and adding new timmers
 * 
 * @param $string if received will contain string such as: 'sm.w.fs' from schedule file
 * @param $lang contains all the language strings to be used
 */
function weekdays($string, $lang)
{
	$week = array(substr($lang['sun'], 0, 1),
					substr($lang['mon'], 0, 1),
					substr($lang['tue'], 0, 1),
					substr($lang['wed'], 0, 1),
					substr($lang['thu'], 0, 1),
					substr($lang['fri'], 0, 1),
					substr($lang['sat'], 0, 1));
	
	$week_tpl = & new Template(TPL_FILE_LOCATION.'weekdays.tpl');
	$week_tpl->set('week', $week);
	$week_tpl->set('weekdays', $string);
	
	return $week_tpl->fetch(TPL_FILE_LOCATION.'weekdays.tpl');
}

/**
 * 
 */
function parse_macro($macro, $aliases)
{
	$pos = strpos($macro, "o");
	$code = strtoupper(substr($macro, 0, $pos));
	
	foreach ($aliases as $alias)
	{
		list($temp, $label, $retcode, $module_type_loc) = split(" ", $alias, 4);
		
		if (strtoupper($retcode) == $code)
			return label_parse($label, false);
	}
	
	return "";
}

?>