<?php
/*----------------------------------------------------------------------------+
 |                                                                            |
 |                  domus.Link - a frontend for Heyu                          |
 |                                                                            |
 |                Copyright 2007, Istvan Hubay Cebrian                        |
 |                      All Rights Reserved                                   |
 |                                                                            |
 |                                                                            |
 | This software is licensed free of charge for non-commercial distribution   |
 | and for personal and internal business use only.  Inclusion of this        |
 | software or any part thereof in a commercial product is prohibited         |
 | without the prior written permission of the author.  You may copy, use,    |
 | and distribute this software subject to the following restrictions:        |
 |                                                                            |
 |  1)  You may not charge money for it.                                      |
 |  2)  You may not remove or alter this license, copyright notice, or the    |
 |      included disclaimers.                                                 |
 |  3)  You may not claim you wrote it.                                       |
 |  4)	If you make improvements (or other changes), you are requested        |
 |	    to send them to the domus.Link maintainer so there's a focal point    |
 |      for distributing improved versions.                                   |
 |                                                                            |
 | As used herein, domus.Link is a trademark of Istvan H. Cebrian.            |
 |                                                                            |
 | HEYU is a trademark of Daniel B. Suthers.                                  |
 | X10, CM11A, and ActiveHome are trademarks of X-10 (USA) Inc.               |
 | SwitchLinc and LampLinc are trademarks of Smarthome, Inc.                  |
 |                                                                            |
 | The author is not affiliated with either company.                          |
 |                                                                            |
 | Istvan H. Cebrian                                                          |
 | Author and Maintainer                                                      |
 | Lisbon, Portugal                                                           |
 | Email ID: me                                                               |
 | Email domain: -at- icebrian -dot- net                                      |
 |                                                                            |
 | Disclaimers:                                                               |
 | THERE IS NO ASSURANCE THAT THIS SOFTWARE IS FREE OF DEFECTS AND IT MUST    |
 | NOT BE USED IN ANY SITUATION WHERE THERE IS ANY CHANCE THAT ITS            |
 | PERFORMANCE OR FAILURE TO PERFORM AS EXPECTED COULD RESULT IN LOSS OF      |
 | LIFE, INJURY TO PERSONS OR PROPERTY, FINANCIAL LOSS, OR LEGAL LIABILITY.   |
 |                                                                            |
 | TO THE EXTENT ALLOWED BY APPLICABLE LAW, THIS SOFTWARE IS PROVIDED "AS IS",|
 | WITH NO EXPRESS OR IMPLIED WARRANTY, INCLUDING, BUT NOT LIMITED TO, THE    |
 | IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.|
 |                                                                            |
 | IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW WILL THE AUTHOR BE LIABLE    |
 | FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL   |
 | DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THIS SOFTWARE EVEN IF   |
 | THE AUTHOR HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.            |
 |                                                                            |
 +----------------------------------------------------------------------------*/

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
 */
function heyu_state_check()
{
	$cmd = "ps x | grep [h]eyu_";
	$result = null; $retval = null;
	exec($cmd, $result, $retval);

	if (count($result) == 2)
	{
		return true;
	} else
	{
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
		if ($result[0] == "1") return true;
		else return false;

	}
	else
	{
		header("Location: error.php?msg=onSTATE ".$result[0]);
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
	$result = null; $retval = null;
	exec($cmd, $result, $retval);

	//if ($result[0])
	//{
		return $result[0];
	//}
	//else
	//{
	//	header("Location: error.php?msg=".$result[0]);
	//}
}

?>