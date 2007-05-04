<?php

//$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);
## Get heyu (x10.conf) file contents/settings
$settings = $heyuconf->get();

## Set template parameters
$tpl->set('title', 'Aliases');

$tpl_body = & new Template(TPL_FILE_LOCATION.'aliases.tpl');
$tpl_body->set('aliases', $settings);

if (!isset($_GET["action"]))
{
	$tpl_add = & new Template(TPL_FILE_LOCATION.'aliases_add.tpl');
	$tpl_body->set('form', $tpl_add);
}
else
{
	if ($_GET["action"] == "edit")
	{
		$tpl_edit = & new Template(TPL_FILE_LOCATION.'aliases_edit.tpl');
		$tpl_edit->set('alias', $settings[$_GET['line']]); // sets contents of line being edited
		$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
		$tpl_body->set('form', $tpl_edit);
	}
	elseif ($_GET["action"] == "add")
	{
		add_line($settings, $config['heyuconf'], 'alias');
	}
	elseif ($_GET["action"] == "save")
	{
		edit_line($settings, $config['heyuconf'], 'alias');
	}
	elseif ($_GET["action"] == "del")
	{
		delete_line($settings, $config['heyuconf'], $_GET["line"]);
	}
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>