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

## Includes
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);

## Security validation's
if ($config['seclevel'] == "2") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: admin/login.php?from=index");
}

## Template specific
$tpl->set('title', $lang['home']);
$tpl_body = & new Template(TPL_FILE_LOCATION.'all_controls.tpl');

if (isset($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = null;
}


if (heyu_state_check())
{
/*	
	## Aliases  of type Lights
	if ($page == "lights" || !$page || $page == "home")
	{
		$lights = $heyuconf->get_aliases('Lights');
		$total = count($lights);
		
		if ($total > 0 ) // If > 0 then modules of type Lights exist therefore display them
		{
			$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
			$tpl_subbody->set('header', $lang['lights']);
			
			$tpl_subbody->set('config', $config);
			$tpl_subbody->set('page', $page);
			$tpl_subbody->set('type', "light");
			$tpl_subbody->set('modules', $lights);
			
			$tpl_subbody->set('rows', ceil($total / $config['cols']));
			$tpl_subbody->set('cols', $config['cols']);
			$tpl_subbody->set('arraysize', $total);
			
			$tpl_body->set('lights', $tpl_subbody);
		}
	}

	## Aliases of type Appliances
	if ($page == "appliances" || !$page || $page == "home")
	{
		$appliances = $heyuconf->get_aliases('Appliances');
		$total = count($appliances);
		
		if ($total > 0 ) // If > 0 then modules of type Appliances exist therefore display them
		{
			$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
			$tpl_subbody->set('header', $lang['appliances']);
			
			$tpl_subbody->set('config', $config);
			$tpl_subbody->set('page', $page);
			$tpl_subbody->set('type', "app");
			$tpl_subbody->set('modules', $appliances);
			
			$tpl_subbody->set('rows', ceil($total / $config['cols']));
			$tpl_subbody->set('cols', $config['cols']);
			$tpl_subbody->set('arraysize', $total);
			
			$tpl_body->set('appliances', $tpl_subbody);
		}
	}

	## Aliases of type Irrigation
	if ($page == "irrigation" || !$page || $page == "home")
	{
		$irrigation = $heyuconf->get_aliases('Irrigation');
		$total = count($irrigation);
		
		if ($total > 0 ) // If > 0 then modules of type Irrigation exist therefore display them
		{
			$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
			$tpl_subbody->set('header', $lang['irrigation']);
			
			$tpl_subbody->set('config', $config);
			$tpl_subbody->set('page', $page);
			$tpl_subbody->set('type', "irrig");
			$tpl_subbody->set('modules', $irrigation);
			
			$tpl_subbody->set('rows', ceil($total / $config['cols']));
			$tpl_subbody->set('cols', $config['cols']);
			$tpl_subbody->set('arraysize', $total);
			
			$tpl_body->set('irrigation', $tpl_subbody);
		}
	}

	if (isset($_GET['action']))
	{
		heyu_exec($config['heyuexec']);
	}

	## Display the page
	$tpl->set('content', $tpl_body);
	*/
}
else
{
	$tpl->set('content', $lang['error_not_running']);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');



?>