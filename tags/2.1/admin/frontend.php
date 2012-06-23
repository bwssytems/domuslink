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
$authCheck = new Login(USERDB_FILE_LOCATION, $config['use_domus_security']);
if (!$authCheck->login()) {
	header("Location: ../login.php?from=admin/frontend");
	exit();
}
if($authCheck->getUser()->getSecurityLevel() != 0) {
	header("Location: ../index.php");
	exit();
}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());

$subdirList = array("default", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$themeviewlist = array("typed", "grouped");

## Build the available theme lists from the theme directory 
$subdir = list_dir_content(FULL_THEME_FILE_LOCATION);
$webthemelist = array();
$mobilethemelist = array();
$iw = 0;
$im = 0;
foreach($subdir as $dir) {
	if(file_exists(FULL_THEME_FILE_LOCATION.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR."mobile")) {
		$mobilethemelist[$im] = $dir;
		$im++;
	}
	else {
		$webthemelist[$iw] = $dir;
		$iw++;
	}
}

## Set template parameters
$tpl->set('title', $lang['frontendadmin']);

if (!isset($_GET["action"])) {
	$tpl_body = new Template(TPL_FILE_LOCATION.'frontend.tpl');
	$tpl_body->set('config', $config);
	$tpl_body->set('subdirlist', $subdirList);
	$tpl_body->set('themeviewlist', $themeviewlist);
	$tpl_body->set('webthemelist', $webthemelist);
	$tpl_body->set('mobilethemelist', $mobilethemelist);
	$tpl_body->set('lang', $lang);
}
elseif ($_GET["action"] == "save") {
	$config['pc_interface'] = $_POST["pc_interface"];
	$config['heyu_base_use'] = $_POST["heyu_base_use"];
	$config['heyu_base'] = $_POST["heyu_base"];
	$config['heyu_subdir'] = $_POST["heyu_subdir"];
	$config['heyuconf'] = $_POST["heyuconf"];
	$config['heyuexec'] = $_POST["heyuexec"];
	$config['use_domus_security'] = $_POST["use_domus_security"];
	$config['hvac_house_code'] = $_POST["hvac_house_code"];
	$config['lang'] = $_POST["lang"];
	$config['url_path'] = $_POST["url_path"];
	$config['theme'] = $_POST["theme"];
	$config['themeview'] = $_POST["themeview"];
	$config['thememobile'] = $_POST["thememobile"];
	$config['mobileselect'] = $_POST["mobileselect"];
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