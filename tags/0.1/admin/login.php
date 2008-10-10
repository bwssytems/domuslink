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

require_once('..'.DIRECTORY_SEPARATOR.'include.php');

## Set template parameters
$tpl->set('title', 'Login');

if ($_POST['txtPassword'] != $config['password'])
{
	$tpl_body = & new Template(TPL_FILE_LOCATION.'login.tpl');
}
else
{
	setcookie("dluloged", "admin", 0);
	if ($_POST['from'] != "")
		header("Location: ".$_POST['from'].".php");
	else
		header("Location: setup.php");
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>