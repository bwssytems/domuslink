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

#Instantiate classes
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'error.class.php');
if (!isset($_GET['msg']))
	$error = new error($_SESSION['errors']);
	//$error = new error(load_file("/tmp/dl_heyu.out"));
else
	$error = new error(array($_GET['msg']));
	
## Set template parameters
$tpl->set('title', $lang['error']);
$tpl->set('content', $error->getPage());

## Display the page
echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>