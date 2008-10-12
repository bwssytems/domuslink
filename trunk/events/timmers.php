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
require_once(CLASS_FILE_LOCATION.'heyusched.class.php');

## Security validation's
if ($config['seclevel'] != "0") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: ../login.php?from=events/timmers");
}

## Instantiate HeyuConf class and get schedule file with absolute path
$heyuconf = new HeyuConf($config['heyuconf']);
$schedfile = $config['heyu_base'].$heyuconf->getSchedFile();

## Instantiate HeyuSched class
$heyusched = new HeyuSched($schedfile);
$timmers = $heyusched->getTimers();

## Set template parameters
$tpl->set('title', $lang['timmers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'timmers_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timmers', $timmers);
$tpl_body->set('config', $config);
#$tpl_body->set('size', count($aliases));

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');


/**
 * 
 */
function parse_weekdays($weekdays)
{
	$weekday = array('S','M','T','W','T','F','S');
	//$weekday = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	
	$j = mb_strlen($weekdays);
	
	for ($k = 0; $k < $j; $k++)
	{
		$char = mb_substr($weekdays, $k, 1);
		// do stuff with $char
		if ($char == ".") $html .= "<input type='checkbox' name='weekdays' value='.$weekday[$k].' disabled />";
		else $html .= "<input type='checkbox' name='weekdays' value='.$weekday[$k].' checked='yes' disabled />";
	}
	
	return $html;	
}

?>