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

 $lang["home"]="Indice"; 
 $lang["lights"]="Luci"; 
 $lang["appliances"]="Carichi"; 
$lang["shutters"]="Shutters"; // PLEASE TRANSLATE
 $lang["irrigation"]="Irrigazione"; 
$lang["other"] = "Other"; // PLEASE TRANSLATE
 $lang["login"]="Autenticazione"; 
 $lang["setup"]="Configurazione"; 
 $lang["aliases"]="Nome moduli"; 
 $lang["floorplan"]="Piantina"; 
 $lang["frontend"]="Facciata"; 
 $lang["heyusetup"]="Configurazione Heyu"; 

 $lang["add"]="Aggiungi"; 
 $lang["edit"]="Modifica"; 
 $lang["save"]="Salva"; 
 $lang["cancel"]="Cancella"; 
 $lang["delete"]="Rimuovi"; 
 $lang["code"]="Codice"; 
 $lang["label"]="Descrizione"; 
 $lang["module"]="Modulo"; 
 $lang["type"]="Tipo"; 
 $lang["actions"]="Azione"; 
 $lang["start"]="parti"; 
 $lang["reload"]="ricarica"; 
 $lang["stop"]="ferma"; 
 $lang["move"]="Muovi"; 
 $lang["info"]="Informazioni"; 
 $lang["running"]="In funzione"; 
 $lang["down"]="Giu'"; 
 $lang["addalias"]="Aggiungi Nome modulo"; 
 $lang["editalias"]="Modifica Nome modulo"; 
 $lang["frontendadmin"]="Configurazione Facciata"; 
 $lang["heyuconf"]="Configurazione Heyu"; 
 $lang["heyuconfile"]="File Configurazione Heyu"; 
 $lang["heyuexec"]="Heyu Eseguibile"; 
 $lang["password"]="Impostazione Password"; 
 $lang["language"]="Linguaggio Facciata"; 
 $lang["imgs"]="Menu Immagini"; 
 $lang["urlpath"]="Percorso URL"; 
 $lang["theme"]="Tema Facciata"; 
 $lang["heyubaseloc"]="Locazione File Heyu"; 
 $lang["seclevel"]="Livello di sicurezza"; 
 $lang["pcinterface"]="Tipo interfaccia computer"; 
 $lang["refresh"]="Pagina Rinfresco Timer"; 
 $lang["location"]="Locazione"; 
 $lang["addlocation"]="Aggiungi locazione"; 
 $lang["editlocation"]="Modifica locazione"; 
 $lang["heyustatus"]="Stato Heyu"; 
 $lang["enter_password"]="Per favore introduci la tua password per l'area amministrazione."; 

/* help texts */
 $lang["heyuexec_txt"]="Questa impostazione specifica la locazione di Heyu. Tipicamente dovrebbe essere in <span class='code'>/usr/local/bin/</span>"; 
 $lang["password_txt"]="Definisci qui la password per accedere all'area di impostazione per la Facciata. Lascia blank per disabilitare la password."; 
 $lang["theme_txt"]="Seleziona un tema."; 
 $lang["imgs_txt"]="Seleziona se vuoi usare o meno immagini al posto dei testi nella barra menu."; 
 $lang["heyubaseloc_txt"]="Cartella base Heyu - Questa cartella e' dove Heyu cerca i suoi file configurazione e memorizza informazioni"; 
 $lang["language_txt"]="Scegli qui  quale linguaggio usare per la Facciata. Puoi anche selezionare auto, che usera' il linguaggio impostato nel browser. Nel caso il linguaggio non sia presentesara' usato l'Inglese"; 
 $lang["heyuconfile_txt"]="Questo file configurazione contiene diversi pezzi critici di informazione che il programma Heyu necessita per funzionare, piu' diverse opzioni utente. Questo file e' normalmente chiamato x10.conf ed e' normalmente presente in /etc/heyu per essere usato da tutto il sistema."; 
 $lang["urlpath_txt"]="Questa impostazione definisce l'URL della facciata. Per esempio se hai installato domus.Link in una subdirectory come http://your-host/domuslink, allora dovrai definire l'URL come /domuslink. Lascia vuoto se hai installato domus.Link come root, ovvero http://your-host/"; 
 $lang["seclevel_txt"]="I valori ammessi sono : 0 - Nessuno; 1 - Solo amministrazione; 2 - Intero sito."; 
 $lang["pcinterface_txt"]="L'interfaccia verso il computer puo' essera sia la CM11A che la CM17A. La CM11A e' la piu' comune e quindi selezionata inizialmente."; 
 $lang["refresh_txt"]="Assegnando un valore a questo campo, la pagina principale che mostra i moduli verra' aggiornata automaticamente ogni x secondi. Per disabilitare il rinfresco, laciare il campo vuoto."; 

