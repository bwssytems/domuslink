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
$timers = $heyusched->getTimers($schedfile);
$macros = $heyusched->getMacros($schedfile);

## Set-up arrays
$months = array (1 => $lang["jan"], $lang["feb"], $lang["mar"], $lang["apr"], $lang["may"], $lang["jun"], $lang["jul"], $lang["aug"], $lang["sep"], $lang["oct"], $lang["nov"], $lang["dec"]);
$days = range(1,31);
$mins = range(0,59);
$hours = range(00,23);

## Set template parameters
$tpl->set('title', $lang['timmers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'timers_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timers', $timers);
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
			$sm = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']); 
			$newschedfile = change_macro_states($sm, "enable", $schedfile);
			replace_line($schedfileloc, $newschedfile, substr($schedfile[$_GET['line']], 1), $_GET['line']);
			break;
			
		case "disable":
			//if no timer in use that uses on/off macros OR
			//disabled timer exists that uses on/off macro
			$mtim = multiple_timer_macro_use($timers, $_GET['onm'], $_GET['ofm'], $_GET['line']);
			if ($mtim == 0 || $mtim == 1)
			{
				//get individual macros (get_specific_macros)
				//then change their states (change_macro_states) outputing complete file to $newschedfile
				//finally disable timer sending as input new schedfile
				$sm = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']); 
				$newschedfile = change_macro_states($sm, "disable", $schedfile);
				replace_line($schedfileloc, $newschedfile, "#".$schedfile[$_GET['line']], $_GET['line']);
			}
			else
				replace_line($schedfileloc, $schedfile, "#".$schedfile[$_GET['line']], $_GET['line']); //disable timer
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
		*/
		case "del":
			//check if any other timer (enabled or disabled) is using macros
			//	if no  - delete timer and assiociated macros
			//	if yes - only delete timer
			if (!multiple_timer_macro_use($timers, $_GET['onm'], $_GET['ofm'], $_GET['line']))
			{
				//delete timer and associated macros
				$smas = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']);
				$size = count($smas);
				foreach ($smas as $num => $ml)
				{
						list($m, $l) = split("@", $ml, 2);
						array_splice($schedfile, $l-$num, 1); //deletes macros
				}
				delete_line($schedfile, $schedfileloc, $_GET["line"]-$size); //deletes timer
			}
			else
			{
				//only delete timer since other timer(s) are using macros
				delete_line($schedfile, $schedfileloc, $_GET["line"]); //deletes timer
			}
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

/**
 * Description: Receives array of all macros along with
 * on and off macro. It will then search same array and return
 * another array with matching on/off macros.
 * 
 * @param $macros complete array of macros
 * @param $onmacro the on macro name
 * @param $offmacro the off macro name
 */
function get_specific_macros($macros, $onmacro, $offmacro)
{
	$fmacros = array(); 
	
	foreach ($macros as $macro)
	{
		//$macro format [MACROLINE]@[LINENUM]
		if (stripos($macro, $onmacro) || stripos($macro, $offmacro)) 
			array_push($fmacros, $macro);
	}
	
	return $fmacros;
}

/**
 * Description: Checks against active timers if macros are
 * used by any other timer.
 * 
 * @param $timers the timer array
 * @param $onmacro the onmacro name
 * @param $offmacro the offmacro name
 * @param $line the command originating line number
 */
function multiple_timer_macro_use($timers, $onmacro, $offmacro, $line)
{
	foreach ($timers as $timer)
	{
		//split line into timer and line number then
		list($t, $l) = split("@", $timer, 2);
		
		if ($line == $l) continue; //ignore originating timer
		else
		{
			if (stripos($t, $onmacro) || stripos($t, $offmacro))
			{
				//timer found that use on/off macro
				if (substr($t, 0, 1) != "#") 
					return 2; //active timer exists
				else 
					return 1; //disabled timer exists
			}
		}
	}
	
	return 0;
	
	//return values
	//0 - no timer in use that uses on/off macros
	//1 - disabled timer exists that uses on/off macro
	//2 - active timer exists that uses on/off macro
}

/**
 * Description: Function to enable or disable macros
 * 
 * @param $macros array of macros that matched in get_specific_macros
 * @param $estate end state (enable/disable)
 * @param $file contents such as schedule file
 */
function change_macro_states($macros, $estate, $file)
{
	foreach ($macros as $macro)
	{
		//split line into macro and line number then
		list($m, $l) = split("@", $macro, 2);
		
		//if first char is # (disabled) and estate is enabled
		//replace line in $file with the #
		if (substr($macro, 0, 1) == "#" && $estate == "enable")
		{
			$file[$l] = substr($m, 1); //enable
		}
		elseif (substr($macro, 0, 1) != "#" && $estate == "disable")
		{
			$file[$l] = "#".$m; //disable
		}
	}
	
	return $file;
}
?>