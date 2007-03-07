<?php
/* include 'lang.php';
/* $lang = check_lang();
include_once($lang); */

/* require('lib/smarty/Smarty.class.php'); */
require('lang.php');
$smarty = new smartyML(pt);

$smarty->template_dir = 'tmp/templates';
$smarty->compile_dir = 'tmp/templates_c';
$smarty->cache_dir = 'tmp/cache';
$smarty->config_dir = 'tmp/configs';

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');

?>
