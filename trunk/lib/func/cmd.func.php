<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

/**
 * Execute Command
 * 
 * Description: Common function to execute commands
 * 
 * @param $cmd complete command to execute
 * @param $noerror represents a boolean if true errors are ignored 
 */
function execute_cmd($cmd, $noerror) {
	
	exec ($cmd, &$rs, &$retval);
	
	if ($retval != 0 && !$noerror) {
		$_SESSION['errors'] = array_reverse($rs);
		//$file = "/tmp/dl_heyu.out";
		//exec ("echo -n \"\" > ".$file, &$rs, &$retval);
		//save_file(array_reverse($rs), $file);
		header("Location: ".check_url()."/error.php");
	}
	else
		return $rs;
}

/**
 * Heyu Status Check
 *
 */
function heyu_running() {
	
	$rs = execute_cmd("ps ax 2>&1");
	if (count(preg_grep('/[h]eyu/', $rs)) >= 2) 
		return true;
}

/**
 * Heyu Info
 *
 */
function heyu_info() {
	
	global $config;
	$rs = execute_cmd($config['heyuexec']." info 2>&1");
	return $rs;
}

/**
 * Heyu Control
 *
 * @param $action to undertake (start, stop, reload)
 */
function heyu_ctrl($action) {
	
	global $config;
	switch ($action) 
	{
		case "start":
			$cmd = $config['heyuexec']." start";
			break;
		case "stop":
			$cmd = $config['heyuexec']." stop";
			break;
		case "restart":
			$cmd = $config['heyuexec']." restart";
			break;
	}

	execute_cmd($cmd." 2>&1");
}

/**
 * Heyu Action
 *
 */
function heyu_action() {
	
	global $config;
	switch ($_GET["action"]) {
		case "on":
		case "off":
		case "fon":
		case "foff":
			$cmd = $config['heyuexec']." ".$_GET["action"]." ".$_GET["code"];
			break;
		case "db":
			$cmd = dim_bright($_GET["state"], $_GET["curr"], $_GET["req"], $_GET["code"]);
			break;
	}
	
	execute_cmd($cmd." 2>&1");

	if (isset($_GET['page']))
		header("Location: ".$_SERVER['PHP_SELF']."?page=". $_GET['page']);
	else
		header("Location: ".$_SERVER['PHP_SELF']);
}

/**
 * Dim Bright Lights
 * 
 * @param $state 
 * @param $currlevel current intensity level at which the module is
 * @param $reqlevel intensity level requested
 * @param $code modules unitcode
 * 
 */
function dim_bright($state, $currlevel, $reqlevel, $code) {	
	
	global $config;
	if ($currlevel == $reqlevel) return false;
	
	if ($currlevel < $reqlevel) {
		if ($state == "off")
			$cmd = $config['cmd_dimb']." ".$code;
		else
			$cmd = $config['cmd_bright']." ".$code;
			
		$incdec = $reqlevel - $currlevel;
	}
	elseif ($currlevel > $reqlevel) {
		$cmd = $config['cmd_dim']." ".$code;
		$incdec = $currlevel - $reqlevel;
	}
	
	// select how much to increase or decrease level by.
	switch ($incdec) {
		case 1:
			if ($state == "on") $cmd .= " 4";
			else $cmd .= " 22";
			break;
		case 2:
			if ($state == "on") $cmd .= " 8";
			else $cmd .= " 16";
			break;	
		case 3:
			$cmd .= " 12";
			break;
		case 4:
			if ($state == "on") $cmd .= " 16";
			else $cmd .= " 8";
			break;
		case 5:
			if ($state == "on") $cmd .= " 22";
			else $cmd .= " 4";
			break;
	}
	
	return $config['heyuexec']." ".$cmd." 2>&1";
}

/**
 * On State
 *
 * @param $code code of module to check
 */

function on_state($code) {
	
	global $config;
	$rs = execute_cmd($config['heyuexec']." onstate 2>&1".$code, true);

	if ($rs[0] == "1" || $rs[0] == "0") {
		if ($rs[0] == "1") return true;
	}
	else {
		if ($rs[0] = 'Unable to read state file.') { 
			execute_cmd($config['heyuexec']." fetchstate 2>&1");
		}
	}
}

/**
 * Dim Level
 *
 * @param $unit code of module to check
 */
function get_dim_level($unit) {
	
	global $config;
	$rs = execute_cmd($config['heyuexec']." dimlevel ".$unit." 2>&1");
	return $rs[0];
}

/**
 * 
 */
function heyu_upload() {
	
	global $config;
	return (execute_cmd($config['heyuexec']." upload 2>&1"));
}

?>