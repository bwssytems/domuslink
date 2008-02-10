<?php
/*
 * English Language File
 *
 */

/* main */
$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['home'] = 'Home';
$lang['lights'] = 'Lights';
$lang['appliances'] = 'Appliances';
$lang['irrigation'] = 'Irrigation';
//$lang['hvac'] = 'HVAC';
//$lang['events'] = 'Events';
//$lang['setup'] = 'Setup';
$lang['login'] = 'Login';
$lang['aliases'] = 'Aliases';
$lang['floorplan'] = 'Floorplan';
$lang['frontend'] = 'Frontend';
$lang['heyusetup'] = 'Heyu';

/* buttons and controls */
$lang['add'] = 'Add';
$lang['addalias'] = 'Add Alias';
$lang['edit'] = 'Edit';
$lang['editalias'] = 'Edit Alias';
$lang['save'] = 'Save';
$lang['cancel'] = 'Cancel';
$lang['delete'] = 'Delete';
$lang['code'] = 'Code';
$lang['label'] = 'Label';
$lang['module'] = 'Module';
$lang['type'] = 'Type';
$lang['actions'] = 'Actions';
$lang['start'] = 'START';
$lang['reload'] = 'RELOAD';
$lang['stop'] = 'STOP';
$lang['login'] = 'Login';

/* titles and headers */
$lang['frontendadmin'] = 'Frontend Configuration';
$lang['heyuconf'] = 'Heyu Configuration';
$lang['heyuconfile'] = 'Heyu Configuration File';
$lang['heyuexec'] = 'Heyu Executable';
$lang['password'] = 'Password';
$lang['language'] = 'Frontend Language';
$lang['imgs'] = 'Menu Images';
$lang['urlpath'] = 'URL Path';
$lang['theme'] = 'Frontend Theme';
$lang['heyubaseloc'] = 'Heyu File Location';
$lang['cols'] = 'Controls per line';
$lang['seclevel'] = 'Security Level';
$lang['pcinterface'] = 'Computer Interface Type';
$lang['refresh'] = 'Page Refresh Timer';
$lang['location'] = 'Location';

/* messages */
$lang['heyustatus'] = 'Heyu Status';
$lang['deleteconfirm'] = 'Are you sure you want to delete this module?';
$lang['enter_password'] = 'Please enter your password to access the administration area.';

/* help texts */
$lang['code_txt'] = 'Enter House and Unit code such as A1. Make sure it isn\'t being used.';
$lang['label_txt'] = 'Enter a description for this module. All spaces will be substituted by a "_" and uppercase letters as lowercase.';
$lang['module_txt'] = 'Choose modules model type.';
$lang['type_txt'] = 'Select what this module will control.';
$lang['heyuexec_txt'] = 'This setting specifies the location of the Heyu exectuable file. Typically this will be in <span class="code">/usr/local/bin/</span>';
$lang['password_txt'] = 'Define a password here to access the setup area of the frontend. Leave <span class="code">blank</span> to disable password.';
$lang['theme_txt'] = 'Select a theme for the GUI.';
$lang['imgs_txt'] = 'Select whether or not you would like to use images instead of text on the menu bar.';
$lang['setup_txt'] = 'This is where you can configure all settings.<br>Please select option from sub-menu bellow "Setup"';
$lang['heyubaseloc_txt'] = 'Heyu base directory - This directory is where Heyu searches for it\'s configuration files, and stores state information';
$lang['language_txt'] = 'Define the language for the frontend here. You can also select auto, which will use the browsers preferred language. In case a language isn\'t found it will default to English';
$lang['heyuconfile_txt'] = 'The configuration file contains several critical pieces of information that the heyu program needs in order to function, plus a number of user options. This file is typically named <span class="code">x10.conf</span> and usually located in <span class="code">/etc/heyu</span> for system wide use.';
$lang['urlpath_txt'] = 'This setting defines the URL path of the frontend. For example if you are running domus.Link in a sub folder say <span class="code">http://your-host/domuslink</span>, then you should define the url path as <span class="code">/domuslink</span>. Leave blank if your are running domus.Link at the root ie <span class="code">http://your-host/</span>';
$lang['cols_txt'] = 'This value defines how many controls appear on the main page per line. Default is 2.';
$lang['seclevel_txt'] = 'Possible values are: <br>0 - None; <br>1 - Only administration; <br>2 - Entire frontend.';
$lang['pcinterface_txt'] = 'The Computer Interface can either be the CM11A or the CM17A. The CM11A is the most common and therefore selected by default.';
$lang['refresh_txt'] = 'By setting this field the main page in which the modules are shown shall be refreshed every X seconds. To disable, leave field blank.';
$lang['location_txt'] ='Select the modules location within your house.';

/* error messages */
$lang['error_not_running'] = '<h1>HEYU IS NOT RUNNING!</h1>Please start heyu!<br />You may need to change permissions to tty port.';
$lang['error_special_chars'] = 'Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>';
$lang['error_wrong_pass'] = 'Your password does not match. Please try again.';

?>