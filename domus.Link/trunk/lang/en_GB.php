<?php
/*
 * British English Language File
 *
 */

/** v0.1 **/

$lang['dlurl'] = 'http://icebrian.net/domuslink';
$lang['title'] = 'domus.Link';

$lang['all'] = 'All';
$lang['lights'] = 'Lights';
$lang['appliances'] = 'Appliances';
$lang['irrigation'] = 'Irrigation';
$lang['hvac'] = 'HVAC';
$lang['events'] = 'Events';
$lang['setup'] = 'Setup';

$lang['add'] = 'Add';
$lang['save'] = 'Save';
$lang['cancel'] = 'Cancel';

$lang['frontendadmin'] = 'Frontend Configuration';
$lang['heyuconf'] = 'Heyu Configuration File';
$lang['heyuexec'] = 'Heyu Executable';
$lang['password'] = 'Setup Area Password';
$lang['language'] = 'Frontend Language';
$lang['theme'] = 'Frontend Theme';
$lang['urlpath'] = 'URL Path';

$lang['aliases'] = 'Aliases';
$lang['addalias'] = 'Add Alias';
$lang['editalias'] = 'Edit Alias';
$lang['code'] = 'Code';
$lang['label'] = 'Label';
$lang['module'] = 'Module';
$lang['type'] = 'Type';
$lang['actions'] = 'Actions';
$lang['edit'] = 'Edit';
$lang['delete'] = 'Delete';
$lang['deleteconfirm'] = 'Click on OK to confirm deletion.';

/*** aliases txt ***/
$lang['code_txt'] = 'Enter House and Unit code. Make sure it isnt being used. You can also use ie: "A1,2", in ' .
		'this case select the empty module model.';

$lang['label_txt'] = 'Enter a description for this module. Note all spaces will be substituted with a "_" ' .
		'and uppercase letters will be saved as lowercase';

$lang['module_txt'] = 'Choose modules model type.';

$lang['type_txt'] = 'Select what type of function module will preform';

/*** heyuconf txt ***/
$lang['heyuconf_txt'] = 'The configuration file contains several critical pieces ' .
		'of information that the heyu program needs in order to function, ' .
		'plus a number of user options. This file is typically named <span class="code">x10.conf</span> ' .
		'and usually located in <span class="code">/etc/heyu</span> for system wide use.';

$lang['heyuexec_txt'] = 'This setting specifies the location of the Heyu exectuable ' .
		'file. Typically this will be in <span class="code">/usr/local/bin/</span>';

$lang['password_txt'] = 'Define a password here to access the setup area of the frontend. ' .
		'Leave <span class="code">blank</span> to disable password.';

$lang['language_txt'] = 'Define the language for the frontend here. You can also ' .
		'select auto, which will use the browsers preferred language. In case a language' .
		'is not found it will default to English';

$lang['theme_txt'] = 'Select a theme for the GUI.';

$lang['urlpath_txt'] = 'This setting defines the URL path of the frontend. ' .
		'For example if you are running domus.Link in a sub folder say <span class="code">' .
		'http://your-host/domuslink</span>, then you should define the url path as ' .
		'<span class="code">/domuslink</span>. Leave blank if your are running domus.Link at ' .
		'the root ie <span class="code">http://your-host/</span>';

/*** other txt ***/
$lang['setup_txt'] = 'This is where you can configure all settings.<br>' .
		'Please select option from sub-menu bellow "Setup"';


?>