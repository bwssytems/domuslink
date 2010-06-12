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
$subdirList = array("default", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");

## Set template parameters
$tpl->set('title', $lang['frontendadmin']);

if (!isset($_GET["action"])) {
	$tpl_body = new Template(TPL_FILE_LOCATION.'frontend.tpl');
	$tpl_body->set('config', $config);
	$tpl_body->set('subdirlist', $subdirList);
	$tpl_body->set('lang', $lang);
}
elseif ($_GET["action"] == "save") {
	$config['pc_interface'] = $_POST["pc_interface"];
	$config['heyu_base_use'] = $_POST["heyu_base_use"];
	$config['heyu_base'] = $_POST["heyu_base"];
	$config['heyu_subdir'] = $_POST["heyu_subdir"];
	$config['heyuconf'] = $_POST["heyuconf"];
	$config['heyuexec'] = $_POST["heyuexec"];
	$config['seclevel'] = $_POST["seclevel"];
	$config['password'] = $_POST["password"];
	$config['lang'] = $_POST["lang"];
	$config['url_path'] = $_POST["url_path"];
	$config['theme'] = $_POST["theme"];
	$config['imgs'] = $_POST["imgs"];
	$config['codes'] = $_POST["codes"];
	$config['refresh'] = $_POST["refresh"];

	if ((file_exists(CONFIG_FILE_LOCATION) && is_writable(CONFIG_FILE_LOCATION)) || !file_exists(CONFIG_FILE_LOCATION)) {
		createHeyuSubdir($_POST["heyu_subdir"]);
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