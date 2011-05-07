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
// require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'/group.class.php');
require_once(CLASS_FILE_LOCATION.'/groups.class.php');
require_once(CLASS_FILE_LOCATION.'/imagetypes.class.php');

/*
 * This class builds the default groups for domus.Link if not present
 */
function setUpGroups($lang) {
	if(!file_exists(GROUP_FILE_LOCATION)) {
		$aGroupDB = new Groups();
		$aGroupDB->setFileName(GROUP_FILE_LOCATION);
		$names = ImageTypes::getMenuNames();
		foreach($names as $name) {
			$aGroup = new Group();
			$aGroup->setType($lang[$name]);
			$aGroup->setGroupImage($name);
			$aGroup->rebuildElementLine();
			$aGroupDB->addElement($aGroup);
		}
		$aGroupDB->save();
	}
}
?>