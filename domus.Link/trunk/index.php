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

## Aliases  of type Lights
if ($_GET["page"] == "lights" || !isset($_GET["page"]) || $_GET["page"] == "main")
{
	$lights = $heyuconf->get_aliases('Lights');
	if (count($lights) > 0 )
	{
		$html->addContent("<h1>Lights</h1>");
		//$html->addContent("<table cellspacing='0' cellpadding='0' border='0'>\n");
		foreach ($lights as $light)
		{
			list($code, $label) = split(" ", $light, 2);
			$html->addContent("code: $code - label: $label<br>");
		}
	}
}

## Aliases of type Appliances
if ($_GET["page"] == "appliances" || !isset($_GET["page"]) || $_GET["page"] == "main")
{
	$appliances = $heyuconf->get_aliases('Appliances');
	if (count($appliances) > 0 )
	{
		$html->addContent("<h1>Appliances</h1>");
		foreach ($appliances as $appliance)
		{
			$html->addContent("alias: $appliance<br>");
		}
	}
}

## Aliases of type Irrigation
if ($_GET["page"] == "irrigation" || !isset($_GET["page"]) || $_GET["page"] == "main")
{
	$irrigation = $heyuconf->get_aliases('Irrigation');
	if (count($irrigation) > 0 )
	{
		$html->addContent("<h1>Irrigation</h1>");
		foreach ($irrigation as $sprinkler)
		{
			$html->addContent("alias: $sprinkler<br>");
		}
	}
}

## Aliases of type HVAC
if ($_GET["page"] == "hvac" || !isset($_GET["page"]) || $_GET["page"] == "main")
{
	$hvac = $heyuconf->get_aliases('HVAC');
	if (count($hvac) > 0 )
	{
		$html->addContent("<h1>HVAC</h1>");
		foreach ($hvac as $line)
		{
			$html->addContent("alias: $line<br>");
		}
	}
}

## Display the page
echo $html->get();

function table_make()
{

}

?>