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

 $lang["home"]="Casa"; 
 $lang["lights"]="Luzes"; 
 $lang["appliances"]="Electrodomésticos"; 
 $lang["shutters"]="Persianas"; 
 $lang["irrigation"]="Irrigação"; 
 $lang["other"]="Outros"; 
 $lang["login"]="Entrar"; 
 $lang["setup"]="Preferências"; 
 $lang["aliases"]="Aliases"; 
 $lang["floorplan"]="Planta"; 
 $lang["frontend"]="Frontend"; 
 $lang["heyusetup"]="Heyu"; 
$lang["light"] = "Light"; // PLEASE TRANSLATE
$lang["appliance"] = "Appliance"; // PLEASE TRANSLATE
$lang["shutter"]="Shutter"; // PLEASE TRANSLATE

 $lang["add"]="Adicionar"; 
 $lang["edit"]="Editar"; 
 $lang["save"]="Guardar"; 
 $lang["cancel"]="Cancelar"; 
 $lang["delete"]="Remover"; 
 $lang["code"]="Código"; 
 $lang["label"]="Etiqueta"; 
 $lang["module"]="Módulo"; 
 $lang["type"]="Tipo"; 
 $lang["actions"]="Acções"; 
 $lang["start"]="iniciar"; 
 $lang["reload"]="refrescar"; 
 $lang["stop"]="parar"; 
 $lang["move"]="Mover"; 
 $lang["info"]="Info"; 
 $lang["running"]="A Correr"; 
 $lang["down"]="Descer"; 
 $lang["addalias"]="Adicionar Alias"; 
 $lang["editalias"]="Editar Alias"; 
 $lang["frontendadmin"]="Configuração Frontend"; 
 $lang["heyuconf"]="Configuração Heyu"; 
 $lang["heyuconfile"]="Ficheiro de Configuração Heyu"; 
 $lang["heyuexec"]="Executável Heyu"; 
 $lang["password"]="Palavra chave"; 
 $lang["language"]="Linguagem Frontend"; 
 $lang["imgs"]="Imagens Menu"; 
 $lang["urlpath"]="Caminho URL"; 
 $lang["theme"]="Tema Frontend"; 
 $lang["heyubaseloc"]="Localização Ficheiro de Configurações Heyu"; 
 $lang["seclevel"]="Nível de Segurança"; 
 $lang["pcinterface"]="Tipo de Interface"; 
 $lang["refresh"]="Temporizador de Refresh"; 
 $lang["location"]="Localização"; 
 $lang["addlocation"]="Adicionar Localização"; 
 $lang["editlocation"]="Editar Localização"; 
 $lang["heyustatus"]="Status heyu"; 
 $lang["enter_password"]="Por favor introduza a sua palavra chave para aceder à área administrativa."; 

/* help texts */
 $lang["heyuexec_txt"]="Esta opção especifica a localização do executável do Heyu. Tipicamente este encontra-se em /usr/local/bin"; 
 $lang["password_txt"]="Defina uma palavra chave para aceder às área seleccionadas."; 
 $lang["theme_txt"]="Seleccione um tema para o interface."; 
 $lang["imgs_txt"]="Seleccione caso quer ou não utilizar imagens no menu."; 
 $lang["heyubaseloc_txt"]="Directoria do Heyu - Este directoria é onde o Heyu irá procurar os seus ficheiros de configuração e onde guarda informações de estados."; 
 $lang["language_txt"]="Defina a língua utilizada no frontend. Caso seleccione auto a língua será automaticamente seleccionada consoante a selecção no seu browser."; 
 $lang["heyuconfile_txt"]="Este ficheiro tem tipicamente o nome x10.conf e normalmente encontra-se em /etc/heyu para utilização por todo o sistema."; 
 $lang["urlpath_txt"]= "Leave blank if your are running domus.Link at the root ie http://your-host/. If you are running domus.Link in a special url path, say http://your-host/domuslink, then define the url path as /domuslink (This will require a special apache configuration).";  // PLEASE TRANSLATE  
$lang["hvac_seclevel_txt"] = "Possible values are: 0 - requires admin level; 1 - requires maint level; 2...n - specific access level."; // changed // PLEASE TRANSLATE
 $lang["pcinterface_txt"]="O Interface de Computador poderá ser o CM11A ou o CM17A. CM11A é o mais comum e daí estar seleccionado por defeito."; 
 $lang["refresh_txt"]="Esta opção define o número de segundos entre cada refresh da página principal. Para desactivar deixe este campo em branco."; 

