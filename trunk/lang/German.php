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

 $lang["home"]="Startseite"; 
 $lang["lights"]="Lampen"; 
 $lang["appliances"]="Schalter"; 
 $lang["shutters"]="Jalousien"; 
 $lang["irrigation"]="Bewässerung"; 
 $lang["other"]="Weiteres"; 
 $lang["login"]="Anmeldung"; 
 $lang["setup"]="Konfiguration"; 
 $lang["aliases"]="Aliase"; 
 $lang["floorplan"]="Hausplan"; 
 $lang["frontend"]="Oberfläche"; 
 $lang["heyusetup"]="Heyu"; 
$lang["light"] = "Light"; // PLEASE TRANSLATE
$lang["appliance"] = "Appliance"; // PLEASE TRANSLATE
$lang["shutter"]="Shutter"; // PLEASE TRANSLATE

 $lang["add"]="Hinzufügen"; 
 $lang["edit"]="Editieren"; 
 $lang["save"]="Speichern"; 
 $lang["cancel"]="Abbrechen"; 
 $lang["delete"]="Löschen"; 
 $lang["code"]="Hauscode"; 
 $lang["label"]="Name"; 
 $lang["module"]="Modul"; 
 $lang["type"]="Typ"; 
 $lang["actions"]="Aktionen"; 
 $lang["start"]="start"; 
 $lang["reload"]="reload"; 
 $lang["stop"]="stop"; 
 $lang["move"]="Verschieben"; 
 $lang["info"]="Info"; 
 $lang["running"]="läuft"; 
 $lang["down"]="Down"; 
 $lang["addalias"]="Aliase hinzufügen"; 
 $lang["editalias"]="Aliase bearbeiten"; 
 $lang["frontendadmin"]="Konfiguration Oberfläche"; 
 $lang["heyuconf"]="Heyu Konfiguration"; 
 $lang["heyuconfile"]="Heyu Konfigurationsdatei"; 
 $lang["heyuexec"]="Pfad zu Heyu"; 
 $lang["password"]="Passwort"; 
 $lang["language"]="Sprache Oberfläche"; 
 $lang["imgs"]="Menü Bilder"; 
 $lang["urlpath"]="URL Pfad"; 
 $lang["theme"]="Stil Oberfläche"; 
 $lang["heyubaseloc"]="Heyu Basispfad"; 
 $lang["seclevel"]="Sicherheitsstufe"; 
 $lang["pcinterface"]="Computerinterface"; 
 $lang["refresh"]="Aktualisierungszeit"; 
 $lang["location"]="Raum"; 
 $lang["addlocation"]="Raum hinzufügen"; 
 $lang["editlocation"]="Raum bearbeiten"; 
 $lang["heyustatus"]="Heyu Status"; 
 $lang["enter_password"]="Bitte Passwort eingeben um in den Administratrionsbereich zu gelangen."; 

/* help texts */
 $lang["heyuexec_txt"]="In dieser Einstellung steht der Pfad für die ausfühbare Datei. Normalerweise wird dies /usr/local/bin/ sein"; 
 $lang["password_txt"]="Gib ein Passwort für den Zugriff auf beschränkte Bereiche ein. Wird kein Passwort eingegeben, so erfolgt der Zugriff ohne Einschränkung."; 
 $lang["theme_txt"]="Wähle einen Stil für die GUI."; 
 $lang["imgs_txt"]="Wähle aus, ob du Bilder statt Text im Menü haben willst."; 
 $lang["heyubaseloc_txt"]="In diesem Pfad legt Heyu seine Konfigurationsdateien ab und speichert Statusinformationen."; 
 $lang["language_txt"]="Wähle die Sprache für die Oberfläche. Du kannst auch auto wählen - dann wird die vom Browser bevorzugte Sprache gewählt."; 
 $lang["heyuconfile_txt"]="Diese Datei heißt meist x10.conf und wird normalerweise auf /etc/heyu/ gespeichert."; 
 $lang["urlpath_txt"]= "Leave blank if your are running domus.Link at the root ie http://your-host/. If you are running domus.Link in a special url path, say http://your-host/domuslink, then define the url path as /domuslink (This will require a special apache configuration).";  // PLEASE TRANSLATE 
$$lang["hvac_seclevel_txt"] = "Possible values are: 0 - requires admin level; 1 - requires maint level; 2...n - specific access level."; // changed // PLEASE TRANSLATE
 $lang["pcinterface_txt"]="Als Computerinterface kann entweder  CM11A oder CM17A gewählt werden. CM11A ist das meist verwendete und daher als Standard ausgewählt."; 
 $lang["refresh_txt"]="Hier kannst du (in Sekunden) eintragen, in welchem Intervall der Inhalt aktualisiert werden soll. Wenn du keine automatische Aktualisierung möchtest, lasse diesen Wert leer."; 

