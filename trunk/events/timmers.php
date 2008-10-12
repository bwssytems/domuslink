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
$aliases = $heyuconf->getAliases(false);

## Instantiate HeyuSched class
$heyusched = new HeyuSched($schedfile);
$timmers = $heyusched->getTimers();

## Set template parameters
$tpl->set('title', $lang['timmers']);

$tpl_body = & new Template(TPL_FILE_LOCATION.'timmers_view.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('timmers', $timmers);
$tpl_body->set('config', $config);
$tpl_body->set('aliases', $aliases);
//$tpl_body->set('size', count($aliases));

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

/**
 * 
 */
function parse_weekdays2($weekdays, $lang)
{
	$weekday = array(substr($lang['sun'], 0, 1),
							substr($lang['mon'], 0, 1),
							substr($lang['tue'], 0, 1),
							substr($lang['wed'], 0, 1),
							substr($lang['thu'], 0, 1),
							substr($lang['fri'], 0, 1),
							substr($lang['sat'], 0, 1));
	
	$html .= "<table cellspacing='0' cellpadding='0' border='0'><tr>";
	$html .= "<td align=center>$weekday[0]</td>";
	$html .= "<td align=center>$weekday[1]</td>";
	$html .= "<td align=center>$weekday[2]</td>";
	$html .= "<td align=center>$weekday[3]</td>";
	$html .= "<td align=center>$weekday[4]</td>";
	$html .= "<td align=center>$weekday[5]</td>";
	$html .= "<td align=center>$weekday[6]</td>";
	$html .= "</tr><tr>";
	
	$j = mb_strlen($weekdays);
	
	for ($k = 0; $k < $j; $k++)
	{
		$char = mb_substr($weekdays, $k, 1);
		if ($char == ".") $html .= "<td><input type='checkbox' name='weekdays' value='.$weekday[$k].' disabled /></td>";
		else $html .= "<td><input type='checkbox' name='weekdays' value='.$weekday[$k].' checked='yes' disabled /></td>";
	}
	
	$html .= "</tr></table>";
	
	return $html;	
}

/**
 * 
 */
function parse_macro($macro, $aliases)
{
	$pos = strpos($macro, "o");
	$code = strtoupper(substr($macro, 0, $pos));
	
	foreach ($aliases as $alias)
	{
		list($temp, $label, $retcode, $module_type_loc) = split(" ", $alias, 4);
		
		if (strtoupper($retcode) == $code)
			return label_parse($label, false);
	}
	
	return "";
}

?>