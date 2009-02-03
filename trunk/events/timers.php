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

$tpl_body = & new Template(TPL_FILE_LOCATION.'timers_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timmers', $timmers);
$tpl_body->set('config', $config);
$tpl_body->set('aliases', $aliases);

if (!isset($_GET["action"]))
{
	$tpl_add = & new Template(TPL_FILE_LOCATION.'timer_add.tpl');
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
		
		case "edit":
			list($lbl, $weekdays, $dateonoff, $ontime, $offtime, $onmacro, $offmacro) = split(" ", $schedfile[$_GET['line']], 7); 
			list($dateon, $dateoff) = split("-", $dateonoff, 2);
			list($onmonth, $onday) = split("/", $dateon, 2);
			list($offmonth, $offday) = split("/", $dateoff, 2);
			list($onhour, $onmin) = split(":", $ontime, 2);
			list($offhour, $offmin) = split(":", $offtime, 2);
			$enabled = (substr($lbl, 0, 1) == "#") ? false : true;
			
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'timer_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('enabled', $enabled);
			
			$tpl_edit->set('codelabels', $codelabels);
			$tpl_edit->set('selcode', strip_code($onmacro));
			
			$tpl_edit->set('weekdays', $weekdays);
			
			$tpl_edit->set('months', $months);
			$tpl_edit->set('days', $days);
			$tpl_edit->set('hours', $hours);
			$tpl_edit->set('mins', $mins);
			
			$tpl_edit->set('onday', $onday);
			$tpl_edit->set('onmonth', $onmonth);
			$tpl_edit->set('offday', $offday);
			$tpl_edit->set('offmonth', $offmonth);
			
			$tpl_edit->set('onhour', $onhour);
			$tpl_edit->set('onmin', $onmin);
			$tpl_edit->set('offhour', $offhour);
			$tpl_edit->set('offmin', $offmin);
			
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
		/*
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
		*/
		case "move":
			if ($_GET["dir"] == "up") reorder_array($schedfile, $_GET['line'], $_GET['line']-1, $schedfileloc);
			if ($_GET["dir"] == "down") reorder_array($schedfile, $_GET['line'], $_GET['line']+1, $schedfileloc);
			break;
			
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');


/**
 * Weekdays
 * 
 * Description: This function generates the weekday's table. It can
 * be used for viewing existing timmers, adding new timmers and editing
 * 
 * @param $string if received will contain string such as: 'sm.w.fs' from schedule file
 * @param $lang contains all the language strings to be used
 * @param $list boolean if true weekday's belong to timmer listing
 * @param $enabled represent boolean for status of timmer
 */
function weekdays($string, $lang, $list, $enabled)
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
	$week_tpl->set('enabled', $enabled);
	$week_tpl->set('list', $list);
	
	return $week_tpl->fetch(TPL_FILE_LOCATION.'weekdays.tpl');
}

/**
 * Strip code
 * 
 * Description: Receives macro name in format 'a2on' or 'b12off',
 * strips and returns house and unit code
 * 
 * @param $macro represents complete macro name
 */
 function strip_code($macro)
 {
 	//1. lower case $macro
 	//2. find position of first "o"
 	//3. get substr from pos 0 to position returned from #2
 	//4. place all in uppercase
	return strtoupper(substr($macro, 0, strpos(strtolower($macro), "o")));
 }

/**
 * Parse Macro
 * 
 * Description: Receives macro name such as 'a11on' extracts
 * house and unit code and finds description/label in aliases
 * 
 * @param $macro represents the macro name itself
 * @param $aliases is array of all the aliases
 */
function parse_macro($macro, $aliases)
{
	$code = strip_code($macro);
	
	foreach ($aliases as $alias)
	{
		list($temp, $label, $retcode, $module_type_loc) = split(" ", $alias, 4);
		
		if (strtoupper($retcode) == $code)
			return label_parse($label, false);
	}
	
	return "";
}

?>