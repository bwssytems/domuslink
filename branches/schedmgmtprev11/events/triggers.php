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
	header("Location: ../login.php?from=events/triggers");
	exit();
}

## Instantiate heyuConf class and get schedule file with absolute path
$heyuconf = new heyuConf($config['heyuconfloc']);
$schedfileloc = $config['heyu_base_real'].$heyuconf->getSchedFile();

## Load aliases and parse so that only code and labels remain
$aliases = $heyuconf->getAliases();
$codelabels = $heyuconf->getCodesAndLabels($aliases);

## Instantiate heyuSched class, get contents and parse timers
$heyusched = new heyuSched($schedfileloc);
$schedObjs = $heyusched->getObjects();
$macros = $heyusched->getMacroObjects();
$triggers = $heyusched->getTriggerObjects();

## Set template parameters
$tpl->set('title', $lang['triggers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'trigger_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('triggers', $triggers);
$tpl_body->set('config', $config);

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'trigger_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('codelabels', $codelabels);
	$tpl_add->set('cmacs', $macros);
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
			list($lbl, $tunit, $command, $macro) = split(" ", $schedObjs[$_GET['line']]->getElementLine(), 4);
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'trigger_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('enabled', $schedObjs[$_GET['line']]->isEnabled());
			$tpl_edit->set('tcommand', strtolower($command));
			$tpl_edit->set('codelabels', $codelabels);
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

			array_splice($schedObjs,$heyusched->getLine(TRIGGER_D, END_D)+ 1, 0, array($aTrigger));
			$heyusched->setLine(TRIGGER_D, $heyusched->getLine(TRIGGER_D, END_D) + 1, END_D);

			save_file($schedObjs, $schedfileloc);
			break;
			
		case "save":
			$schedObjs[$_POST["line"]]->setElementLine(TRIGGER_D." ".$_POST["unit"]." ".$_POST["command"]." ".$_POST["macro"]);
			if ($_POST["status"] == COMMENT_SIGN_D)
				$schedObjs[$_POST["line"]]->setEnabled(false);
			else
				$schedObjs[$_POST["line"]]->setEnabled(true);

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