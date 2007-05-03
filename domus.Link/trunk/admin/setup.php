<?php

//$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');

## Set template parameters
$tpl->set('title', 'Setup');

## Display the page
$tpl->set('content', 'SETUP');

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>