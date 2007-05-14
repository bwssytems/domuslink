<?php

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
	elseif ($action == "reload")
		$cmd = $heyuexec." restart 2>&1";

	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if ($result[0] == "starting heyu_relay" || $result[0] == "")
		header("Location: ".$_SERVER['PHP_SELF']);
	else
		header("Location: error.php?msg=".$result[0]);
}

/**
 * Heyu Status Check
 *
 * @param $bin boolean, if true return, true or false for state
 */
function heyu_state_check($bin)
{
	$cmd = "ps x | grep [h]eyu_";
	$result = null; $retval = null;
	exec($cmd, $result, $retval);

	if (count($result) == 2)
	{
		if (!$bin)
			return "<font color=green>UP</font>";
		else
			return true;
	} else
	{
		if (!$bin)
			return "<font color=red>DOWN</font>";
		else
			return false;
	}
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

	if ($action == "on" || $action == "off")
	{
		$cmd = $heyuexec." ".$action." ".$unit." 2>&1";
	}
	elseif ($action=="dim" || $action=="bright" || $action=="dimb" || $action=="brightb")
	{
		$cmd = $heyuexec." ".$action." ".$unit." ".$_GET["value"];
	}

	$result = null; $retval = null;
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
	$result = null; $retval = null;
	exec($cmd, $result, $retval);

	if ($result[0] == "1" || $result[0] == "0")
	{
		return $result[0];
	}
	else
	{
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

?>