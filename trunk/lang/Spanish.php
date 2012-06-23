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
 $lang["lights"]="Luces"; 
 $lang["appliances"]="Dispositivos"; 
 $lang["shutters"]="Persianas"; 
 $lang["irrigation"]="Riego"; 
 $lang["other"]="Otro"; 
 $lang["login"]="Entrar"; 
 $lang["setup"]="Configuración"; 
 $lang["aliases"]="Alias"; 
 $lang["floorplan"]="Planta"; 
 $lang["frontend"]="Interfaz"; 
 $lang["heyusetup"]="Heyu"; 
 $lang["light"]="Light"; 
 $lang["appliance"]="Appliance"; 
 $lang["shutter"]="Shutter"; 

 $lang["add"]="Añadir"; 
 $lang["edit"]="Editar"; 
 $lang["save"]="Guardar"; 
 $lang["cancel"]="Cancelar"; 
 $lang["delete"]="Borrar"; 
 $lang["code"]="Código"; 
 $lang["label"]="Etiqueta"; 
 $lang["module"]="Módulo"; 
 $lang["type"]="Tipo"; 
 $lang["actions"]="Acciones"; 
 $lang["start"]="Arrancar"; 
 $lang["reload"]="Recargar"; 
 $lang["stop"]="Parar"; 
 $lang["move"]="Mover"; 
 $lang["info"]="Info"; 
 $lang["running"]="En ejecución"; 
 $lang["down"]="Abajo"; 
 $lang["addalias"]="Añadir alias"; 
 $lang["editalias"]="Editar alias"; 
 $lang["frontendadmin"]="Configuración interfaz"; 
 $lang["heyuconf"]="Configuración Heyu"; 
 $lang["heyuconfile"]="Archivo de xonfiguración Heyu"; 
 $lang["heyuexec"]="Ejecutable Heyu"; 
 $lang["password"]="Contraseña"; 
 $lang["language"]="Lenguaje del interfaz"; 
 $lang["imgs"]="Menu de imágenes"; 
 $lang["urlpath"]="Ruta URL"; 
 $lang["theme"]="Tema del interfaz"; 
 $lang["heyubaseloc"]="Localización del arvhico Heyu"; 
 $lang["seclevel"]="Nivel de seguridad"; 
 $lang["pcinterface"]="Tipo del interfaz al ordenador"; 
 $lang["refresh"]="Frecuencia de refresco de página"; 
 $lang["location"]="Localización"; 
 $lang["addlocation"]="Añadir localización"; 
 $lang["editlocation"]="Editar localización"; 
 $lang["heyustatus"]="Estado Heyu"; 
 $lang["enter_password"]="Por favor, introduzca la contraseña para acceder al área de administración."; 

/* help texts */
 $lang["heyuexec_txt"]="Esta configuración especifica la ruta del ejecutable del Heyu. Usualmente está en /usr/local/bin/"; 
 $lang["password_txt"]="Defina una contraseña para acceder a las áreas seleccionadas. Déjalo en blanco para desahbilitarla."; 
 $lang["theme_txt"]="Seleccione un tema para la GUI."; 
 $lang["imgs_txt"]="Elija si prefiere el uso de imagenes o texto en la barra de menu."; 
 $lang["heyubaseloc_txt"]="Directorio base de Heyu base directory - Este directorio es donde Heyu guarda su ficheros de configuración, y almacena la información de estado."; 
 $lang["language_txt"]="Define el lenguaje la interfaz aquí. También puedes seleccionar auto, el cual usara las preferencias de lenguaje de tu navagador."; 
 $lang["heyuconfile_txt"]="Este fichero llamado habitualmente x10.conf y suele estar en /etc/heyu/ para el uso del sistema."; 
 $lang["urlpath_txt"]="Leave blank if your are running domus.Link at the root ie http://your-host/. If you are running domus.Link in a special url path, say http://your-host/domuslink, then define the url path as /domuslink (This will require a special apache configuration)."; 
