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
$tpl->set('title', 'Setup');

## Display the page
if ($config['password'] != "" && !isset($_COOKIE["dluloged"]))
{
	header("Location: login.php");
}
else
{
	$tpl->set('content', '<h1>'.$lang['setup'].'</h1>'.$lang['setup_txt']);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>