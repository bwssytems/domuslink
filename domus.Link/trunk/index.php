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
$cols = 2; // <<<<<<<<<<<<<----------------------------------- TO ADD TO CONFIG!!!!!!!!!!!

## Security validation's
if ($config['seclevel'] == "2") 
{
	if (!isset($_COOKIE["dluloged"]))
		header("Location: admin/login.php?from=index");
}

## Template specific
$tpl->set('title', $lang['title']);
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
	## Aliases  of type Lights
	if ($page == "lights" || !$page || $page == "main")
	{
		$lights = $heyuconf->get_aliases('Lights');
		if (count($lights) > 0 ) // If > 0 then modules of type Lights exist therefore display them
		{
			$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_light_table.tpl');
			$tpl_subbody->set('header', $lang['lights']);
			$tpl_subbody->set('page', $page);
			$tpl_subbody->set('config', $config);
			$tpl_subbody->set('modules', $lights);
			$tpl_body->set('lights', $tpl_subbody);
		}
	}

	## Aliases of type Appliances
	if ($page == "appliances" || !$page || $page == "main")
	{
		$appliances = $heyuconf->get_aliases('Appliances');
		$total = count($appliances);
		
		if (count($appliances) > 0 ) // If > 0 then modules of type Appliances exist therefore display them
		{
			$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
			$tpl_subbody->set('header', $lang['appliances']);
			
			$tpl_subbody->set('config', $config);
			$tpl_subbody->set('page', $page);
			$tpl_subbody->set('type', "app");
			$tpl_subbody->set('modules', $appliances);
			
			$tpl_subbody->set('rows', ceil($total / $cols));
			$tpl_subbody->set('cols', $cols);
			$tpl_subbody->set('arraysize', $total);
			
			$tpl_body->set('appliances', $tpl_subbody);
		}
	}

	## Aliases of type Irrigation
	if ($page == "irrigation" || !$page || $page == "main")
	{
		$irrigation = $heyuconf->get_aliases('Irrigation');
		$total = count($irrigation);
		
		if (count($irrigation) > 0 ) // If > 0 then modules of type Irrigation exist therefore display them
		{
			$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
			$tpl_subbody->set('header', $lang['irrigation']);
			
			$tpl_subbody->set('config', $config);
			$tpl_subbody->set('page', $page);
			$tpl_subbody->set('type', "irrig");
			$tpl_subbody->set('modules', $irrigation);
			
			$tpl_subbody->set('rows', ceil($total / $cols));
			$tpl_subbody->set('cols', $cols);
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
}
else
{
	$tpl->set('content', $lang['error_not_running']);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

function switch_box($module, $type, $config, $page) 
{
	list($code, $label) = split(" ", $module, 2);
	
	if (on_state($code, $config['heyuexec'])) { $state = 'on'; $action = $config['OFF']; }
	else { $state = 'off'; $action = $config['ON']; }
	
	$str = $type.'_'.$state.'.gif';
	
	$html .= '<table cellspacing="0" cellpadding="0" border="0"><tr>';
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_left.gif" /></td>';
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_'.$str.'" /></td>';
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_icon_sep.gif" /></td>';
	$html .= '<td width="132px" background="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_middle_bg.gif"><input type="text" name="label" value="'.label_parse($label, false).'" class="ctrlbox_label_'.$state.'"  /></td>';
	$html .= '<td><a href="'.$_SERVER['PHP_SELF'].'?action='.$action.'&device='.$code.'&page='.$page.'"><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_switch_'.$state.'.gif" border="0" /></a></td>';
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_right.gif" /></td>';
	$html .= '</tr></table>';
	
	return $html;
}

?>