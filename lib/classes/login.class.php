<?php

class login {
	
	var $user_id;
	var $ok;
	var $salt = "kjsdr23a21dcf";
	var $id = 'domuslogin';

	function login() {
		$this->user_id = 0;
		$this->ok = false;
		
		if(!$this->checkSession()) $this->checkCookie();
		
		return $this->ok;
	}
	
	function checkSession() {
		if(!empty($_SESSION[$this->id]))
			return $this->check($_SESSION[$this->id]);
		else
			return false;
	}

	function checkCookie() {
		if(!empty($_COOKIE[$this->id]))
			return $this->check($_COOKIE[$this->id]);
		else
			return false;
	}
	
	function checkLogin($password) {
		global $config;
		if ($config['password'] == $password) {
			$this->ok = true;
			$_SESSION[$this->id] = md5($password . $this->salt);
			setcookie($this->id, $_SESSION[$this->id], time()+60*60*24*30, "/");
			return true;
		}
		
		return false;
	}		

	function check($password) {
		global $config;
		if(md5($config['password'] . $this->salt) == $password) {
			$this->user_id = session_id();
			$this->ok = true;
			return true;
		}
		
		return false;
	}
	
	function logout() {
		$this->user_id = 0;
		$this->ok = false;
		
		$_SESSION[$this->id] = "";
		setcookie($this->id, "", time() - 3600, "/");
	}
}
?>