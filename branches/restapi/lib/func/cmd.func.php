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
		error_log("domus.Link: Command execution error. [".$cmd."]");
	
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
	return get_heyu_info();
}

function get_heyu_info($config) {
	$rs = execute_cmd($config['heyuexecreal']." info");
	return $rs;
}

/**
 * Heyu Control
 *
 * @param $action to undertake (start, stop, reload)
 */
function heyu_ctrl($config, $action) {
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
function heyu_action($config, $theActionRequest, $theCode, $theState = null, $curr = null, $req = null) {
	switch ($theActionRequest) {
		case "on":
		case "fon":
			$cmd = $config['heyuexecreal']." ".$config['cmd_on']." ".$theCode;
			break;
		case "foff":
		case "off":
			$cmd = $config['heyuexecreal']." ".$config['cmd_off']." ".$theCode;
			break;
		case "db":
			$cmd = dim_bright($config, $theState, $curr, $req, $theCode);
			break;
		case "dbapi":
			$cmd = dim_bright_real($config, $theState, $curr, $req, $theCode);
			break;
	}
	
	if($cmd == false)
		return;
		
	execute_cmd($cmd);
}

/**
 * Dim Bright Lights using levels 1-5
 * 
 * @param $state 
 * @param $currlevel current intensity level at which the module is
 * @param $reqlevel intensity level requested
 * @param $code modules unitcode
 * 
 */
function dim_bright($config, $state, $currlevel, $reqlevel, $code) {
	$modCurrLevel = $currlevel * 20;
	$modReqLevel = $reqlevel * 20;
	
	return dim_bright_real($config, $state, $modCurrLevel, $modReqLevel, $code);
}

/**
 * Dim Bright Lights using real 0-100 levels
 * 
 * @param $state 
 * @param $currlevel current intensity level at which the module is
 * @param $reqlevel intensity level requested
 * @param $code modules unitcode
 * 
 */
function dim_bright_real($config, $state, $currlevel, $reqlevel, $code) {	
	if ($currlevel == $reqlevel)
		return false;
		
	$incdec = 0;
	
	if ($currlevel < $reqlevel) {
		if ($state == "off")
		{
			$incdec = calc_real_level(100, $reqlevel);
			if($incdec == 0)
				return $config['heyuexecreal']." ".$config['cmd_on']." ".$code;
			else
				$cmd = $config['cmd_dimb']." ".$code;
		}
		else
		{
			$cmd = $config['cmd_bright']." ".$code;
			
			$incdec = calc_real_level($reqlevel, $currlevel);
		}
	}
	elseif ($currlevel > $reqlevel && $reqlevel != 0) {
		$cmd = $config['cmd_dim']." ".$code;
		$incdec = calc_real_level($currlevel, $reqlevel);
	}
	else
		return $config['heyuexecreal']." ".$config['cmd_off']." ".$code;
	
	return $config['heyuexecreal']." ".$cmd." ".$incdec;
}

/* Need to convert real 0 - 100 values into 1-22 values for heyu
 * @param value1 this is the value to subtract from
 * @param value2 this is the value to subtract
 */
function calc_real_level($value1, $value2)
{
	$dim_interval = (float)100.00 / 22.00;
	
	$diff = (float)($value1 - $value2);
	$real_diff = (int)0;
	
	if($diff != 0.0 && $diff < $dim_interval)
		$real_diff = 1;
	else if($diff > 95.0)
		$real_diff = 22;
	else
		$real_diff = (int)($diff * 0.22);

	return $real_diff;
	
}

/**
 * On State
 *
 * @param $code code of module to check
 */

function on_state($config, $code) {
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
function dim_level($config, $unit) {
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