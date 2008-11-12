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

## Instantiate some vars:
$html = '';
$page = 'home';

## Instantiate HeyuConf class
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');
$heyuconf = new HeyuConf($config['heyuconf']);

## Instantiate Location class
require_once(CLASS_FILE_LOCATION.'location.class.php');
$locations = new location($heyuconf);

// Security validation's
if ($config['seclevel'] == "2") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: login.php?from=index");
}

// start/stop controls for heyu
if (isset($_GET["daemon"])) 
{
	switch ($_GET["daemon"])
	{
		case "start":
			heyu_ctrl($config['heyuexec'], 'start', $_GET['retURL']);
			break;
		case "stop":
			heyu_ctrl($config['heyuexec'], 'stop', $_GET['retURL']);
			break;
		case "restart":
			heyu_ctrl($config['heyuexec'], 'restart',$_GET['retURL']);
			break;
	}
}

// get which page is open
if (isset($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	header("Location: ".$_SERVER['PHP_SELF']."?page=home");
}

// set page title
$tpl->set('title', ucwords($page));
$tpl->set('page', $page);

// check if heyu is running, if true display modules
if (heyu_running())
{

	// if any action set, act on it
	if (isset($_GET['action']))
	{
		switch ($_GET['action'])
		{
			case "info":
				$info = & new Template(TPL_FILE_LOCATION.'info.tpl');
				$info->set('title', $lang['info']);
				$info->set('lang', $lang);
				$info->set('lines', heyu_info($config['heyuexec']));
				$result_from_heyu_info = $info->fetch(TPL_FILE_LOCATION.'info.tpl');
				break;
			default:
				$result_from_heyu_action = heyu_action($config);
				break;
		}
	}
	// else display modules
	switch($page)
	{
		case "home":
			//if theme is iPhone, we want to show a menu instead the location_tb
			if ($config['theme'] == 'iPhone') {
				$html = $tpl->fetch(TPL_FILE_LOCATION.'home.tpl');
			} else {
				$html = $locations->build_locations('',$modtypes,$config,'localized');
			}
		break;
		
		case "lights":
		case "appliances":
		case "irrigation":
			$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, $modtypes[$page]);
			$html = $locations->build_locations($modtypes[$page],$modtypes,$config,'typed');
		break;
		
		//[FS: Added about page for the about section]
		case "about":
		//[FS: Added status page for the status section]						
		case "status":			
		//[FS: Added setup page for the submenu of the setup section]
		case "setup":
			$html = $tpl->fetch(TPL_FILE_LOCATION.$page.'.tpl');
		break;	
			
		//[FS: Added page info because iPhone theme doesn't have the status in a footer]
		case "info":
			$html = $result_from_heyu_info;											
		break;

	} // end switch

	// add complete template to content area in layout
	$tpl->set('content', $html);
	
} // end if heyu running
else
{
	//if theme is iPhone, we want to show the status page instead of the error
	if ($config['theme'] == 'iPhone')
	{
		$tpl->set('content', $tpl->fetch(TPL_FILE_LOCATION.'status.tpl'));
	}
	else
	{
		$tpl->set('content', $lang['error_not_running']);				
	}
	
}

// display the page
echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>