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

## Get locations
$locations = load_file(FPLAN_FILE_LOCATION);
$locsize = count($locations);

## Security validation's
if ($config['seclevel'] != "0") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: login.php?from=floorplan");
}

## Set template parameters
$tpl->set('title', $lang['floorplan']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'location_view.tpl');
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
	switch ($_GET["action"])
	{
		// edit location
		case "edit":
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'location_edit.tpl');
			$tpl_edit->set('lang', $lang);		
			$tpl_edit->set('loc', $locations[$_GET['line']]);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
		
		// add location	
		case "add":
			add_line($locations, FPLAN_FILE_LOCATION, 'floorplan');
			break;
		
		// save location (called from edits)
		case "save":
			$orgloc1 = $locations[$_POST["line"]]; // get original location name
			$newloc = $_POST["location"];  // get new location name
			$i = 0;
			
			// check if original location name is in use
			foreach($heyuconf->get() as $line) 
			{
				if (substr($line, 0, 5) == "ALIAS") 
				{
					list($temp, $label, $code, $module_type_loc) = split(" ", $line, 4);
					list($module, $type_loc) = split(" # ", $module_type_loc, 2);
					list($type, $orgloc2) = split(",", $type_loc, 2);
		
					// if and ALIAS and location in use, then substitute with new name and add to array
					if ($orgloc1 == $orgloc2) 
					{
						$array[$i] = $temp." ".$label." ".$code." ".$module." # ".$type.",".$newloc."\n";
						$changed = true;	
					}
					else $array[$i] = $line; // else just add line to array
				}
				else 
					$array[$i] = $line; // if != ALIAS add to array
					
				$i++;
			}
			
			edit_line($locations, FPLAN_FILE_LOCATION, 'floorplan'); // save new floorplan
			if ($changed) save_file($array, $config['heyuconf']); // save heyu conf file if changes made
			break;
		
		// delete location	
		case "del":
			$loc2rm = $locations[$_GET["line"]];
			$found = false;
			
			// check if location is in use
			foreach($heyuconf->getAliases() as $alias_num) 
			{
				list($alias, $temp) = split("@", $alias_num, 2);
				list($temp, $temp, $temp, $module_type) = split(" ", $alias, 4);
				list($temp, $typenloc) = split(" # ", $module_type, 2);
				list($temp, $loc) = split(",", $typenloc, 2);
			
				if ($loc2rm == $loc) $found = true;
			}
		
			// if location was found do not allow removal
			if (!$found) delete_line($locations, FPLAN_FILE_LOCATION, $_GET["line"]);
			else header("Location: ".check_url()."/error.php?msg=".$lang['error_loc_in_use']);
			break;
		
		// move up/down location
		case "move":
			if ($_GET["dir"] == "up") reorder_array($locations, $_GET['line'], $_GET['line']-1, FPLAN_FILE_LOCATION);
			if ($_GET["dir"] == "down") reorder_array($locations, $_GET['line'], $_GET['line']+1, FPLAN_FILE_LOCATION);
			break;	
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>