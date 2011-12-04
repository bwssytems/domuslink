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

 $lang["dlurl"]="http://domus.link.co.pt"; 
 $lang["title"]="domus.Link"; 

 $lang["home"]="Home"; 
 $lang["lights"]="belysning"; 
 $lang["appliances"]="Utrustning"; 
 $lang["shutters"]="Shutters"; 
 $lang["irrigation"]="Irrigation"; 
 $lang["other"]="Other"; 
 $lang["login"]="Logga in"; 
 $lang["setup"]="Inställningar"; 
 $lang["aliases"]="Alias"; 
 $lang["floorplan"]="Våning"; 
 $lang["frontend"]="Frontend"; 
 $lang["heyusetup"]="Heyu inställningar"; 
$lang["light"] = "Light"; // PLEASE TRANSLATE
$lang["appliance"] = "Appliance"; // PLEASE TRANSLATE
$lang["shutter"]="Shutter"; // PLEASE TRANSLATE

 $lang["add"]="Lägg till"; 
 $lang["edit"]="Ändra"; 
 $lang["save"]="Spara"; 
 $lang["cancel"]="Avbryt"; 
 $lang["delete"]="Ta bort"; 
 $lang["code"]="Kod"; 
 $lang["label"]="Namn"; 
 $lang["module"]="Modul"; 
 $lang["type"]="Typ"; 
 $lang["actions"]="Val"; 
 $lang["start"]="START"; 
 $lang["reload"]="LADDA OM"; 
 $lang["stop"]="STOPP"; 
 $lang["move"]="Flytta"; 
 $lang["info"]="Info"; 
 $lang["running"]="Aktiv"; 
 $lang["down"]="Avstängd"; 
 $lang["addalias"]="Lägg till Alias"; 
 $lang["editalias"]="Ändra Alias"; 
 $lang["frontendadmin"]="Frontend Konfiguration"; 
 $lang["heyuconf"]="Heyu Konfiguration"; 
 $lang["heyuconfile"]="Heyu Konfigurationsfil"; 
 $lang["heyuexec"]="Heyu binär"; 
 $lang["password"]="Lösenord för inställningsarea"; 
 $lang["language"]="Språk för Frontend"; 
 $lang["imgs"]="Menybilder"; 
 $lang["urlpath"]="URL sökväg"; 
 $lang["theme"]="Tema för Frontend"; 
 $lang["heyubaseloc"]="Heyu Filbas"; 
 $lang["seclevel"]="Säkerhetsnivå"; 
 $lang["pcinterface"]="Datorgränssnitt"; 
 $lang["refresh"]="Siduppdateringstimer"; 
 $lang["location"]="Plats"; 
 $lang["addlocation"]="Lägg till plats"; 
 $lang["editlocation"]="Ändra plats"; 
 $lang["heyustatus"]="Heyu Status"; 
 $lang["enter_password"]="Var vänlig ange ditt lösenord för administration."; 

/* help texts */
 $lang["heyuexec_txt"]="Denna inställning specifierar var i systemet man finner heyu exekverbara fil. Standardsökvägen för denna är /usr/local/bin/"; 
 $lang["password_txt"]="Definiera ett lösenord för att komma åt de valda områdena. Lämna tomt för att inaktivera."; 
 $lang["theme_txt"]="Välj ett tema för GUIT."; 
 $lang["imgs_txt"]="Välj om du vill ha bilder eller bara ren text i menyraden."; 
 $lang["heyubaseloc_txt"]="Heyu filbas - Detta är katalogen som Heyu hittar sina konfigurationsfiler och filer för statusinformation i."; 
 $lang["language_txt"]="Definierar språket för fromtändan. Du kan också sätta denna till auto, vilket låter browsern välja språk istället. Engelska kommer att väljas som språk om språket inte hittas."; 
 $lang["heyuconfile_txt"]="Konfigurationsfilen innehåller flera kritiska delar som heyu behöver för att fungera, plus ett antal användaroptioner. Denna filen är vanligtvis kallad x10.conf och hittas vanligtvis  i katalogen /etc/heyu för att hela systemet skalla ha åtkomst till den."; 
 $lang["urlpath_txt"]= "Leave blank if your are running domus.Link at the root ie http://your-host/. If you are running domus.Link in a special url path, say http://your-host/domuslink, then define the url path as /domuslink (This will require a special apache configuration).";  // PLEASE TRANSLATE 
