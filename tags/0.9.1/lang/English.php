<?php
/*
 * English Language File
 *
 */

$lang["dlurl"] = "http://domus.link.co.pt";
$lang["title"] = "domus.Link";

$lang["home"] = "Home";
$lang["lights"] = "Lights";
$lang["appliances"] = "Appliances";
$lang["irrigation"] = "Irrigation";
$lang["login"] = "Login";
$lang["setup"] = "Setup";
$lang["aliases"] = "Aliases";
$lang["floorplan"] = "Floorplan";
$lang["frontend"] = "Frontend";
$lang["heyusetup"] = "Heyu";

$lang["add"] = "Add";
$lang["edit"] = "Edit";
$lang["save"] = "Save";
$lang["cancel"] = "Cancel";
$lang["delete"] = "Delete";
$lang["code"] = "Code";
$lang["label"] = "Label";
$lang["module"] = "Module";
$lang["type"] = "Type";
$lang["actions"] = "Actions";
$lang["start"] = "start";
$lang["reload"] = "reload";
$lang["stop"] = "stop";
$lang["login"] = "Login";
$lang["move"] = "Move";
$lang["info"] = "Info";
$lang["running"] = "Running";
$lang["down"] = "Down";
$lang["addalias"] = "Add Alias";
$lang["editalias"] = "Edit Alias";
$lang["frontendadmin"] = "Frontend Configuration";
$lang["heyuconf"] = "Heyu Configuration";
$lang["heyuconfile"] = "Heyu Configuration File";
$lang["heyuexec"] = "Heyu Executable";
$lang["password"] = "Password";
$lang["language"] = "Frontend Language";
$lang["imgs"] = "Menu Images";
$lang["urlpath"] = "URL Path";
$lang["theme"] = "Frontend Theme";
$lang["heyubaseloc"] = "Heyu File Location";
$lang["seclevel"] = "Security Level";
$lang["pcinterface"] = "Computer Interface Type";
$lang["refresh"] = "Page Refresh Timer";
$lang["location"] = "Location";
$lang["addlocation"] = "Add Location";
$lang["editlocation"] = "Edit Location";
$lang["heyustatus"] = "Heyu status";
$lang["deleteconfirm"] = "Are you sure you want to delete this module?";
$lang["enter_password"] = "Please enter your password to access the administration area.";

/* help texts */
$lang["heyuexec_txt"] = "This setting specifies the location of the Heyu exectuable file. Typically this will be in /usr/local/bin/";
$lang["password_txt"] = "Define a password to access the selected areas.";
$lang["theme_txt"] = "Select a theme for the GUI.";
$lang["imgs_txt"] = "Select whether or not you would like to use images instead of text on the menu bar.";
$lang["heyubaseloc_txt"] = "Heyu base directory - This directory is where Heyu searches for it's configuration files, and stores state information.";
$lang["language_txt"] = "Define the language for the frontend here. You can also select auto, which will use the browsers preferred language.";
$lang["heyuconfile_txt"] = "This file is typically named x10.conf and usually located in /etc/heyu/ for system wide use.";
$lang["urlpath_txt"] = "If you are running domus.Link in a folder say http://your-host/domuslink, then define the url path as /domuslink. Leave blank if your are running domus.Link at the root ie http://your-host/";
$lang["seclevel_txt"] = "Possible values are: 0 - None; 1 - Only setup area; 2 - Entire frontend.";
$lang["pcinterface_txt"] = "The Computer Interface can either be the CM11A or the CM17A. The CM11A is the most common and therefore selected by default.";
$lang["refresh_txt"] = "By setting this field the main page in which the modules are shown shall be refreshed every X seconds. To disable, leave field blank.";

/* error messages */
$lang["error_not_running"] = "<h1>Heyu is not running!</h1><br />Please start heyu by clicking on the start link located on the footer.<br />You may however, need to change permissions to your tty/serial port. <br />Also make sure heyu is not already running. To do so run 'heyu stop' as root.";
$lang["error_special_chars"] = "Special characters in the alias label are not allowed.<br /><br />Please try again. <a href=admin/aliases.php>Back</a>";
$lang["error_wrong_pass"] = "<b>Error</b>. Your password is incorrect.";
$lang["error_loc_in_use"] = "The location you are attempting to remove is currently in use. <br />First remove all usages from <a href=admin/aliases.php>aliases</a> then delete the location.<br />";

?>
