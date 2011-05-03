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

require_once("userdb.class.php");
require_once("user.class.php");

class Login {
	
	private $ok;
	private $id;
	private $theUserDBFileLocation;
	private $userDB;
	private $theUser;

	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			$this->theUserDBFileLocation = $args[0];
			$this->userDB = new UserDB($this->theUserDBFileLocation);
			if(isset($_SESSION['username'])) {
				$this->theUser = $this->userDB->getUser($_SESSION['username']);
				$this->id = $this->theUser->getUserName();
			}
        }
        else {
			throw new Exception("Login::construct - initialization requires userdb file location");
        }
        $this->ok = false;
	}
	
	/**
	 * 
	 */
	function login() {
		$this->ok = false;
		
		if(!$this->checkSession())
			$this->checkCookie();
		
		return $this->ok;
	}
	
	/**
	 * 
	 */
	function checkSession() {
		if(!empty($_SESSION[$this->id]))
			return $this->check($_SESSION[$this->id]);
		else
			return false;
	}

	/**
	 * 
	 */
	function checkCookie() {
		if(!empty($_COOKIE[$this->id]))
			return $this->check($_COOKIE[$this->id]);
		else
			return false;
	}
	
	/**
	 * 
	 */
	function checkLogin($user, $password, $remember) {
		if(isset($user) && $user != '') {
			$this->theUser = $this->userDB->getUser($user);
			if(isset($this->theUser)) {
				$this->id = $this->theUser->getUserName();
				if ($this->theUser->validatePassword($password)) {
					$this->ok = true;
					$_SESSION[$this->id] = $this->theUser->getPassword();
					$_SESSION['username'] = $this->id;
					if ($remember)
						setcookie($this->id, $_SESSION[$this->id], time()+60*60*24*30, "/");
					return true;
				}
			}
		}
		else {
			$this->theUser = $this->userDB->findPIN($password);
			if(isset($this->theUser)) {
				$this->id = $this->theUser->getUserName();
				$this->ok = true;
				$_SESSION[$this->id] = $this->theUser->getPassword();
				$_SESSION['username'] = $this->id;
				if ($remember)
					setcookie($this->id, $_SESSION[$this->id], time()+60*60*24*30, "/");
				return true;
				
			}
		}
		unset($this->id);
		return false;
	}		

	/**
	 * 
	 */
	function check($password) {
		if($this->theUser->validateMD5Password($password)) {
			$this->ok = true;
			return true;
		}
		
		return false;
	}
	
	function getUser() {
		return $this->theUser;
	}

	function getUserDB() {
		return $this->userDB;
	}

	/**
	 * 
	 */
	function logout() {
		$this->ok = false;
		
		unset($_SESSION[$this->id]);
		unset($_SESSION['username']);
		setcookie($this->id, "", time() - 3600, "/");
	}
}
?>