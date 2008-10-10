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

/**
 * Config Load
 */
function config_load()
{
	$config = array();

	$config["heyu_base"] = "/etc/heyu";
	$config["heyuconf"] = "x10.conf";
	$config["heyuexec"] = "/usr/local/bin/heyu";
	$config["password"] = "123";
	$config["lang"] = "";
	$config["url_path"] = "/";
	$config["theme"] = "default";
	$config["imgs"] = "ON";

	if (file_exists(CONFIG_FILE_LOCATION))
	{
		include(CONFIG_FILE_LOCATION);
	}

	return $config;
}

/**
 * Config contents
 *
 * @param $config Settings
 *
 */
function config_text($config)
{
	$result = <<<EOF
#
# domus.Link (Heyu Frontend) Configuration File
#

# --------------
# File locations
# --------------

# Heyu base directory - This directory is where Heyu
# searches for it's configuration files, and stores
# state information
\$config['heyu_base'] = '{$config['heyu_base']}';

# heyuconf file - This file is typically named
# x10.conf and usually located in /etc/heyu for
# system wide use
\$config['heyuconf'] = \$config['heyu_base'].'{$config['heyuconf']}';

# heyuexec setting - This setting specifies the
# location of the Heyu exectuable file. Typically
# this will be in /usr/local/bin/
\$config['heyuexec'] = '{$config['heyuexec']}';

# -----------------
# Frontend Settings
# -----------------

# Frontend password - Define a password here to
# access the setup area of the frontend.
# Leave blank to disable password.
\$config['password'] = '{$config['password']}';

# Language - Define the language for the frontend here.
# If left blank browsers preferred language will be used.
# In case a language is not found it will default to English
# Options: Dutch, French, English
\$config['lang'] = '{$config['lang']}';

# Url Path - This setting defines the URL path of the frontend.
# For example if you are running domus.Link in a sub folder
# say http://your-host/domuslink, then you should define the
# url path as /domuslink. Leave blank if your are running
# domus.Link at the root ie http://your-host/
\$config['url_path'] = '{$config['url_path']}';

# Theme - GUI's Theme
\$config['theme'] = '{$config['theme']}';

# Images - Select ON or OFF if you want images to be displayed
# in the menu bar instead of text.
\$config['imgs'] = '{$config['imgs']}';
EOF;

	return $result;
}

/**
 * Config save
 *
 * @param $config Settings
 *
 */
function config_save($config)
{
	$filedir = dirname(CONFIG_FILE_LOCATION);
	$filename = CONFIG_FILE_LOCATION;
	//if (is_writable($filename) || is_writable($filedir))
	//{
		$handle = fopen($filename, "w");
		if ($handle)
		{
			fwrite($handle, "<?php \n");
			fwrite($handle, config_text($config));
			fwrite($handle, "\n?>");
			fclose($handle);
		}
	//}
}

?>