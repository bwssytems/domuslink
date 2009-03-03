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

/**
 * Execute Command
 * 
 * Description: Common function to execute commands
 * 
 * @param $cmd complete command to execute
 * @param $noerror represents a boolean if true errors are ignored 
 */
function execute_cmd($cmd, $noerror = false) {
	exec ($cmd." 2>&1", $rs, $retval);
	
	if ($retval > 0 && !$noerror) {
		gen_error($cmd,$rs);
	}
	else
		return $rs;
}

/**
 * Heyu Status Check
 *
 */
function heyu_running() {
	$rs = execute_cmd("ps ax");
	if (count(preg_grep('/[h]eyu/', $rs)) >= 2) 
		return true;
}

/**
 * Heyu Info
 *
 */
function heyu_info() {
	global $config;
	$rs = execute_cmd($config['heyuexec']." info");
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

	execute_cmd($cmd);
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
	
	execute_cmd($cmd);

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
	
	return $config['heyuexec']." ".$cmd;
}

/**
 * On State
 *
 * @param $code code of module to check
 */

function on_state($code) {
	global $config;
	$rs = execute_cmd($config['heyuexec']." onstate ".$code, true);

	if ($rs[0] == "1" || $rs[0] == "0") {
		if ($rs[0] == "1") return true;
		else return false;
	}
	else {
		$cmd = $config['heyuexec']." fetchstate";
		if ($rs[0] = 'Unable to read state file.') { 
			execute_cmd($cmd);
		}
		else {
			gen_error($cmd, $rs);
		}
	}
}

/**
 * Dim Level
 *
 * @param $unit code of module to check
 */
function dim_level($unit) {
	global $config;
	$rs = execute_cmd($config['heyuexec']." dimlevel ".$unit);
	return $rs[0];
}

/**
 * Description: Upload schedule file defined in
 * heyu configuratin file.
 */
function heyu_upload() {	
	global $config;
	return (execute_cmd("cd ".$config['heyu_base']."; ".$config['heyuexec']." upload"));
}

/**
 * Description: Erase computer interface
 */
function heyu_erase() {	
	global $config;
	return (execute_cmd($config['heyuexec']." erase"));
}

?>