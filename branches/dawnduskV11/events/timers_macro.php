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
			direct_replace_line($schedfile, $schedfileloc, COMMENT_SIGN_D.$schedfile[$_GET['line']], $_GET['line']); //disable timer
			break;
		
		case "edit":
			$timerObj = new Timer($schedfile[$_GET['line']]);
			$timerObj->setLineNum($_GET['line']);

			$tpl_edit = & new Template(TPL_FILE_LOCATION.'timer_macro_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('macros', $macros);
			$tpl_edit->set('months', $months);
			$tpl_edit->set('days', $days);
			$tpl_edit->set('hours', $hours);
			$tpl_edit->set('mins', $mins);
			
			$tpl_edit->set('theTimer', $timerObj);

			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			//build timer line with POST results
			add_line($schedfile, $schedfileloc, $heyusched->getLine(TIMER_D, END_D) + 1, TIMER_D.MACRO_D);
			break;
			
		case "save":
			//build timer line with POST results
			edit_line($schedfile, $schedfileloc, TIMER_D.MACRO_D);		
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