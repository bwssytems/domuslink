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
require_once('..'.DIRECTORY_SEPARATOR.'include.php');
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');

## Instantiate HeyuConf class
$heyuconf = new HeyuConf($config['heyuconf']);
## Get heyu (x10.conf) file contents/settings
$settings = $heyuconf->get();

if ($config['password'] != "" && !isset($_COOKIE["dluloged"]))
	header("Location: login.php?from=heyu");
else
{
	## Set template parameters
	$tpl->set('title', 'Heyu Setup');

	if (!isset($_GET["action"]))
	{
		$tpl_body = & new Template(TPL_FILE_LOCATION.'heyuconf_view.tpl');
		$tpl_body->set('config', $config);
		$tpl_body->set('lang', $lang);
		$tpl_body->set('settings', $settings);
	}

	else
	{
		if ($_GET["action"] == "edit")
		{
			$tpl_body = & new Template(TPL_FILE_LOCATION.'heyuconf_edit.tpl');
			$tpl_body->set('config', $config);
			$tpl_body->set('lang', $lang);
			$tpl_body->set('settings', $settings);
		}
		elseif ($_GET["action"] == "save")
		{
			$i = 0;
			foreach ($_POST as $key => $value)
			{
				if (substr($key, 0, 5) == "ALIAS")
					$newcontent[$i] = substr($key, 0, 5)." ".$value."\n";
				elseif (substr($key, 0, 5) == "SCENE")
					$newcontent[$i] = substr($key, 0, 5)." ".$value."\n";
				elseif (substr($key, 0, 7) == "USERSYN")
					$newcontent[$i] = substr($key, 0, 7)." ".$value."\n";
				else
					$newcontent[$i] = $key." ".$value."\n";
				$i++;
			}
			save_file($newcontent, $config['heyuconf']);
		}
	}

	function yesnoopt($value) {
		if ($value == "YES") {
			return "<option selected value='YES'>YES</option>\n" .
					"<option value='NO'>NO</option>\n";
		} else {
			return "<option value='YES'>YES</option>\n" .
					"<option selected value='NO'>NO</option>\n";
		}
	}

	function dawnduskopt($value) {
		if ($value == "FIRST") {
			return "<option selected value='FIRST'>FIRST</option>\n" .
					"<option value='EARLIEST'>EARLIEST</option>\n" .
					"<option value='LATEST'>LATEST</option>\n" .
					"<option value='AVERAGE'>AVERAGE</option>\n" .
					"<option value='MEDIAN'>MEDIAN</option>\n";
		}
		elseif ($value == "EARLIEST") {
			return "<option value='FIRST'>FIRST</option>\n" .
					"<option selected value='EARLIEST'>EARLIEST</option>\n" .
					"<option value='LATEST'>LATEST</option>\n" .
					"<option value='AVERAGE'>AVERAGE</option>\n" .
					"<option value='MEDIAN'>MEDIAN</option>\n";
		}
		elseif ($value == "LATEST") {
			return "<option value='FIRST'>FIRST</option>\n" .
					"<option value='EARLIEST'>EARLIEST</option>\n" .
					"<option selected value='LATEST'>LATEST</option>\n" .
					"<option value='AVERAGE'>AVERAGE</option>\n" .
					"<option value='MEDIAN'>MEDIAN</option>\n";
		}
		elseif ($value == "AVERAGE") {
			return "<option value='FIRST'>FIRST</option>\n" .
					"<option value='EARLIEST'>EARLIEST</option>\n" .
					"<option value='LATEST'>LATEST</option>\n" .
					"<option selected value='AVERAGE'>AVERAGE</option>\n" .
					"<option value='MEDIAN'>MEDIAN</option>\n";
		}
		elseif ($value == "MEDIAN") {
			return "<option value='FIRST'>FIRST</option>\n" .
					"<option value='EARLIEST'>EARLIEST</option>\n" .
					"<option value=LATEST>LATEST</option>\n" .
					"<option value='AVERAGE'>AVERAGE</option>\n" .
					"<option selected value='MEDIAN'>MEDIAN</option>\n";
		}
	}

	## Display the page
	$tpl->set('content', $tpl_body);

	echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');
}
?>