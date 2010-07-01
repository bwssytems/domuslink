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

/**
 * Execute Command
 * 
 * Description: Common function to execute commands
 * 
 * @param $cmd complete command to execute
 * @param $noerror represents a boolean if true errors are ignored 
 */
function execute_cmd($cmd, $noerror = false) {
	//security check, try to prevent bad things.
	if(strpos($cmd, ";")) {
		error_log("domus.Link: Command contains unsafe content. Throwing exception. [".$cmd."]");
		if($noerror)
			return array("Command is invalid.");
		else
			throw new Exception("Command is invalid.");
	}
	
	exec ($cmd." 2>&1", $rs, $retval);
	if ($retval > 0 && !$noerror) {
		throw new Exception($rs[0]);
	}
	else
		return $rs;
}

/**
 * Heyu Status Check
 *
 */
function heyu_running() {
	$proc_count = 0;
	$rs = execute_cmd("ps ax");
	if (count(preg_grep('/[h]eyu_relay/', $rs)) == 1)
		 $proc_count++;

	if (count(preg_grep('/[h]eyu_engine/', $rs)) == 1)
		 $proc_count++;

	if($proc_count == 2)
		 return true;
	else
		return false;
}

/**
 * Heyu Info
 *
 */
function heyu_info() {
	global $config;
	$rs = execute_cmd($config['heyuexecreal']." info");
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
			$rs = execute_cmd("ps ax");
			if (count(preg_grep('/[h]eyu_relay/', $rs)) != 1) {
				execute_cmd($config['heyuexecreal']." start");
				sleep(2);
			}
			
			$rs = execute_cmd("ps ax");
			if (count(preg_grep('/[h]eyu_engine/', $rs)) != 1) {
				execute_cmd($config['heyuexecreal']." engine");
			} 
			break;
		case "stop":
			if(heyu_running())
				execute_cmd($config['heyuexecreal']." stop");
			break;
		case "restart":
			if(heyu_running())
				execute_cmd($config['heyuexecreal']." restart");
			break;
	}
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
			$cmd = $config['heyuexecreal']." ".$_GET["action"]." ".$_GET["code"];
			break;
		case "db":
			$cmd = dim_bright($_GET["state"], $_GET["curr"], $_GET["req"], $_GET["code"]);
			break;
	}
	
	execute_cmd($cmd);
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
	
	return $config['heyuexecreal']." ".$cmd;
}

/**
 * On State
 *
 * @param $code code of module to check
 */

function on_state($code) {
	global $config;
	$rs = execute_cmd($config['heyuexecreal']." onstate ".$code, true);

	if ($rs[0] == "1" || $rs[0] == "0") {
		if ($rs[0] == "1") return true;
		else return false;
	}
	else {
		$cmd = $config['heyuexecreal']." fetchstate";
		if ($rs[0] = 'Unable to read state file.') { 
			execute_cmd($cmd);
		}
		else {
			throw new Exception($cmd." ".$rs);
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
	$rs = execute_cmd($config['heyuexecreal']." dimlevel ".$unit);
	return $rs[0];
}

/**
 * Description: Upload schedule file defined in
 * heyu configuratin file.
 * NOTE: Does not call execute command due to security restriction
 */
function heyu_upload() {	
	global $config;
	exec ("cd ".$config['heyu_base_real']."; ".$config['heyuexecreal']." upload 2>&1", $rs, $retval);
	if ($retval > 0) {
		throw new Exception($rs[0]);
	}
	else
		return $rs;
}

/**
 * Description: Erase computer interface
 */
function heyu_erase() {	
	global $config;
	return (execute_cmd($config['heyuexecreal']." erase"));
}

?>