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
	// loop through each location in floorplan file
	foreach (load_file(FPLAN_FILE_LOCATION) as $count => $location)
	{				
		$localized_aliases = $heyuconf->getAliasesByLocation($location);
		
		if (count($localized_aliases) > 0)
		{		
			if ($page == "home")
			{
				$zone_tpl[$count] = & new Template(TPL_FILE_LOCATION.'area_box.tpl');
				$zone_tpl[$count]->set('header', $location);
				
				foreach ($localized_aliases as $alias) 
					echo $alias."<br>";
			}
			elseif ($page == "lights")
			{
				$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, "Light");
				if (count($typed_aliases) > 0)
				{
					$zone_tpl[$count] = & new Template(TPL_FILE_LOCATION.'area_box.tpl');
					$zone_tpl[$count]->set('header', $location);
					
					foreach ($typed_aliases as $light) 
						echo $light."<br>";
				}
			}
			
			elseif ($page == "appliances")
			{
				$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, "Appliance");
				if (count($typed_aliases) > 0)
				{
					echo "<br><h1>".$location."</h1>";
					
					foreach ($typed_aliases as $appliance) 
						echo $appliance."<br>";
				}
			}
			
			elseif ($page == "irrigation")
			{
				$typed_aliases = $heyuconf->getAliasesByType($localized_aliases, "Irrigation");
				if (count($typed_aliases) > 0)
				{
					echo "<br><h1>".$location."</h1>";
					
					foreach ($typed_aliases as $valve) 
						echo $valve."<br>";
				}
			}
			
		} // end if count > 0
	} // end foreach
	
	// add each zone to template
	foreach ($zone_tpl as $key => $zone)
	{
		$tpl_body->set('ctrl'.$key, $zone);
	}
	
	// add complete template to content area in layout
	$tpl->set('content', $tpl_body);
	
} // end if heyu running
else
{
	$tpl->set('content', $lang['error_not_running']);
}

// display the page
echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>