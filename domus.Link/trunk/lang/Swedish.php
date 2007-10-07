<?php
/*
 * Swedish Language File
 *
 */

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['all'] = 'Alla';
$lang['lights'] = 'belysning';
$lang['appliances'] = 'Utrustning';
$lang['irrigation'] = 'Irrigation';
$lang['hvac'] = 'HVAC';
$lang['events'] = 'Händelse';
$lang['setup'] = 'Inställningar';
$lang['heyusetup'] = 'Heyu inställningar';
$lang['frontend'] = 'Frontend';
$lang['login'] = 'Logga in';

$lang['add'] = 'Lägg till';
$lang['edit'] = 'Ändra';
$lang['save'] = 'Spara';
$lang['cancel'] = 'Avbryt';
$lang['delete'] = 'Ta bort';
$lang['deleteconfirm'] = 'Tryck OK för att bekräfta borttagning.';

$lang['aliases'] = 'Alias';
$lang['addalias'] = 'Lägg till Alias';
$lang['editalias'] = 'Ändra Alias';
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
$lang['heyuexec'] = 'Heyu binär';
$lang['password'] = 'Lösenord för inställningsarea';
$lang['language'] = 'Språk för Frontend';
$lang['imgs'] = 'Menybilder';
$lang['urlpath'] = 'URL sökväg';
$lang['theme'] = 'Tema för Frontend';
$lang['heyubaseloc'] = 'Heyu Filbas';

$lang['code_txt'] = 'Fyll i Hus och modulkod. Var noga med att den inte redan används. Alias som "A1,2" är ännu inte supportade.';
$lang['label_txt'] = 'Fyll i en beskrivning för denna modulen. Var uppmärksam på att alla mellanrum kommer att bli utbytta med ett "_" och stora bokstäver med små.';
$lang['module_txt'] = 'Välj typ av modul.';
$lang['type_txt'] = 'Välj vad denna modulen kommer att kontrollera.';

$lang['heyuexec_txt'] = 'Denna inställning specifierar var i systemet man finner heyu exekverbara fil. Standardsökvägen för denna är <span class="code">/usr/local/bin/</span>';
$lang['password_txt'] = 'Välj ett lösenord här för access till inställningsarean för denna frontändan. Lämna den helt <span class="code">tom</span> om du vill avaktivera användning av lösenord.';
$lang['theme_txt'] = 'Välj ett tema för GUIT.';
$lang['imgs_txt'] = 'Välj om du vill ha bilder eller bara ren text i menyraden.';
$lang['setup_txt'] = 'Här kan du ställa in alla inställningar.<br>Var god välj en av undermenyerna under "Inställningar".';
$lang['heyubaseloc_txt'] = 'Heyu filbas - Detta är katalogen som Heyu hittar sina konfigurationsfiler och filer för statusinformation i.';
$lang['language_txt'] = 'Definierar språket för fromtändan. Du kan också sätta denna till auto, vilket låter browsern välja språk istället. Engelska kommer att väljas som språk om språket inte hittas.';
$lang['heyuconfile_txt'] = 'Konfigurationsfilen innehåller flera kritiska delar ' .
		'som heyu behöver för att fungera, ' .
		'plus ett antal användaroptioner. Denna filen är vanligtvis kallad <span class="code">x10.conf</span> ' .
		'och hittas vanligtvis  i katalogen <span class="code">/etc/heyu</span> för att hela systemet skalla ha åtkomst till den.';
$lang['urlpath_txt'] = 'Denna inställningen definierar sökvägen till frontändan. ' .
		'Till exempel om du kör domus.Link i en katalog som <span class="code">' .
		'http://your-host/domuslink</span>, skulle URL sökväg bli ' .
		'<span class="code">/domuslink</span>. Lämna denna tom om du kör domus.Link ' .
		'i din webbrot dvs. <span class="code">http://your-host/</span>';

$lang['error_not_running'] = '<h1>HEYU ÄR INTE STARTAD!</h1>Var god starta heyu!<br />Du behöver eventuellt ändra dina rättigheter för tty-porten, t.ex. /dev/ttyS0 eller /dev/ttyUSB0. Se dokumentation i doc/INSTALL för mer information.';
$lang['error_special_chars'] = 'Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>';

?>
