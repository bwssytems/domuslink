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
	header("Location: ../login.php?from=events/triggers");
	exit();
}

if(!isset($heyusched)) {
	gen_error(null, $lang['noscheddefined']);
	exit();
}

$aliases = $heyuconf->getAliases();

$schedObjs = $heyusched->getObjects();
$macros = $heyusched->getMacroObjects();
$triggers = $heyusched->getTriggerObjects();

## Set template parameters
$tpl->set('title', $lang['triggers']);

$tpl_body = new Template(TPL_FILE_LOCATION.'trigger_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('triggers', $triggers);
$tpl_body->set('config', $config);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'trigger_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('aliases', $aliases);
	$tpl_add->set('cmacs', $macros);
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
			list($lbl, $tunit, $command, $macro) = explode(" ", $schedObjs[$_GET['line']]->getElementLine(), 4);
			$tpl_edit = new Template(TPL_FILE_LOCATION.'trigger_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('enabled', $schedObjs[$_GET['line']]->isEnabled());
			$tpl_edit->set('tcommand', strtolower($command));
			$tpl_edit->set('aliases', $aliases);
			$tpl_edit->set('unit', $tunit);
			$tpl_edit->set('cmacs', $macros);
			$tpl_edit->set('selmacro', $macro);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
			
		case "add":
			$aTrigger = new ScheduleElement(TRIGGER_D." ".$_POST["unit"]." ".$_POST["command"]." ".$_POST["macro"]);
			if ($_POST["status"] == COMMENT_SIGN_D)
				$aTrigger->setEnabled(false);
			else
				$aTrigger->setEnabled(true);

			$heyusched->addElement($aTrigger);

			$mustSave = true;
			break;
			
		case "save":
			$schedObjs[$_POST["line"]]->setElementLine(TRIGGER_D." ".$_POST["unit"]." ".$_POST["command"]." ".$_POST["macro"]);
			if ($_POST["status"] == COMMENT_SIGN_D)
				$schedObjs[$_POST["line"]]->setEnabled(false);
			else
				$schedObjs[$_POST["line"]]->setEnabled(true);

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