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
$authCheck = new Login(USERDB_FILE_LOCATION);
if (!$authCheck->login()) {
	header("Location: login.php?from=index");
	exit();
}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());
$tpl->set('sec_level_type', $authCheck->getUser()->getSecurityLevelType());

if(!isset($_SESSION['filesChecked']) || !$_SESSION['filesChecked'])
{
	header("Location: utility/diagnostic.php?from=index");
	exit();
}

// start/stop controls for heyu
if (isset($_GET["daemon"]) && $authCheck->getUser()->getSecurityLevel() <= 2) {
	try {
		heyu_ctrl($config, $_GET["daemon"]);
	}
	catch(Exception $e) {
		gen_error("heyu ".$_GET["daemon"], $e->getMessage());
		exit();
	}
}
	
// get which page is open
$page = (isset($_GET['page'])) ? $_GET['page'] : "domus_home_page";

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
			$theState = '';
			$theCurr = '';
			$theReq = '';
			if(isset($_GET["state"]))
				$theState = $_GET["state"];
			if(isset($_GET["curr"]))
				$theCurr = $_GET["curr"];
			if(isset( $_GET["req"]))
				$theReq =  $_GET["req"];
			heyu_action($config, $_GET["action"], $_GET["code"], $theState, $theCurr, $theReq);
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
		case "domus_home_page":
			//if theme is iPhone, we want to show a menu instead of the location_tb
			if ($config['theme'] == 'iPhone' || $config['theme'] == 'mobileWebKit')
				$html = $tpl->fetch(TPL_FILE_LOCATION.'home.tpl');
			else
				$html = $locations->buildLocations('','localized', $authCheck->getUser());
			break;
		case "domus_all_page":
			//if theme is iPhone, we want to show a the location_tb
			$html = $locations->buildLocations('','localized', $authCheck->getUser());
			break;

		case "domus_status_page":			
//			header("Location: utility/status.php?from=index");
//			exit();
			$html = $tpl->fetch(TPL_FILE_LOCATION.'systemstatus.tpl');
			break;	
		case "domus_browserinfo_page":		
			error_log("browser user agent [".$_SERVER['HTTP_USER_AGENT']."]");	
			header("Location: index.php?page=domus_home_page");
			exit();
			break;	

		case "domus_about_page":				
			$html = $tpl->fetch(TPL_FILE_LOCATION.'about.tpl');
			break;	

		case "domus_themeview_page":				
			if($config['themeview'] == 'typed')
				$config['themeview'] = 'grouped';
			else
				$config['themeview'] = 'typed';
			header("Location: index.php?page=domus_home_page");
			exit();
			break;	

		default:
			$html = $locations->buildLocations($page, $config['themeview'], $authCheck->getUser());
			break;
	} // end switch
}
else {
	// if heyu not running show status or about page
	switch($page) {	
		case "domus_about_page":
			$html = $tpl->fetch(TPL_FILE_LOCATION.'about.tpl');
			break;

		default:
			$html = $tpl->fetch(TPL_FILE_LOCATION.'systemstatus.tpl');
			break;

	} // end switch
}

// add complete template to content area in layout
$tpl->set('content', $html);

// display the page
echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>
