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

## Security validation's 
if ($config['seclevel'] != "0" && !$authenticated) { 
	header("Location: ../login.php?from=admin/floorplan");
	exit();
}

## Instantiate HeyuConf class
$heyuconf = new heyuConf($config['heyuconf']);
## Get locations
$locations = load_file(FPLAN_FILE_LOCATION);
$locsize = count($locations);

## Set template parameters
$tpl->set('title', $lang['floorplan']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'location_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('config', $config);
$tpl_body->set('locations', $locations);
$tpl_body->set('locsize', $locsize);

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'location_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
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
			foreach($heyuconf->get() as $line) {
				if (substr($line, 0, 5) == "ALIAS") {
					list($temp, $label, $code, $module_type_loc) = split(" ", $line, 4);
					list($module, $type_loc) = split(" # ", $module_type_loc, 2);
					list($type, $orgloc2) = split(",", $type_loc, 2);
		
					// if and ALIAS and location in use, then substitute with new name and add to array
					if ($orgloc1 == $orgloc2) {
						$array[$i] = $temp." ".$label." ".$code." ".$module." # ".$type.",".$newloc."\n";
						$changed = true;	
					}
					else 
						$array[$i] = $line; // else just add line to array
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
			foreach($heyuconf->getAliases() as $alias_num) {
				list($alias, $temp) = split("@", $alias_num, 2);
				list($temp, $temp, $temp, $module_type) = split(" ", $alias, 4);
				list($temp, $typenloc) = split(" # ", $module_type, 2);
				list($temp, $loc) = split(",", $typenloc, 2);
			
				if ($loc2rm == $loc) $found = true;
			}
		
			// if location was found do not allow removal
			if (!$found) delete_line($locations, FPLAN_FILE_LOCATION, $_GET["line"]);
			else gen_error(null, $lang['error_loc_in_use']);
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