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
 
class login {
	
	var $ok;
	var $salt = "kjsdr23a21dcf";
	var $id = 'domuslogin';

	/**
	 * 
	 */
	function login() {
		$this->ok = false;
		
		if(!$this->checkSession()) $this->checkCookie();
		
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
	function checkLogin($password,$remember) {
		global $config;
		if ($config['password'] == $password) {
			$this->ok = true;
			$_SESSION[$this->id] = md5($password . $this->salt);
			if ($remember) setcookie($this->id, $_SESSION[$this->id], time()+60*60*24*30, "/");
			return true;
		}
		
		return false;
	}		

	/**
	 * 
	 */
	function check($password) {
		global $config;
		if(md5($config['password'] . $this->salt) == $password) {
			$this->ok = true;
			return true;
		}
		
		return false;
	}
	
	/**
	 * 
	 */
	function logout() {
		$this->ok = false;
		
		$_SESSION[$this->id] = "";
		setcookie($this->id, "", time() - 3600, "/");
	}
}
?>