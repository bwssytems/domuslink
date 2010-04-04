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
$lang["heyuexec_txt"]="Denna inställning specifierar var i systemet man finner heyu exekverbara fil. Standardsökvägen för denna är /usr/local/bin/";
$lang["password_txt"]="Definiera ett lösenord för att komma åt de valda områdena. Lämna tomt för att inaktivera.";
$lang["theme_txt"]="Välj ett tema för GUIT.";
$lang["imgs_txt"]="Välj om du vill ha bilder eller bara ren text i menyraden.";
$lang["heyubaseloc_txt"]="Heyu filbas - Detta är katalogen som Heyu hittar sina konfigurationsfiler och filer för statusinformation i.";
$lang["language_txt"]="Definierar språket för fromtändan. Du kan också sätta denna till auto, vilket låter browsern välja språk istället. Engelska kommer att väljas som språk om språket inte hittas.";
$lang["heyuconfile_txt"]="Konfigurationsfilen innehåller flera kritiska delar som heyu behöver för att fungera, plus ett antal användaroptioner. Denna filen är vanligtvis kallad x10.conf och hittas vanligtvis  i katalogen /etc/heyu för att hela systemet skalla ha åtkomst till den.";
$lang["urlpath_txt"]="Denna inställningen definierar sökvägen till frontändan. Till exempel om du kör domus.Link i en katalog som http://your-host/domuslink, skulle URL sökväg bli /domuslink. Lämna denna tom om du kör domus.Link i din webbrot dvs. http://your-host/";
$lang["seclevel_txt"]="Möjliga värden är: 0 - Inga; 1 - Endast administration; 2 - Hela frontend.";
$lang["pcinterface_txt"]="Datorgränssnittet kan antingen vara CM11A eller CM17A. CM11A är den vanligaste förekommande och därför vald som standard.";
$lang["refresh_txt"]="Genom att sätta ett värde i detta fält kommer huvudsidan där modulerna visas att uppdatera sig varje X sekund. För att stänga av denna funktion, lämna fältet tomt.";
$lang["error_special_chars"]="Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>";
$lang["error_wrong_pass"]="<b>Fel</b>. Ditt lösenord är felaktigt.";
$lang["error_loc_in_use"]="Platsen du försöker ta bort används för närvarande. <br />Ta först bort all användning från <a href=admin/aliases.php>aliases</a> och ta sedan bort platsen.<br />";
$lang["deleteconfirm"]="Tryck OK för att bekräfta borttagning.";
$lang["error_not_running"]="<h1>HEYU ÄR INTE STARTAD!</h1>Var god starta heyu!<br />Du behöver eventuellt ändra dina rättigheter för tty-porten, t.ex. /dev/ttyS0 eller /dev/ttyUSB0. Se dokumentation i doc/INSTALL för mer information.";
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
$lang["utility"]="Utility";
$lang["utilitytool"]="Utility - Excecute heyu Command";
$lang["arguments"]="Arguments";
$lang["output"]="Output";
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
$lang["heyumgmt"]="Heyu Config Select";
$lang["heyumgmtadmin"]="Heyu Configuration Management";
$lang["heyumgmt_txt"]="This controls which configuration heyu will use. This is based on heyu's capability to select multiple configurations that inlcudes the config for heyu and schedule files.";
$lang["heyucurrentconfig"]="Current heyu configuration is";
$lang["heyubaseuse"]="Heyu Base Dir Usage";
$lang["heyubaseuse_txt"]="This switch forces domus.Link to pass explicit path directive using -c to heyu on execution based on the heyu_base setting when set to YES. If set to NO, domus.Link will default its heyu_base path and x10config file settings to /etc/heyu and x10.conf respectively.";
$lang["heyuindir"]="in directory";

?>