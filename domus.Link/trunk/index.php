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
$tpl->set('title', $lang['home']);
$tpl_body = & new Template(TPL_FILE_LOCATION.'all_controls.tpl');

// get which page is open
if (isset($_GET['page'])) $page = $_GET['page'];
else $page = "home";

// check if heyu is running, if true display modules
if (!heyu_state_check())
{
	foreach (load_file(FPLAN_FILE_LOCATION) as $location)
	{				
		$aliases = $heyuconf->getAliasesByLocation($location);
		
		// 1. master bedrom - 0
		// 2. living room - 3 (0 lights)
		// 3. kitchen - 1 (0 lights)
		// 4. garden - 5 (3 lights)
		
		if (count($aliases) > 0)
		{		
			if ($page == "home")
			{
				echo "<br><h1>".$location."</h1>";
				foreach ($aliases as $alias) echo $alias."<br>";
			}
			elseif ($page == "lights")
			{
				$lights = $heyuconf->getAliasesByType($aliases, "Light");
				if (count($lights) > 0)
				{
					echo "<br><h1>".$location."</h1>";
					foreach ($lights as $light) 
						echo $light."<br>";
				}
			}
			elseif ($page == "appliances")
			{
				$appliances = $heyuconf->getAliasesByType($aliases, "Appliance");
				if (count($appliances) > 0)
				{
					echo "<br><h1>".$location."</h1>";
					foreach ($appliances as $appliance) 
						echo $appliance."<br>";
				}
			}
			elseif ($page == "irrigation")
			{
				$irrigation = $heyuconf->getAliasesByType($aliases, "Irrigation");
				if (count($irrigation) > 0)
				{
					echo "<br><h1>".$location."</h1>";
					foreach ($irrigation as $irrig) 
						echo $irrig."<br>";
				}
			}
			
		} // end if count > 0
	} // end foreach
} // end if heyu running
else
{
	$tpl->set('content', $lang['error_not_running']);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');



?>