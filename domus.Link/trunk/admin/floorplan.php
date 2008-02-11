<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);
$aliases = $heyuconf->getAliases();
## Get locations
$locations = load_file(FPLAN_FILE_LOCATION);
$locsize = count($locations);
## Disallowed characters for label (separator |)
$chars = '/ã|é|à|ç|õ|ñ|è|ñ|ª|º|~|è|!|"|\#|\$|\^|%|\&|\?|\«|\»/';

## Security validation's
if ($config['seclevel'] != "0") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: login.php?from=floorplan");
}

## Set template parameters
$tpl->set('title', $lang['floorplan']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'floorplan.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('config', $config);
$tpl_body->set('locations', $locations);
$tpl_body->set('locsize', $locsize);

if (!isset($_GET["action"]))
{
	$tpl_add = & new Template(TPL_FILE_LOCATION.'location_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_body->set('form', $tpl_add);
}
else
{
	if ($_GET["action"] == "edit")
	{
		$tpl_edit = & new Template(TPL_FILE_LOCATION.'location_edit.tpl');
		$tpl_edit->set('lang', $lang);		
		$tpl_edit->set('loc', $locations[$_GET['line']]);
		$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
		$tpl_body->set('form', $tpl_edit);
	}
	elseif ($_GET["action"] == "add")
	{
		if (preg_match($chars, $_POST["label"]))
			header("Location: ".check_url()."/error.php?msg=".$lang['error_special_chars']);
		else
			add_line($locations, FPLAN_FILE_LOCATION, 'floorplan');
	}
	elseif ($_GET["action"] == "save")
	{
		if (preg_match($chars, $_POST["label"]))
			header("Location: ".check_url()."/error.php?msg=".$lang['error_special_chars']);
		else
			edit_line($locations, FPLAN_FILE_LOCATION, 'floorplan');
	}
	elseif ($_GET["action"] == "del")
	{
		$loc2rm = $locations[$_GET["line"]];
		$found = false;
		
		// check if location is in use
		foreach($aliases as $alias_num) 
		{
			list($alias, $line_num) = split("@", $alias_num, 2);
			list($temp, $label, $code, $module_type) = split(" ", $alias, 4);
			list($module, $typenloc) = split(" # ", $module_type, 2);
			list($type, $loc) = split(",", $typenloc, 2);
			
			if ($loc2rm == $loc) $found = true;
		}
		
		if (!$found) delete_line($locations, FPLAN_FILE_LOCATION, $_GET["line"]);
		else header("Location: ".check_url()."/error.php?msg=".$lang['error_loc_in_use']);
	}
	elseif($_GET["action"] == "move")
	{
		if ($_GET["dir"] == "up") reorder_array($locations, $_GET['line'], $_GET['line']-1, FPLAN_FILE_LOCATION);
		if ($_GET["dir"] == "down") reorder_array($locations, $_GET['line'], $_GET['line']+1, FPLAN_FILE_LOCATION);
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>