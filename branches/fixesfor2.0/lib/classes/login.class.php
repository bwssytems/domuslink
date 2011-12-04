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
require_once(CLASS_FILE_LOCATION.'user.const.php');

class Login {

	private $userDB;
	private $theUser;
	private $noSecurity;

	
	function __construct() {
		$args = func_get_args();
		$this->noSecurity = false;
			
		if (empty($args)) {
			throw new Exception("Login::construct - initialization requires userdb file location");
		}

		if (isset($args[1]) && strtolower($args[1]) == 'off') {
			$this->noSecurity = true;
			$this->userDB = new UserDB($args[0]);
			return;
		}			

		$this->userDB = new UserDB($args[0]);

		// restore user from session if already set
		if(isset($_SESSION['username'])) {
			$this->theUser = $this->userDB->getUser($_SESSION['username']);
		}

	}

	/**
	 * check Login with session or cookie
	 */
	function login() {
		if ($this->noSecurity)
			return true;

		$result = false;

		if($this->checkSession())
			$result = true;
		elseif ($this->checkCookie())
			$result = true;

		return $result;
	}

	/**
	 * check memory session
	 */
	function checkSession() {
		if ($this->noSecurity)
			return true;

		if(isset($_SESSION["username"])) {
			if(!empty($_SESSION["username"])) {
				// error_log("session found in memory... ");
				return true;
			}
		}
		// error_log("no session found");
		return false;
	}

	/**
	 *
	 */
	function checkCookie() {
		if ($this->noSecurity)
			return true;
		
		error_log("check cookie");

		if(isset($_COOKIE[ "type" ]) && isset($_COOKIE[ "password" ])) {
//			$cookiePassword = $this->decrypt( $_COOKIE[ "password" ] );
			$cookiePassword = $_COOKIE[ "password" ];
			
			if(!empty($_COOKIE[ "type" ])) {
				error_log("** COOKIE FOUND ** decrypt");
				if ($_COOKIE[ "type" ] == PIN_TYPE_D )
					return $this->checkLoginByPin($cookiePassword,0);
				else
					return $this->checkLogin($_COOKIE[ "username" ] ,$cookiePassword,0);
			}
		}
		error_log("no cookieFound");
		return false;

	}
	
	
	function getKey() {
		return "thisIsASecureKeyForCookie";
	}
	
	function encrypt($data) {
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		return mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->getKey() , $data, MCRYPT_MODE_ECB, $iv);
	}
	
	
	
	function decrypt($data) {
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->getKey(), $data, MCRYPT_MODE_ECB, $iv); 
	}
	
	/**
	 * store ident in a cookie
	 * @param $theUser
	 * @param $password: plain text password 
	 */
	function memoriseIdent($theUser,$password) {
		// todo store on a single cookie
		setcookie("login",$theUser->getUserName(), time()+3600*24*30, "/");
//		setcookie("password",$this->encrypt($password), time()+3600*24*30, "/");
		setcookie("password",$password, time()+3600*24*30, "/");
		setcookie("type",$theUser->getType(), time()+3600*24*30, "/");
	}

	/**
	 *
	 */
	function checkLoginByPin( $password, $remember) {
		if ($this->noSecurity)
			return true;
		
		$theUser = $this->userDB->findPIN($password); 
		return $this->validateAndUpdateSession($theUser,"",$password, $remember);
	}

	function checkLogin($login, $password, $remember) {
		if ($this->noSecurity)
			return true;

		$theUser = $this->userDB->getUser($login);
		return $this->validateAndUpdateSession($theUser ,$login, $password, $remember);
	}

	function validateAndUpdateSession( $theUser, $login,$password, $remember) {
		if ($this->noSecurity)
			return true;

		if(isset($theUser)) {
			error_log("validateAndUpdateSession: userFound");
			$this->theUser = $theUser;
			if ($this->theUser->validatePassword($password)) {
				$this->ok = true;
				# store session
				$_SESSION['username'] = $this->theUser->getUserName();
				$_SESSION['password'] = $this->theUser->getPassword();
				if ($remember)
					$this->memoriseIdent($theUser, $password);
				error_log("validateAndUpdateSession: good user");
				return true;
			}
		}
		error_log("validateAndUpdateSession: bad user or bad password");

		return false;
	}

	/**
	 *
	 */
	function checkPassword($password) {
		if ($this->noSecurity)
			return true;

		if($this->theUser->validateMD5Password($password)) {
			$this->ok = true;
			return true;
		}

		return false;
	}

	function getUser() {
		if ($this->noSecurity) {
			$aUser = new User();
			$aUser->setSecurityLevel(0);
			return $aUser;
		}
		
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

		unset($_SESSION['password']);
		unset($_SESSION['username']);

		setcookie("type", "", time() - 3600, "/");
	}
}
?>