/* error messages */
 $lang["error_special_chars"]="Caracteres internacionais na descrição da alias não são permitidos.<br /><br />Por favor tente de novo. <a href=admin/aliases.php>Back</a>"; 
 $lang["error_wrong_pass"]="<b>Erro</b>. A palavra chave está incorrecta."; 
 $lang["error_loc_in_use"]="A localização que está a tentar remover está actualmente a ser utilizada. <br />Primeiro remova todas as utilizações em <a href=admin/aliases.php>aliases</a> e por fim remova a localização.<br />"; 

/* changed */
 $lang["deleteconfirm"]="Tem a certeza de que quer remover esta entrada?"; 
 $lang["error_not_running"]="<h1>O Heyu não está a correr!</h1><br />Por favor inicie o Heyu clicando no link iniciar no rodapé da página.<br />Poderá no entanto ter que alterar as permissões na sua porta serie. <br />Deverá também certificar-se que o Heyu não está actualmente a correr. Para tal execute 'heyu stop' como root."; 

/* new */
 $lang["codes_txt"]="Seleccione caso queira mostrar ou não os códigos dos módulos individuais."; 
 $lang["codes"]="Códigos de Unidade"; 
 $lang["unit"]="Unidade"; 
 $lang["command"]="Commando"; 
 $lang["log"]="Registo"; 
 $lang["progress"]="Progresso"; 
 $lang["error"]="Erro"; 
 $lang["logout"]="Sair"; 
 $lang["keep_login"]="Manter o meu login"; 
 $lang["upload"]="Enviar"; 
 $lang["erase"]="Remover"; 
 $lang["uploadsuccess"]="Upload com Sucesso"; 
 $lang["erasesuccess"]="Removido com Sucesso"; 
 $lang["upload_erase_log_txt"]="Click <a href='#' onclick='divShowHide(log);'>aqui</a> para ver o log de output."; 
 $lang["upload_txt"]="Para upload o ficheiro de agendamentos definido nas <a href=../admin/heyu.php>configurações do heyu</a> e configurado nos <a href=../events/timer.php>eventos</a>, clique no botão abaixo."; 
 $lang["erase_txt"]="Se gostaria de remover o conteúdo do interface de computador, clique no botão abaixo."; 
 $lang["upload_erase_txt"]="Nota: O upload/remoção leva aproximadamente 8 segundos. <br />Por favor aguarde até o processo completar."; 

 $lang["error_no_modules"]="<h1>Nenhum módulo disponível!</h1><br />Não tenho módulos para mostrar."; 
 $lang["error_filerw"]="não encontrado ou sem permissões de escrita!"; 
 $lang["error_filer"]="não encontrado ou não legivel."; 

 $lang["about"]="Acerca"; 
 $lang["status"]="Estado"; 
 $lang["events"]="Eventos"; 
 $lang["timers"]="Temporizadores"; 
 $lang["timer"]="Temporizador"; 
 $lang["triggers"]="Gatilhos"; 
 $lang["trigger"]="Gatilho"; 
 $lang["addtrigger"]="Adicionar Gatilho"; 
 $lang["edittrigger"]="Editar Gatilho"; 
 $lang["trig_cmd"]="Commando de Gatilho"; 
 $lang["trig_unit"]="Unidade de Gatilho"; 
 $lang["addtimer"]="Adicionar Evento"; 
 $lang["edittimer"]="Editar Evento"; 
 $lang["startdate"]="Data Ínicio"; 
 $lang["enddate"]="Data Fim"; 
 $lang["ontime"]="Hora Início"; 
 $lang["offtime"]="Hora Fim"; 

 $lang["weekdays"]="Dias de semana"; 
 $lang["daterange"]="Amplitude de Datas"; 
 $lang["time"]="Hora"; 
 $lang["on"]="Ligado"; 
 $lang["end"]="Fim"; 
 $lang["off"]="Desligado"; 
 $lang["enable"]="Activar"; 
 $lang["disable"]="Desactivar"; 
 $lang["enabled"]="Activado"; 
 $lang["disabled"]="Desactivado"; 
 $lang["execute"]="Executar"; 

 $lang["jan"]="Janeiro"; 
 $lang["feb"]="Fevereiro"; 
 $lang["mar"]="Março"; 
 $lang["apr"]="Abril"; 
 $lang["may"]="Maio"; 
 $lang["jun"]="Junho"; 
 $lang["jul"]="Julho"; 
 $lang["aug"]="Agosto"; 
 $lang["sep"]="Setembro"; 
 $lang["oct"]="Outubro"; 
 $lang["nov"]="Novembro"; 
 $lang["dec"]="Dezembro"; 

 $lang["sun"]="Domingo"; 
 $lang["mon"]="Segunda"; 
 $lang["tue"]="Terça"; 
 $lang["wed"]="Quarta"; 
 $lang["thu"]="Quinta"; 
 $lang["fri"]="Sexta"; 
 $lang["sat"]="Sabado"; 