$lang["hvac_seclevel_txt"] = "Possible values are: 0 - requires admin level; 1 - requires maint level; 2...n - specific access level."; // changed // PLEASE TRANSLATE
 $lang["pcinterface_txt"]="El interfaz del ordenador puede ser CM11A o CM17A. El CM11A es el más común y está seleccionado por defecto."; 
 $lang["refresh_txt"]="Inicializando este campo en la página principal en la que se muestran los modulos debería refrescarse cada X segundos. Para desactivarlo, deje el campo en blanco."; 

/* error messages */
 $lang["error_special_chars"]="Caracteres especiales en las etiquetas no están permitidos.<br><br>Por favor inténtelo de nuevo. <a href=admin/aliases.php>Ir atrás</a>"; 
 $lang["error_wrong_pass"]="<b>Error</b>. Su contraseña es incorrecta."; 
 $lang["error_loc_in_use"]="La ubicación que está intentado borrar está en uso. <br />Borre primero todos los usos definidos en <a href=admin/aliases.php>alias</a> y entonces borre la ubicación.<br />"; 

/* changed */
 $lang["deleteconfirm"]="¿ Está seguro que quieres borrar este módulo ?"; 
 $lang["error_not_running"]="<h1>¡ Heyu no se está ejecutando !</h1><br />Por favor arranque heyu pulsando el enlace de arranque.<br />Podría sin embargo, necesitar cambiar los permisos de su puerto serial tty/. <br />También esté seguro de que heyu no se está ejecutando en estos momentos. Para hacerlo 'heyu stop' as root."; 

/* new */
 $lang["codes_txt"]="Select whether or not you would like to show the unit codes in the buttons."; 
 $lang["codes"]="Unit codes"; 
 $lang["unit"]="Unit"; 
 $lang["command"]="Comando"; 
 $lang["log"]="Registro"; 
 $lang["progress"]="Progreso"; 
 $lang["error"]="Error"; 
 $lang["logout"]="Desconectarme"; 
 $lang["keep_login"]="Manterme conectado"; 
 $lang["upload"]="Subir"; 
 $lang["erase"]="Borrar"; 
 $lang["uploadsuccess"]="Subido cargado correctamente"; 
 $lang["erasesuccess"]="Borrado correcto"; 
 $lang["upload_erase_log_txt"]="Pulse <a href='#' onclick='divShowHide(log);'>aquí</a> para ver el registro de salida."; 
 $lang["upload_txt"]="To upload the schedule file defined in the <a href=../admin/heyu.php>heyu configuration</a> file and configured in the <a href=../events/timers.php>timer administration</a> section, click the button bellow."; 
 $lang["erase_txt"]="If you would like to erase the entire contents of your computer interface, click the button bellow."; 
 $lang["upload_erase_txt"]="Please note that uploading/erasing takes aproximately 8 seconds. <br />Do not navigate away from this page until process has completed."; 

 $lang["error_no_modules"]="<h1>¡ No hay módulos disponibles !</h1><br />No se puede mostrar ningún módulo."; 
 $lang["error_filerw"]="¡ No encontrado o se puede escribir !"; 
 $lang["error_filer"]="¡ No encontrado o se puede leer !"; 

 $lang["about"]="Acerca de "; 
 $lang["status"]="Estado"; 
 $lang["events"]="Eventos"; 
 $lang["timers"]="Temporizadores"; 
 $lang["timer"]="Temporizador"; 
 $lang["triggers"]="Activadores"; 
 $lang["trigger"]="Activador"; 
 $lang["addtrigger"]="Añadir activador"; 
 $lang["edittrigger"]="Editar activador"; 
 $lang["trig_cmd"]="Comando activador"; 
 $lang["trig_unit"]="Trigger Unit"; 
 $lang["addtimer"]="Añadir temporizador"; 
 $lang["edittimer"]="Editar temporizador"; 
 $lang["startdate"]="Fecha inicio"; 
 $lang["enddate"]="Fecha final"; 
 $lang["ontime"]="On Time"; 
 $lang["offtime"]="Off Time"; 

 $lang["weekdays"]="Weekdays"; 
 $lang["daterange"]="Date Range"; 
 $lang["time"]="Time"; 
 $lang["on"]="On"; 
 $lang["end"]="End"; 
 $lang["off"]="Off"; 
 $lang["enable"]="Habilitar"; 
 $lang["disable"]="Deshabilitar"; 
 $lang["enabled"]="Habilitado"; 
 $lang["disabled"]="Deshabilitado"; 
 $lang["execute"]="Ejecutar"; 

 $lang["jan"]="Enero"; 
 $lang["feb"]="Febrero"; 
 $lang["mar"]="Marzo"; 
 $lang["apr"]="Abril"; 
 $lang["may"]="Mayo"; 
 $lang["jun"]="Junio"; 
 $lang["jul"]="Julio"; 
 $lang["aug"]="Agosto"; 
 $lang["sep"]="Septiembre"; 
 $lang["oct"]="Octubre"; 
 $lang["nov"]="Noviembre"; 
 $lang["dec"]="Diciembre"; 

 $lang["sun"]="Domingo"; 
 $lang["mon"]="Lunes"; 
 $lang["tue"]="Martes"; 
 $lang["wed"]="Miércoles"; 
 $lang["thu"]="Jueves"; 
 $lang["fri"]="Viernes"; 
 $lang["sat"]="Sábado"; 

