<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
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

## Security validation's
if ($config['seclevel'] == "2" && !$authenticated) 
	header("Location: login.php?from=index");

## Instantiate heyuConf & location class
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');
require_once(CLASS_FILE_LOCATION.'location.class.php');
$heyuconf = new heyuConf($config['heyuconf']);
$locations = new location($heyuconf);

// start/stop controls for heyu
if (isset($_GET["daemon"])) heyu_ctrl($_GET["daemon"]);

// get which page is open
$page = (isset($_GET['page'])) ? $_GET['page'] : "home";

// set page title
$tpl->set('title', ucwords($page));
$tpl->set('page', $page);

// check if heyu is running, if true display modules
if (heyu_running()) {
	// if any action set, act on it
	if (isset($_GET['action'])) heyu_action();

	// load page acordingly
	switch($page) {
		case "home":
			//if theme is iPhone, we want to show a menu instead of the location_tb
			if ($config['theme'] == 'iPhone') $html = $tpl->fetch(TPL_FILE_LOCATION.'home.tpl');
			else $html = $locations->buildLocations('','localized');
			break;
		case "all":
			//if theme is iPhone, we want to show a the location_tb
			$html = $locations->buildLocations('','localized');
			break;
		case "lights":
		case "appliances":
		case "irrigation":
			$html = $locations->buildLocations($modtypes[$page],'typed');
			break;
			
		case "about":				
		case "status":			
		case "setup": //for iphone
			if ($page == "setup" && $config['theme'] != "iPhone") $page="status";
			$html = $tpl->fetch(TPL_FILE_LOCATION.$page.'.tpl');
			break;	
			
		case "info":
			$info = & new Template(TPL_FILE_LOCATION.'info.tpl');
			$info->set('lines', heyu_info());
			$html = $info->fetch(TPL_FILE_LOCATION.'info.tpl');								
			break;

	} // end switch
}
else {
	// if heyu not running show status or about page
	switch($page) {	
		case "about":
		case "setup": //for iphone
			if ($page == "setup" && $config['theme'] != "iPhone") $page="status";
			$html = $tpl->fetch(TPL_FILE_LOCATION.$page.'.tpl');
			break;
			
		default:
			$html = $tpl->fetch(TPL_FILE_LOCATION.'status.tpl');
			break;

	} // end switch
}

// add complete template to content area in layout
$tpl->set('content', $html);

// display the page
echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>
