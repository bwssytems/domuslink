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
 $lang["lights"]="Lampen"; 
 $lang["appliances"]="Schalter"; 
$lang["shutters"]="Shutters"; // PLEASE TRANSLATE
 $lang["irrigation"]="Bewässerung"; 
$lang["other"] = "Other"; // PLEASE TRANSLATE
 $lang["login"]="Login"; 
 $lang["setup"]="Konfiguration"; 
 $lang["aliases"]="Geräte"; 
 $lang["floorplan"]="Hausplan"; 
 $lang["frontend"]="Oberfläche"; 
 $lang["heyusetup"]="Heyu"; 

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
 $lang["addalias"]="Geräte hinzufügen"; 
 $lang["editalias"]="Geräte editieren"; 
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
 $lang["editlocation"]="Raum editieren"; 
 $lang["heyustatus"]="Heyu Status"; 
 $lang["enter_password"]="Bitte Passwort eingeben um in den geschützten Bereich zu gelangen."; 

/* help texts */
 $lang["heyuexec_txt"]="In dieser Einstellung steht der Pfad für die ausfühbare Datei. Normalerweise wird dies /usr/local/bin/ sein"; 
 $lang["password_txt"]="Gib ein Passwort für den Zugriff auf beschränkte Bereiche ein. Wird kein Passwort eingegeben, so erfolgt der Zugriff ohne Einschränkung."; 
 $lang["theme_txt"]="Wähle einen Stil für die GUI."; 
 $lang["imgs_txt"]="Wähle aus, ob du Bilder statt Text im Menü haben willst."; 
 $lang["heyubaseloc_txt"]="In diesem Pfad legt Heyu seine Konfigurationsdateien ab und speichert Statusinformationen."; 
 $lang["language_txt"]="Wähle die Sprache für die Oberfläche. Du kannst auch auto wählen - dann wird die vom Browser bevorzugte Sprache gewählt."; 
 $lang["heyuconfile_txt"]="Diese Datei heißt meist x10.conf und wird normalerweise auf /etc/heyu/ gespeichert."; 
 $lang["urlpath_txt"]="Wenn du domus.Link in ein einem Unterordner z.B.  http://dein-host/domuslink laufen lässt, dann definiere den url-Pfad als /domus.Link. Lass es leer, wenn du domus.Link im root laufen lässt - z.B. http://dein-host/"; 
 $lang["seclevel_txt"]="Mögliche Werte: 0 - keine; 1 - nur für die Konfiguration; 2 - ganze Oberfläche."; 
 $lang["pcinterface_txt"]="Als Computerinterface kann entweder  CM11A oder CM17A gewählt werden. CM11A ist das meist verwendete und daher als Standard ausgewählt."; 
 $lang["refresh_txt"]="Hier kannst du eintragen, in wieviel Sekunden der Inhalt aktualisiert werden soll. Um die Aktualisierung abzuschalten lass einfach den Wert leer."; 

/* error messages */
 $lang["error_special_chars"]="Es sind keine Sonderzeichen bei den Bezeichnungen erlaubt.<br><br>Versuche es noch einmal. <a href=admin/aliases.php>Back</a>"; 
 $lang["error_wrong_pass"]="<b>Fehler</b>. Falsches Passwort."; 
 $lang["error_loc_in_use"]="Der Raum den du gerade löschen möchtest ist gerade in Verwendung. <br />Entferne zuerst alle Verwendungen aus <a href=admin/aliases.php>aliases</a> dann lösche den Raum.<br />"; 

/* changed */
 $lang["deleteconfirm"]="Willst du diesen Eintrag wirklich löschen?"; 
 $lang["error_not_running"]="<h1>Heyu läuft nicht!</h1><br />Bitte starte heyu, indem du auf den start-Link drückst.<br />Eventuell musst du deine Berechtigungen auf den tty/serial Port ändern. <br />Kontrolliere auch, dass heyu nicht bereits läuft indem du 'heyu stop' als root eingibst."; 

