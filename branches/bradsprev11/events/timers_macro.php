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

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=events/timers_macro");
	exit();
}

## Instantiate heyuConf class and get schedule file with absolute path
$heyuconf = new heyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Instantiate heyuSched class, get contents and parse timers
$heyusched = new heyuSched($schedfileloc);
$schedfile = $heyusched->get();
$macros = $heyusched->getMacros();
$timers = $heyusched->getTimers();

## Set-up arrays
$months = array (1 => $lang["jan"], $lang["feb"], $lang["mar"], $lang["apr"], $lang["may"], $lang["jun"], $lang["jul"], $lang["aug"], $lang["sep"], $lang["oct"], $lang["nov"], $lang["dec"]);
$wdayo = array("s","m","t","w","t","f","s");
$days = range(1,31);
$mins = range(0,59);
$hours = range(00,23);

## Set template parameters
$tpl->set('title', $lang['timers_macro']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'timer_macro_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timers', $timers);
$tpl_body->set('config', $config);
$tpl_body->set('first_line', $heyusched->getTimerBeginLine());
$tpl_body->set('last_line', $heyusched->getTimerEndLine());
print($heyusched->getTimerBeginLine()."-".$heyusched->getTimerEndLine());
if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'timer_macro_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('macros', $macros);
	$tpl_add->set('months', $months);
	$tpl_add->set('days', $days);
	$tpl_add->set('hours', $hours);
	$tpl_add->set('mins', $mins);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			direct_replace_line($newschedfile, $schedfileloc, substr($schedfile[$_GET['line']], 1), $_GET['line']);
			break;
			
		case "disable":
			direct_replace_line($schedfile, $schedfileloc, "#".$schedfile[$_GET['line']], $_GET['line']); //disable timer
			break;
		
		case "edit":
			list($lbl, $weekdays, $dateonoff, $ontime, $offtime, $onmacro, $offmacro) = split(" ", $schedfile[$_GET['line']], 7); 
			list($dateon, $dateoff) = split("-", $dateonoff, 2);
			list($onmonth, $onday) = split("/", $dateon, 2);
			list($offmonth, $offday) = split("/", $dateoff, 2);
			list($onhour, $onmin) = split(":", $ontime, 2);
			list($offhour, $offmin) = split(":", $offtime, 2);
			$enabled = (substr($lbl, 0, 1) == "#") ? false : true;
			
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'timer_macro_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('enabled', $enabled);
			
			$tpl_edit->set('macros', $macros);
			$tpl_edit->set('selcode_on', $onmacro);
			$tpl_edit->set('selcode_off', $offmacro);
			
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
		
		case "add":
			//build timer line with POST results
			add_line($schedfile, $schedfileloc, $heyusched->getTimerEndLine() + 1, "timermacro");
			break;
			
		case "save":
			//build timer line with POST results
			edit_line($schedfile, $schedfileloc, "timermacro");		
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