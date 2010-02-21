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
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');
require_once(CLASS_FILE_LOCATION.'heyusched.class.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=events/triggers");
	exit();
}

## Instantiate heyuConf class and get schedule file with absolute path
$heyuconf = new heyuConf($config['heyuconf']);
$schedfileloc = $config['heyu_base'].$heyuconf->getSchedFile();

## Load aliases and parse so that only code and labels remain
$aliases = $heyuconf->getAliases();
$codelabels = $heyuconf->getCodesAndLabels($aliases);

## Instantiate heyuSched class, get contents and parse timers
$heyusched = new heyuSched($schedfileloc);
$schedfile = $heyusched->get();
$macros = $heyusched->getMacros();
$triggers = $heyusched->getTriggers();

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'trigger_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('triggers', $triggers);
$tpl_body->set('config', $config);
$tpl_body->set('first_line', $heyusched->getTimerEndLine()+1);
$tpl_body->set('last_line', $heyusched->getTimerEndLine()+count($triggers));

if (!isset($_GET["action"])) {
	$tpl_add = & new Template(TPL_FILE_LOCATION.'trigger_add.tpl');
	$tpl_add->set('lang', $lang);
	$tpl_add->set('codelabels', $codelabels);
	$tpl_add->set('cmacs', clean_and_translate_macros($macros));
	$tpl_body->set('form', $tpl_add);
}
else {
	switch ($_GET["action"]) {
		case "enable":
			replace_line($schedfileloc, $schedfile, substr($schedfile[$_GET['line']], 1), $_GET['line']);
			break;
			
		case "disable":
			replace_line($schedfileloc, $schedfile, "#".$schedfile[$_GET['line']], $_GET['line']);
			break;
			
		case "edit":
			list($lbl, $tunit, $command, $macro) = split(" ", $schedfile[$_GET['line']], 4);
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'trigger_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('enabled', (substr($lbl, 0, 1) == "#") ? false : true);
			$tpl_edit->set('tcommand', strtolower($command));
			$tpl_edit->set('codelabels', $codelabels);
			$tpl_edit->set('unit', $tunit);
			$tpl_edit->set('cmacs', clean_and_translate_macros($macros));
			$tpl_edit->set('selmacro', $macro);
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
			break;
			
		case "add":
			add_line($schedfile, $schedfileloc, 'trigger');
			break;
			
		case "save":
			edit_line($schedfile, $schedfileloc, 'trigger');
			break;
			
		case "del":
			delete_line($schedfile, $schedfileloc, $_GET["line"]);
			break;
		
		case "move":
			if ($_GET["dir"] == "up") reorder_array($schedfile, $_GET['line'], $_GET['line']-1, $schedfileloc);
			if ($_GET["dir"] == "down") reorder_array($schedfile, $_GET['line'], $_GET['line']+1, $schedfileloc);
			break;
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

/**
 * 
 */
function clean_and_translate_macros($macros, $i = 0) {
	global $lang;
	foreach ($macros as $macro_line) {
		//macro [label] [optional_delay] [command]+[code] 
		//macro tv_set_on 0 on tv_set
		list($macro, $line) = split("@", $macro_line, 2);
		list($tmp, $macron, $delay, $command, $alias) = split(" ", $macro, 5);
		//array = [label]@[code]@[on/off translated]
		
		//$onp = strpos(strtolower($macron), "_on");
		//$offp = strpos(strtolower($macron), "_off");
		
		if (strpos(strtolower($macron), "_on"))
			$mc[$i] = trim($alias)."@".$command."@".$lang["on"];
		else
			$mc[$i] = trim($alias)."@".$command."@".$lang["off"];
			
		$i++;
	}
	
	if (!empty($mc)) return $mc;
}

?>