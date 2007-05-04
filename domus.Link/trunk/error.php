<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');

## Set template parameters
$tpl->set('title', 'Error');

$tpl_body = & new Template(TPL_FILE_LOCATION.'error.tpl');
$tpl_body->set('errormsg', stripslashes($_GET["msg"]));

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>