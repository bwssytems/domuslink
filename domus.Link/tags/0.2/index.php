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
	if ($page == "appliances" || !$page || $page == "main")
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
	if ($page == "irrigation" || !$page || $page == "main")
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
}
else
{
	$tpl->set('content', $lang['error_not_running']);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

function switch_table($module, $type, $config, $page) 
{
	list($code, $label) = split(" ", $module, 2);
	$multi_alias = is_multi_alias($code); // check if A1,2 or just A1
	
	if (on_state($code, $config['heyuexec'])) { $state = 'on'; $action = $config['cmd_off']; }
	else { $state = 'off'; $action = $config['cmd_on']; }
	
	$html  = '<table cellspacing="0" cellpadding="0" border="0">';
	
	if ($type == "light" && !$multi_alias) 
	{
		$html .= '<tr><td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_lightsheader_left.gif" /></td>';
		$html .= '<td colspan="4" width="225px" background="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_lightsheader_bg.gif"><input type="text" name="label" value="'.label_parse($label, false).'" class="ctrlbox_lights_label_'.$state.'"  /></td>';
		$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_lightsheader_right.gif" /></td></tr>';
		$html .= '<tr><td colspan="6"><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/1px.gif" height="2px" /></td></tr>';
	}
	
	$html .= '<tr>';
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_left.gif" /></td>';
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_'.$type.'_'.$state.'.gif" /></td>';
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_icon_sep.gif" /></td>';
	
	// Middle of control box
	$html .= '<td width="132px" background="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_middle_bg.gif">';
	
	if ($type != "light" || $multi_alias)
		$html .= '<input type="text" name="label" value="'.label_parse($label, false).'" class="ctrlbox_label_'.$state.'"  />';
	else
		$html .= intensity_table($code, $config, $page);

	$html .= '</td>';
	// End of middle
	
	if (!$multi_alias) 
	{
		$html .= '<td><a href="'.$_SERVER['PHP_SELF'].'?action='.$action.'&device='.$code.'&page='.$page.'">';
		$html .= '<img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_switch_'.$state.'.gif" border="0" /></a></td>';
	}
	else
	{
		$html .= '<td background="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_middle_bg.gif" width="50px">';
		$html .= '<table cellspacing="0" cellpadding="0" border="0">';
		$html .= '<tr><td><a href="'.$_SERVER['PHP_SELF'].'?action='.$config['cmd_on'].'&device='.$code.'&page='.$page.'"><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_button_on.gif" border="0" /></a></td>';
		$html .= '<td><a href="'.$_SERVER['PHP_SELF'].'?action='.$config['cmd_off'].'&device='.$code.'&page='.$page.'"><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_button_off.gif" border="0" /></a></td></tr>';
		$html .= '</table>';
		$html .= '</td>';
	}
	
	$html .= '<td><img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/ctrlbox_right.gif" /></td>';
	$html .= '</tr></table>';
	
	return $html;
}

function intensity_table($code, $config, $page) 
{
	$currlevel = level(dim_level($code, $config['heyuexec']));
	
	$intentb  = '<table cellspacing="0" cellpaddin="0" border="0" class="dimmer"><tr>';
	
	// Start dim control
	$intentb .= '<td><a href="'.$_SERVER['PHP_SELF'].'?action='.$config['cmd_dim'].'&device='.$code.'&value=2&page='.$page.'">';
	$intentb .= '<img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/lights_dim.gif" border="0" /></a></td>';
	// End dim control
	
	// Start intensity bar
	$dimlevel = 22;
	for ($i = 1; $i <= $currlevel; $i++) // on bar's
	{
		$dimlevel = $dimlevel - 2;
		$intentb .= '<td><a href="'.$_SERVER['PHP_SELF'].'?action='.$config['cmd_dimb'].'&device='.$code.'&value='.$dimlevel.'&page='.$page.'">';
		$intentb .= '<img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/lights_level_'.$i.'_on.gif" border="0" />';
		$intentb .= '</a></td>';
	}
	$dimlevel = $currlevel * 2;
	for ($i = $currlevel+1; $i < 12; $i++) // off bar's
	{
		$dimlevel = $dimlevel + 2;
		$intentb .= '<td><a href="'.$_SERVER['PHP_SELF'].'?action='.$config['cmd_brightb'].'&device='.$code.'&value='.$dimlevel.'&page='.$page.'">';
		$intentb .= '<img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/lights_level_'.$i.'_off.gif" border="0" />';
		$intentb .= '</a></td>';
	}
	// End intensity bar
	
	// Start bright control
	$intentb .= '<td><a href="'.$_SERVER['PHP_SELF'].'?action='.$config['cmd_bright'].'&device='.$code.'&value=2&page='.$page.'">';
	$intentb .= '<img src="'.$config['url_path'].'/theme/'.$config['theme'].'/images/lights_bright.gif" border="0" /></a></td>';
	// End bright control
	
	$intentb .= '</tr></table>';
	
	return $intentb;
}

function level($dimpercent) 
{
	if ($dimpercent == "100") $level = 11;
	elseif ($dimpercent == "0") $level = 0;
	elseif ($dimpercent >= "90" && $dimpercent <= "99.99") $level = 10;
	elseif ($dimpercent >= "80" && $dimpercent <= "89.99") $level = 9;
	elseif ($dimpercent >= "70" && $dimpercent <= "79.99") $level = 8;
	elseif ($dimpercent >= "60" && $dimpercent <= "69.99") $level = 7;
	elseif ($dimpercent >= "50" && $dimpercent <= "59.99") $level = 6;
	elseif ($dimpercent >= "40" && $dimpercent <= "49.99") $level = 5;
	elseif ($dimpercent >= "30" && $dimpercent <= "39.99") $level = 4;
	elseif ($dimpercent >= "20" && $dimpercent <= "29.99") $level = 3;
	elseif ($dimpercent >= "10" && $dimpercent <= "19.99") $level = 2;
	elseif ($dimpercent > "0" && $dimpercent <= "9.99") $level = 1;
	
	return $level;
}

?>