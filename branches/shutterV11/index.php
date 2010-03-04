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