/* error messages */
 $lang["error_special_chars"]="Es sind keine Sonderzeichen bei den Bezeichnungen erlaubt.<br><br>Versuche es noch einmal. <a href=admin/aliases.php>Back</a>"; 
 $lang["error_wrong_pass"]="<b>Fehler</b>. Falsches Passwort."; 
 $lang["error_loc_in_use"]="Der Raum den du gerade löschen möchtest ist gerade in Verwendung. <br />Entferne zuerst alle Verwendungen aus <a href=admin/aliases.php>aliases</a> dann lösche den Raum.<br />"; 

/* changed */
 $lang["deleteconfirm"]="Willst du diesen Eintrag wirklich löschen?"; 
 $lang["error_not_running"]="<h1>Heyu läuft nicht!</h1><br />Bitte starte heyu, indem du auf den start-Link drückst.<br />Eventuell musst du deine Berechtigungen auf den tty/serial Port ändern. <br />Kontrolliere auch, dass heyu nicht bereits läuft indem du 'heyu stop' als root eingibst."; 

/* new */
 $lang["codes_txt"]="Entscheide, ob die Unit Codes bei den Schaltknöpfen angezeigt werden sollen."; 
 $lang["codes"]="Geräte Codes (unit codes)"; 
 $lang["unit"]="Gerät (Unit)"; 
 $lang["command"]="Befehl"; 
 $lang["log"]="Log"; 
 $lang["progress"]="Fortschritt"; 
 $lang["error"]="Fehler"; 
 $lang["logout"]="Abmelden"; 
 $lang["keep_login"]="Angemeldet bleiben"; 
 $lang["upload"]="Hochladen"; 
 $lang["erase"]="Löschen"; 
 $lang["uploadsuccess"]="Hochladen erfolgreich"; 
 $lang["erasesuccess"]="Löschen erfolgreich"; 
 $lang["upload_erase_log_txt"]="<a href='#' onclick='divShowHide(log);'>Hier</a> drücken um den Output log zu sehen."; 
 $lang["upload_txt"]="Zum Hochladen des schedule file, welcher in der Datei <a href=../admin/heyu.php>heyu configuration</a> und  <a href=../events/timers.php>timer administration</a> Sektion konfiguriert ist, drücke den Knopf darunter."; 
 $lang["erase_txt"]="Zum Löschen der gesamten Einstellungen des Computer Interfaces drücke den Knopf darunter."; 
 $lang["upload_erase_txt"]="Bitte beachten, dass das Hochladen/Löschen ungefähr 8 Sekunden dauern wird. <br />Keinesfalls in der Seite herumnavigieren, bevor der Prozess abgeschlossen ist!"; 

 $lang["error_no_modules"]="<h1>Keine Module verfügbar!</h1><br />Es können keine Module angezeigt werden."; 
 $lang["error_filerw"]="nicht gefunden oder nicht beschreibbar!"; 
 $lang["error_filer"]="nicht gefunden oder nicht lesbar!"; 

 $lang["about"]="Über"; 
 $lang["status"]="Status"; 
 $lang["events"]="Ereignisse (Events)"; 
 $lang["timers"]="Timer"; 
 $lang["timer"]="Timer"; 
 $lang["triggers"]="Trigger"; 
 $lang["trigger"]="Trigger"; 
 $lang["addtrigger"]="Trigger hinzufügen"; 
 $lang["edittrigger"]="Trigger bearbeiten"; 
 $lang["trig_cmd"]="Trigger Befehl"; 
 $lang["trig_unit"]="Trigger Einheit"; 
 $lang["addtimer"]="Timer hinzufügen"; 
 $lang["edittimer"]="Timer bearbeiten"; 
 $lang["startdate"]="Startdatum"; 
 $lang["enddate"]="Enddatum"; 
 $lang["ontime"]="Einschaltzeit"; 
 $lang["offtime"]="Abschaltzeit"; 

 $lang["weekdays"]="Wochentage"; 
 $lang["daterange"]="Zeitraum"; 
 $lang["time"]="Zeit"; 
 $lang["on"]="Ein"; 
 $lang["end"]="Ende"; 
 $lang["off"]="Aus"; 
 $lang["enable"]="aktivieren"; 
 $lang["disable"]="deaktivieren"; 
 $lang["enabled"]="aktiviert"; 
 $lang["disabled"]="deaktiviert"; 
 $lang["execute"]="Ausführen"; 

 $lang["jan"]="Jänner"; 
 $lang["feb"]="Februar"; 
 $lang["mar"]="März"; 
 $lang["apr"]="April"; 
 $lang["may"]="Mai"; 
 $lang["jun"]="Juni"; 
 $lang["jul"]="Juli"; 
 $lang["aug"]="August"; 
 $lang["sep"]="September"; 
 $lang["oct"]="Oktober"; 
 $lang["nov"]="November"; 
 $lang["dec"]="Dezember"; 

 $lang["sun"]="Sonntag"; 
 $lang["mon"]="Montag"; 
 $lang["tue"]="Dienstag"; 
 $lang["wed"]="Mittwoch"; 
 $lang["thu"]="Donnerstag"; 
 $lang["fri"]="Freitag"; 
 $lang["sat"]="Samstag"; 

