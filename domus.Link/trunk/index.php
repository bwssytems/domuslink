<?php
/*----------------------------------------------------------------------------+
 |                                                                            |
 |                  domus.Link - a frontend for Heyu                          |
 |                                                                            |
 |                Copyright 2007, Istvan Hubay Cebrian                        |
 |                      All Rights Reserved                                   |
 |                                                                            |
 |                                                                            |
 | This software is licensed free of charge for non-commercial distribution   |
 | and for personal and internal business use only.  Inclusion of this        |
 | software or any part thereof in a commercial product is prohibited         |
 | without the prior written permission of the author.  You may copy, use,    |
 | and distribute this software subject to the following restrictions:        |
 |                                                                            |
 |  1)  You may not charge money for it.                                      |
 |  2)  You may not remove or alter this license, copyright notice, or the    |
 |      included disclaimers.                                                 |
 |  3)  You may not claim you wrote it.                                       |
 |  4)	If you make improvements (or other changes), you are requested        |
 |	    to send them to the domus.Link maintainer so there's a focal point    |
 |      for distributing improved versions.                                   |
 |                                                                            |
 | As used herein, domus.Link is a trademark of Istvan H. Cebrian.            |
 |                                                                            |
 | HEYU is a trademark of Daniel B. Suthers.                                  |
 | X10, CM11A, and ActiveHome are trademarks of X-10 (USA) Inc.               |
 | SwitchLinc and LampLinc are trademarks of Smarthome, Inc.                  |
 |                                                                            |
 | The author is not affiliated with either company.                          |
 |                                                                            |
 | Istvan H. Cebrian                                                          |
 | Author and Maintainer                                                      |
 | Lisbon, Portugal                                                           |
 | Email ID: me                                                               |
 | Email domain: -at- icebrian -dot- net                                      |
 |                                                                            |
 | Disclaimers:                                                               |
 | THERE IS NO ASSURANCE THAT THIS SOFTWARE IS FREE OF DEFECTS AND IT MUST    |
 | NOT BE USED IN ANY SITUATION WHERE THERE IS ANY CHANCE THAT ITS            |
 | PERFORMANCE OR FAILURE TO PERFORM AS EXPECTED COULD RESULT IN LOSS OF      |
 | LIFE, INJURY TO PERSONS OR PROPERTY, FINANCIAL LOSS, OR LEGAL LIABILITY.   |
 |                                                                            |
 | TO THE EXTENT ALLOWED BY APPLICABLE LAW, THIS SOFTWARE IS PROVIDED "AS IS",|
 | WITH NO EXPRESS OR IMPLIED WARRANTY, INCLUDING, BUT NOT LIMITED TO, THE    |
 | IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE.|
 |                                                                            |
 | IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW WILL THE AUTHOR BE LIABLE    |
 | FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL   |
 | DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THIS SOFTWARE EVEN IF   |
 | THE AUTHOR HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.            |
 |                                                                            |
 +----------------------------------------------------------------------------*/

## Includes
$dirname = dirname(__FILE__);
require_once($dirname.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);

## Template specific
$tpl_body = & new Template(TPL_FILE_LOCATION.'all_controls.tpl');
$tpl->set('title', $lang['title']);

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
		$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_dim_table.tpl');
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
	if (count($appliances) > 0 ) // If > 0 then modules of type Appliances exist therefore display them
	{
		$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
		$tpl_subbody->set('header', $lang['appliances']);
		$tpl_subbody->set('page', $page);
		$tpl_subbody->set('config', $config);
		$tpl_subbody->set('modules', $appliances);
		$tpl_body->set('appliances', $tpl_subbody);
	}
}

## Aliases of type Irrigation
if ($page == "irrigation" || !$page || $page == "main")
{
	$irrigation = $heyuconf->get_aliases('Irrigation');
	if (count($irrigation) > 0 ) // If > 0 then modules of type Irrigation exist therefore display them
	{
		$tpl_subbody = & new Template(TPL_FILE_LOCATION.'ctrl_table.tpl');
		$tpl_subbody->set('header', $lang['irrigation']);
		$tpl_subbody->set('page', $page);
		$tpl_subbody->set('config', $config);
		$tpl_subbody->set('modules', $irrigation);
		$tpl_body->set('irrigation', $tpl_subbody);
	}
}

## Aliases of type HVAC
/*if ($page == "hvac" || !$page || $page == "main")
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
}*/

if (isset($_GET['action']))
{
	heyu_exec($config['heyuexec']);
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>