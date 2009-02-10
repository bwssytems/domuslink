<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */
 
class login {
	
	var $uid;
	var $ok;
	var $salt = "kjsdr23a21dcf";
	var $id = 'domuslogin';

	/**
	 * 
	 */
	function login() {
		$this->uid = 0;
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
			$this->uid = session_id();
			$this->ok = true;
			return true;
		}
		
		return false;
	}
	
	/**
	 * 
	 */
	function logout() {
		$this->user_id = 0;
		$this->ok = false;
		
		$_SESSION[$this->id] = "";
		setcookie($this->id, "", time() - 3600, "/");
	}
}
?>