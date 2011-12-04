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

 $lang["home"]="Hoofdpagina"; 
 $lang["lights"]="Lichten"; 
 $lang["appliances"]="Apparaten"; 
 $lang["shutters"]="Gordijnen/Luiken"; 
 $lang["irrigation"]="Bewatering"; 
 $lang["other"]="Overige"; 
 $lang["login"]="Inloggen"; 
 $lang["setup"]="Installatie"; 
 $lang["aliases"]="Aliassen"; 
 $lang["floorplan"]="Plattegrond"; 
 $lang["frontend"]="Gebruikersinterface"; 
 $lang["heyusetup"]="Heyu"; 
$lang["light"] = "Light"; // PLEASE TRANSLATE
$lang["appliance"] = "Appliance"; // PLEASE TRANSLATE
$lang["shutter"]="Shutter"; // PLEASE TRANSLATE

 $lang["add"]="Toevoegen"; 
 $lang["edit"]="Bewerken"; 
 $lang["save"]="Opslaan"; 
 $lang["cancel"]="Annuleren"; 
 $lang["delete"]="Verwijderen"; 
 $lang["code"]="Code"; 
 $lang["label"]="Label"; 
 $lang["module"]="Module"; 
 $lang["type"]="Type"; 
 $lang["actions"]="Acties"; 
 $lang["start"]="Start"; 
 $lang["reload"]="Herladen"; 
 $lang["stop"]="Stop"; 
 $lang["move"]="Verplaats"; 
 $lang["info"]="Informatie"; 
 $lang["running"]="Actief"; 
 $lang["down"]="Niet actief"; 
 $lang["addalias"]="Alias toevoegen"; 
 $lang["editalias"]="Alias bewerken"; 
 $lang["frontendadmin"]="Configuratie gebruikersinterface"; 
 $lang["heyuconf"]="Heyu configuratie"; 
 $lang["heyuconfile"]="Heyu configuratie bestand"; 
 $lang["heyuexec"]="Uitvoerbaar heyu bestand"; 
 $lang["password"]="Wachtwoord configuratiescherm"; 
 $lang["language"]="Taal gebruikersinterface"; 
 $lang["imgs"]="Menu plaatjes"; 
 $lang["urlpath"]="URL pad"; 
 $lang["theme"]="Thema gebruikersinterface"; 
 $lang["heyubaseloc"]="Heyu bestandslocatie"; 
 $lang["seclevel"]=" Beveiliginsniveau"; 
 $lang["pcinterface"]=" Computer interface type"; 
 $lang["refresh"]=" Interval verversen pagina"; 
 $lang["location"]="Locatie"; 
 $lang["addlocation"]="Locatie toevoegen"; 
 $lang["editlocation"]="Locatie bewerken"; 
 $lang["heyustatus"]="Heyu status"; 
 $lang["enter_password"]="Voer hier je wachtwoord in om toegang te krijgen tot het administratie gedeelte."; 

/* help texts */
 $lang["heyuexec_txt"]="Deze optie geeft aan waar het uitvoerbare bestand van Heyu zich bevindt. Dit bestand is normaal gesproken terug te vinden in <span class='code'>/usr/local/bin/</span>"; 
 $lang["password_txt"]="Geef hier het wachtwoord voor het configuratiescherm op. Laat deze optie <span class='code'>leeg</span> om geen wachtwoord te gebruiken."; 
 $lang["theme_txt"]="Selecteer een thema voor de gebruikersinterface."; 
 $lang["imgs_txt"]="Kies of je plaatjes in het menu wilt gebruiken."; 
 $lang["heyubaseloc_txt"]="Heyu Bestandslocatie - In deze map zoekt Heyu voor de configuratie bestanden en slaat de status informatie op"; 
 $lang["language_txt"]="Geef hier de taal van de gebruikersinterface op. Je kunt ook kiezen voor de optie 'auto'. Deze optie gebruikt dan de voorkeurstaal van de browser. Indien de taal niet bestaat dan zal de Engelse taal worden gebruikt."; 
 $lang["heyuconfile_txt"]="Het configuratie bestand bevat enkele kritische stukken informatie die het Heyu programma nodig heeft om te functioneren, aangevuld met een aantal gebruikersopties. Dit bestand is normaal gesproken x10.conf genaamden is terug te vinden in /etc/heyu om systeem breed te worden gebruikt."; 
 $lang["urlpath_txt"]= "Leave blank if your are running domus.Link at the root ie http://your-host/. If you are running domus.Link in a special url path, say http://your-host/domuslink, then define the url path as /domuslink (This will require a special apache configuration).";  // PLEASE TRANSLATE
