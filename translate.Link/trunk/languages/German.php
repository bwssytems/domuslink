<?php
/*
 * German Language File
 *
 */

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['home'] = 'Home';
$lang['lights'] = 'Lampen';
$lang['appliances'] = 'Schalter';
$lang['irrigation'] = 'Bew&auml;sserung';
$lang['login'] = 'Login';
$lang['setup'] = 'Konfiguration';
$lang['aliases'] = 'Ger&auml;te';
$lang['floorplan'] = 'Hausplan';
$lang['frontend'] = 'Oberfl&auml;che';
$lang['heyusetup'] = 'Heyu';

$lang['add'] = 'Hinzuf&uuml;gen';
$lang['edit'] = 'Editieren';
$lang['save'] = 'Speichern';
$lang['cancel'] = 'Abbrechen';
$lang['delete'] = 'L&ouml;schen';
$lang['code'] = 'Hauscode';
$lang['label'] = 'Name';
$lang['module'] = 'Modul';
$lang['type'] = 'Typ';
$lang['actions'] = 'Aktionen';
$lang['start'] = 'start';
$lang['reload'] = 'reload';
$lang['stop'] = 'stop';
$lang['login'] = 'Login';
$lang['move'] = 'Verschieben';
$lang['info'] = 'Info';
$lang['running'] = 'l&auml;uft';
$lang['down'] = 'Down';
$lang['addalias'] = 'Ger&auml;te hinzuf&uuml;gen';
$lang['editalias'] = 'Ger&auml;te editieren';
$lang['frontendadmin'] = 'Konfiguration Oberfl&auml;che';
$lang['heyuconf'] = 'Heyu Konfiguration';
$lang['heyuconfile'] = 'Heyu Konfigurationsdatei';
$lang['heyuexec'] = 'Pfad zu Heyu';
$lang['password'] = 'Passwort';
$lang['language'] = 'Sprache Oberfl&auml;che';
$lang['imgs'] = 'Men&uuml; Bilder';
$lang['urlpath'] = 'URL Path';
$lang['theme'] = 'Stil Oberfl&auml;che';
$lang['heyubaseloc'] = 'Heyu Basispfad';
$lang['seclevel'] = 'Sicherheitsstufe';
$lang['pcinterface'] = 'Computerinterface';
$lang['refresh'] = 'Aktualisierungszeit';
$lang['location'] = 'Raum';
$lang['addlocation'] = 'Raum hinzuf&uuml;gen';
$lang['editlocation'] = 'Raum editieren';
$lang['heyustatus'] = 'Heyu status';
$lang['deleteconfirm'] = 'Willst du dieses Modul wirklich l&ouml;schen?';
$lang['enter_password'] = 'Bitte Passwort eingeben um in den gesch&uuml;tzten Bereich zu gelangen.';

/* help texts */
$lang['heyuexec_txt'] = 'In dieser Einstellung steht der Pfad f&uuml;r die ausf&uuml;hbare Datei. Normalerweise wird dies /usr/local/bin/ sein';
$lang['password_txt'] = 'Gib ein Passwort f&uuml;r den Zugriff auf beschr&auml;nkte Bereiche ein. Wird kein Passwort eingegeben, so erfolgt der Zugriff ohne Einschr&auml;nkung.';
$lang['theme_txt'] = 'W&auml;hle einen Stil f&uuml;r die GUI.';
$lang['imgs_txt'] = 'W&auml;hle aus, ob du Bilder statt Text im Men&uuml; haben willst.';
$lang['setup_txt'] = 'This is where you can configure all settings.<br>Please select option from sub-menu bellow "Setup"';
$lang['heyubaseloc_txt'] = 'In diesem Pfad legt Heyu seine Konfigurationsdateien ab und speichert Statusinformationen.';
$lang['language_txt'] = 'W&auml;hle die Sprache f&uuml;r die Oberfl&auml;che. Du kannst auch auto w&auml;hlen - dann wird die vom Browser bevorzugte Sprache gew&auml;hlt.';
$lang['heyuconfile_txt'] = 'Diese Datei hei&szlig;t meist x10.conf und wird normalerweise auf /etc/heyu/ gespeichert.';
$lang['urlpath_txt'] = 'Wenn du domus.Link in ein einem Unterordner z.B.  http://dein-host/domuslink laufen l&auml;sst, dann definiere den url-Pfad als /domus.Link. Lass es leer, wenn du domus.Link im root laufen l&auml;sst - z.B. http://dein-host/';
$lang['seclevel_txt'] = 'M&ouml;gliche Werte: 0 - keine; 1 - nur f&uuml;r die Konfiguration; 2 - ganze Oberfl&auml;che.';
$lang['pcinterface_txt'] = 'Als Computerinterface kann entweder  CM11A oder CM17A gew&auml;hlt werden. CM11A ist das meist verwendete und daher als Standard ausgew&auml;hlt.';
$lang['refresh_txt'] = 'Hier kannst du eintragen, in wieviel Sekunden der Inhalt aktualisiert werden soll. Um die Aktualisierung abzuschalten lass einfach den Wert leer.';

/* error messages */
$lang['error_not_running'] = '<h1>Heyu l&auml;uft nicht!</h1><br />Bitte starte heyu, indem du auf den start-Link am unteren Rand dr&uuml;ckst.<br />Eventuell musst du deine Berechtigungen auf den tty/serial Port &auml;ndern. <br />Kontrolliere auch, dass heyu nicht bereits l&auml;uft indem du \'heyu stop\' als root eingibst.';
$lang['error_special_chars'] = 'Es sind keine Sonderzeichen bei den Bezeichnungen erlaubt.<br><br>Versuche es noch einmal. <a href=admin/aliases.php>Back</a>';
$lang['error_wrong_pass'] = '<b>Fehler</b>. Falsches Passwort.';
$lang['error_loc_in_use'] = 'Der Raum den du gerade l&ouml;schen m&ouml;chtest ist gerade in Verwendung. <br />Entferne zuerst alle Verwendungen aus <a href=admin/aliases.php>aliases</a> dann l&ouml;sche den Raum.<br />';

?>