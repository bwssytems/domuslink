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

class heyuConf {

	var $heyuconf;
	var $filename;

	/**
	 * Constructor
	 *
	 * @param $filename represents name and location
	 */
	function heyuConf($filename)
	{
		$this->heyuconf = '';
		$this->filename = $filename;

		$this->load();
	}

	/**
	 * Load heyu settings from defined file in config.php
	 */
	function load()
	{
		$this->heyuconf = load_file($this->filename);
	}

	/**
	 * Return heyu settings from defined file in config.php
	 */
	function get()
	{
		$content = $this->heyuconf;
		return $content;
	}

	/**
	 * Get Aliases
	 *
	 * @param $req_type Type of alias requested
	 */
	function get_aliases($req_type)
	{
		$i = 0;
		foreach ($this->heyuconf as $line)
		{
			if (substr($line, 0, 5) == "ALIAS")
			{
				$aliases[$i] = $line;
				$i++;
			}
		}
		$i = 0;
		foreach ($aliases as $line)
		{
			list($alias, $label, $code, $module_type) = split(" ", $line, 4);
			list($module, $typenf) = split(" # ", $module_type, 2);
			$type = rtrim($typenf);

			if ($req_type == "Lights" && $type == "Light")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}
			elseif ($req_type == "Appliances" && $type == "Appliance")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}
			elseif ($req_type == "Irrigation" && $type == "Irrigation")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}
			elseif ($req_type == "HVAC" && $type == "HVAC")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}

		}
		return $array;
	}
}

?>