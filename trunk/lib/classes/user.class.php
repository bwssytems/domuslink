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

require_once(CLASS_FILE_LOCATION."element.class.php");
require_once(CLASS_FILE_LOCATION."user.const.php");

class User extends Element {
	private $userName;
	private $password;
	private $securityLevel;
	private $securityLevelType;

	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			$this->parseUserLine($this->getElementLine());
			$this->rebuildElementLine();
        }
        else {
        	parent::__construct();
        	$this->setType(USER_TYPE_D);
        	$this->setUserName('unknown');
        	$this->setMD5Password('unknown');
        	$this->setSecurityLevel(2);
        	$this->setSecurityLevelType(SEC_LEVEL_GREATER_D);
			$this->rebuildElementLine();
        }
	}

	function rebuildElementLine() {
		$this->setElementLine($this->getType().":".$this->getUserName().":".$this->getPassword().":".$this->getSecurityLevel().":".$this->getSecurityLevelType());
	}
	
	function parseUserLine($line) {
		$elements = explode(":", $line);
		if(count($elements) != 5) {
			throw new Exception("User element has wrong number of entries - ".$line );
		}
		else {
			// user line is - Type:Username:MD5Password:SecurityLevel:SecurityLevelType[exact,greater]
			if(ltrim(rtrim($elements[0])) == USER_TYPE_D || ltrim(rtrim($elements[0])) == PIN_TYPE_D)
				$this->setType(ltrim(rtrim($elements[0])));
			else
				throw new Exception("Invalid user type trying to be set ".$elements[0]);
			$this->setUserName(ltrim(rtrim($elements[1])));
			$this->setPassword(ltrim(rtrim($elements[2])));
			$this->setSecurityLevel(ltrim(rtrim($elements[3])));
			$this->setSecurityLevelType(ltrim(rtrim($elements[4])));
		}
	}

	function setUserName($aUserName) {
		$this->userName = $aUserName;
	}

	function setPassword($aPassword) {
		$this->password = $aPassword;
	}
	
	function setMD5Password($aPassword) {
		$this->password = md5($aPassword);
	}
	
	function setSecurityLevel($aSecurityLevel) {
		if(intval($aSecurityLevel) >= 0)
			$this->securityLevel = intval($aSecurityLevel);
		else
			throw new Exception("Invalid Security Level trying to be set for user ".$aSecurityLevel);
	}
	
	function setSecurityLevelType($aSecurityLevelType) {
		if($aSecurityLevelType == SEC_LEVEL_EXACT_D || $aSecurityLevelType == SEC_LEVEL_GREATER_D)
			$this->securityLevelType = $aSecurityLevelType;
		else
			throw new Exception("Invalid Security Level Type trying to be set for user ".$aSecurityLevelType);
	}
	
	function getUserName() {
		return $this->userName;
	}
	
	function getPassword() {
		return $this->password;
	}
	
	function getSecurityLevel() {
		return $this->securityLevel;
	}

	function getSecurityLevelType() {
		return $this->securityLevelType;
	}

	function validatePassword($aPassword) {
		if($this->password == ltrim(md5($aPassword)))
			return true;
		return false;
	}

	function validateMD5Password($aPassword) {
		if($this->password == $aPassword)
			return true;
		return false;
	}

	protected function validateType($theType) {
		return true;
	}
}
?>