/* new */
 $lang["codes_txt"]="Entscheide, ob die Unit Codes bei den Schaltknöpfen angezeigt werden sollen."; 
 $lang["codes"]="Unit codes"; 
 $lang["unit"]="Unit"; 
 $lang["command"]="Befehl"; 
 $lang["log"]="Log"; 
 $lang["progress"]="Fortschritt"; 
 $lang["error"]="Fehler"; 
 $lang["logout"]="Logout"; 
 $lang["keep_login"]="Angemeldet bleiben"; 
 $lang["upload"]="Hochladen"; 
 $lang["erase"]="Löschen"; 
 $lang["uploadsuccess"]="Hochladen erfolgreich"; 
 $lang["erasesuccess"]="Löschen erfolgreich"; 
 $lang["upload_erase_log_txt"]="Klick <a href='#' onclick='divShowHide(log);'>hier</a> um den Output log zu sehen."; 
 $lang["upload_txt"]="Zum Hochladen des schedule file, welcher in  <a href=../admin/heyu.php>heyu configuration</a> Datei und konfiguriert in <a href=../events/timers.php>timer administration</a> Sektion, drücke den Schaltknopf."; 
 $lang["erase_txt"]="Zum Löschen der gesamten Einstellungen des Computer Interfaces drücke den Knopf."; 
 $lang["upload_erase_txt"]="Bitte beachten, dass das Hochladen/Löschen ungefähr 8 Sekunden dauern wird. <br />Keinesfalls in der Seite herumnavigieren, bevor der Prozess abgeschlossen ist!"; 

 $lang["error_no_modules"]="<h1>Keine Module verfügbar!</h1><br />Es können keine Module angezeigt werden."; 
 $lang["error_filerw"]="nicht gefunden oder nicht beschreibbar!"; 
 $lang["error_filer"]="nicht gefunden oder nicht lesbar!"; 

 $lang["about"]="Über"; 
 $lang["status"]="Status"; 
 $lang["events"]="Events"; 
 $lang["timers"]="Timers"; 
 $lang["timer"]="Timer"; 
 $lang["triggers"]="Triggers"; 
 $lang["trigger"]="Trigger"; 
 $lang["addtrigger"]="Trigger hinzufügen"; 
 $lang["edittrigger"]="Trigger bearbeiten"; 
 $lang["trig_cmd"]="Trigger Befehl"; 
 $lang["trig_unit"]="Trigger Unit"; 
 $lang["addtimer"]="Timer hinzufügen"; 
 $lang["edittimer"]="Timer bearbeiten"; 
 $lang["startdate"]="Startdatum"; 
 $lang["enddate"]="Enddatum"; 
 $lang["ontime"]="On Time"; 
 $lang["offtime"]="Off Time"; 

 $lang["weekdays"]="Wochentage"; 
 $lang["daterange"]="Zeitraum"; 
 $lang["time"]="Zeit"; 
 $lang["on"]="Ein"; 
 $lang["end"]="Ende"; 
 $lang["off"]="Aus"; 
 $lang["enable"]="Enable"; 
 $lang["disable"]="Disable"; 
 $lang["enabled"]="Enabled"; 
 $lang["disabled"]="Disabled"; 
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
 $lang["utility"]="Utility";  // PLEASE TRANSLATE
 $lang["utilitytool"]="Utility - Excecute heyu Command";  // PLEASE TRANSLATE
 $lang["arguments"]="Arguments";  // PLEASE TRANSLATE
 $lang["output"]="Output";  // PLEASE TRANSLATE

/* Macro Text */
$lang["macro"] = "Macro"; // PLEASE TRANSLATE
$lang["macros"] = "Macros"; // PLEASE TRANSLATE
$lang["delay"] = "Delay"; // PLEASE TRANSLATE
$lang["addmacro"] = "Add Macro"; // PLEASE TRANSLATE
$lang["editmacro"] = "Edit Macro"; // PLEASE TRANSLATE
$lang["macro_unit"] = "Macro Unit"; // PLEASE TRANSLATE
$lang["macro_cmd"] = "Macro Command"; // PLEASE TRANSLATE
$lang["obdim"] = "On-Bright-Dim"; // PLEASE TRANSLATE
$lang["brightb"] = "Brighten"; // PLEASE TRANSLATE
$lang["timeraddadv"] = "Timer Add Advanced"; // PLEASE TRANSLATE
$lang["macro_on"] = "Macro On"; // PLEASE TRANSLATE
$lang["macro_off"] = "Macro Off"; // PLEASE TRANSLATE
$lang["timers_macro"] = "Advanced Timers"; // PLEASE TRANSLATE
$lang["addmacrotimer"] = "Add Advanced Timer"; // PLEASE TRANSLATE
$lang["editmacrotimer"] = "Edit Advanced Timer"; // PLEASE TRANSLATE
$lang["simple_timers"] = "Simple Timers"; // PLEASE TRANSLATE

$lang["null"] = "Null"; // PLEASE TRANSLATE

/* Advanced Timer Text */
$lang["dawn"] = "Dawn"; // PLEASE TRANSLATE
$lang["dusk"] = "Dusk"; // PLEASE TRANSLATE
$lang["reminder"] = "Reminder"; // PLEASE TRANSLATE
$lang["dawnlt"] = "DanwLT"; // PLEASE TRANSLATE
$lang["dawngt"] = "DawnGT"; // PLEASE TRANSLATE
$lang["dusklt"] = "DuskLT"; // PLEASE TRANSLATE
$lang["duskgt"] = "DuskGT"; // PLEASE TRANSLATE
$lang["security"] = "Security"; // PLEASE TRANSLATE
$lang["now"] = "Now"; // PLEASE TRANSLATE
$lang["timeroptions"] = "Timer Options"; // PLEASE TRANSLATE
$lang["option"] = "Option"; // PLEASE TRANSLATE
$lang["expire"] = "Expire"; // PLEASE TRANSLATE

/* Heyu Config Management Text */
$lang["heyumgmt"] = "Heyu Config Select"; // PLEASE TRANSLATE
$lang["heyumgmtadmin"] = "Heyu Configuration Management"; // PLEASE TRANSLATE
$lang["heyumgmt_txt"] = "This controls which configuration heyu will use. This is based on heyu's capability to select multiple configurations that inlcudes the config for heyu and schedule files."; // PLEASE TRANSLATE
$lang["heyucurrentconfig"] = "Current heyu configuration is"; // PLEASE TRANSLATE
$lang["heyubaseuse"] = "Heyu Base Dir Usage"; // PLEASE TRANSLATE
$lang["heyubaseuse_txt"] = "This switch forces domus.Link to pass explicit path directive using -c to heyu on execution based on the heyu_base setting when set to YES. If set to NO, domus.Link will default its heyu_base path and x10config file settings to /etc/heyu and x10.conf respectively."; // PLEASE TRANSLATE
$lang['heyuindir'] = "in directory"; // PLEASE TRANSLATE
?>