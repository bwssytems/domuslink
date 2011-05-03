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
require_once(CLASS_FILE_LOCATION.'/imagetypes.class.php');

## Security validation's
$authCheck = new Login(USERDB_FILE_LOCATION);
if (!$authCheck->login()) {
	header("Location: ../login.php?from=admin/users");
	exit();
}
if($authCheck->getUser()->getSecurityLevel() != 0) {
	header("Location: ../index.php");
	exit();
}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());

$groupings = $groups->getElementObjects(ALL_OBJECTS_D);
$thenamelist = ImageTypes::getMenuNames();

## Set template parameters
$tpl->set('title', $lang['groups']);
$tpl->set('page', 'groups');

$tpl_body = new Template(TPL_FILE_LOCATION.'groups_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('groups', $groupings);
$tpl_body->set('config', $config);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'groups_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('config', $config);
	$tpl_add->set('imagenames', $thenamelist);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			$groupings[$_GET['line']]->setEnabled(true);
			$mustSave = true;
			break;
			
		case "disable":
			$groupings[$_GET['line']]->setEnabled(false);
			$mustSave = true;
			break;

		case "hide":
			$groupings[$_GET['line']]->setVisible(false);
			$groupings[$_GET["line"]]->rebuildElementLine();
			$mustSave = true;
			break;
			
		case "show":
			$groupings[$_GET['line']]->setVisible(true);
			$groupings[$_GET["line"]]->rebuildElementLine();
			$mustSave = true;
			break;
			
		case "edit":
			$tpl_edit = new Template(TPL_FILE_LOCATION.'groups_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('theGroup', $groupings[$_GET['line']]);
			$tpl_edit->set('imagenames', $thenamelist);
			$tpl_edit->set('config', $config);
			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			$aGroup = new Group();
			$aGroup->setType(trim($_POST["groupname"]));
			$aGroup->setGroupImage(trim($_POST["imagename"]));
			$aGroup->setVisible(true);
			$aGroup->rebuildElementLine();
			$groups->addElement($aGroup);

			$mustSave = true;
			break;
		
		case "save":
			$groupings[$_POST["line"]]->setType(trim($_POST["groupname"]));
			$groupings[$_POST["line"]]->setGroupImage(trim($_POST["imagename"]));
			$groupings[$_POST["line"]]->rebuildElementLine();

			$mustSave = true;
			break;
		
		case "del":
			$groups->deleteElement($_GET["line"]);
			$mustSave = true;
			break;
		
		case "move":
			if ($_GET["dir"] == "up") $groups->reorderElements($_GET['line'], $_GET['line']-1);
			if ($_GET["dir"] == "down") $groups->reorderElements($_GET['line'], $_GET['line']+1);
			$mustSave = true;
			break;
	}

	if($mustSave)
	{
		try {
			$groups->save();
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