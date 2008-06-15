<?php

$lang['dlurl']='http://domus.link.co.pt';
$lang['title']='domus.Link';
$lang['home']='Home';
$lang['lights']='belysning';
$lang['appliances']='Utrustning';
$lang['irrigation']='Irrigation';
$lang['login']='Logga in';
$lang['setup']='Inställningar';
$lang['aliases']='Alias';
$lang['floorplan']='Floorplan';
$lang['frontend']='Frontend';
$lang['heyusetup']='Heyu inställningar';
$lang['add']='Lägg till';
$lang['edit']='Ändra';
$lang['save']='Spara';
$lang['cancel']='Avbryt';
$lang['delete']='Ta bort';
$lang['code']='Kod';
$lang['label']='Namn';
$lang['module']='Modul';
$lang['type']='Typ';
$lang['actions']='Val';
$lang['start']='START';
$lang['reload']='LADDA OM';
$lang['stop']='STOPP';
$lang['move']='Move';
$lang['info']='Info';
$lang['running']='Running';
$lang['down']='Down';
$lang['addalias']='Lägg till Alias';
$lang['editalias']='Ändra Alias';
$lang['frontendadmin']='Frontend Konfiguration';
$lang['heyuconf']='Heyu Konfiguration';
$lang['heyuconfile']='Heyu Konfigurationsfil';
$lang['heyuexec']='Heyu binär';
$lang['password']='Lösenord för inställningsarea';
$lang['language']='Språk för Frontend';
$lang['imgs']='Menybilder';
$lang['urlpath']='URL sökväg';
$lang['theme']='Tema för Frontend';
$lang['heyubaseloc']='Heyu Filbas';
$lang['seclevel']='Säkerhetsnivå';
$lang['pcinterface']='Datorgränssnitt';
$lang['refresh']='Siduppdateringstimer';
$lang['location']='Location';
$lang['addlocation']='Add Location';
$lang['editlocation']='Edit Location';
$lang['heyustatus']='Heyu Status';
$lang['deleteconfirm']='Tryck OK för att bekräfta borttagning.';
$lang['enter_password']='Please enter your password to access the administration area.';
$lang['heyuexec_txt']='Denna inställning specifierar var i systemet man finner heyu exekverbara fil. Standardsökvägen för denna är <span class="code">/usr/local/bin/</span>';
$lang['password_txt']='Define a password to access the selected areas. Leave blank to disable.';
$lang['theme_txt']='Välj ett tema för GUIT.';
$lang['imgs_txt']='Välj om du vill ha bilder eller bara ren text i menyraden.';
$lang['setup_txt']='Här kan du ställa in alla inställningar.<br>Var god välj en av undermenyerna under "Inställningar".';
$lang['heyubaseloc_txt']='Heyu filbas - Detta är katalogen som Heyu hittar sina konfigurationsfiler och filer för statusinformation i.';
$lang['language_txt']='Definierar språket för fromtändan. Du kan också sätta denna till auto, vilket låter browsern välja språk istället. Engelska kommer att väljas som språk om språket inte hittas.';
$lang['heyuconfile_txt']='Konfigurationsfilen innehåller flera kritiska delar som heyu behöver för att fungera, plus ett antal användaroptioner. Denna filen är vanligtvis kallad x10.conf och hittas vanligtvis  i katalogen /etc/heyu för att hela systemet skalla ha åtkomst till den.';
$lang['urlpath_txt']='Denna inställningen definierar sökvägen till frontändan. Till exempel om du kör domus.Link i en katalog som http://your-host/domuslink, skulle URL sökväg bli /domuslink. Lämna denna tom om du kör domus.Link i din webbrot dvs. http://your-host/';
$lang['seclevel_txt']='Möjliga värden är: 0 - Inga; 1 - Endast administration; 2 - Hela frontend.';
$lang['pcinterface_txt']='Datorgränssnittet kan antingen vara CM11A eller CM17A. CM11A är den vanligaste förekommande och därför vald som standard.';
$lang['refresh_txt']='Genom att sätta ett värde i detta fält kommer huvudsidan där modulerna visas att uppdatera sig varje X sekund. För att stänga av denna funktion, lämna fältet tomt.';
$lang['error_not_running']='<h1>HEYU ÄR INTE STARTAD!</h1>Var god starta heyu!<br />Du behöver eventuellt ändra dina rättigheter för tty-porten, t.ex. /dev/ttyS0 eller /dev/ttyUSB0. Se dokumentation i doc/INSTALL för mer information.';
$lang['error_special_chars']='Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>';
$lang['error_wrong_pass']='<b>Error</b>. Your password is incorrect.';
$lang['error_loc_in_use']='The location you are attempting to remove is currently in use. <br />First remove all usages from <a href=admin/aliases.php>aliases</a> then delete the location.<br />';

?>