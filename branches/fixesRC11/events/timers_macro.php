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
$heyuconf = new heyuConf($config['heyuconfloc']);
$schedfileloc = $config['heyu_base_real'].$heyuconf->getSchedFile();

## Instantiate heyuSched class, get contents and parse timers
$heyusched = new heyuSched($schedfileloc);
$schedObjs = $heyusched->getObjects();
$macros = $heyusched->getMacroObjects();
$timers = $heyusched->getTimerObjects();

## Set-up arrays
$months = array (1 => $lang["jan"], $lang["feb"], $lang["mar"], $lang["apr"], $lang["may"], $lang["jun"], $lang["jul"], $lang["aug"], $lang["sep"], $lang["oct"], $lang["nov"], $lang["dec"]);
$wdayo = array("s","m","t","w","t","f","s");
$days = range(1,31);
$mins = range(0,59);
$hours = range(00,23);
$offsetmins = range(1,15);
## array_splice($offsetmins, -1, -1, range(20,360,5));
$offsetmins = array_merge($offsetmins, range(20,360,5));

## Set template parameters
$tpl->set('title', $lang['timers_macro']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'timer_macro_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timers', $timers);
$tpl_body->set('config', $config);
$tpl_body->set('themeloc', TPL_FILE_LOCATION);
if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'timer_macro_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('macros', $macros);
	$tpl_add->set('months', $months);
	$tpl_add->set('days', $days);
	$tpl_add->set('hours', $hours);
	$tpl_add->set('mins', $mins);
	$tpl_add->set('offsetmins', $offsetmins);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			$schedObjs[$_GET['line']]->setEnabled(true);
			save_file($schedObjs, $schedfileloc);
			break;
			
		case "disable":
			$schedObjs[$_GET['line']]->setEnabled(false);
			save_file($schedObjs, $schedfileloc);
			break;
		
		case "edit":
			$timerObj = $schedObjs[$_GET['line']];

			$tpl_edit = & new Template(TPL_FILE_LOCATION.'timer_macro_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('macros', $macros);
			$tpl_edit->set('months', $months);
			$tpl_edit->set('days', $days);
			$tpl_edit->set('hours', $hours);
			$tpl_edit->set('mins', $mins);
			$tpl_edit->set('offsetmins', $offsetmins);
			
			$tpl_edit->set('theTimer', $timerObj);

			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			//build timer line with POST results
			$aTimer = new Timer();
			post_data_to_timer($aTimer);
			if(isset($_POST["null_macro_on"]))
				$aTimer->setStartMacro("null");
			else
				$aTimer->setStartMacro($_POST["macro_on"]);
			if(isset($_POST["null_macro_off"]))
				$aTimer->setStopMacro("null");
			else
				$aTimer->setStopMacro(trim($_POST["macro_off"]));
			if($_POST["status"] == "#")
				$aTimer->setEnabled(false);

			$aTimer->rebuildElementLine();
			array_splice($schedObjs,$heyusched->getLine(TIMER_D, END_D)+ 1, 0, array($aTimer));
			$heyusched->setLine(TIMER_D, $heyusched->getLine(TIMER_D, END_D) + 1, END_D);

			save_file($schedObjs, $schedfileloc);
			break;
			
		case "save":
			//build timer line with POST results
			post_data_to_timer($schedObjs[$_POST["line"]]);
			if(isset($_POST["null_macro_on"]))
				$schedObjs[$_POST["line"]]->setStartMacro("null");
			else
				$schedObjs[$_POST["line"]]->setStartMacro($_POST["macro_on"]);
			if(isset($_POST["null_macro_off"]))
				$schedObjs[$_POST["line"]]->setStopMacro("null");
			else
				$schedObjs[$_POST["line"]]->setStopMacro(trim($_POST["macro_off"]));
			$schedObjs[$_POST["line"]]->rebuildElementLine();
			save_file($schedObjs, $schedfileloc);
			break;

		case "del":
			delete_line($schedObjs, $schedfileloc, $_GET["line"]);
			break;
		
		case "move":
			if ($_GET["dir"] == "up") reorder_array($schedObjs, $_GET['line'], $_GET['line']-1, $schedfileloc);
			if ($_GET["dir"] == "down") reorder_array($schedObjs, $_GET['line'], $_GET['line']+1, $schedfileloc);
			break;
			
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>