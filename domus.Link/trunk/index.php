<?php

require('config.inc.php');
require('lib/smarty/SmartyML.class.php');

$smarty = new smartyML($lang);

$smarty->template_dir = 'tmp/templates';
$smarty->compile_dir = 'tmp/templates_c';
$smarty->cache_dir = 'tmp/cache';
$smarty->config_dir = 'tmp/configs';

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');

?>
