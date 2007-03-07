<?php

require('lib/smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'tmp/templates';
$smarty->compile_dir = 'tmp/templates_c';
$smarty->cache_dir = 'tmp/cache';
$smarty->config_dir = 'tmp/configs';

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');

?>
