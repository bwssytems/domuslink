<?php
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

## Includes
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');

## Security validation's
if ($config['seclevel'] == "2" && !$authenticated) {
	header("Location: login.php?from=index");
	exit();
}

if(!isset($_SESSION['filesChecked']) || !$_SESSION['filesChecked'])
{
	header("Location: utility/diagnostic.php?from=index");
	exit();
}

// start/stop controls for heyu
if (isset($_GET["daemon"])) {
	try {
		heyu_ctrl($_GET["daemon"]);
	}
	catch(Exception $e) {
		gen_error("heyu ".$_GET["daemon"], $e->getMessage());
		exit();
	}
}
	
// get which page is open
$page = (isset($_GET['page'])) ? $_GET['page'] : "home";

// set page title
$tpl->set('title', ucwords($page));
$tpl->set('page', $page);

// check if heyu is running, if true display modules
if (heyu_running()) {
	$dirname = dirname(__FILE__);
	require_once($dirname.DIRECTORY_SEPARATOR.'include_globals.php');
	
	if(!isset($_SESSION['configChecked']) || !$_SESSION['configChecked'])
	{
		header("Location: utility/setupverify.php?from=index");
		exit();
	}

	require_once(CLASS_FILE_LOCATION.'location.class.php');
	$locations = new location($heyuconf);
	
	// if any action set, act on it
	if (isset($_GET['action'])) {
		try {
			heyu_action();
		}
		catch(Exception $e) {
			// noop
		}

		if (isset($_GET['page']))
			header("Location: ".$_SERVER['PHP_SELF']."?page=". $_GET['page']);
		else
			header("Location: ".$_SERVER['PHP_SELF']);
		exit();
	}

	// load page acordingly
	switch($page) {
		case "home":
			//if theme is iPhone, we want to show a menu instead of the location_tb
			if ($config['theme'] == 'iPhone')
				$html = $tpl->fetch(TPL_FILE_LOCATION.'home.tpl');
			else
				$html = $locations->buildLocations('','localized');
			break;
		case "all":
			//if theme is iPhone, we want to show a the location_tb
			$html = $locations->buildLocations('','localized');
			break;
		case "lights":
		case "appliances":
		case "irrigation":
		case "shutters":
		case "other":
			$html = $locations->buildLocations($modtypes[$page],'typed');
			break;
			
		case "status":			
			header("Location: utility/status.php?from=index");
			exit();
			break;	

		case "about":				
			$html = $tpl->fetch(TPL_FILE_LOCATION.$page.'.tpl');
			break;	

		case "setup": //for iphone
			## Security validation's
			if ($config['seclevel'] != "0" && !$authenticated) {
				header("Location: login.php?from=index");
				exit();
			}
			else
				$html = $tpl->fetch(TPL_FILE_LOCATION.$page.'.tpl');
			break;

		default:
			//if theme is iPhone, we want to show a menu instead of the location_tb
			if ($config['theme'] == 'iPhone')
				$html = $tpl->fetch(TPL_FILE_LOCATION.'home.tpl');
			else
				$html = $locations->buildLocations('','localized');
			break;
	} // end switch
}
else {
	// if heyu not running show status or about page
	switch($page) {	
		case "about":
			$html = $tpl->fetch(TPL_FILE_LOCATION.$page.'.tpl');
			break;

		default:
			header("Location: utility/status.php?from=index");
			exit();
			break;

	} // end switch
}

// add complete template to content area in layout
$tpl->set('content', $html);

// display the page
echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>
