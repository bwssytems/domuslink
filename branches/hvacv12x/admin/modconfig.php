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

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=admin/frontend");
	exit();
}

## Set template parameters
$tpl->set('title', $lang['modconfigadmin']);

if (!isset($_GET["action"])) {
	$tpl_body = new Template(TPL_FILE_LOCATION.'modconfig.tpl');
	$tpl_body->set('config', $config);
	$tpl_body->set('lang', $lang);
}
elseif ($_GET["action"] == "save") {
	$config['rcs_support'] = $_POST["rcs_support"];
	$config['rcs_housecode'] = $_POST["rcs_housecode"];
	$config['rcs_decode'] = $_POST["rcs_decode"];
        if ($config['rcs_support']=='ON') {
           # Make sure the preset mode is enabled.
           execute_cmd($config['heyuexecreal']." preset ".$config['rcs_housec
ode']."4 19", true);
           if ($config['rcs_decode']=='P'): $decodenum="29";
           elseif ($config['rcs_decode']=='B'): $decodenum="30";
           elseif ($config['rcs_decode']=='L'): $decodenum="31";
           endif;
           if ($decodenum != "") {
              execute_cmd($config['heyuexecreal']." preset ".$config['rcs_housecode']."4 ".$decodenum, true);
           }
        }

	if ((file_exists(CONFIG_FILE_LOCATION) && is_writable(CONFIG_FILE_LOCATION)) || !file_exists(CONFIG_FILE_LOCATION)) {
		config_save($config);
		$_SESSION['frontObj']->getConfig(true);
		$_SESSION['frontObj']->getLanguageFile(true);
		$_SESSION['frontObj']->getHeyuConf(true);
		$_SESSION['frontObj']->getHeyuSched(true);
	}
	else {
		gen_error(null, CONFIG_FILE_LOCATION." ".$lang['error_filerw']);
		exit();
    }
    
	header("Location: ".$_SERVER['PHP_SELF']);
	exit();
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>