/* Utility Text */
 $lang["utility"]="Utilidad"; 
 $lang["utilitytool"]="Utilidad - Ejecuta comando heyu"; 
 $lang["arguments"]="Argumentos"; 
 $lang["output"]="Salida"; 

/* Macro Text */
 $lang["macro"]="Macro"; 
 $lang["macros"]="Macros"; 
 $lang["delay"]="Retardo"; 
 $lang["addmacro"]="Añadir Macro"; 
 $lang["editmacro"]="Editar Macro"; 
 $lang["macro_unit"]="Macro Unit"; 
 $lang["macro_cmd"]="Macro Command"; 
 $lang["obdim"]="On-Bright-Dim"; 
 $lang["brightb"]="Brighten"; 
 $lang["timeraddadv"]="Timer Add Advanced"; 
 $lang["macro_on"]="Macro On"; 
 $lang["macro_off"]="Macro Off"; 
 $lang["timers_macro"]="Advanced Timers"; 
 $lang["addmacrotimer"]="Add Advanced Timer"; 
 $lang["editmacrotimer"]="Edit Advanced Timer"; 
 $lang["simple_timers"]="Simple Timers"; 

 $lang["null"]="Null"; 

/* Advanced Timer Text */
 $lang["dawn"]="Dawn"; 
 $lang["dusk"]="Dusk"; 
 $lang["reminder"]="Reminder"; 
 $lang["dawnlt"]="DawnLT"; 
 $lang["dawngt"]="DawnGT"; 
 $lang["dusklt"]="DuskLT"; 
 $lang["duskgt"]="DuskGT"; 
 $lang["security"]="Securidad"; 
 $lang["now"]="Ahora"; 
 $lang["timeroptions"]="Timer Options"; 
 $lang["option"]="Opción"; 
 $lang["expire"]="Expire"; 

/* Heyu Config Management Text */
 $lang["heyumgmt"]="Heyu Config Select"; 
 $lang["heyumgmtadmin"]="Heyu Configuration Management"; 
 $lang["heyumgmt_txt"]="This controls which configuration heyu will use. This is based on heyu's capability to select multiple configurations that inlcudes the config for heyu and schedule files."; 
 $lang["heyucurrentconfig"]="Current heyu configuration is"; 
 $lang["heyubaseuse"]="Heyu Base Dir Usage"; 
 $lang["heyubaseuse_txt"]="This switch forces domus.Link to pass explicit path directive using -c to heyu on execution based on the heyu_base setting when set to YES. If set to NO, domus.Link will default its heyu_base path and x10config file settings to /etc/heyu and x10.conf respectively."; 
