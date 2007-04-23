<?php

function heyu_ctrl($heyuexec, $action)
{
	if ($action == "start") $cmd = $heyuexec." start 2>&1";
	elseif ($action == "stop") $cmd = $heyuexec." stop 2>&1";
	elseif ($action == "reload") $cmd = $heyuexec." restart 2>&1";

	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if ($result[0] == "starting heyu_relay" || $result[0] == "")
		header("Location: ".$_SERVER['PHP_SELF']);
	else
		header("Location: error.php?msg=".$result[0]);
}

function heyu_state_check()
{
	$cmd = "ps x | grep [h]eyu_";
	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if (count($result) == 2) {
		return "<font color=green>UP</font>";
	} else {
		return "<font color=red>DOWN</font>";
	}
}

function heyu_exec($heyuexec)
{
	$unit = $_GET["device"];
	$value = $_GET["value"];
	$action = $_GET["action"];

	if ($action=="on"||$action=="off"){
		$cmd = $heyuexec." ".$action." ".$unit." 2>&1";
	} elseif ($action=="dim" || $action=="bright" || $action=="dimb"){
		//$cmd = $heyuexec." ".$action." ".$unit." ".$value;
	}
	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if ($result[0] == "") {
		header("Location: ".$_SERVER['PHP_SELF']);
	} else {
		header("Location: error.php?msg=".$result[0]);
	}
}

function state_check($unit, $heyuexec)
{
	$cmd = $heyuexec." onstate ".$unit." 2>&1";
	$result = null; $retval = null;
	exec($cmd, $result, $retval);
	if ($result[0] == "1" || $result[0] == "0") {
		return $result[0];
	} else {
		header("Location: error.php?msg=".$result[0]);
	}
}

?>