<?php

//$dirname = dirname(__FILE__);
require_once('..'.DIRECTORY_SEPARATOR.'include.php');

## Set template parameters
$tpl->set('title', 'Frontend Admin');

if (!isset($_GET["action"]))
{
	$tpl_body = & new Template(TPL_FILE_LOCATION.'frontend.tpl');
	$tpl_body->set('heyuconf', $config['heyuconf']);
	$tpl_body->set('heyuexec', $config['heyuexec']);
	$tpl_body->set('password', $config['password']);
	$tpl_body->set('lang', $config['lang']);
	$tpl_body->set('theme', $config['theme']);
	$tpl_body->set('url_path', $config['url_path']);
}
elseif ($_GET["action"] == "save")
{
	$newconfig['heyuconf'] = $_POST["heyuconf"];
	$newconfig['heyuexec'] = $_POST["heyuexec"];
	$newconfig['password'] = $_POST["password"];
	$newconfig['lang'] = $_POST["lang"];
	$newconfig['theme'] = $_POST["theme"];
	$newconfig['url_path'] = $_POST["url_path"];

	$configfile = CONFIG_FILE_LOCATION;

	if ((file_exists($configfile) && is_writable($configfile)) || !file_exists($configfile))
	{
		config_save($newconfig);
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else
	{
		echo "Error: Cannot write to $configfile.<br />\n";
		exit;
    }
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>