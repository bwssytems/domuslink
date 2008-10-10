<?php
#
# domus.Link (Heyu Frontend) Configuration File
#

# --------------
# File locations
# --------------

# Heyu base directory - This directory is where Heyu
# searches for it's configuration files, and stores
# state information
$config['heyu_base'] = '/etc/heyu/';

# heyuconf file - This file is typically named
# x10.conf and usually located in /etc/heyu for
# system wide use
$config['heyuconf'] = $config['heyu_base'].'x10.conf';

# heyuexec setting - This setting specifies the
# location of the Heyu exectuable file. Typically
# this will be in /usr/local/bin/
$config['heyuexec'] = '/usr/local/bin/heyu';

# -----------------
# Frontend Settings
# -----------------

# Frontend password - Define a password here to
# access the setup area of the frontend.
# Leave blank to disable password.
$config['password'] = '123';

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
$config['url_path'] = '/domus.Link';

# Theme - GUI's Theme
$config['theme'] = 'default';

# Images - Select ON or OFF if you want images to be displayed
# in the menu bar instead of text.
$config['imgs'] = 'ON';
?>