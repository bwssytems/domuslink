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
$authCheck = new Login(USERDB_FILE_LOCATION);
if (!$authCheck->login()) {
	header("Location: ../login.php?from=events/timers");
	exit();
}
if($authCheck->getUser()->getSecurityLevel()  > 1) {
	header("Location: ../index.php");
	exit();
}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());

if(!isset($heyusched)) {
	gen_error(null, $lang['noscheddefined']);
	exit();
}

$aliases = $heyuconf->getAliases($authCheck->getUser());

$schedObjs = $heyusched->getObjects();
$macros = $heyusched->getMacroObjects();
$timers = $heyusched->getTimerObjects();
$triggers = $heyusched->getTriggerObjects();

## Set-up arrays
$months = array (1 => $lang["jan"], $lang["feb"], $lang["mar"], $lang["apr"], $lang["may"], $lang["jun"], $lang["jul"], $lang["aug"], $lang["sep"], $lang["oct"], $lang["nov"], $lang["dec"]);
$wdayo = array("s","m","t","w","t","f","s");
$days = range(1,31);
$mins = range(0,59);
$hours = range(00,23);

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = new Template(TPL_FILE_LOCATION.'timers_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timers', $timers);
$tpl_body->set('config', $config);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'timer_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('aliases', $aliases);
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
			change_macro_states($sm, "enable");
			$schedObjs[$_GET['line']]->setEnabled(true);
			$mustSave = true;
			break;
			
		case "disable":
			//if no timer or trigger in use that uses on/off macros OR
			//disabled timer or trigger exists that uses on/off macro
			$mtim = multiple_macro_use($schedObjs, $_GET['onm'], $_GET['ofm'], $_GET['line']);
			if ($mtim == 0) {
				//get individual macros (get_specific_macros)
				//then change their states (change_macro_states) outputing complete file to $newschedfile
				//finally disable timer sending as input new schedfile
				$sm = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']);
				change_macro_states($sm, "disable");				
			}

			$schedObjs[$_GET['line']]->setEnabled(false);
			$mustSave = true;
			break;
		
		case "edit":
			$timerObj = $schedObjs[$_GET['line']];
			
			$tpl_edit = new Template(TPL_FILE_LOCATION.'timer_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('aliases', $aliases);
			$tpl_edit->set('months', $months);
			$tpl_edit->set('days', $days);
			$tpl_edit->set('hours', $hours);
			$tpl_edit->set('mins', $mins);
			
			$tpl_edit->set('theTimer', $timerObj);
			
			if($timerObj->getStartMacro() != "null")
				$tpl_edit->set('selcode', strip_code($timerObj->getStartMacro()));
			elseif($timerObj->getStopMacro() != "null")
				$tpl_edit->set('selcode', strip_code($timerObj->getStopMacro()));

			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			//build timer line with POST results
			$aTimer = new Timer();
			post_data_to_timer($aTimer);

			// new timer objects already set macros to default of null
			// only need to set macros if they are specific
			if(!isset($_POST["null_macro_on"]))
				$aTimer->setStartMacro(strtolower($_POST["module"])."_on");
			if(!isset($_POST["null_macro_off"]))
				$aTimer->setStopMacro(strtolower($_POST["module"])."_off");

			if($_POST["status"] == COMMENT_SIGN_D)
				$aTimer->setEnabled(false);

			$aTimer->rebuildElementLine();

			// if on/off macros exist then make sure they are enabled and add new timer
			// else create macro lines, add them to file and finally add new timer
			$i = 1;
			$sm = get_specific_macros($macros, $aTimer->getStartMacro(), $aTimer->getStopMacro());
			if ($sm) {
				change_macro_states($sm, "enable");
			}
			else {
				if( $aTimer->getStartMacro() != "null") {
					$onMacroObj = new Macro();
					$onMacroObj->setLabel($aTimer->getStartMacro());
					$onMacroObj->setCommand("on ".strtolower($_POST["module"]));
					$onMacroObj->rebuildElementLine();
					$heyusched->addElement($onMacroObj);
					$i++;
				}
				if( $aTimer->getStopMacro() != "null") {
					$offMacroObj = new Macro();
					$offMacroObj->setLabel($aTimer->getStopMacro());
					$offMacroObj->setCommand("off ".strtolower($_POST["module"])); 
					$offMacroObj->rebuildElementLine();
					$heyusched->addElement($offMacroObj);
					$i++;
				}
			}
			$heyusched->addElement($aTimer);
			$mustSave = true;
			break;
			
		case "save":
			//build timer line with POST results
			post_data_to_timer($schedObjs[$_POST["line"]]);
			$schedObjs[$_POST["line"]]->rebuildElementLine();
			$mustSave = true;
			break;

		case "del":
			//check if any other timer or trigger (enabled or disabled) is using macros
			//	if no  - delete timer and assiociated macros
			//	if yes - only delete timer
			$heyusched->deleteElement($_GET["line"]);
			if (multiple_macro_use($schedObjs, $_GET['onm'], $_GET['ofm'], $_GET['line']) == 0) {
				//delete timer and associated macros
				$smas = get_specific_macros($macros, $_GET['onm'], $_GET['ofm']);
				foreach ($smas as $num => $macroObj) {
					$heyusched->deleteElement($macroObj->getLineNum());
				}
			}
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