<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

## Includes
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=admin/aliases");
	exit();
}

## Instantiate HeyuConf class
$heyuconf = new heyuConf($config['heyuconf']);
## Get heyu conf & aliases
$settings = $heyuconf->get();
$aliases = $heyuconf->getAliases(true);
## Disallowed characters for alias label (separator |)
$chars = '/ã|é|à|ç|õ|ñ|è|ñ|ª|º|~|è|!|"|\#|\$|\^|%|\&|\?|\«|\»/';

## Set template parameters
$tpl->set('title', $lang['aliases']);
$tpl->set('page', 'aliases');

$tpl_body = & new Template(TPL_FILE_LOCATION.'aliases_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('aliases', $aliases);
$tpl_body->set('config', $config);
$tpl_body->set('size', count($aliases));

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'aliases_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('modtypes', $modtypes);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "edit":
			list($temp, $label, $code, $module_type_loc) = split(" ", $settings[$_GET['line']], 4);
			list($module, $type_loc) = split(" # ", $module_type_loc, 2);
			list($type, $loc) = split(",", $type_loc, 2);
			
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'aliases_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('label', $label);
			$tpl_edit->set('code', $code);
			$tpl_edit->set('module', $module);
			$tpl_edit->set('modtypes', $modtypes);
			$tpl_edit->set('type', $type);
			$tpl_edit->set('loc', $loc);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
		
		case "add":
			if (preg_match($chars, $_POST["label"]))
				gen_error(null, $lang['error_special_chars']);
			else
				add_line($settings, $config['heyuconf'], 'alias');
			break;
		
		case "save":
			if (preg_match($chars, $_POST["label"]))
				gen_error(null, $lang['error_special_chars']);
			else
				edit_line($settings, $config['heyuconf'], 'alias');
			break;
		
		case "del":
			delete_line($settings, $config['heyuconf'], $_GET["line"]);
			break;
		
		case "move":
			if ($_GET["dir"] == "up") reorder_array($settings, $_GET['line'], $_GET['line']-1, $config['heyuconf']);
			if ($_GET["dir"] == "down") reorder_array($settings, $_GET['line'], $_GET['line']+1, $config['heyuconf']);
			break;
			
		//I need the add form seperated from the list (otherwise the iPhone theme is to long (a lot of scrolling))
		case "showaddform":
			$tpl_add = & new Template(TPL_FILE_LOCATION.'aliases_add.tpl');
			$tpl_add->set('lang', $lang);
			$tpl_add->set('modtypes', $modtypes);
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
			list($temp, $label, $code, $module_type_loc) = split(" ", $settings[$_GET['line']], 4);
			list($module, $type_loc) = split(" # ", $module_type_loc, 2);
			list($type, $loc) = split(",", $type_loc, 2);
			
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'aliases_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('label', $label);
			$tpl_edit->set('code', $code);
			$tpl_edit->set('module', $module);
			$tpl_edit->set('modtypes', $modtypes);
			$tpl_edit->set('type', $type);
			$tpl_edit->set('loc', $loc);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);				

		break;			
	}
}

## Display the page
$tpl->set('content', $tpl_body);

## Assign the backbutton for the iPhone theme
$back_button = array("name"=>"Add","link"=>"/admin/aliases.php?page=aliases&action=showaddform","text"=>$lang['add']);
$tpl->set('back_button', $back_button);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>