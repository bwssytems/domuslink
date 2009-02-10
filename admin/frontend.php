<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
 */

require_once('..'.DIRECTORY_SEPARATOR.'include.php');

## Security validation's
if ($config['seclevel'] != "0") {
	require_once(CLASS_FILE_LOCATION.'login.class.php');
	$autentication = new login();
	if (!$autentication->login())
		header("Location: ../login.php?from=admin/frontend");
}

## Set template parameters
$tpl->set('title', $lang['frontendadmin']);

if (!isset($_GET["action"])) {
	$tpl_body = & new Template(TPL_FILE_LOCATION.'frontend.tpl');
	$tpl_body->set('config', $config);
	$tpl_body->set('lang', $lang);
}
elseif ($_GET["action"] == "save") {
	$newconfig['pc_interface'] = $_POST["pc_interface"];
	$newconfig['heyu_base'] = $_POST["heyu_base"];
	$newconfig['heyuconf'] = $_POST["heyuconf"];
	$newconfig['heyuexec'] = $_POST["heyuexec"];
	$newconfig['seclevel'] = $_POST["seclevel"];
	$newconfig['password'] = $_POST["password"];
	$newconfig['lang'] = $_POST["lang"];
	$newconfig['url_path'] = $_POST["url_path"];
	$newconfig['theme'] = $_POST["theme"];
	$newconfig['imgs'] = $_POST["imgs"];
	$newconfig['codes'] = $_POST["codes"];
	$newconfig['refresh'] = $_POST["refresh"];

	if ((file_exists(CONFIG_FILE_LOCATION) && is_writable(CONFIG_FILE_LOCATION)) || !file_exists(CONFIG_FILE_LOCATION)) {
		config_save($newconfig);
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else {
		header("Location: ".check_url()."/error.php?msg=".CONFIG_FILE_LOCATION." not writable!");
    }
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>