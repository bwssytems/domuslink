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
	header("Location: ../login.php?from=admin/users");
	exit();
}
if($authCheck->getUser()->getSecurityLevel() != 0) {
	header("Location: ../index.php");
	exit();
}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());

$userDB = $authCheck->getUserDB();
$users = $userDB->getElementObjects(ALL_OBJECTS_D);

## Set template parameters
$tpl->set('title', $lang['users']);
$tpl->set('page', 'users');

$tpl_body = new Template(TPL_FILE_LOCATION.'users_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('users', $users);
$tpl_body->set('config', $config);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'users_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('config', $config);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			$users[$_GET['line']]->setEnabled(true);
			$mustSave = true;
			break;
			
		case "disable":
			$users[$_GET['line']]->setEnabled(false);
			$mustSave = true;
			break;

		case "edit":
			$tpl_edit = new Template(TPL_FILE_LOCATION.'users_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('theUser', $users[$_GET['line']]);
			$tpl_edit->set('config', $config);
			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			$anUser = new User();
			$anUser->setType($_POST["type"]);
			if($_POST["type"] == PIN_TYPE_D)
				$anUser->setUserName($userDB->getNextPINName());
			else
				$anUser->setUserName($_POST["username"]);
			$anUser->setSecurityLevel(intval($_POST["seclevel"]));
			$anUser->setSecurityLevelType($_POST["secleveltype"]);
			$anUser->setMD5Password($_POST["password"]);
			$anUser->rebuildElementLine();
			$userDB->addElement($anUser);

			$mustSave = true;
			break;
		
		case "save":
			$users[$_POST["line"]]->setType($_POST["type"]);
			if($_POST["type"] == PIN_TYPE_D && $_POST["username"] != $users[$_POST["line"]]->getUserName())
				$users[$_POST["line"]]->setUserName($userDB->getNextPINName());
			else
				$users[$_POST["line"]]->setUserName($_POST["username"]);
			$users[$_POST["line"]]->setSecurityLevel(intval($_POST["seclevel"]));
			$users[$_POST["line"]]->setSecurityLevelType($_POST["secleveltype"]);
			if($_POST["password"] != $users[$_POST["line"]]->getPassword())
				$users[$_POST["line"]]->setMD5Password($_POST["password"]);
			$users[$_POST["line"]]->rebuildElementLine();

			$mustSave = true;
			break;
		
		case "del":
			$userDB->deleteElement($_GET["line"]);
			$mustSave = true;
			break;
		
		case "move":
			if ($_GET["dir"] == "up") $userDB->reorderElements($_GET['line'], $_GET['line']-1);
			if ($_GET["dir"] == "down") $userDB->reorderElements($_GET['line'], $_GET['line']+1);
			$mustSave = true;
			break;
	}

	if($mustSave)
	{
		try {
			$userDB->save();
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