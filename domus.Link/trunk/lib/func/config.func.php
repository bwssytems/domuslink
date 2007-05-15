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

/**
 * Config Load
 */
function config_load()
{
	$config = array();

	$config["heyuconf"] = "/etc/heyu/x10.conf";
	$config["heyuexec"] = "/usr/local/bin/heyu";
	$config["password"] = "123";
	$config["lang"] = "";
	$config["theme"] = "default";
	$config["url_path"] = "/";

	if (file_exists(CONFIG_FILE_LOCATION))
	{
		include(CONFIG_FILE_LOCATION);
	}

	return $config;
}

/**
 * Config contents
 */
function config_text($config)
{
	$result = <<<EOF
#
# domus.Link (Heyu Frontend) Configuration File
#

# File locations
\$config['heyuconf'] = '{$config['heyuconf']}';
\$config['heyuexec'] = '{$config['heyuexec']}';

# Frontend password
\$config['password'] = '{$config['password']}';
# Language (available options en_GB and pt_PT)
\$config['lang'] = '{$config['lang']}';
# Theme
\$config['theme'] = '{$config['theme']}';
# Url Path
\$config['url_path'] = '{$config['url_path']}';
EOF;

	return $result;
}

/**
 * Config save
 */
function config_save($config)
{
	$filedir = dirname(CONFIG_FILE_LOCATION);
	$filename = CONFIG_FILE_LOCATION;
	if (is_writable($filename) || is_writable($filedir))
	{
		$handle = fopen($filename, "w");
		if ($handle)
		{
			fwrite($handle, "<?php\n");
			fwrite($handle, config_text($config));
			fwrite($handle, "\n?>");
			fclose($handle);
		}
	}
}

?>