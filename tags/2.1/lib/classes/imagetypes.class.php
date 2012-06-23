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
/*
 * This class is to set the builtin image types for modules and menus.
 * 
 * This class needs to updated when adding new module types and menu types.
 * 
 * The names returned are based on using modules or menu in that plug into
 * the formula of menu_<name>_on/off or module_<name>_on/off.
 * 
 */
require_once(CLASS_FILE_LOCATION.'/module.const.php');

final class ImageTypes {
	/*
	 * imageNames - this defines if the names and availability for modules = 0, menus = 1 or both = 2
	 */
	public static $imageNames = array('light' => 2, 'appliance' => 2, 'other' => 2, 'irrigation' => 2, 'hvac' => 2, 'shutter' => 2, 'status' => 2, 'scene' => 2);
	public static $moduleSpecs = array('light' => DIMMABLE_D, 'appliance' => TOGGLE_D, 'other' => ON_OFF_D, 'irrigation' => ON_OFF_D, 'hvac' => HVAC_D, 'shutter' => ON_OFF_D, 'status' => STATUS_D, 'scene' => RUN_D);
	public static $defaultName = 'other';

	public static function getModuleNames() {
		$theNames = array();
		foreach(self::$imageNames as $name => $typeAvailability) {
			if($typeAvailability == 0 || $typeAvailability == 2)
				array_push($theNames, $name);
		}
		return $theNames;
	}

	public static function getMenuNames() {
		$theNames = array();
		foreach(self::$imageNames as $name => $typeAvailability) {
			if($typeAvailability > 0)
				array_push($theNames, $name);
		}
		return $theNames;
	}
	
	public static function getModuleSpec($aName) {
		return self::$moduleSpecs[$aName];
	}
	
	public static function getDefaultName() {
		return self::$defaultName;
	}
}
?>