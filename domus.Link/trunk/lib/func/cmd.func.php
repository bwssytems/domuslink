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
 * Heyu Control
 *
 * @param $heyuexec full path and location of heyu executable
 * @param $action to undertake (start, stop, reload)
 */
function heyu_ctrl($heyuexec, $action)
{
	switch ($action)
	{
		case "start":
			$cmd = $heyuexec." start 2>&1";
			break;
		case "stop":
			$cmd = $heyuexec." stop 2>&1";
			break;
		case "restart":
			$cmd = $heyuexec." restart 2>&1";
			break;
	}

	$rs = execute_cmd($cmd);

	if (count($rs)>0)
	{
		if ($rs[0] == "starting heyu_relay" || $rs[0] == "")
			header("Location: ".$_SERVER['PHP_SELF']);
		else
			header("Location: ".check_url()."/error.php?msg=".$rs[0]);
	}
	else // rs empty when stopping
	{
		header("Location: ".$_SERVER['PHP_SELF']);
	}

}

/**
 * Heyu Status Check
 *
 */
function heyu_running()
{
	$rs = execute_cmd("ps ax");

	if (count(preg_grep('/[h]eyu/', $rs)) == 2) return true;
}

/**
 * Heyu Info
 * 
 * @param $heyuexec holds complete path and executable for heyu
 */
function heyu_info($heyuexec)
{
	return execute_cmd($heyuexec." info 2>&1");
}

/**
 * Heyu Action
 *
 * @param $heyuexec full path and location of heyu executable
 */
function heyu_action($config)
{
	switch ($_GET["action"])
	{
		case "on":
		case "off":
		case "fon":
		case "foff":
			$cmd = $config['heyuexec']." ".$_GET["action"]." ".$_GET["code"]." 2>&1";
			break;
		case "db":
			$cmd = dim_bright($_GET["state"], $_GET["curr"], $_GET["req"], $_GET["code"], $config);
			break;
	}
	
	if ($cmd) $rs = execute_cmd($cmd);

	if ($rs[0] == "")
	{
		if (isset($_GET['page']))
			header("Location: ".$_SERVER['PHP_SELF']."?page=". $_GET['page']);
		else
			header("Location: ".$_SERVER['PHP_SELF']);
	}
	else
	{
		header("Location: ".check_url()."/error.php?msg=".$rs[0]);
	}
}

/**
 * Dim Bright Lights
 * 
 * @param $currlevel current intensity level at which the module is
 * @param $reqlevel intensity level requested
 * @param $code modules unitcode
 * @param $config file
 * 
 */
function dim_bright($state, $currlevel, $reqlevel, $code, $config) 
{	
	
	if ($currlevel == $reqlevel) return false;
	
	if ($currlevel < $reqlevel) 
	{
		if ($state == "off")
			$cmd = $config['cmd_dimb']." ".$code;
		else
			$cmd = $config['cmd_bright']." ".$code;
			
		$incdec = $reqlevel - $currlevel;
	}
	elseif ($currlevel > $reqlevel) 
	{
		//if (on_state($code, $config['heyuexec']))
		$cmd = $config['cmd_dim']." ".$code;
		$incdec = $currlevel - $reqlevel;
	}
	
	// select how much to increase or decrease level by.
	switch ($incdec)
	{
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
 * @param $heyuexec full path and location of heyu executable
 */

function on_state($code, $heyuexec)
{
	$rs = execute_cmd($heyuexec." onstate ".$code." 2>&1");

	if ($rs[0] == "1" || $rs[0] == "0")
	{
		if ($rs[0] == "1") return true;
	}
	else
	{
		if ($rs[0] = 'Unable to read state file.')
		{
			$cmd = $heyuexec." fetchstate";
			$rs = execute_cmd($cmd);
		}
		else
			header("Location: ".check_url()."/error.php?msg=".$rs[0]);
	}
}

/**
 * Dim Level
 *
 * @param $unit code of module to check
 * @param $heyuexec full path and location of heyu executable
 */
function curr_dim_level($unit, $heyuexec)
{
	$rs = execute_cmd($heyuexec." dimlevel ".$unit." 2>&1");
	return $rs[0];
}

?>