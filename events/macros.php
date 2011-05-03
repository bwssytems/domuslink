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
	header("Location: ../login.php?from=events/macros");
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

$schedObjs = $heyusched->getObjects();
$macros = $heyusched->getMacroObjects();

## Set template parameters
$tpl->set('title', $lang['macros']);

$tpl_body = new Template(TPL_FILE_LOCATION.'macro_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('macros', $macros);
$tpl_body->set('config', $config);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'macro_add.tpl');
	$tpl_add->set('lang', $lang);
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
			$macroObj = $schedObjs[$_GET['line']];

			$tpl_edit = new Template(TPL_FILE_LOCATION.'macro_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('theMacro', $macroObj);
			$tpl_body->set('form', $tpl_edit);
			break;
			
		case "add":
			// if macro exist then don't add the macro else create macro lines,
			// add them to file
			$sm = get_specific_macro($macros, label_parse($_POST["macro_name"], true));
			if (!$sm) {
				$aMacro = new Macro();
				$aMacro->setLabel(label_parse($_POST["macro_name"], true));
				$aMacro->setCommand($_POST["macro_command"]);
				if ($_POST["status"] == COMMENT_SIGN_D)
					$aMacro->setEnabled(false);
				else
					$aMacro->setEnabled(true);

				$aMacro->rebuildElementLine();
				$heyusched->addElement($aMacro);

				$mustSave = true;
			}
			break;
			
		case "save":
			//build macro line with POST results	
			$schedObjs[$_POST["line"]]->setLabel(label_parse($_POST["macro_name"], true));
			$schedObjs[$_POST["line"]]->setCommand($_POST["macro_command"]);
			if ($_POST["status"] == COMMENT_SIGN_D)
				$schedObjs[$_POST["line"]]->setEnabled(false);
			else
				$schedObjs[$_POST["line"]]->setEnabled(true);
			$schedObjs[$_POST["line"]]->rebuildElementLine();
			$mustSave = true;
			break;
			
		case "del":
			$heyusched->deleteElement($_GET["line"]);
			$mustSave = true;
			break;
		
		case "cancel":
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