/* Utility Text */
 $lang["utility"]="Dienstprogramm"; 
 $lang["utilitytool"]="Dienstprogramm - heyu Befehl ausführen"; 
 $lang["arguments"]="Arguments"; 
 $lang["output"]="Ausgabe"; 

/* Macro Text */
 $lang["macro"]="Makro"; 
 $lang["macros"]="Makros"; 
 $lang["delay"]="Verzögerung"; 
 $lang["addmacro"]="Makro hinzufügen"; 
 $lang["editmacro"]="Makro bearbeiten"; 
 $lang["macro_unit"]="Makro Einheit"; 
 $lang["macro_cmd"]="Makro Befehl"; 
 $lang["obdim"]="Ein-hell-dunkel"; 
 $lang["brightb"]="heller"; 
 $lang["timeraddadv"]="Timer erweitert hinzufügen"; 
 $lang["macro_on"]="Makro ein"; 
 $lang["macro_off"]="Makro aus"; 
 $lang["timers_macro"]="erweiterte Timer"; 
 $lang["addmacrotimer"]="erweiterten Timer hinzufügen"; 
 $lang["editmacrotimer"]="erweiterten Timer bearbeiten"; 
 $lang["simple_timers"]="einfache Timer"; 

 $lang["null"]="Null"; 

/* Advanced Timer Text */
 $lang["dawn"]="Morgendämmerung"; 
 $lang["dusk"]="Abenddämmerung"; 
 $lang["reminder"]="Erinnerung"; 
 $lang["dawnlt"]="DawnLT"; 
 $lang["dawngt"]="DawnGT"; 
 $lang["dusklt"]="DuskLT"; 
 $lang["duskgt"]="DuskGT"; 
 $lang["security"]="Sicherheit"; 
 $lang["now"]="jetzt"; 
 $lang["timeroptions"]="Timer Optionen"; 
 $lang["option"]="Option"; 
 $lang["expire"]="Ablaufdatum"; 

/* Heyu Config Management Text */
 $lang["heyumgmt"]="Heyu Konfigurationsauswahl"; 
 $lang["heyumgmtadmin"]="Heyu Konfiguration Verwaltung"; 
 $lang["heyumgmt_txt"]="Hier wird wird festgelegt, welche Konfiguration heyu verwendet. Abhängig von den Möglichkeiten die heyu bietet, können mehrere verschiedene Konfigurationen mit config und schedule Dateien verwendet werden."; 
 $lang["heyucurrentconfig"]="Aktuell ist folgende heyu Konfiguration aktiv"; 
 $lang["heyubaseuse"]="'Heyu Base Dir' Verwendung"; 
$lang["heyubaseuse_txt"] = "This switch forces domus.Link to pass explicit path directive using -c to heyu on execution based on the heyu_base setting when set to YES. If set to NO, domus.Link will default its heyu_base path and x10config file settings to /etc/heyu and x10.conf respectively."; // PLEASE TRANSLATE
$lang['heyuindir'] = "in directory";

 $lang["directive"]="Anweisung"; 
 $lang["comment"]="Kommentar"; 
 $lang["value"]="Wert"; 
 $lang["setupverify"]="Einstellungsüberprüfung"; 
 $lang["aliaslocationtext"]="abgeleitete Alias für Räume and Typen von Heyu Konfiguration"; 
 $lang["continue"]="Fortsetzen"; 
 $lang["convert"]="konvertieren"; 
 $lang["converttext"]="angezeigte alias/locations/types verwenden (abgeleitet von  heyu Konfiguration)"; 
 $lang["continuetext"]="ohne Konvertierung der abgeleiteten alias/locations/types fortsetzen"; 
 $lang["show"]="Anzeigen"; 
 $lang["hide"]="Verstecken"; 
 $lang["exitbrowser"]="Browser beenden und neu versuchen"; 
 $lang["addschedfile"]="Schedule File hinzufügen"; 
 $lang["noscheddefined"]="Kein Schedule file definiert. heyu Konfiguration überprüfen"; 
 $lang["diagnostic"]="Diagnose"; 
 $lang["diagnostictext"]="domus.Link Diagnose"; 
 $lang["diagnosticstatus"]="Diagnose Status - zum Überpüfen klicken"; 
 $lang["statusinfo"]="für Status Info klicken"; 
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