$lang["hvac_seclevel_txt"] = "Possible values are: 0 - requires admin level; 1 - requires maint level; 2...n - specific access level."; // changed // PLEASE TRANSLATE
 $lang["pcinterface_txt"]="Datorgränssnittet kan antingen vara CM11A eller CM17A. CM11A är den vanligaste förekommande och därför vald som standard."; 
 $lang["refresh_txt"]="Genom att sätta ett värde i detta fält kommer huvudsidan där modulerna visas att uppdatera sig varje X sekund. För att stänga av denna funktion, lämna fältet tomt."; 

/* error messages */
 $lang["error_special_chars"]="Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>"; 
 $lang["error_wrong_pass"]="<b>Fel</b>. Ditt lösenord är felaktigt."; 
 $lang["error_loc_in_use"]="Platsen du försöker ta bort används för närvarande. <br />Ta först bort all användning från <a href=admin/aliases.php>aliases</a> och ta sedan bort platsen.<br />"; 

/* changed */
 $lang["deleteconfirm"]="Tryck OK för att bekräfta borttagning."; 
 $lang["error_not_running"]="<h1>HEYU ÄR INTE STARTAD!</h1>Var god starta heyu!<br />Du behöver eventuellt ändra dina rättigheter för tty-porten, t.ex. /dev/ttyS0 eller /dev/ttyUSB0. Se dokumentation i doc/INSTALL för mer information."; 

/* new */
 $lang["codes_txt"]="Select whether or not you would like to show the unit codes in the buttons."; 
 $lang["codes"]="Unit codes"; 
 $lang["unit"]="Unit"; 
 $lang["command"]="Command"; 
 $lang["log"]="Log"; 
 $lang["progress"]="Progress"; 
 $lang["error"]="Error"; 
 $lang["logout"]="Logout"; 
 $lang["keep_login"]="Keep me logged in"; 
 $lang["upload"]="Upload"; 
 $lang["erase"]="Erase"; 
 $lang["uploadsuccess"]="Upload Successful"; 
 $lang["erasesuccess"]="Erasure Successful"; 
 $lang["upload_erase_log_txt"]="Click <a href='#' onclick='divShowHide(log);'>here</a> to view output log."; 
 $lang["upload_txt"]="To upload the schedule file defined in the <a href=../admin/heyu.php>heyu configuration</a> file and configured in the <a href=../events/timers.php>timer administration</a> section, click the button bellow."; 
 $lang["erase_txt"]="If you would like to erase the entire contents of your computer interface, click the button bellow."; 
 $lang["upload_erase_txt"]="Please note that uploading/erasing takes aproximately 8 seconds. <br />Do not navigate away from this page until process has completed."; 

 $lang["error_no_modules"]="<h1>No modules available!</h1><br />I don't have any modules to show."; 
 $lang["error_filerw"]="not found or not writable!"; 
 $lang["error_filer"]="not found or not readable!"; 

 $lang["about"]="About"; 
 $lang["status"]="Status"; 
 $lang["events"]="Events"; 
 $lang["timers"]="Timers"; 
 $lang["timer"]="Timer"; 
 $lang["triggers"]="Triggers"; 
 $lang["trigger"]="Trigger"; 
 $lang["addtrigger"]="Add Trigger"; 
 $lang["edittrigger"]="Edit Trigger"; 
 $lang["trig_cmd"]="Trigger Command"; 
 $lang["trig_unit"]="Trigger Unit"; 
 $lang["addtimer"]="Add Timer"; 
 $lang["edittimer"]="Edit Timer"; 
 $lang["startdate"]="Start Date"; 
 $lang["enddate"]="End Date"; 
 $lang["ontime"]="On Time"; 
 $lang["offtime"]="Off Time"; 

 $lang["weekdays"]="Weekdays"; 
 $lang["daterange"]="Date Range"; 
 $lang["time"]="Time"; 
 $lang["on"]="On"; 
 $lang["end"]="End"; 
 $lang["off"]="Off"; 
 $lang["enable"]="Enable"; 
 $lang["disable"]="Disable"; 
 $lang["enabled"]="Enabled"; 
 $lang["disabled"]="Disabled"; 
 $lang["execute"]="Execute"; 

 $lang["jan"]="January"; 
 $lang["feb"]="February"; 
 $lang["mar"]="March"; 
 $lang["apr"]="April"; 
 $lang["may"]="May"; 
 $lang["jun"]="June"; 
 $lang["jul"]="July"; 
 $lang["aug"]="August"; 
 $lang["sep"]="September"; 
 $lang["oct"]="October"; 
 $lang["nov"]="November"; 
 $lang["dec"]="December"; 

 $lang["sun"]="Sunday"; 
 $lang["mon"]="Monday"; 
 $lang["tue"]="Tuesday"; 
 $lang["wed"]="Wednesday"; 
 $lang["thu"]="Thursday"; 
 $lang["fri"]="Friday"; 
 $lang["sat"]="Saturday"; 

