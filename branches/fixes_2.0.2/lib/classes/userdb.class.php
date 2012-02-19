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
require_once(CLASS_FILE_LOCATION.'elementfile.class.php');
require_once(CLASS_FILE_LOCATION.'user.const.php');

class UserDB extends ElementFile {

	function getUser($aUserName) {
		foreach($this->getElementObjects(ALL_OBJECTS_D) as $aUser) {
			if($aUser->getUserName() == $aUserName)
				return $aUser;
		}
		return;
	}
	
	function findPIN($aPIN) {
		foreach($this->getElementObjects(PIN_TYPE_D) as $aPINObj) {
			if($aPINObj->validatePassword($aPIN))
				return $aPINObj;
		}
		return;
	}
	
	function getNextPINName() {
		$aPinName = "pin";
		$lastPinNum = 0;
		foreach($this->getElementObjects(PIN_TYPE_D) as $aPINObj) {
			$thePinNum = intval(substr($aPINObj->getUserName(), 3));
			if($thePinNum > $lastPinNum)
				$lastPinNum = $thePinNum;
		}
		return $aPinName.(strval($lastPinNum+1));
	}

	protected function createElement($aLine) {
		return new User($aLine);
	}
}
?>