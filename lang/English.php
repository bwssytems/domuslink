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
$lang["enter_password"] = "Please enter your password to access the administration area.";

/* help texts */
$lang["heyuexec_txt"] = "This setting specifies the location of the Heyu exectuable file. Typically this will be in /usr/local/bin/";
$lang["password_txt"] = "Enter a password to access the selected areas.";
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
$lang["error_special_chars"] = "Special characters in the alias label are not allowed.<br /><br />Please try again. <a href=admin/aliases.php>Back</a>";
$lang["error_wrong_pass"] = "<b>Error</b>. Your password is incorrect.";
$lang["error_loc_in_use"] = "The location you are attempting to remove is currently in use. <br />First remove all usages from <a href=admin/aliases.php>aliases</a> then delete the location.<br />";

/* changed */
$lang["deleteconfirm"] = "Are you sure you want to delete this entry?";
$lang["error_not_running"] = "<h1>Heyu is not running!</h1><br />Please start heyu by clicking on the start link.<br />You may however, need to change permissions to your tty/serial port. <br />Also make sure heyu is not already running. To do so run 'heyu stop' as root.";

/* new */
$lang["codes_txt"] = "Select whether or not you would like to show the unit codes in the buttons.";
$lang["codes"] = "Unit codes";
$lang["unit"] = "Unit";
$lang["command"] = "Command";
$lang["log"] = "Log";
$lang["progress"] = "Progress";
$lang["error"] = "Error";
$lang["logout"] = "Logout";
$lang["keep_login"] = "Keep me logged in";
$lang["upload"] = "Upload";
$lang["erase"] = "Erase";
$lang["uploadsuccess"] = "Upload Successful";
$lang["erasesuccess"] = "Erasure Successful";
$lang["upload_erase_log_txt"] = "Click <a href='#' onclick='divShowHide(log);'>here</a> to view output log.";
$lang["upload_txt"] = "To upload the schedule file defined in the <a href=../admin/heyu.php>heyu configuration</a> file and configured in the <a href=../events/timers.php>timer administration</a> section, click the button bellow.";
$lang["erase_txt"] = "If you would like to erase the entire contents of your computer interface, click the button bellow.";
$lang["upload_erase_txt"] = "Please note that uploading/erasing takes aproximately 8 seconds. <br />Do not navigate away from this page until process has completed.";

$lang["error_no_modules"] = "<h1>No modules available!</h1><br />I don't have any modules to show.";
$lang["error_filerw"] = "not found or not writable!";
$lang["error_filer"] = "not found or not readable!";

$lang["about"] = "About";
$lang["status"] = "Status";
$lang["events"] = "Events";
$lang["timers"] = "Timers";
$lang["timer"] = "Timer";
$lang["triggers"] = "Triggers";
$lang["trigger"] = "Trigger";
$lang["addtrigger"] = "Add Trigger";
$lang["edittrigger"] = "Edit Trigger";
$lang["trig_cmd"] = "Trigger Command";
$lang["trig_unit"] = "Trigger Unit";
$lang["addtimer"] = "Add Timer";
$lang["edittimer"] = "Edit Timer";
$lang["startdate"] = "Start Date";
$lang["enddate"] = "End Date";
$lang["ontime"] = "On Time";
$lang["offtime"] = "Off Time";

$lang["weekdays"] = "Weekdays";
$lang["daterange"] = "Date Range";
$lang["time"] = "Time";
$lang["on"] = "On";
$lang["end"] = "End";
$lang["off"] = "Off";
$lang["enable"] = "Enable";
$lang["disable"] = "Disable";
$lang["enabled"] = "Enabled";
$lang["disabled"] = "Disabled";
$lang["execute"] = "Execute";

$lang["jan"] = "January";
$lang["feb"] = "February";
$lang["mar"] = "March";
$lang["apr"] = "April";
$lang["may"] = "May";
$lang["jun"] = "June";
$lang["jul"] = "July";
$lang["aug"] = "August";
$lang["sep"] = "September";
$lang["oct"] = "October";
$lang["nov"] = "November";
$lang["dec"] = "December";

$lang["sun"] = "Sunday";
$lang["mon"] = "Monday";
$lang["tue"] = "Tuesday";
$lang["wed"] = "Wednesday";
$lang["thu"] = "Thursday";
$lang["fri"] = "Friday";
$lang["sat"] = "Saturday";

/* Utility Text */
$lang["utility"] = "Utility";
$lang["utilitytool"] = "Utility - Excecute heyu Command";
$lang["arguments"] = "Arguments";
$lang["output"] = "Output";

?>
