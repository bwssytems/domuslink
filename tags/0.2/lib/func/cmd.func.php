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
	if ($action == "start")
		$cmd = $heyuexec." start 2>&1";
	elseif ($action == "stop")
		$cmd = $heyuexec." stop 2>&1";
	elseif ($action == "restart")
		$cmd = $heyuexec." restart 2>&1";

	$result = array(); $retval = null;
	exec($cmd, $result, $retval);

	if (count($result)>0)
	{
		if ($result[0] == "starting heyu_relay" || $result[0] == "")
			if (substr($_SERVER['PHP_SELF'], -9) == "error.php")
				header("Location: index.php"); // To redirect when on error.php
			else
				header("Location: ".$_SERVER['PHP_SELF']);
		else
			header("Location: error.php?msg=".$result[0]);
	}
	else // For stopping
		if (substr($_SERVER['PHP_SELF'], -9) == "error.php")
			header("Location: index.php");
		else
			header("Location: ".$_SERVER['PHP_SELF']);

}

/**
 * Heyu Status Check
 *
 */
function heyu_state_check()
{
	$cmd = "ps x";
	$result = array(); $retval = null; $result_exec = null;
	exec($cmd, $result_exec, $retval);
	$result = preg_grep('/[h]eyu_/', $result_exec);

	if (count($result) == 2) return true;
	else return false;
}

/**
 * Heyu Exec
 *
 * @param $heyuexec full path and location of heyu executable
 */
function heyu_exec($heyuexec)
{
	$action = $_GET["action"];
	$unit = $_GET["device"];
	$page = $_GET['page'];

	if ($action == "on" || $action == "off" || $action == "fon" || $action == "foff")
	{
		$cmd = $heyuexec." ".$action." ".$unit." 2>&1";
	}
	elseif ($action=="dim" || $action=="bright" || $action=="dimb" || $action=="brightb" || $action=="fdim" || $action=="fbright")
	{
		$cmd = $heyuexec." ".$action." ".$unit." ".$_GET["value"];
	}

	$result = array(); $retval = null;
	exec($cmd, $result, $retval);

	if ($result[0] == "")
	{
		if ($page != "")
			header("Location: ".$_SERVER['PHP_SELF']."?page=".$page);
		else
			header("Location: ".$_SERVER['PHP_SELF']);
	}
	else
	{
		header("Location: error.php?msg=".$result[0]);
	}
}

/**
 * On State
 *
 * @param $unit code of module to check
 * @param $heyuexec full path and location of heyu executable
 */
function on_state($unit, $heyuexec)
{
	$cmd = $heyuexec." onstate ".$unit." 2>&1";
	$result = array(); $retval = null;
	exec($cmd, $result, $retval);

	if ($result[0] == "1" || $result[0] == "0")
	{
		if ($result[0] == "1") return true;
		else return false;

	}
	else
	{
		if ($result[0] = 'Unable to read state file.')
		{
			$cmd = $heyuexec." fetchstate";
			$result = array(); $retval = null;
			exec($cmd, $result, $retval);
		}
		else
			header("Location: error.php?msg=".$result[0]);
	}
}

/**
 * Dim State
 *
 * @param $unit code of module to check
 * @param $heyuexec full path and location of heyu executable
 */
function dim_state($unit, $heyuexec)
{
	$cmd = $heyuexec." dimstate ".$unit." 2>&1";
	$result = null; $retval = null;
	exec($cmd, $result, $retval);

	if ($result[0])
	{
		return $result[0];
	}
	else
	{
		header("Location: error.php?msg=".$result[0]);
	}
}

/**
 * Dim Level
 *
 * @param $unit code of module to check
 * @param $heyuexec full path and location of heyu executable
 */
function dim_level($unit, $heyuexec)
{
	$cmd = $heyuexec." dimlevel ".$unit." 2>&1";
	$result = array(); $retval = null;
	exec($cmd, $result, $retval);

	return $result[0];
}

?>