/* error messages */
 $lang["error_special_chars"]="Caratteri speciali nella descrizione non sono permessi.<br><br>Per favore riprova. <a href=admin/aliases.php>Back</a>"; 
 $lang["error_wrong_pass"]="<b>Errore</b>. La password e' sbagliata."; 
 $lang["error_loc_in_use"]="La locazione che stai cercando di cancellare e' in uso. <br />Rimuovi prima ogni uso da  <a href=admin/aliases.php>aliases</a> poi cancella la locazione.<br />"; 

/* changed */
 $lang["deleteconfirm"]="Clicca OK per confermare la rimozione."; 
 $lang["error_not_running"]="<h1>HEYU NON E' IN ESECUZIONE !</h1>Per favore fai partire Heyu!<br />Potresti dover cambiare il permesso alla porta tty."; 

/* new */
 $lang["codes_txt"]="Seleziona se preferisci vedere i codici delle unita' nei bottoni"; 
 $lang["codes"]="Codici unita'"; 
 $lang["unit"]="Unita'"; 
 $lang["command"]="Comando"; 
 $lang["log"]="Log"; 
 $lang["progress"]="Progresso"; 
 $lang["error"]="Errore"; 
 $lang["logout"]="Esci"; 
 $lang["keep_login"]="Tienimi connesso"; 
 $lang["upload"]="Caricamento"; 
 $lang["erase"]="Cancella"; 
 $lang["uploadsuccess"]="Caricamento eseguito"; 
 $lang["erasesuccess"]="Cancellazione eseguita"; 
 $lang["upload_erase_log_txt"]="Clicca <a href='#' onclick='divShowHide(log);'>qui</a> per vedere il log di uscita."; 
 $lang["upload_txt"]="Per caricare il file con le attivazioni definite nel file <a href=../admin/heyu.php>heyu configuration</a>, e configurate nella sezione <a href=../events/timers.php>timer administration</a>, clicca sul bottone qui sotto."; 
 $lang["erase_txt"]="Se preferisci cancellare l'intero contenuto della tua interfaccia per il computer, clicca sul bottone qui sotto."; 
 $lang["upload_erase_txt"]="Nota che il caricamento/cancellazione richiede approssivativamente 8 secondi. <br />Non cambiare pagina fino a quando l'operazione e' completa."; 

 $lang["error_no_modules"]="<h1>Nessun modulo disponibile !</h1><br />Non ho nessun modulo da visualizzare."; 
 $lang["error_filerw"]="non trovato o non scrivibile !"; 
 $lang["error_filer"]="non trovato o non leggibile !"; 

 $lang["about"]="Informazioni"; 
 $lang["status"]="Stato"; 
 $lang["events"]="Eventi"; 
 $lang["timers"]="Temporizzazioni"; 
 $lang["timer"]="Temporizzazione"; 
 $lang["triggers"]="Cause"; 
 $lang["trigger"]="Causa"; 
 $lang["addtrigger"]="Aggiungi Causa"; 
 $lang["edittrigger"]="Modifica Causa"; 
 $lang["trig_cmd"]="Comando Causa"; 
 $lang["trig_unit"]="Unita' Causa"; 
 $lang["addtimer"]="Aggiungi Temporizzazione"; 
 $lang["edittimer"]="Modifica Temporizzazione"; 
 $lang["startdate"]="Data inizio"; 
 $lang["enddate"]="Data fine"; 
 $lang["ontime"]="Tempo inizio"; 
 $lang["offtime"]="Tempo fine"; 

 $lang["weekdays"]="Giorni della settimana"; 
 $lang["daterange"]="Seleziona date"; 
 $lang["time"]="Ora"; 
 $lang["on"]="Acceso"; 
 $lang["end"]="Fine"; 
 $lang["off"]="Spento"; 
 $lang["enable"]="Attivo"; 
 $lang["disable"]="Disattivo"; 
 $lang["enabled"]="Attivato"; 
 $lang["disabled"]="Disattivato"; 
 $lang["execute"]="Esegui"; 

 $lang["jan"]="Gennaio"; 
 $lang["feb"]="Febbraio"; 
 $lang["mar"]="Marzo"; 
 $lang["apr"]="Aprile"; 
 $lang["may"]="Maggio"; 
 $lang["jun"]="Giugno"; 
 $lang["jul"]="Luglio"; 
 $lang["aug"]="Agosto"; 
 $lang["sep"]="Settembre"; 
 $lang["oct"]="Ottobre"; 
 $lang["nov"]="Novembre"; 
 $lang["dec"]="Dicembre"; 

 $lang["sun"]="Domenica"; 
 $lang["mon"]="Lunedi'"; 
 $lang["tue"]="Martedi'"; 
 $lang["wed"]="Mercoledi'"; 
 $lang["thu"]="Giovedi'"; 
 $lang["fri"]="Venerdi'"; 
 $lang["sat"]="Sabato"; 

/* Utility Text */
 $lang["utility"]="Utility";  // PLEASE TRANSLATE
 $lang["utilitytool"]="Utility - Excecute heyu Command";  // PLEASE TRANSLATE
 $lang["arguments"]="Arguments";  // PLEASE TRANSLATE
 $lang["output"]="Output"; // PLEASE TRANSLATE

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
