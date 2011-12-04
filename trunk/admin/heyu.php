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
	header("Location: ../login.php?from=admin/heyu");
	exit();
}
if($authCheck->getUser()->getSecurityLevel() != 0) {
	header("Location: ../index.php");
	exit();
}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());

## Get heyu (x10.conf) file contents/settings
$settings = $heyuconf->getObjects();
$mustSave = false;

## Set template parameters
$tpl->set('title', $lang['heyuconf']);

if (!isset($_GET["action"])) {
	$tpl_body = new Template(TPL_FILE_LOCATION.'heyuconf_view.tpl');
	$tpl_body->set('config', $config);
	$tpl_body->set('lang', $lang);
	$tpl_body->set('settings', $settings);
	if(!isset($heyusched)) {
		$tpl_add = new Template(TPL_FILE_LOCATION.'sched_file_add.tpl');
		$tpl_add->set('lang', $lang);
		$tpl_body->set('form', $tpl_add);
	}
}
else {
	if ($_GET["action"] == "edit") {
		$tpl_body = new Template(TPL_FILE_LOCATION.'heyuconf_edit.tpl');
		$tpl_body->set('config', $config);
		$tpl_body->set('lang', $lang);
		$tpl_body->set('settings', $settings);
	}
	elseif ($_GET["action"] == "save") {
		
		// $_POST contains all lines in heyu conf file.
		// $key represents each directive, alias (with #, so ALIAS1,ALIAS2,etc), etc
		// $value represents directive value or full string of ALIAS,SCENE,etc
		foreach ($_POST as $key => $value) {
			list($type, $lineNum) = explode("@", $key, 2);
			$elements = $heyuconf->getElementObjects($type);
			foreach($elements as $anElement) {
				if($anElement->getLineNum() == $lineNum)
				{
					$anElement->setElementLine(array($type, $value));
					if(isset($_POST["comment_d@".$lineNum]))
						$anElement->setEnabled(false);
					else
						$anElement->setEnabled(true);
				}
			}
		}
		$mustSave = true;
	}
	elseif ($_GET["action"] == "add") {
		$aSchedDirective = new ConfigElement("schedule_file ".$_POST["sched_file_name"]);
		$heyuconf->addElement($aSchedDirective);
		$mustSave = true;
	}
	
	if($mustSave) {
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
		heyu_ctrl($config, 'restart');
		header("Location: ".$_SERVER['PHP_SELF']);
		exit();
	}
}

## Display the page
if (!isset($tpl_body)) $tpl_body = null;
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>