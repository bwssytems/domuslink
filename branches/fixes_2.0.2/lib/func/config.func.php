<?php
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

/**
 * Config Load
 */
function config_load()
{
	$config = array();

	$config["pc_interface"] = "CM11A";
	$config["heyu_base_use"] = "NO";
	$config["heyu_base"] = "/etc/heyu";
	$config["heyu_subdir"] = "default";
	$config["heyuconf"] = "x10.conf";
	$config["heyuexec"] = "/usr/local/bin/heyu";
	$config["use_domus_security"] = 'ON';
	$config["hvac_house_code"] = "";
	$config["lang"] = "";
	$config["url_path"] = "/";
	$config["theme"] = "default";
	$config["themeview"] = "typed";
	$config["thememobile"] = "iPhone";
	$config["mobileselect"] = "iPhone,iPad,Android";
	$config["imgs"] = "ON";
	$config["codes"] = "ON";
	$config["refresh"] = "0";

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

# ------------------
# Computer Interface
# ------------------
# Here one can set which type of computer interface
# is in use, either a CM11A or a CM17A
\$config['pc_interface'] = '{$config['pc_interface']}';

# --------------
# File locations
# --------------

# Heyu base use - This switch forces domus.Link to pass explicit
# path directive using -c to heyu on execution based on the heyu_base
# setting when set to "YES". If set to "NO", domus.Link will default its
# heyu_base path and x10config file settings to "/etc/heyu" and 
# "x10.conf" respectively.
\$config['heyu_base_use'] = '{$config['heyu_base_use']}';

# Heyu base directory - This directory is where Heyu
# searches for it's configuration files, and stores
# state information
\$config['heyu_base'] = '{$config['heyu_base']}';

# Heyu subdirectory configuration - This controls where
# domus.Link uses the config and scehdule files for the controller
# or multiple configs
\$config['heyu_subdir'] = '{$config['heyu_subdir']}';
 
# heyuconf file - This file is typically named
# x10.conf and usually located in /etc/heyu for
# system wide use
\$config['heyuconf'] = '{$config['heyuconf']}';

# heyuexec setting - This setting specifies the
# location of the Heyu exectuable file. Typically
# this will be in /usr/local/bin/
\$config['heyuexec'] = '{$config['heyuexec']}';

# -----------------
# Security Setting
# -----------------

# This setting controls whether security is used
# at all for domus.Link
# WARNING!!!! Setting this to off will make your domus.Link
# and heyu setup vulnerable to hackers. Do not change unless
# you are sure your system cannot be accessed externally!!!!
\$config['use_domus_security'] = '{$config['use_domus_security']}';

# -----------------
# HVAC Settings for RCS usage
# -----------------

# RCS thermostats use a complete house code.
# This value specifies which house code to use
\$config['hvac_house_code'] = '{$config['hvac_house_code']}';

# -----------------
# Frontend Settings
# -----------------

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

# Theme - Web GUI's Theme
\$config['theme'] = '{$config['theme']}';

# Theme  View - default view as grouped or types
\$config['themeview'] = '{$config['themeview']}';

# Mobile Theme - select mobile autodetect theme
\$config['thememobile'] = '{$config['thememobile']}';

# Mobile Select - A list of strings to search aginst the http_user_agent to
# set the mobile theme automatically. This is a comma separated list. The search
# will be case insensitive.
\$config['mobileselect'] = '{$config['mobileselect']}';

# Images - Select ON or OFF if you want images to be displayed
# in the menu bar instead of text.
\$config['imgs'] = '{$config['imgs']}';

# Codes - Select ON or OFF if you want codes to be displayed
# in the buttons.
\$config['codes'] = '{$config['codes']}';

# Refresh - This setting defines the amount of time between page
# refreshes. The page being refreshed is the main page where modules
# are displayed. Leave empty to disable this feature.
\$config['refresh'] = '{$config['refresh']}';
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
	
	$handle = fopen($filename, "w");
	if ($handle)
	{
		fwrite($handle, "<?php \n");
		fwrite($handle, config_text($config));
		fwrite($handle, "\n?>");
		fclose($handle);
	}
}

/**
 * Parse Config
 * 
 * Description: This functions receives $config containing all the configuration options, checks to see which
 * computer interface is being used, and assign's the correct commands for controling devices.
 * 
 * @param $config contains all the frontend's configuration options
 */
function & parse_config(&$config)
{
	if ($config['pc_interface'] == 'CM11A') 
	{
		$config['cmd_on'] = 'on';
		$config['cmd_off'] = 'off';
		$config['cmd_bright'] = 'bright';
		$config['cmd_dim'] = 'dim';
		$config['cmd_brightb'] = 'brightb';
		$config['cmd_dimb'] = 'dimb';
	} 
	else
	{
		$config['cmd_on'] = 'fon';
		$config['cmd_off'] = 'foff';
		$config['cmd_bright'] = 'fbright';
		$config['cmd_dim'] = 'fdim';
		$config['cmd_brightb'] = 'fbright';
		$config['cmd_dimb'] = 'fdim';
	}
	
	if($config['heyu_base_use'] == "NO") {
		$config['heyu_base_real'] = "/etc/heyu/";
		$config['heyuconf_real'] = "x10.conf";
	}
	else {
		$config['heyu_base_real'] = $config['heyu_base'];
		$config['heyuconf_real'] = $config['heyuconf'];
	}

	if(!(strtolower($config['heyu_subdir']) == 'default') && $config['heyu_base_use'] == "NO") {
		$config['heyuexecreal'] = $config['heyuexec']." -".$config['heyu_subdir'];
		$config['heyuconfloc'] = $config['heyu_base_real'].$config['heyu_subdir']."/".$config['heyuconf_real'];
	}
	elseif(!(strtolower($config['heyu_subdir']) == 'default') && $config['heyu_base_use'] == "YES") {
		$config['heyuconfloc'] = $config['heyu_base_real'].$config['heyu_subdir']."/".$config['heyuconf_real'];
		$config['heyuexecreal'] = $config['heyuexec']." -c ".$config['heyuconfloc'];
	}
	elseif($config['heyu_base_use'] == "YES") {
		$config['heyuconfloc'] = $config['heyu_base_real'].$config['heyuconf_real'];
		$config['heyuexecreal'] = $config['heyuexec']." -c ".$config['heyuconfloc'];
	}
	else {
		$config['heyuexecreal'] = $config['heyuexec'];
		$config['heyuconfloc'] = $config['heyu_base_real'].$config['heyuconf_real'];
	}

	return $config;
}

?>