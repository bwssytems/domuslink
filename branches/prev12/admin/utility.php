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
## Includes
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once('..'.DIRECTORY_SEPARATOR.'include_globals.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=admin/utility");
	exit();
}

## Set template parameters
$tpl->set('title', $lang['utility']);
$tpl->set('page', 'utility');

// List of commands in helper select list
$commands = array("help","version", "logtail", "setclock", "readclock", "show", "reset", "catchup", "trigger", "macro", "modlist", "enginestate", "allon", "alloff");
// Commands that cannot be handled properly with executing hey from php in domus.Link
// i.e. The monitor command is an open ended command that holds the terminal while executing.
$restricted_cmds = array("monitor", "port_line_test");
$tpl_body = new Template(TPL_FILE_LOCATION.'utility.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('commands', $commands);

if (!isset($_GET["action"])) {
	if(isset($out_lines))
		$tpl_body->set('out_lines', $out_lines);
	else
		$tpl_body->set('out_lines', "");
}
else {
	$bad_cmd = false;
	$requested_cmd = " ".$_POST["command"]; // add a space to get a non-zero value when checking
	$requested_args = " ".$_POST["arguments"]; // add a space to get a non-zero value when checking

	// check command and arguments for any restricted commands
	foreach ($restricted_cmds as $restricted_cmd) {
		$cmd_pos = strpos(strtolower($requested_cmd), $restricted_cmd);
		if($cmd_pos == false)
		{
			$cmd_pos = strpos(strtolower($requested_args), $restricted_cmd);
			if($cmd_pos != false)
			{
				$bad_cmd = true;
			}
		}
		else
		{
			$bad_cmd = true;
		}
	}

	if($bad_cmd == true) {
		$err_lines = array("domus.Link Utility restricted command cannot be executed: <b>".$_POST["command"]." ".$_POST["arguments"]."</b>", " ");
		$tpl_body->set('out_lines', $err_lines);
	}
	else {
		// execute the heyu command and return output
		$tpl_body->set('out_lines', execute_cmd($config['heyuexecreal']." ".$_POST["command"]." ".$_POST["arguments"], true));
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>