/* Utility Text */
 $lang["utility"]="Utility"; 
 $lang["utilitytool"]="Utility - Excecute heyu Command"; 
 $lang["arguments"]="Arguments"; 
 $lang["output"]="Output"; 

/* Macro Text */
 $lang["macro"]="Macro"; 
 $lang["macros"]="Macros"; 
 $lang["delay"]="Delay"; 
 $lang["addmacro"]="Add Macro"; 
 $lang["editmacro"]="Edit Macro"; 
 $lang["macro_unit"]="Macro Unit"; 
 $lang["macro_cmd"]="Macro Command"; 
 $lang["obdim"]="On-Bright-Dim"; 
 $lang["brightb"]="Brighten"; 
 $lang["timeraddadv"]="Timer Add Advanced"; 
 $lang["macro_on"]="Macro On"; 
 $lang["macro_off"]="Macro Off"; 
 $lang["timers_macro"]="Advanced Timers"; 
 $lang["addmacrotimer"]="Add Advanced Timer"; 
 $lang["editmacrotimer"]="Edit Advanced Timer"; 
 $lang["simple_timers"]="Simple Timers"; 

 $lang["null"]="Null"; 

/* Advanced Timer Text */
 $lang["dawn"]="Dawn"; 
 $lang["dusk"]="Dusk"; 
 $lang["reminder"]="Reminder"; 
 $lang["dawnlt"]="DawnLT"; 
 $lang["dawngt"]="DawnGT"; 
 $lang["dusklt"]="DuskLT"; 
 $lang["duskgt"]="DuskGT"; 
 $lang["security"]="Security"; 
 $lang["now"]="Now"; 
 $lang["timeroptions"]="Timer Options"; 
 $lang["option"]="Option"; 
 $lang["expire"]="Expire"; 

/* Heyu Config Management Text */
 $lang["heyumgmt"]="Heyu Config Select"; 
 $lang["heyumgmtadmin"]="Heyu Configuration Management"; 
 $lang["heyumgmt_txt"]="This controls which configuration heyu will use. This is based on heyu's capability to select multiple configurations that inlcudes the config for heyu and schedule files."; 
 $lang["heyucurrentconfig"]="Current heyu configuration is"; 
 $lang["heyubaseuse"]="Heyu Base Dir Usage"; 
 $lang["heyubaseuse_txt"]="This switch forces domus.Link to pass explicit path directive using -c to heyu on execution based on the heyu_base setting when set to YES. If set to NO, domus.Link will default its heyu_base path and x10config file settings to /etc/heyu and x10.conf respectively."; 
$lang['heyuindir'] = "in directory";

 $lang["directive"]="Directive"; 
 $lang["comment"]="Comment"; 
 $lang["value"]="Value"; 
 $lang["setupverify"]="Setup Verification"; 
 $lang["aliaslocationtext"]="Derived Alias to Locations and Types from Heyu config"; 
 $lang["continue"]="Continue"; 
 $lang["convert"]="Convert"; 
 $lang["converttext"]="Use displayed alias/locations/types derived from heyu config."; 
 $lang["continuetext"]="Continue without conversion of derived alias/locations/types."; 
 $lang["show"]="Show"; 
 $lang["hide"]="Hide"; 
 $lang["exitbrowser"]="Exit your browser and try again."; 
 $lang["addschedfile"]="Add Schedule File"; 
 $lang["noscheddefined"]="No schedule file defined. Check heyu configuration."; 
 $lang["diagnostic"]="Diagnostic"; 
 $lang["diagnostictext"]="domus.Link Diagnostics"; 
 $lang["diagnosticstatus"]="Diagnostic status - click to check"; 
 $lang["statusinfo"]="Click for status info"; 
 $lang["systemuptime"]="System Uptime"; 

