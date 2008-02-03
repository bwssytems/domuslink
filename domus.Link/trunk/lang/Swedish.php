<?php
/*
 * Swedish Language File
 *
 */
 
// new start v0.1.2
$lang['cols'] = 'Kontroller per rad';
$lang['seclevel'] = 'Säkerhetsnivå';
$lang['pcinterface'] = 'Datorgränssnitt';
$lang['refresh'] = 'Siduppdateringstimer';
$lang['cols_txt'] = 'Detta värde konfigurerare hur många kontroller som syns på huvudsidan per rad. Default är 2.';
$lang['seclevel_txt'] = 'Möjliga värden är: <br>0 - Inga; <br>1 - Endast administration; <br>2 - Hela frontend.';
$lang['pcinterface_txt'] = 'Datorgränssnittet kan antingen vara CM11A eller CM17A. CM11A är den vanligaste förekommande och därför vald som standard.';
$lang['refresh_txt'] = 'Genom att sätta ett värde i detta fält kommer huvudsidan där modulerna visas att uppdatera sig varje X sekund. För att stänga av denna funktion, lämna fältet tomt.';
// new end

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['all'] = 'Alla';
$lang['lights'] = 'belysning';
$lang['appliances'] = 'Utrustning';
$lang['irrigation'] = 'Irrigation';
$lang['hvac'] = 'HVAC';
$lang['events'] = 'H�ndelse';
$lang['setup'] = 'Inst�llningar';
$lang['heyusetup'] = 'Heyu inst�llningar';
$lang['frontend'] = 'Frontend';
$lang['login'] = 'Logga in';

$lang['add'] = 'L�gg till';
$lang['edit'] = '�ndra';
$lang['save'] = 'Spara';
$lang['cancel'] = 'Avbryt';
$lang['delete'] = 'Ta bort';
$lang['deleteconfirm'] = 'Tryck OK f�r att bekr�fta borttagning.';

$lang['aliases'] = 'Alias';
$lang['addalias'] = 'L�gg till Alias';
$lang['editalias'] = '�ndra Alias';
$lang['code'] = 'Kod';
$lang['label'] = 'Namn';
$lang['module'] = 'Modul';
$lang['type'] = 'Typ';
$lang['actions'] = 'Val';

$lang['heyustatus'] = 'Heyu Status';
$lang['start'] = 'START';
$lang['reload'] = 'LADDA OM';
$lang['stop'] = 'STOPP';

$lang['frontendadmin'] = 'Frontend Konfiguration';
$lang['heyuconf'] = 'Heyu Konfiguration';
$lang['heyuconfile'] = 'Heyu Konfigurationsfil';
$lang['heyuexec'] = 'Heyu bin�r';
$lang['password'] = 'L�senord f�r inst�llningsarea';
$lang['language'] = 'Spr�k f�r Frontend';
$lang['imgs'] = 'Menybilder';
$lang['urlpath'] = 'URL s�kv�g';
$lang['theme'] = 'Tema f�r Frontend';
$lang['heyubaseloc'] = 'Heyu Filbas';

$lang['code_txt'] = 'Fyll i Hus och modulkod. Var noga med att den inte redan anv�nds. Alias som "A1,2" �r �nnu inte supportade.';
$lang['label_txt'] = 'Fyll i en beskrivning f�r denna modulen. Var uppm�rksam p� att alla mellanrum kommer att bli utbytta med ett "_" och stora bokst�ver med sm�.';
$lang['module_txt'] = 'V�lj typ av modul.';
$lang['type_txt'] = 'V�lj vad denna modulen kommer att kontrollera.';

$lang['heyuexec_txt'] = 'Denna inst�llning specifierar var i systemet man finner heyu exekverbara fil. Standards�kv�gen f�r denna �r <span class="code">/usr/local/bin/</span>';
$lang['password_txt'] = 'V�lj ett l�senord h�r f�r access till inst�llningsarean f�r denna front�ndan. L�mna den helt <span class="code">tom</span> om du vill avaktivera anv�ndning av l�senord.';
$lang['theme_txt'] = 'V�lj ett tema f�r GUIT.';
$lang['imgs_txt'] = 'V�lj om du vill ha bilder eller bara ren text i menyraden.';
$lang['setup_txt'] = 'H�r kan du st�lla in alla inst�llningar.<br>Var god v�lj en av undermenyerna under "Inst�llningar".';
$lang['heyubaseloc_txt'] = 'Heyu filbas - Detta �r katalogen som Heyu hittar sina konfigurationsfiler och filer f�r statusinformation i.';
$lang['language_txt'] = 'Definierar spr�ket f�r fromt�ndan. Du kan ocks� s�tta denna till auto, vilket l�ter browsern v�lja spr�k ist�llet. Engelska kommer att v�ljas som spr�k om spr�ket inte hittas.';
$lang['heyuconfile_txt'] = 'Konfigurationsfilen inneh�ller flera kritiska delar ' .
		'som heyu beh�ver f�r att fungera, ' .
		'plus ett antal anv�ndaroptioner. Denna filen �r vanligtvis kallad <span class="code">x10.conf</span> ' .
		'och hittas vanligtvis  i katalogen <span class="code">/etc/heyu</span> f�r att hela systemet skalla ha �tkomst till den.';
$lang['urlpath_txt'] = 'Denna inst�llningen definierar s�kv�gen till front�ndan. ' .
		'Till exempel om du k�r domus.Link i en katalog som <span class="code">' .
		'http://your-host/domuslink</span>, skulle URL s�kv�g bli ' .
		'<span class="code">/domuslink</span>. L�mna denna tom om du k�r domus.Link ' .
		'i din webbrot dvs. <span class="code">http://your-host/</span>';

$lang['error_not_running'] = '<h1>HEYU �R INTE STARTAD!</h1>Var god starta heyu!<br />Du beh�ver eventuellt �ndra dina r�ttigheter f�r tty-porten, t.ex. /dev/ttyS0 eller /dev/ttyUSB0. Se dokumentation i doc/INSTALL f�r mer information.';
$lang['error_special_chars'] = 'Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>';

?>
