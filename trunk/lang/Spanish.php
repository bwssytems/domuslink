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
 $lang["irrigation"]="Riego"; 
 $lang["login"]="Entrar"; 
 $lang["setup"]="Configuración"; 
 $lang["aliases"]="Alias"; 
 $lang["floorplan"]="Planta"; 
 $lang["frontend"]="Interfaz"; 
 $lang["heyusetup"]="Heyu"; 

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
 $lang["login"]="Entrar"; 
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
 $lang["urlpath_txt"]="Si está ejecutando domus.Link en una carpeta de su servidor web elija http://su-maquina/domuslinks, y defina la ruta como /domuslink. Deje en blaco si está ejecutando domus.Link en la raiz de su servidor web, elija http://su-maquina/"; 
 $lang["seclevel_txt"]="Los posibles valores son: 0 - Ninguna; 1 - Sólo el área de configuración; 2 - Toda la interfaz."; 
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
 $lang["log"]="Log"; 
 $lang["progress"]="Progreso"; 
 $lang["error"]="Error"; 
 $lang["logout"]="Desconectarme"; 
 $lang["keep_login"]="Manterme conectado"; 
 $lang["upload"]="Subir"; 
 $lang["erase"]="Borrar"; 
 $lang["uploadsuccess"]="Subido cargado correctamente"; 
 $lang["erasesuccess"]="Borrado correcto"; 
 $lang["upload_erase_log_txt"]="Click <a href='#' onclick='divShowHide(log);'>here</a> to view output log."; 
 $lang["upload_txt"]="To upload the schedule file defined in the <a href=../admin/heyu.php>heyu configuration</a> file and configured in the <a href=../events/timers.php>timer administration</a> section, click the button bellow."; 
 $lang["erase_txt"]="If you would like to erase the entire contents of your computer interface, click the button bellow."; 
 $lang["upload_erase_txt"]="Please note that uploading/erasing takes aproximately 8 seconds. <br />Do not navigate away from this page until process has completed."; 

 $lang["error_no_modules"]="<h1>¡ No hay módulos disponibles !</h1><br />No se puede mostrar ningún módulo."; 
 $lang["error_filerw"]="not found or not writable!"; 
 $lang["error_filer"]="not found or not readable!"; 

 $lang["about"]="Acerca de "; 
 $lang["status"]="Estado"; 
 $lang["events"]="Eventos"; 
 $lang["timers"]="Timers"; 
 $lang["timer"]="Timer"; 
 $lang["triggers"]="Activadores"; 
 $lang["trigger"]="Activador"; 
 $lang["addtrigger"]="Añadir activador"; 
 $lang["edittrigger"]="Editar activador"; 
 $lang["trig_cmd"]="Comando activador"; 
 $lang["trig_unit"]="Trigger Unit"; 
 $lang["addtimer"]="Add Timer"; 
 $lang["edittimer"]="Edit Timer"; 
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
$lang["utility"] = "Utility"; // PLEASE TRANSLATE
$lang["utilitytool"] = "Utility - Excecute heyu Command"; // PLEASE TRANSLATE
$lang["arguments"] = "Arguments"; // PLEASE TRANSLATE
$lang["output"] = "Output"; // PLEASE TRANSLATE

?>
