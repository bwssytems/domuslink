<?php
/*
 * Italian Language File
 *
 */
 
// new start v0.1.2
$lang['cols'] = 'Controls per line';
$lang['seclevel'] = 'Security Level';
$lang['pcinterface'] = 'Computer Interface Type';
$lang['refresh'] = 'Page Refresh Timer';
$lang['cols_txt'] = 'This value define how many controls apear on the main page per line. Default is 2.';
$lang['seclevel_txt'] = 'Possible values are: <br>0 - None; <br>1 - Only administration; <br>2 - Entire frontend.';
$lang['pcinterface_txt'] = 'The Computer Interface can either be the CM11A or the CM17A. The CM11A is the most common and therefore selected by default.';
$lang['refresh_txt'] = 'By setting this field the main page in which the modules are shown shall be refreshed every X seconds. To disable, leave field blank.';
// new end

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['all'] = 'Tutto';
$lang['lights'] = 'Luci';
$lang['appliances'] = 'Carichi';
$lang['irrigation'] = 'Irrigazione';
$lang['hvac'] = 'Ambiente';
$lang['events'] = 'Eventi';
$lang['setup'] = 'Configurazione';
$lang['heyusetup'] = 'Configurazione Heyu';
$lang['frontend'] = 'Facciata';
$lang['login'] = 'Autenticazione';

$lang['add'] = 'Aggiungi';
$lang['edit'] = 'Modifica';
$lang['save'] = 'Salva';
$lang['cancel'] = 'Cancella';
$lang['delete'] = 'Rimuovi';
$lang['deleteconfirm'] = 'Clicca OK per confermare la rimozione.';

$lang['aliases'] = 'Nome moduli';
$lang['addalias'] = 'Aggiungi Nome modulo';
$lang['editalias'] = 'Modifica Nome modulo';
$lang['code'] = 'Codice';
$lang['label'] = 'Descrizione';
$lang['module'] = 'Modulo';
$lang['type'] = 'Tipo';
$lang['actions'] = 'Azione';

$lang['heyustatus'] = 'Stato Heyu';
$lang['start'] = 'PARTI';
$lang['reload'] = 'RICARICA';
$lang['stop'] = 'FERMA';

$lang['frontendadmin'] = 'Configurazione Facciata';
$lang['heyuconf'] = 'Configurazione Heyu';
$lang['heyuconfile'] = 'File Configurazione Heyu';
$lang['heyuexec'] = 'Heyu Eseguibile';
$lang['password'] = 'Impostazione Password';
$lang['language'] = 'Linguaggio Facciata';
$lang['imgs'] = 'Menu Immagini';
$lang['urlpath'] = 'Percorso URL';
$lang['theme'] = 'Tema Facciata';
$lang['heyubaseloc'] = 'Locazione File Heyu';

$lang['code_txt'] = 'Assegna codice Casa e codice Unita\'. Assicurati non siano gia\' in uso. Pseudonimi come "A1,2" non sono al momento supportati.';
$lang['label_txt'] = 'Inserisci una descrizione per questo modulo. Nota che gli spazi verranno sostituiti dal carattere "_" e lettere maisucole verranno salvate in minuscolo.';
$lang['module_txt'] = 'Seleziona il tipo di modulo.';
$lang['type_txt'] = 'Selezione cosa il modulo controlla.';

$lang['heyuexec_txt'] = 'Questa impostazione specifica la locazione di Heyu. Tipicamente dovrebbe essere in <span class="code">/usr/local/bin/</span>';
$lang['password_txt'] = 'Definisci qui la password per accedere all\'area di impostazione per la Facciata. Lascia <span class="code">blank</span> per disabilitare la password.';
$lang['theme_txt'] = 'Seleziona un tema.';
$lang['imgs_txt'] = 'Seleziona se vuoi usare o meno immagini al posto dei testi nella barra menu.';
$lang['setup_txt'] = 'Qui puoi configurare tutte le impostazioni.<br>Per favore seleziona un opzione da submenu sotto "Impostazioni"';
$lang['heyubaseloc_txt'] = 'Cartella base Heyu - Questa cartella e\' dove Heyu cerca i suoi file configurazione e memorizza informazioni';
$lang['language_txt'] = 'Scegli qui  quale linguaggio usare per la Facciata. Puoi anche ' .
		'selezionare auto, che usera\' il linguaggio impostato nel browser. Nel caso il linguaggio non sia presente' .
		'sara\' usato l\'Inglese';
$lang['heyuconfile_txt'] = 'Questo file configurazione contiene diversi pezzi critici ' .
		'di informazione che il programma Heyu necessita per funzionare, ' .
		'piu\' diverse opzioni utente. Questo file e\' normalmente chiamato <span class="code">x10.conf</span> ' .
		'ed e\' normalmente presente in <span class="code">/etc/heyu</span> per essere usato da tutto il sistema.';
$lang['urlpath_txt'] = 'Questa impostazione definisce l\'URL della facciata. ' .
		'Per esempio se hai installato domus.Link in una subdirectory come <span class="code">' .
		'http://your-host/domuslink</span>, allora dovrai definire l\'URL come ' .
		'<span class="code">/domuslink</span>. Lascia vuoto se hai installato domus.Link come ' .
		'root, ovvero <span class="code">http://your-host/</span>';

$lang['error_not_running'] = '<h1>HEYU NON E\' IN ESECUZIONE !</h1>Per favore fai partire Heyu!<br />Potresti dover cambiare il permesso alla porta tty.';
$lang['error_special_chars'] = 'Caratteri speciali nella descrizione non sono permessi.<br><br>Per favore riprova. <a href=admin/aliases.php>Back</a>';

?>
