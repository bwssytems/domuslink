<?php
/*
 * Dutch Language File
 *
 */

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['all'] = 'Alles';
$lang['lights'] = 'Lichten';
$lang['appliances'] = 'Apparaten';
$lang['irrigation'] = 'Bewatering';
$lang['hvac'] = 'HVAC';
$lang['events'] = 'Gebeurtenissen';
$lang['setup'] = 'Installatie';
$lang['heyusetup'] = 'Heyu Installatie';
$lang['frontend'] = 'Frontend';
$lang['login'] = 'Inloggen';

$lang['add'] = 'Toevoegen';
$lang['edit'] = 'Bewerken';
$lang['save'] = 'Opslaan';
$lang['cancel'] = 'Annuleren';
$lang['delete'] = 'Verwijderen';
$lang['deleteconfirm'] = 'Klik op OK om het verwijderen te bevestigen.';

$lang['aliases'] = 'Aliassen';
$lang['addalias'] = 'Alias toevoegen';
$lang['editalias'] = 'Alias bewerken';
$lang['code'] = 'Code';
$lang['label'] = 'Label';
$lang['module'] = 'Module';
$lang['type'] = 'Type';
$lang['actions'] = 'Acties';

$lang['heyustatus'] = 'Heyu Status';
$lang['start'] = 'START';
$lang['reload'] = 'HERLADEN';
$lang['stop'] = 'STOP';

$lang['frontendadmin'] = 'Frontend Configuratie';
$lang['heyuconf'] = 'Heyu Configuratie';
$lang['heyuconfile'] = 'Heyu Configuratie Bestand';
$lang['heyuexec'] = 'Uitvoerbaar Heyu Bestand';
$lang['password'] = 'Wachtwoord Configuratiescherm';
$lang['language'] = 'Frontend Taal';
$lang['imgs'] = 'Menu Plaatjes';
$lang['urlpath'] = 'URL Pad';
$lang['theme'] = 'Frontend Thema';
$lang['heyubaseloc'] = 'Heyu Bestandslocatie';

$lang['code_txt'] = 'Voer de Huis en Unit code in. Controleer of deze niet al wordt gebruikt. Aliases zoals "A1,2" worden niet niet ondersteund';
$lang['label_txt'] = 'Voer een omschrijving van deze module in. Let op: Alle spaties worden vervangen door "_" en hoofletters worden opgeslagen als kleine letter.';
$lang['module_txt'] = 'Kies de module model type.';
$lang['type_txt'] = 'Kies wat de module controleer.';

$lang['heyuexec_txt'] = 'Deze optie geeft aan waar het uitvoerbare bestand van Heyu zicht bevindt. Dit bestand is normaal gesproken terug te vinden in <span class="code">/usr/local/bin/</span>';
$lang['password_txt'] = 'Geef hier het wachtwoord voor het configuratiescherm op. Laat deze optie <span class="code">leeg</span> om geen wachtwoord te gebruiken.';
$lang['theme_txt'] = 'Selecteer een thema voor de GUI.';
$lang['imgs_txt'] = 'Kies of je plaatjes in het menu wilt gebruiken.';
$lang['setup_txt'] = 'Pas hier de instellingen aan.<br>Kies een optie uit het submenu onder "Installatie"';
$lang['heyubaseloc_txt'] = 'Heyu Bestandslocatie - In deze map zoekt Heyu voor de configuratie bestanden en slaat de status informatie op';
$lang['language_txt'] = 'Geeft hier de taal van de frontend op. Je kunt ook kiezen voor de optie "auto". ' .
		'Deze optie gebruikt dan de voorkeurstaal van de browser. Indien de taal niet bestaat' .
		'dan zal de Engelse taal worden gebruikt.';
$lang['heyuconfile_txt'] = 'Het configuratie bestand bevat enkele kritische stukken ' .
		'informatiE die het Heyu programma nodig heeft om te functioneren, ' .
		'aangevuld met een aantal gebruikers opties. Dit bestand is normaal gesproken <span class="code">x10.conf</span> genaamd' .
		'en is terug te vinden in <span class="code">/etc/heyu</span> om systeem breed te worden gebruikt.';
$lang['urlpath_txt'] = 'Deze optie bepaalt welke directory moet worden gebruikt voor de frontend. ' .
		'Als je domus.Link draait in een onderliggende directorie, bijvoorbeeld <span class="code">' .
		'http://your-host/domuslink</span>, kies dan hier voor ' .
		'<span class="code">/domuslink</span>. Laat deze optie leeg indien je domus.Link in de ' .
		'root-directorie (bijvoorbeeld <span class="code">http://your-host/</span>)';

$lang['error_not_running'] = '<h1>HEYU IS NIET GESTART!</h1>Start heyu opnieuw!<br />Het is mogelijk dat je de rechten voor de tty port moet aanpassen.';
$lang['error_special_chars'] = 'Speciale karakters in de synoniemen tekst zijn niet toegestaan.<br><br>Probeer het opnieuw. <a href=admin/aliases.php>Terug</a>';

?>