/* Utility Text */
 $lang["utility"]="Utilitário"; 
 $lang["utilitytool"]="Utilitário - Executar commando heyu"; 
 $lang["arguments"]="Argumentos"; 
 $lang["output"]="Output"; 

/* Macro Text */
 $lang["macro"]="Macro"; 
 $lang["macros"]="Macros"; 
 $lang["delay"]="Atraso"; 
 $lang["addmacro"]="Adicionar Macro"; 
 $lang["editmacro"]="Editar Macro"; 
 $lang["macro_unit"]="Unidade de Macro"; 
 $lang["macro_cmd"]="Commando de Macro"; 
 $lang["obdim"]="On-Bright-Dim"; 
 $lang["brightb"]="Aumentar Brilho"; 
 $lang["timeraddadv"]="Adicionar Temporizador Avançado"; 
 $lang["macro_on"]="Macro On"; 
 $lang["macro_off"]="Macro Off"; 
 $lang["timers_macro"]="Eventos Avançados"; 
 $lang["addmacrotimer"]="Adicionar Evento Avançado"; 
 $lang["editmacrotimer"]="Editar Evento Avançado"; 
 $lang["simple_timers"]="Temporizador Simples"; 

 $lang["null"]="Nulo"; 

/* Advanced Timer Text */
 $lang["dawn"]="Amanhecer"; 
 $lang["dusk"]="Anoitecer"; 
 $lang["reminder"]="Lembrete"; 
 $lang["dawnlt"]="DawnLT"; 
 $lang["dawngt"]="DawnGT"; 
 $lang["dusklt"]="DuskLT"; 
 $lang["duskgt"]="DuskGT"; 
 $lang["security"]="Segurança"; 
 $lang["now"]="Agora"; 
 $lang["timeroptions"]="Opções de Temporizador"; 
 $lang["option"]="Opção"; 
 $lang["expire"]="Expira"; 

/* Heyu Config Management Text */
 $lang["heyumgmt"]="Selecção de Config de Heyu"; 
 $lang["heyumgmtadmin"]="Gestão de Configuração Heyu"; 
 $lang["heyumgmt_txt"]="Esta opção controla qual a configuração que o heyu ira utilizar. Isto é baseado na funcionalidade do heyu que permite seleccionar múltiplas configurações que incluem o config e ficheiros de temporizadores."; 
 $lang["heyucurrentconfig"]="A actual configuração do heyu é"; 
 $lang["heyubaseuse"]="Utilização de directoria base de Heyu"; 
 $lang["heyubaseuse_txt"]="This switch forces domus.Link to pass explicit path directive using -c to heyu on execution based on the heyu_base setting when set to YES. If set to NO, domus.Link will default its heyu_base path and x10config file settings to /etc/heyu and x10.conf respectively."; 
$lang['heyuindir'] = "in directory";

 $lang["directive"]="Directiva"; 
 $lang["comment"]="Comentário"; 
 $lang["value"]="Valor"; 
 $lang["setupverify"]="Verificação de Configuração"; 
 $lang["aliaslocationtext"]="Derived Alias to Locations and Types from Heyu config"; 
 $lang["continue"]="Continuar"; 
 $lang["convert"]="Converter"; 
 $lang["converttext"]="Use displayed alias/locations/types derived from heyu config."; 
 $lang["continuetext"]="Continue without conversion of derived alias/locations/types."; 
 $lang["show"]="Mostrar"; 
 $lang["hide"]="Esconder"; 
 $lang["exitbrowser"]="Feche o browser e volte a tentar"; 
 $lang["addschedfile"]="Add Schedule File"; 
 $lang["noscheddefined"]="No schedule file defined. Check heyu configuration."; 
 $lang["diagnostic"]="Diagnosticar"; 
 $lang["diagnostictext"]="Diagnosticos domus.Link"; 
 $lang["diagnosticstatus"]="Estado de diagnostico - clique para verificar"; 
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
