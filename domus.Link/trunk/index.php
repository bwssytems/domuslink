<?php

$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'page.class.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate classes
$html = new Page('Home', $config, $lang);
$heyuconf = new HeyuConf($config['heyuconf']);

## Load x10.conf file
$heyuconf->load();

## Get aliases of type Lights
$lights = $heyuconf->get_aliases('Lights');
if (count($lights) > 0 )
{
	$html->addContent("<h1>Lights</h1>");
	foreach ($lights as $light)
	{
		$html->addContent("alias: $light<br>");
	}
}

## Get aliases of type Appliances
$appliances = $heyuconf->get_aliases('Appliances');
if (count($appliances) > 0 )
{
	$html->addContent("<h1>Appliances</h1>");
	foreach ($appliances as $appliance)
	{
		$html->addContent("alias: $appliance<br>");
	}
}

## Get aliases of type Irrigation
$irrigation = $heyuconf->get_aliases('Irrigation');
if (count($irrigation) > 0 )
{
	$html->addContent("<h1>Irrigation</h1>");
	foreach ($irrigation as $sprinkler)
	{
		$html->addContent("alias: $sprinkler<br>");
	}
}

## Get aliases of type HVAC
$hvac = $heyuconf->get_aliases('HVAC');
if (count($hvac) > 0 )
{
	$html->addContent("<h1>HVAC</h1>");
	foreach ($hvac as $line)
	{
		$html->addContent("alias: $line<br>");
	}
}

## Display the page
echo $html->get();

?>