/* HVAC Text */
$lang["hvac"] = "HVAC"; // PLEASE TRANSLATE
$lang["temperature"] = "Temperature"; // PLEASE TRANSLATE
$lang["hvacmode"] = "Mode"; // PLEASE TRANSLATE
$lang["setpoint"] = "Setpoint"; // PLEASE TRANSLATE
$lang["OFF"] = "OFF"; // PLEASE TRANSLATE
$lang["ON"] = "ON"; // PLEASE TRANSLATE
$lang["HEAT"] = "HEAT"; // PLEASE TRANSLATE
$lang["COOL"] = "COOL"; // PLEASE TRANSLATE
$lang["AUTO"] = "AUTO"; // PLEASE TRANSLATE
$lang["hvachousecode"] = "HVAC House Code"; // PLEASE TRANSLATE
$lang["hvachousecode_txt"] = "Possible values are: None; A-P. If this is set, it will show the temperature, mode and setpoint in the status bar of the selected thermostat"; // PLEASE TRANSLATE

$lang["YES"] = "YES"; // PLEASE TRANSLATE
$lang["NO"] = "NO"; // PLEASE TRANSLATE

$lang["diagnosticstatususer"] = "Diagnostic status"; //new // PLEASE TRANSLATE
$lang["statusinfouser"] = "Status of heyu"; // new // PLEASE TRANSLATE
$lang["users"] = "Users"; // PLEASE TRANSLATE
$lang["secleveltype"] = "Security Level Type"; // PLEASE TRANSLATE
$lang["adduser"] = "Add User"; // PLEASE TRANSLATE
$lang["edituser"] = "Edit User"; // PLEASE TRANSLATE
$lang["username"] = "Username"; // PLEASE TRANSLATE
$lang["secleveltypeexact"] = "Exact"; // PLEASE TRANSLATE
$lang["secleveltypegreater"] = "Greater"; // PLEASE TRANSLATE
$lang["usertypepin"] = "PIN"; // PLEASE TRANSLATE
$lang["usertypeuser"] = "User"; // PLEASE TRANSLATE
$lang["group"] = "Group"; // PLEASE TRANSLATE
$lang["groups"] = "Groups"; // PLEASE TRANSLATE
$lang["imagename"] = "Image Name"; // PLEASE TRANSLATE
$lang["addgroups"] = "Add Group"; // PLEASE TRANSLATE
$lang["editgroups"] = "Edit Group"; // PLEASE TRANSLATE
$lang["themeview_txt"] = "Select a theme view for the theme. Either select typed for the default view by module type or grouped for the custom user grouping."; // PLEASE TRANSLATE
$lang["themeview"] = "Theme View"; // PLEASE TRANSLATE
$lang["themeviewinfo"] = "This sets the view of domus.Link to either builtin typed or custom user setup grouped"; // PLEASE TRANSLATE
$lang["thememobile"] = "Mobile Theme"; // PLEASE TRANSLATE
$lang["thememobile_txt"] = "Select a theme for the autodetect mobile theme."; // PLEASE TRANSLATE
$lang["mobileselect"] = "Mobile Select"; // PLEASE TRANSLATE
$lang["mobileselect_txt"] = " A list of strings to search aginst the http_user_agent to set the mobile theme automatically. This is a comma separated list. The search will be case insensitive."; // PLEASE TRANSLATE
$lang["refreshinfo"] = "Refresh is on for "; // PLEASE TRANSLATE
$lang["menu"] = "Menu"; // PLEASE TRANSLATE
$lang["newloc"] = "Enter New Location"; // PLEASE TRANSLATE
$lang["OR"] = "OR"; // PLEASE TRANSLATE
$lang["domussecurity"] = "domus.Link Security"; // PLEASE TRANSLATE
$lang["use_domus_security_txt"] = "This sets the control for security usage in domus.Link. The default is ON. !!!! WARNING !!!! If this is set to OFF, there is no guarantee of access to the system that domus.Link is running on as there will be no access restriction. If you expose this interface outside of the machine (i.e. To the internet) and the security is OFF, you will be open to security vulnerabilities to your system."; // PLEASE TRANSLATE
?>
