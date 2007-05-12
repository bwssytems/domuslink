<?php

## Includes
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);

## Template specific
$tpl_body = & new Template(TPL_FILE_LOCATION.'all_controls.tpl');
$tpl->set('title', 'Main');

if (isset($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = null;
}

## Aliases  of type Lights
if ($page == "lights" || !$page || $page == "main")
{
	$lights = $heyuconf->get_aliases('Lights');
	if (count($lights) > 0 ) // If > 0 then modules of type Lights exist therefore display them
	{
		$tpl_lights = & new Template(TPL_FILE_LOCATION.'ctrl_dim_table.tpl');
		$tpl_lights->set('header', 'Lights');
		$tpl_lights->set('page', $page);
		$tpl_lights->set('modules', $lights);
		$tpl_body->set('lights', $tpl_lights);
	}
}

## Aliases of type Appliances
if ($page == "appliances" || !$page || $page == "main")
{
	$appliances = $heyuconf->get_aliases('Appliances');
	if (count($appliances) > 0 ) // If > 0 then modules of type Appliances exist therefore display them
	{
		$tpl_app = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
		$tpl_app->set('header', 'Appliances');
		$tpl_app->set('page', $page);
		$tpl_app->set('modules', $appliances);
		$tpl_body->set('appliances', $tpl_app);
	}
}

## Aliases of type Irrigation
if ($page == "irrigation" || !$page || $page == "main")
{
	$irrigation = $heyuconf->get_aliases('Irrigation');
	if (count($irrigation) > 0 ) // If > 0 then modules of type Irrigation exist therefore display them
	{
		$tpl_irrig = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
		$tpl_irrig->set('header', 'Irrigation');
		$tpl_irrig->set('page', $page);
		$tpl_irrig->set('modules', $irrigation);
		$tpl_body->set('irrigation', $tpl_irrig);
	}
}

## Aliases of type HVAC
if ($page == "hvac" || !$page || $page == "main")
{
	$hvac = $heyuconf->get_aliases('HVAC');
	if (count($hvac) > 0 ) // If > 0 then modules of type HVAC exist therefore display them
	{
		$tpl_hvac = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
		$tpl_hvac->set('header', 'HVAC');
		$tpl_hvac->set('page', $page);
		$tpl_hvac->set('modules', $hvac);
		$tpl_body->set('hvac', $tpl_hvac);
	}
}

if (isset($_GET['action']))
{
	heyu_exec($config['heyuexec']);
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>