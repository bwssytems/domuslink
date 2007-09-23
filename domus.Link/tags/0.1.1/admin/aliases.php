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
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);
## Get heyu (x10.conf) file contents/settings
$settings = $heyuconf->get();
## Disallowed characters for alias label (separator |)
$chars = '/ã|é|à|ç|õ|ñ|è|ñ|ª|º|~|è|!|"|\#|\$|\^|%|\&|\?|\«|\»/';

if ($config['password'] != "" && !isset($_COOKIE["dluloged"]))
	header("Location: login.php?from=aliases");
else
{
	## Set template parameters
	$tpl->set('title', $lang['aliases']);

	$tpl_body = & new Template(TPL_FILE_LOCATION.'aliases.tpl');
	$tpl_body->set('lang', $lang);
	$tpl_body->set('aliases', $settings);

	if (!isset($_GET["action"]))
	{
		$tpl_add = & new Template(TPL_FILE_LOCATION.'aliases_add.tpl');
		$tpl_add->set('lang', $lang);
		$tpl_body->set('form', $tpl_add);
	}
	else
	{
		if ($_GET["action"] == "edit")
		{
			$tpl_edit = & new Template(TPL_FILE_LOCATION.'aliases_edit.tpl');
			$tpl_edit->set('lang', $lang);
			$tpl_edit->set('alias', $settings[$_GET['line']]); // sets contents of line being edited
			$tpl_edit->set('linenum', $_GET['line']); // sets number of line being edited
			$tpl_body->set('form', $tpl_edit);
		}
		elseif ($_GET["action"] == "add")
		{
			if (preg_match($chars, $_POST["label"]))
				header("Location: ../error.php?msg=".$lang['error_special_chars']);
			else
				add_line($settings, $config['heyuconf'], 'alias');
		}
		elseif ($_GET["action"] == "save")
		{
			if (preg_match($chars, $_POST["label"]))
				header("Location: ../error.php?msg=".$lang['error_special_chars']);
			else
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
}

?>