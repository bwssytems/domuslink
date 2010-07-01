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
require_once('..'.DIRECTORY_SEPARATOR.'include_globals.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=events/timers_macro");
	exit();
}

if(!isset($heyusched)) {
	gen_error(null, $lang['noscheddefined']);
	exit();
}

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

$tpl_body = new Template(TPL_FILE_LOCATION.'timer_macro_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timers', $timers);
$tpl_body->set('config', $config);
$tpl_body->set('themeloc', TPL_FILE_LOCATION);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'timer_macro_add.tpl');
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
			$mustSave = true;
			break;
			
		case "disable":
			$schedObjs[$_GET['line']]->setEnabled(false);
			$mustSave = true;
			break;
		
		case "edit":
			$timerObj = $schedObjs[$_GET['line']];

			$tpl_edit = new Template(TPL_FILE_LOCATION.'timer_macro_edit.tpl');
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

			$heyusched->addElement($aTimer);

			$mustSave = true;
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

			$mustSave = true;
			break;

		case "del":
			$heyusched->deleteElement($_GET["line"]);
			$mustSave = true;
			break;
		
		case "move":
			if ($_GET["dir"] == "up") $heyusched->reorderElements($_GET['line'], $_GET['line']-1);
			if ($_GET["dir"] == "down") $heyusched->reorderElements($_GET['line'], $_GET['line']+1);
			$mustSave = true;
			break;
			
	}
	
	if($mustSave)
	{
		try {
			$heyusched->save();
		}
		catch(Exception $e)	{
			if(count(preg_grep("/modified/", array($e->getMessage()))))
				gen_error(null, array($e->getMessage(), $lang['exitbrowser']));
			else
				gen_error(null, $e->getMessage());
			exit();
		}
	}
	
	if($_GET["action"] != "edit") {
		header("Location: ".$_SERVER['PHP_SELF']);
		exit();
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>