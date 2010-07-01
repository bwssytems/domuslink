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
	header("Location: ../login.php?from=admin/aliases");
	exit();
}

## Get heyu conf & aliases
$settings = $heyuconf->getObjects();
$aliases = $heyuconf->getAliases();
$floorPlan = $heyuconf->getFloorPlan();
## Disallowed characters for alias label (separator |)
$chars = '/ã|é|à|ç|õ|ñ|è|ñ|ª|º|~|è|!|"|\#|\$|\^|%|\&|\?|\«|\»/';

## Set template parameters
$tpl->set('title', $lang['aliases']);
$tpl->set('page', 'aliases');

$tpl_body = new Template(TPL_FILE_LOCATION.'aliases_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('aliases', $aliases);
$tpl_body->set('config', $config);
$mustSave = false;

if (!isset($_GET["action"])) {
	$tpl_add = new Template(TPL_FILE_LOCATION.'aliases_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('modtypes', $modtypes);
	$tpl_add->set('floorplan', $floorPlan);
	$tpl_add->set('config', $config);
	$tpl_add->set('modlist', $modlist);
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
			$tpl_edit = new Template(TPL_FILE_LOCATION.'aliases_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('label', $settings[$_GET['line']]->getLabel());
			$tpl_edit->set('code', $settings[$_GET['line']]->getHouseDevice());
			$tpl_edit->set('module', $settings[$_GET['line']]->getModuleType());
			$tpl_edit->set('moduleopts', $settings[$_GET['line']]->getModuleOptions());
			$tpl_edit->set('modtypes', $modtypes);
			$tpl_edit->set('type', $settings[$_GET['line']]->getAliasMap()->getType());
			$tpl_edit->set('loc', $settings[$_GET['line']]->getAliasMap()->getFloorPlanLabel());
			$tpl_edit->set('floorplan', $floorPlan);
			$tpl_edit->set('homehidden', $settings[$_GET['line']]->getAliasMap()->getHiddenFromHome());
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_edit->set('modlist', $modlist);
			$tpl_edit->set('config', $config);
			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			if (preg_match($chars, $_POST["label"]))
				gen_error(null, $lang['error_special_chars']);
			else {
				$anAlias = new Alias();
				$anAlias->setLabel($_POST["label"]);
				$anAlias->parseHouseUnitCodes($_POST["code"]);
				$anAlias->setModuleType($_POST["module"]);
				$anAlias->setModuleOptions($_POST["moduleopts"]);
				$anAlias->getAliasMap()->setType($_POST["type"]);
				$anAlias->getAliasMap()->setAliasLabel($_POST["label"]);
				$anAlias->getAliasMap()->setFloorPlanLabel($_POST["loc"]);
				$anAlias->getAliasMap()->setHiddenFromHome("visible");
				$anAlias->getAliasMap()->rebuildElementLine();
				$anAlias->rebuildElementLine();
				$heyuconf->addElement($anAlias);

				$mustSave = true;
			}
			break;
		
		case "save":
			if (preg_match($chars, $_POST["label"]))
				gen_error(null, $lang['error_special_chars']);
			else {
				$settings[$_POST["line"]]->setLabel($_POST["label"]);
				$settings[$_POST["line"]]->parseHouseUnitCodes($_POST["code"]);
				$settings[$_POST["line"]]->setModuleType($_POST["module"]);
				$settings[$_POST["line"]]->setModuleOptions($_POST["moduleopts"]);
				$settings[$_POST["line"]]->getAliasMap()->setType($_POST["type"]);
				$settings[$_POST["line"]]->getAliasMap()->setAliasLabel($_POST["label"]);
				$settings[$_POST["line"]]->getAliasMap()->setFloorPlanLabel($_POST["loc"]);
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
			
		//I need the add form seperated from the list (otherwise the iPhone theme is to long (a lot of scrolling))
		case "showaddform":
			$tpl_add = new Template(TPL_FILE_LOCATION.'aliases_add.tpl');
			$tpl_add->set('lang', $lang);
			$tpl_add->set('modtypes', $modtypes);
			$tpl_add->set('floorplan', $floorPlan);
			$tpl_body->set('form', $tpl_add);				
			//unset the aliases and size so it doesn't show.
			$tpl_body->set('aliases', '');
			$tpl_body->set('size', '');
			break;
			
		//I need the edit form seperated from the list (otherwise the iPhone theme is to long (a lot of scrolling))
		case "showeditform":
			//unset the aliases and size so it doesn't show.
			$tpl_body->set('aliases', '');
			$tpl_body->set('size', '');	
			//unset the addform
			unset($tpl_add);
			
			//Ok, ready to get the edit form!
			$tpl_edit = new Template(TPL_FILE_LOCATION.'aliases_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('label', $settings[$_GET['line']]->getLabel());
			$tpl_edit->set('code', $settings[$_GET['line']]->getHouseDevice());
			$tpl_edit->set('module', $settings[$_GET['line']]->getModuleType());
			$tpl_edit->set('modtypes', $modtypes);
			$tpl_edit->set('type', $settings[$_GET['line']]->getAliasMap()->getType());
			$tpl_edit->set('loc', $settings[$_GET['line']]->getAliasMap()->getFloorPlanLabel());
			$tpl_edit->set('floorplan', $floorPlan);
			$tpl_edit->set('modlist', $modlist);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);				
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
	
	if($_GET["action"] != "edit" && $_GET["action"] != "showeditform" && $_GET["action"] != "showaddform") {
		header("Location: ".$_SERVER['PHP_SELF']);
		exit();
	}
}

## Display the page
$tpl->set('content', $tpl_body);

## Assign the backbutton for the iPhone theme
$back_button = array("name"=>"Add","link"=>"/admin/aliases.php?page=aliases&action=showaddform","text"=>$lang['add']);
$tpl->set('back_button', $back_button);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>