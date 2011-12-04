<?php 
#
# domus.Link (Heyu Frontend) Configuration File
#

# ------------------
# Computer Interface
# ------------------
# Here one can set which type of computer interface
# is in use, either a CM11A or a CM17A
$config['pc_interface'] = 'CM11A';

# --------------
# File locations
# --------------

# Heyu base use - This switch forces domus.Link to pass explicit
# path directive using -c to heyu on execution based on the heyu_base
# setting when set to "YES". If set to "NO", domus.Link will default its
# heyu_base path and x10config file settings to "/etc/heyu" and 
# "x10.conf" respectively.
$config['heyu_base_use'] = 'NO';

# Heyu base directory - This directory is where Heyu
# searches for it's configuration files, and stores
# state information
$config['heyu_base'] = '/etc/heyu/';

# Heyu subdirectory configuration - This controls where
# domus.Link uses the config and scehdule files for the controller
# or multiple configs
$config['heyu_subdir'] = 'default';
 
# heyuconf file - This file is typically named
# x10.conf and usually located in /etc/heyu for
# system wide use
$config['heyuconf'] = 'x10.conf';

# heyuexec setting - This setting specifies the
# location of the Heyu exectuable file. Typically
# this will be in /usr/local/bin/
$config['heyuexec'] = '/usr/local/bin/heyu';

# -----------------
# Security Setting
# -----------------

# This setting controls whether security is used
# at all for domus.Link
# WARNING!!!! Setting this to off will make your domus.Link
# and heyu setup vulnerable to hackers. Do not change unless
# you are sure your system cannot be accessed externally!!!!
$config['use_domus_security'] = 'ON';

# -----------------
# HVAC Settings for RCS usage
# -----------------

# RCS thermostats use a complete house code.
# This value specifies which house code to use
$config['hvac_house_code'] = '';

# -----------------
# Frontend Settings
# -----------------

# Language - Define the language for the frontend here.
# If left blank browsers preferred language will be used.
# In case a language is not found it will default to English
# Options: Dutch, French, English
$config['lang'] = 'English';

# Url Path - This setting defines the URL path of the frontend.
# For example if you are running domus.Link in a sub folder
# say http://your-host/domuslink, then you should define the
# url path as /domuslink. Leave blank if your are running
# domus.Link at the root ie http://your-host/
$config['url_path'] = '';

# Web Theme - GUI's Theme
$config['theme'] = 'default';

# Theme  View - default view as grouped or types
$config['themeview'] = 'typed';

# Mobile Theme - Theme to use when autodetect of mobile browser
$config['thememobile'] = 'mobileWebKit';

# Mobile Select - A list of strings to search aginst the http_user_agent to
# set the mobile theme automatically. This is a comma separated list. The search
# will be case insensitive.
$config['mobileselect'] = 'iPhone,iPad,Android';

# Images - Select ON or OFF if you want images to be displayed
# in the menu bar instead of text.
$config['imgs'] = 'ON';

# Codes - Select ON or OFF if you want codes to be displayed
# in the buttons.
$config['codes'] = 'ON';

# Refresh - This setting defines the amount of time between page
# refreshes. The page being refreshed is the main page where modules
# are displayed. Leave empty to disable this feature.
$config['refresh'] = '';
?>