$lang['heyuindir'] = "in directory";

 $lang["directive"]="Directiva"; 
 $lang["comment"]="Comentario"; 
 $lang["value"]="Valor"; 
 $lang["setupverify"]="Setup Verification"; 
 $lang["aliaslocationtext"]="Derived Alias to Locations and Types from Heyu config"; 
 $lang["continue"]="Continuar"; 
 $lang["convert"]="Convertir"; 
 $lang["converttext"]="Use displayed alias/locations/types derived from heyu config."; 
 $lang["continuetext"]="Continue without conversion of derived alias/locations/types."; 
 $lang["show"]="Mostrar"; 
 $lang["hide"]="Ocultar"; 
 $lang["exitbrowser"]="Salga de su navegador e inténtelo de nuevo."; 
 $lang["addschedfile"]="Add Schedule File"; 
 $lang["noscheddefined"]="No schedule file defined. Check heyu configuration."; 
 $lang["diagnostic"]="Diagnostico"; 
 $lang["diagnostictext"]="domus.Link Diagnostics"; 
 $lang["diagnosticstatus"]="Diagnostic status - click to check"; 
 $lang["statusinfo"]="Click for status info"; 
 $lang["systemuptime"]="System Uptime"; 

/* HVAC Text */
 $lang["hvac"]="HVAC"; 
 $lang["temperature"]="Temperature"; 
 $lang["hvacmode"]="Mode"; 
 $lang["setpoint"]="Setpoint"; 
 $lang["OFF"]="OFF"; 
 $lang["ON"]="ON"; 
 $lang["HEAT"]="HEAT"; 
 $lang["COOL"]="COOL"; 
 $lang["AUTO"]="AUTO"; 
 $lang["hvachousecode"]="HVAC House Code"; 
 $lang["hvachousecode_txt"]="Possible values are: None; A-P. If this is set, it will show the temperature, mode and setpoint in the status bar of the selected thermostat"; 

 $lang["YES"]="YES"; 
 $lang["NO"]="NO"; 

 $lang["diagnosticstatususer"]="Diagnostic status"; 
 $lang["statusinfouser"]="Status of heyu"; 
 $lang["users"]="Users"; 
 $lang["secleveltype"]="Security Level Type"; 
 $lang["adduser"]="Add User"; 
 $lang["edituser"]="Edit User"; 
 $lang["username"]="Username"; 
 $lang["secleveltypeexact"]="Exact"; 
 $lang["secleveltypegreater"]="Greater"; 
 $lang["usertypepin"]="PIN"; 
 $lang["usertypeuser"]="User"; 
 $lang["group"]="Group"; 
 $lang["groups"]="Groups"; 
 $lang["imagename"]="Image Name"; 
 $lang["addgroups"]="Add Group"; 
 $lang["editgroups"]="Edit Group"; 
 $lang["themeview_txt"]="Select a theme view for the theme. Either select typed for the default view by module type or grouped for the custom user grouping."; 
 $lang["themeview"]="Theme View"; 
 $lang["themeviewinfo"]="This sets the view of domus.Link to either builtin typed or custom user setup grouped"; 
 $lang["thememobile"]="Mobile Theme"; 
 $lang["thememobile_txt"]="Select a theme for the autodetect mobile theme."; 
 $lang["mobileselect"]="Mobile Select"; 
 $lang["mobileselect_txt"]=" A list of strings to search aginst the http_user_agent to set the mobile theme automatically. This is a comma separated list. The search will be case insensitive."; 
 $lang["refreshinfo"]="Refresh is on for "; 
 $lang["menu"]="Menu"; 
 $lang["newloc"]="Enter New Location"; 
 $lang["OR"]="OR"; 
 $lang["domussecurity"]="domus.Link Security"; 
 $lang["use_domus_security_txt"]="This sets the control for security usage in domus.Link. The default is ON. !!!! WARNING !!!! If this is set to OFF, there is no guarantee of access to the system that domus.Link is running on as there will be no access restriction. If you expose this interface outside of the machine (i.e. To the internet) and the security is OFF, you will be open to security vulnerabilities to your system."; 
$lang["scene"] = "Scene"; // PLEASE TRANSLATE
$lang["scenes"] = "Scenes"; // PLEASE TRANSLATE
$lang["commands"] = "Commands"; // PLEASE TRANSLATE
$lang["addscene"] = "Add Scene"; // PLEASE TRANSLATE
$lang["editscene"] = "Edit Scene"; // PLEASE TRANSLATE
$lang["run"] = "Run"; // PLEASE TRANSLATE
?>