$lang["hvac_seclevel_txt"] = "Possible values are: 0 - requires admin level; 1 - requires maint level; 2...n - specific access level."; // changed // PLEASE TRANSLATE
 $lang["pcinterface_txt"]="De computer interface kan CM11A of CM17A  zijn .  De meest voorkomende is de CM11A  en staat daarom als standaard ingesteld."; 
 $lang["refresh_txt"]="Dit veld geeft de interval aan van het verversen van de modules op de hoofdpagina.  Laat dit veld leeg om deze optie niet te gebruiken."; 

/* error messages */
 $lang["error_special_chars"]="Speciale karakters in de Alias tekst zijn niet toegestaan.<br><br>Probeer het opnieuw. <a href=admin/aliases.php>Terug</a>"; 
 $lang["error_wrong_pass"]="<b>Fout</b>. Je wachtwoord is niet correct"; 
 $lang["error_loc_in_use"]="De locatie die je probeert te verwijderen, wordt momenteel gebruikt. <br />Verwijder eerst alle locaties van <a href=admin/aliases.php>aliasen</a> en probeer het dan nogmaal.<br />"; 

/* changed */
 $lang["deleteconfirm"]="Klik op OK om het verwijderen te bevestigen."; 
 $lang["error_not_running"]="<h1>HEYU IS NIET GESTART!</h1>Start heyu opnieuw!<br />Het is mogelijk dat je de rechten voor de tty port moet aanpassen."; 

/* new */
 $lang["codes_txt"]="Kies hier of de de module codes in de buttons wilt tonen."; 
 $lang["codes"]="Unit codes"; 
 $lang["unit"]="Unit"; 
 $lang["command"]="Commando"; 
 $lang["log"]="Log"; 
 $lang["progress"]="Voortgang"; 
 $lang["error"]="Fout"; 
 $lang["logout"]="Uitloggen"; 
 $lang["keep_login"]="Laat mij ingelogd blijven"; 
 $lang["upload"]="Opladen"; 
 $lang["erase"]="Wissen"; 
 $lang["uploadsuccess"]="Opladen voltooid"; 
 $lang["erasesuccess"]="Wissen voltooid"; 
 $lang["upload_erase_log_txt"]="Klik <a href='#' onclick='divShowHide(log);'>hier</a> om hier om de log te bekijken."; 
 $lang["upload_txt"]="Klik op de onderstaande button om het schema bestand uit het <a href=../admin/heyu.php>heyu configuratie</a> bestand en geconfigureerd in de <a href=../events/timers.php>timer administratie</a> sectie op te slaan in de computer interface."; 
 $lang["erase_txt"]="Als je de computer interface wilt wissen, klik op de onderstaande button."; 
 $lang["upload_erase_txt"]="Let op: Het opslaan/wissen duurt ongeveer 8 seconden.<br />Blijf zolang het is proces niet is voltooid op deze pagina."; 

 $lang["error_no_modules"]="<h1>Geen module beschikbaar!</h1><br />Ik kan geen modules tonen."; 
 $lang["error_filerw"]="niet gevonden of niet schrijfbaar!"; 
 $lang["error_filer"]="niet gevonden of niet leesbaar!"; 

 $lang["about"]="Over"; 
 $lang["status"]="Status"; 
 $lang["events"]="Evenementen"; 
 $lang["timers"]="Schakelaars"; 
 $lang["timer"]="Schakelaar"; 
 $lang["triggers"]="Starters"; 
 $lang["trigger"]="Starter"; 
 $lang["addtrigger"]="Starter toevoegen"; 
 $lang["edittrigger"]="Starter bewerken"; 
 $lang["trig_cmd"]="Starter Commando"; 
 $lang["trig_unit"]="Starter Unit"; 
 $lang["addtimer"]="Schakelaar toevoegen"; 
 $lang["edittimer"]="Schakelaar bewerken"; 
 $lang["startdate"]="Startdatum"; 
 $lang["enddate"]="Einddatum"; 
 $lang["ontime"]="Tijd aan"; 
 $lang["offtime"]="Tijd uit"; 

 $lang["weekdays"]="Weekdagen"; 
 $lang["daterange"]="Datum reeks"; 
 $lang["time"]="Tijd"; 
 $lang["on"]="Aan"; 
 $lang["end"]="Eind"; 
 $lang["off"]="Uit"; 
 $lang["enable"]="Activeer"; 
 $lang["disable"]="Deactiveer"; 
 $lang["enabled"]="Geactiveerd"; 
 $lang["disabled"]="Gedeactiveerd"; 
 $lang["execute"]="Uitvoeren"; 

 $lang["jan"]="Januari"; 
 $lang["feb"]="Februari"; 
 $lang["mar"]="Maart"; 
 $lang["apr"]="April"; 
 $lang["may"]="Mei"; 
 $lang["jun"]="Juni"; 
 $lang["jul"]="Juli"; 
 $lang["aug"]="Augustus"; 
 $lang["sep"]="September"; 
 $lang["oct"]="Oktober"; 
 $lang["nov"]="November"; 
 $lang["dec"]="December"; 

 $lang["sun"]="Zondag"; 
 $lang["mon"]="Maandag"; 
 $lang["tue"]="Dinsdag"; 
 $lang["wed"]="Woensdag"; 
 $lang["thu"]="Donderdag"; 
 $lang["fri"]="Vrijdag"; 
 $lang["sat"]="Zaterdag"; 

