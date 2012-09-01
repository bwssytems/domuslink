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
$authCheck = new Login(USERDB_FILE_LOCATION, $config['use_domus_security']);
if (!$authCheck->login()) {
	header("Location: ../login.php?from=admin/aliases");
	exit();
}
if($authCheck->getUser()->getSecurityLevel() != 0) {
	header("Location: ../index.php");
	exit();
}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());

## Get heyu conf & aliases
$settings = $heyuconf->getObjects();
$scenes = $heyuconf->getScenes($authCheck->getUser());
$floorPlan = $heyuconf->getFloorPlan($authCheck->getUser());
$groupings = $groups->getElementObjects(ALL_OBJECTS_D);
$modules = $modtypes->getElementObjects(ALL_OBJECTS_D);
## Disallowed characters for scene label (separator |)
$chars = '/ã|é|à|ç|õ|ñ|è|ñ|ª|º|~|è|!|"|\#|\$|\^|%|\&|\?|\«|\»/';

## Set template parameters
$tpl->set('title', $lang['scenes']);
$tpl->set('page', 'scenes');

$tpl_body = new Template(TPL_FILE_LOCATION.'scenes_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('scenes', $scenes);
$tpl_body->set('config', $config);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'scenes_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('floorplan', $floorPlan);
	$tpl_add->set('config', $config);
	$tpl_add->set('groups', $groupings);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			$settings[$_GET['line']]->setEnabled(true);
			$mustSave = true;
			break;
			
		case "disable":
			$settings[$_GET['line']]->setEnabled(false);
			$mustSave = true;
			break;

		case "hide":
			$settings[$_GET['line']]->getAliasMap()->setHiddenFromHome("hidden");
			$settings[$_GET["line"]]->getAliasMap()->rebuildElementLine();
			$mustSave = true;
			break;
			
		case "show":
			$settings[$_GET['line']]->getAliasMap()->setHiddenFromHome("visible");
			$settings[$_GET["line"]]->getAliasMap()->rebuildElementLine();
			$mustSave = true;
			break;
			
		case "edit":
			$tpl_edit = new Template(TPL_FILE_LOCATION.'scenes_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('theScene', $settings[$_GET['line']]);
			$tpl_edit->set('floorplan', $floorPlan);
			$tpl_edit->set('selectedgroup', $groups->getAGroup($settings[$_GET['line']]->getAliasMap()->getGroup()));
			$tpl_edit->set('groups', $groupings);
			$tpl_edit->set('config', $config);
			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			if (preg_match($chars, $_POST["label"]))
				gen_error(null, $lang['error_special_chars']);
			else {
				$aScene = new Scene();
				$aScene->setLabel(label_parse($_POST["label"],true));
				$aScene->setCommands($_POST["commands"]);
				$aScene->getAliasMap()->setType($lang["scene"]);
				$aScene->getAliasMap()->setAliasLabel(label_parse($_POST["label"],true));
				if(strlen(trim($_POST["newloc"])) > 0)
					$aScene->getAliasMap()->setFloorPlanLabel(label_parse($_POST["newloc"],true));
				else
					$aScene->getAliasMap()->setFloorPlanLabel(label_parse($_POST["loc"],true));
				$aScene->getAliasMap()->setHiddenFromHome("visible");
				$aScene->getAliasMap()->setGroup($_POST["group"]);
				$aScene->getAliasMap()->setAccessLevel(intval($_POST["secaccesslevel"]));
				$aScene->getAliasMap()->rebuildElementLine();
				$aScene->rebuildElementLine();
				$heyuconf->addElement($aScene);

				$mustSave = true;
			}
			break;
		
		case "save":
			if (preg_match($chars, $_POST["label"]))
				gen_error(null, $lang['error_special_chars']);
			else {
				$settings[$_POST["line"]]->setLabel(label_parse($_POST["label"],true));
				$settings[$_POST["line"]]->setCommands($_POST["commands"]);
				$settings[$_POST["line"]]->getAliasMap()->setType($lang["scene"]);
				$settings[$_POST["line"]]->getAliasMap()->setAliasLabel(label_parse($_POST["label"],true));
				if(strlen(trim($_POST["newloc"])) > 0)
					$settings[$_POST["line"]]->getAliasMap()->setFloorPlanLabel(label_parse($_POST["newloc"],true));
				else
					$settings[$_POST["line"]]->getAliasMap()->setFloorPlanLabel(label_parse($_POST["loc"],true));
				$settings[$_POST["line"]]->getAliasMap()->setGroup($_POST["group"]);
				$settings[$_POST["line"]]->getAliasMap()->setAccessLevel(intval($_POST["secaccesslevel"]));
				$settings[$_POST["line"]]->getAliasMap()->rebuildElementLine();
				$settings[$_POST["line"]]->rebuildElementLine();

				$mustSave = true;
			}
			break;
		
		case "del":
			$heyuconf->deleteElement($_GET["line"]);
			$mustSave = true;
			break;
		
		case "move":
			if ($_GET["dir"] == "up") $heyuconf->reorderElements($_GET['line'], $_GET['line']-1);
			if ($_GET["dir"] == "down") $heyuconf->reorderElements($_GET['line'], $_GET['line']+1);
			$mustSave = true;
			break;
	}

	if($mustSave)
	{
		try {
			$heyuconf->save();
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