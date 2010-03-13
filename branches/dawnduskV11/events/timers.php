<?php
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

## Includes
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');
require_once(CLASS_FILE_LOCATION.'heyusched.class.php');
require_once(CLASS_FILE_LOCATION.'timer.class.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=events/timers");
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
$timers = $heyusched->getTimers();
$triggers = $heyusched->getTriggers();

## Set-up arrays
$months = array (1 => $lang["jan"], $lang["feb"], $lang["mar"], $lang["apr"], $lang["may"], $lang["jun"], $lang["jul"], $lang["aug"], $lang["sep"], $lang["oct"], $lang["nov"], $lang["dec"]);
$wdayo = array("s","m","t","w","t","f","s");
$days = range(1,31);
$mins = range(0,59);
$hours = range(00,23);

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'timers_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timers', $timers);
$tpl_body->set('config', $config);

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'timer_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('codelabels', $codelabels);
	$tpl_add->set('months', $months);
	$tpl_add->set('days', $days);
	$tpl_add->set('hours', $hours);
	$tpl_add->set('mins', $mins);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			$sm = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']); 
			$newschedfile = change_macro_states($sm, "enable", $schedfile);
			direct_replace_line($newschedfile, $schedfileloc, substr($schedfile[$_GET['line']], 1), $_GET['line']);
			break;
			
		case "disable":
			//if no timer or trigger in use that uses on/off macros OR
			//disabled timer or trigger exists that uses on/off macro
			$mtim = multiple_timer_macro_use($timers, $_GET['onm'], $_GET['ofm'], $_GET['line']);
			$mtrigon = multiple_trigger_macro_use($triggers, $_GET['onm'], $_GET['line']);
			$mtrigoff = multiple_trigger_macro_use($triggers, $_GET['ofm'], $_GET['line']);
			if ($mtim <= 1 && $mtrigon == 0 && $mtrigoff == 0) {
				//get individual macros (get_specific_macros)
				//then change their states (change_macro_states) outputing complete file to $newschedfile
				//finally disable timer sending as input new schedfile
				$sm = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']); 
				$newschedfile = change_macro_states($sm, "disable", $schedfile);
				direct_replace_line($newschedfile, $schedfileloc, COMMENT_SIGN_D.$schedfile[$_GET['line']], $_GET['line']);
			}
			else
				direct_replace_line($schedfile, $schedfileloc, COMMENT_SIGN_D.$schedfile[$_GET['line']], $_GET['line']); //disable timer
			break;
		
		case "edit":
			$timerObj = new Timer($schedfile[$_GET['line']]);
			$timerObj->setLineNum($_GET['line']);
			
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'timer_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('codelabels', $codelabels);
			$tpl_edit->set('months', $months);
			$tpl_edit->set('days', $days);
			$tpl_edit->set('hours', $hours);
			$tpl_edit->set('mins', $mins);
			
			$tpl_edit->set('theTimer', $timerObj);
			
			if($timerObj->getStartMacro() != "null")
				$tpl_edit->set('selcode', strip_code($timerObj->getStartMacro()));
			elseif($offmacro != "null")
				$tpl_edit->set('selcode', strip_code($timerObj->getStopMacro()));

			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			//build timer line with POST results
			add_quick_timer_line($schedfile, $schedfileloc, $macros, $heyusched->getLine(MACRO_D, END_D), $heyusched->getLine(TIMER_D, END_D));	
			break;
			
		case "save":
			//build timer line with POST results
			edit_quick_timer_line($schedfile, $schedfileloc);
			break;

		case "del":
			//check if any other timer or trigger (enabled or disabled) is using macros
			//	if no  - delete timer and assiociated macros
			//	if yes - only delete timer
			if (!multiple_timer_macro_use($timers, $_GET['onm'], $_GET['ofm'], $_GET['line']) || !multiple_trigger_macro_use($triggers, $_GET['ofm'], $_GET['line']) || !multiple_trigger_macro_use($triggers, $_GET['onm'], $_GET['line'])) {
				//delete timer and associated macros
				$smas = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']);
				foreach ($smas as $num => $ml) {
						list($m, $l) = split(ARRAY_DELIMETER_D, $ml, 2);
						array_splice($schedfile, $l-$num, 1); //deletes macros
				}
				delete_line($schedfile, $schedfileloc, $_GET["line"]-count($smas)); //deletes timer
			}
			else {
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

?>