/* Utility Text */
 $lang["utility"]="Hulpprogramma"; 
 $lang["utilitytool"]="Hulpprogramma  - Voer heyu commando uit"; 
 $lang["arguments"]="Argumenten"; 
 $lang["output"]="Uitvoer"; 

/* Macro Text */
 $lang["macro"]="Macro"; 
 $lang["macros"]="Macros"; 
 $lang["delay"]="Vertraging"; 
 $lang["addmacro"]="Macro toevoegen"; 
 $lang["editmacro"]="Macro bewerken"; 
 $lang["macro_unit"]="Macro-eenheid"; 
 $lang["macro_cmd"]="Macro Commando"; 
 $lang["obdim"]="Aan-Helder-Dim"; 
 $lang["brightb"]="Helder"; 
 $lang["timeraddadv"]="Voeg geavanceerde timer toe"; 
 $lang["macro_on"]="Macro Aan"; 
 $lang["macro_off"]="Macro Uit"; 
 $lang["timers_macro"]="Geadvanceerde timers"; 
 $lang["addmacrotimer"]="Voeg geavanceerde timer toe"; 
 $lang["editmacrotimer"]="Bewerk geavanceerde timer"; 
 $lang["simple_timers"]="Simpele timers"; 

 $lang["null"]="Nul"; 

/* Advanced Timer Text */
 $lang["dawn"]="Zonsopgang"; 
 $lang["dusk"]="Zonsondergang"; 
 $lang["reminder"]="Herinnering"; 
 $lang["dawnlt"]="DawnLT"; 
 $lang["dawngt"]="DawnGT"; 
 $lang["dusklt"]="DuskLT"; 
 $lang["duskgt"]="DuskGT"; 
 $lang["security"]="Beveiliging"; 
 $lang["now"]="Nu"; 
 $lang["timeroptions"]="Timer opties"; 
 $lang["option"]="Optie"; 
 $lang["expire"]="Verloopt"; 

/* Heyu Config Management Text */
 $lang["heyumgmt"]="Heyu configuratie seleteren"; 
 $lang["heyumgmtadmin"]="Heyu configuratie beheer"; 
 $lang["heyumgmt_txt"]="Dit bepaalt welke configuratie heyu gebruikt. Het is gebasseert op het feit dat Heyu meerdere configuraties kan laden. Deze bevatten dan configuratie opties voor heyu zelf en het automatisch uitvoeren van commando's (planningen)"; 
 $lang["heyucurrentconfig"]="De huidige heyu configuratie is"; 
 $lang["heyubaseuse"]="Heyu standaard directory gebruik"; 
 $lang["heyubaseuse_txt"]="Dit vinkje zorgt ervoor dat domus.Link het argument -c aan het heyu commando toevoegt. (indien Ja is geselecteerd). Als Nee is geselecteerd, dan zal domus.Link standaard de waardes uit de gebruikelijke directories en  instellingen gebruiken."; 
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
?>
