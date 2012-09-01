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

 $lang["home"]="Accueil"; 
 $lang["lights"]="Lumières"; 
 $lang["appliances"]="Appareils"; 
 $lang["shutters"]="Volets"; 
 $lang["irrigation"]="Arrosage"; 
 $lang["other"]="Autres"; 
 $lang["login"]="Identification"; 
 $lang["setup"]="Installation"; 
 $lang["aliases"]="Noms des modules"; 
 $lang["floorplan"]="Plan"; 
 $lang["frontend"]="Interface publique"; 
 $lang["heyusetup"]="Configuration de Heyu"; 
 $lang["light"]="Lumière"; 
 $lang["appliance"]="Modules"; 
 $lang["shutter"]="Volets"; 

 $lang["add"]="Ajouter"; 
 $lang["edit"]="Modifier"; 
 $lang["save"]="Enregistrer"; 
 $lang["cancel"]="Annuler"; 
 $lang["delete"]="Supprimer"; 
 $lang["code"]="Code"; 
 $lang["label"]="Nom symbolique "; 
 $lang["module"]="Module"; 
 $lang["type"]="Type"; 
 $lang["actions"]="Actions"; 
 $lang["start"]="démarrer"; 
 $lang["reload"]="recharger"; 
 $lang["stop"]="arrêter"; 
 $lang["move"]="Déplacer"; 
 $lang["info"]="Info"; 
 $lang["running"]="En marche"; 
 $lang["down"]="Arrêté"; 
 $lang["addalias"]="Ajouter un module"; 
 $lang["editalias"]="Modifier un module"; 
 $lang["frontendadmin"]="Configuration de l'interface publique"; 
 $lang["heyuconf"]="Configuration de Heyu"; 
 $lang["heyuconfile"]="Fichier de configuration de Heyu"; 
 $lang["heyuexec"]="Exécutable Heyu"; 
 $lang["password"]="Mot de passe de la zone de paramétrage "; 
 $lang["language"]="Langage de l'interface publique"; 
 $lang["imgs"]="Menu en Images"; 
 $lang["urlpath"]="Chemin de l'URL"; 
 $lang["theme"]="Thème de l'interface publique"; 
 $lang["heyubaseloc"]="Localisation des fichiers Heyu"; 
 $lang["seclevel"]="Niveau de sécurité"; 
 $lang["pcinterface"]="Type de l'interface informatique"; 
 $lang["refresh"]="Délai de rafraichissement de la page"; 
 $lang["location"]="Lieu"; 
 $lang["addlocation"]="Ajouter un lieu"; 
 $lang["editlocation"]="Modifier un lieu"; 
 $lang["heyustatus"]="État de Heyu "; 
 $lang["enter_password"]="S'il vous plait, entrez votre mot de passe pour accéder à la zone d'administration."; 

/* help texts */
 $lang["heyuexec_txt"]="Ce paramètre spécifie l'endroit où se trouve le fichier exécutable Heyu. Typiquement, il se trouve dans /usr/local/bin/"; 
 $lang["password_txt"]="Définissez un mot de passe ici pour accéder à la zone de paramétrage de l'interface publique. Laissez vide pour désactiver le mot de passe."; 
 $lang["theme_txt"]="Sélectionnez un thème pour l'interface graphique."; 
 $lang["imgs_txt"]="Sélectionnez si vous voulez ou non utiliser des images à la place du texte dans la barre de menu."; 
 $lang["heyubaseloc_txt"]="Répertoire de base de Heyu - Ce répertoire indique où Heyu va chercher ses fichiers de configuration, et où il stocke ses informations d'état. Utilisé uniquement si vous avez décidé de 'Changer le répertoire de base de Heyu'"; 
 $lang["language_txt"]="Définissez le langage de l'interface utilisateur ici. Vous pouvez aussi sélectionner auto, pour utiliser le langage préféré du navigateur. Dans le cas où le langage n'est pas trouvé, English sera sélectionné par défaut"; 
 $lang["heyuconfile_txt"]="Le fichier de configuration contient plusieurs informations critiques dont le programme heyu a besoin pour fonctionner correctement, ainsi que des options utilisateur. Ce fichier s'appelle typiquement x10.conf et il est généralement situé dans /etc/heyu pour les utilisations classiques du système. Utilisé uniquement si vous avez décidé de 'Changer le répertoire de base de Heyu'"; 
 $lang["urlpath_txt"]="Laissez vide si vous executez domus.Link à la racine, par exemple http://your-host/. Si executez domus.Link dans une url spéciale, par exemple http://your-host/domuslink, définissez alors le chemin '/domuslink' (Cela necessitera une configuration speciale d'apache)."; 
 $lang["hvac_seclevel_txt"]="Valeurs possibles :  0 - niveau admin requis; 1 - niveau maintenant requis; 2...n - niveau d'accès spécifique."; 
 $lang["pcinterface_txt"]="L'interface informatique peut être soit la CM11A ou la CM17A. La CM11A est la plus courant et ainsi sélectionnée par défaut."; 
 $lang["refresh_txt"]="En remplissant ce champ, la page principale dans laquelle apparaissent les modules sera rafraichie toutes les X secondes. Pour désactiver cette fonction, laisser ce champs vide."; 

/* error messages */
 $lang["error_special_chars"]="Les caractères spéciaux dans les noms symboliques ne sont pas autorisés.<br /><br />Réessayez s'il vous plaît. <a href=admin/aliases.php>Retour</a>"; 
 $lang["error_wrong_pass"]="<b>Erreur</b>. Votre mot de passe est incorrect."; 
 $lang["error_loc_in_use"]="Le lieu que vous essayez de supprimer est actuellement utilisé. <br />Supprimez d'abord toutes les utilisations à partir de <a href=admin/aliases.php>noms symboliques</a> ensuite supprimez le lieu.<br />"; 

/* changed */
 $lang["deleteconfirm"]="Cliquer sur OK pour confirmer la suppression."; 
 $lang["error_not_running"]="<h1>HEYU EST ARRÊTÉ !</h1>S'il vous plaît, démarrez heyu !<br />Vous pouvez avoir à changer les permissions du port tty."; 

/* new */
 $lang["codes_txt"]="Choisissez si vous souhaitez afficher ou non le code unité dans les boutons."; 
 $lang["codes"]="Codes unité"; 
 $lang["unit"]="Unité"; 
 $lang["command"]="Commande"; 
 $lang["log"]="Log"; 
 $lang["progress"]="Progression"; 
 $lang["error"]="Erreur"; 
 $lang["logout"]="Déconnexion"; 
 $lang["keep_login"]="Rester connecté "; 
 $lang["upload"]="Charger"; 
 $lang["erase"]="Effacer"; 
 $lang["uploadsuccess"]="Chargement Réussi"; 
 $lang["erasesuccess"]="Effacement Réussi"; 
 $lang["upload_erase_log_txt"]="Cliquer <a href='#' onclick='divShowHide(log);'>ICI</a> pour voir le journal."; 
 $lang["upload_txt"]="Pour charger le fichier d'agenda (SCHEDULE FILE) défini dans le fichier de <a href=../admin/heyu.php>configuration de heyu</a> et configuré dans la section <a href=../events/timers.php>timer administration</a>, cliquer sur le bouton ci-dessous."; 
 $lang["erase_txt"]="Si vous souhaitez effacer tout le contenu de l'interface informatique (CM11A ou CM17A), cliquer sur le bouton ci-dessous."; 
 $lang["upload_erase_txt"]="Attention le téléchargement/effacement dure approximativement 8 secondes. <br />Ne quittez pas la page avant la fin du traitement."; 

 $lang["error_no_modules"]="<h1>Aucun module disponible !</h1><br />Aucun module à afficher."; 
 $lang["error_filerw"]="non trouvé ou pas les droits d'écriture !"; 
 $lang["error_filer"]="non trouvé ou pas les droits de lecture !"; 

 $lang["about"]="A propos de ..."; 
 $lang["status"]="Statut "; 
 $lang["events"]="Évènements"; 
 $lang["timers"]="Programmateurs"; 
 $lang["timer"]="Programmateur"; 
 $lang["triggers"]="Déclencheurs"; 
 $lang["trigger"]="Déclencheur"; 
 $lang["addtrigger"]="Ajouter un déclencheur"; 
 $lang["edittrigger"]="Modifier un déclencheur"; 
 $lang["trig_cmd"]="Commande déclencheur "; 
 $lang["trig_unit"]="Unité déclencheur "; 
 $lang["addtimer"]="Ajouter un programmateur"; 
 $lang["edittimer"]="Modifier un programmateur"; 
 $lang["startdate"]="Date début "; 
 $lang["enddate"]="Date fin "; 
 $lang["ontime"]="Heure On "; 
 $lang["offtime"]="Heure Off "; 

 $lang["weekdays"]="Jours "; 
 $lang["daterange"]="Période "; 
 $lang["time"]="Heure"; 
 $lang["on"]="On"; 
 $lang["end"]="Fin"; 
 $lang["off"]="Off"; 
 $lang["enable"]="Activer"; 
 $lang["disable"]="Désactiver"; 
 $lang["enabled"]="Activé"; 
 $lang["disabled"]="Désactivé"; 
 $lang["execute"]="Lancer "; 

 $lang["jan"]="Janvier"; 
 $lang["feb"]="Février"; 
 $lang["mar"]="Mars"; 
 $lang["apr"]="Avril"; 
 $lang["may"]="Mai"; 
 $lang["jun"]="Juin"; 
 $lang["jul"]="Juillet"; 
 $lang["aug"]="Août"; 
 $lang["sep"]="Septembre"; 
 $lang["oct"]="Octobre"; 
 $lang["nov"]="Novembre"; 
 $lang["dec"]="Décembre"; 

 $lang["sun"]="Dimanche"; 
 $lang["mon"]="Lundi"; 
 $lang["tue"]="Mardi"; 
 $lang["wed"]="Mercredi"; 
 $lang["thu"]="Jeudi"; 
 $lang["fri"]="Vendredi"; 
 $lang["sat"]="Samedi"; 

/* Utility Text */
 $lang["utility"]="Utilitaires"; 
 $lang["utilitytool"]="Utilitaire - Lance une commande heyu"; 
 $lang["arguments"]="Arguments"; 
 $lang["output"]="Sortie"; 

/* Macro Text */
 $lang["macro"]="Macro "; 
 $lang["macros"]="Macros"; 
 $lang["delay"]="Retard"; 
 $lang["addmacro"]="Ajouter une macro"; 
 $lang["editmacro"]="Modifier une macro"; 
 $lang["macro_unit"]="Macro Unit"; 
 $lang["macro_cmd"]="Macro Command"; 
 $lang["obdim"]="On-Bright-Dim"; 
 $lang["brightb"]="Brighten"; 
 $lang["timeraddadv"]="Timer Add Advanced"; 
 $lang["macro_on"]="Macro On "; 
 $lang["macro_off"]="Macro Off "; 
 $lang["timers_macro"]="Programmateurs : menu avancé"; 
 $lang["addmacrotimer"]="Ajouter un programmateur"; 
 $lang["editmacrotimer"]="Modifier un programmateur"; 
 $lang["simple_timers"]="Programmateurs : menu simplifié"; 

 $lang["null"]="Null "; 

/* Advanced Timer Text */
 $lang["dawn"]="Lever"; 
 $lang["dusk"]="Coucher"; 
 $lang["reminder"]="Rappel "; 
 $lang["dawnlt"]="Lever avant"; 
 $lang["dawngt"]="Lever après"; 
 $lang["dusklt"]="Coucher avant"; 
 $lang["duskgt"]="Coucher après"; 
 $lang["security"]="Securité "; 
 $lang["now"]="Maintenant"; 
 $lang["timeroptions"]="Options "; 
 $lang["option"]="Option"; 
 $lang["expire"]="Expire"; 

/* Heyu Config Management Text */
 $lang["heyumgmt"]="Choix de la configuration à utiliser"; 
 $lang["heyumgmtadmin"]="Heyu Configuration Management"; 
 $lang["heyumgmt_txt"]="Permet d'indiquer quels fichiers de configuration Heyu va utiliser. Cette fonction est basée sur les sous-répertoires gérés pas Heyu pour avoir plusieurs configurations qui incluent le fichier de configuration et l'agenda."; 
 $lang["heyucurrentconfig"]="Configuration courante de heyu "; 
 $lang["heyubaseuse"]="Changer le répertoire de base de Heyu"; 
 $lang["heyubaseuse_txt"]="Si activée (Yes), cette option permet de forcer domus.Link à passer le répertoire contenant les fichiers de configuration en utilisant la directive -c de Heyu, avec le chemin indiqué dans 'Localisation des fichiers Heyu'. Si à NO, domus.Link utilisera les valeurs par défaut, à savoir /etc/heyu et x10.conf."; 
$lang['heyuindir'] = "in directory";

 $lang["directive"]="Directive"; 
 $lang["comment"]="Commentaire"; 
 $lang["value"]="Valeur"; 
 $lang["setupverify"]="Vérification de la configuration"; 
 $lang["aliaslocationtext"]="Conversion des données d'après les fichiers de configuration de Heyu"; 
 $lang["continue"]="Continuer"; 
 $lang["convert"]="Convertir"; 
 $lang["converttext"]="Convertie les données alias/locations/types au nouveau format."; 
 $lang["continuetext"]="Continue sans convertir."; 
 $lang["show"]="Montrer"; 
 $lang["hide"]="Cacher"; 
 $lang["exitbrowser"]="Fermez votre navigateur et essayez à nouveau."; 
 $lang["addschedfile"]="Ajouter un fichier d'agenda"; 
 $lang["noscheddefined"]="Pas d'agenda défini. Vérifiez la configuration de Heyu."; 
 $lang["diagnostic"]="Diagnostic"; 
 $lang["diagnostictext"]="domus.Link Diagnostic"; 
 $lang["diagnosticstatus"]="État du Diagnostic - cliquer pour vérifier"; 
 $lang["statusinfo"]="Cliquer pour obtenir les informations d'état"; 
 $lang["systemuptime"]="Système Uptime"; 

/* HVAC Text */
 $lang["hvac"]="Climatisation"; 
 $lang["temperature"]="Temperature"; 
 $lang["hvacmode"]="Mode"; 
 $lang["setpoint"]="Consigne"; 
 $lang["OFF"]="OFF"; 
 $lang["ON"]="ON"; 
 $lang["HEAT"]="Chaud"; 
 $lang["COOL"]="Froid"; 
 $lang["AUTO"]="AUTO"; 
 $lang["hvachousecode"]="Code Maison Clim"; 
 $lang["hvachousecode_txt"]="Les valeurs possibles sont: Rien; A-P. Si défini, heya affichera la tempéture, le mode, et la consigne dans la barre de statut du thermostat selectionné"; 

 $lang["YES"]="OUI"; 
 $lang["NO"]="NON"; 

 $lang["diagnosticstatususer"]="Résultat du diagnostique"; 
 $lang["statusinfouser"]="Etat de heyu"; 
 $lang["users"]="Utilisateurs"; 
 $lang["secleveltype"]="Niveau de sécurité"; 
 $lang["adduser"]="Ajouter Utilisateur"; 
 $lang["edituser"]="Editer Utilsateurs"; 
 $lang["username"]="Utilisateur"; 
 $lang["secleveltypeexact"]="Exact"; 
 $lang["secleveltypegreater"]="Supérieur"; 
 $lang["usertypepin"]="Code"; 
 $lang["usertypeuser"]="Utilisateur"; 
 $lang["group"]="Groupe"; 
 $lang["groups"]="Groupes"; 
 $lang["imagename"]="Nom de l'image"; 
 $lang["addgroups"]="Ajouter groupe"; 
 $lang["editgroups"]="Editer groupe"; 
 $lang["themeview_txt"]="Sélectionnez une vue pour le thème : soit default pour visualiser par type de module ou personnalisé pour le regroupement personnalisé."; 
 $lang["themeview"]="Thème sélectionné"; 
 $lang["themeviewinfo"]="Cette liste definit le type de visualisation de domus.Link soit 'typed' ou 'grouped' pour le reglage utilisateur"; 
 $lang["thememobile"]="Mobile Theme"; 
 $lang["thememobile_txt"]="Choisissez un theme pour la detection mobile."; 
 $lang["mobileselect"]="Choix mobile."; 
 $lang["mobileselect_txt"]=" Liste de http_user_agent permettant de basculer automatique sur le theme mobile. Séparée par des virugules. La recherche est insensible a la casse."; 
 $lang["refreshinfo"]="Refresh is on for "; 
 $lang["menu"]="Menu"; 
 $lang["newloc"]="Entrer nouvelle position"; 
 $lang["OR"]="OU"; 
 $lang["domussecurity"]="domus.Link Security"; 
 $lang["use_domus_security_txt"]="This sets the control for security usage in domus.Link. The default is ON. !!!! WARNING !!!! If this is set to OFF, there is no guarantee of access to the system that domus.Link is running on as there will be no access restriction. If you expose this interface outside of the machine (i.e. To the internet) and the security is OFF, you will be open to security vulnerabilities to your system."; 
$lang["scene"] = "Scene"; // PLEASE TRANSLATE
$lang["scenes"] = "Scenes"; // PLEASE TRANSLATE
$lang["commands"] = "Commands"; // PLEASE TRANSLATE
$lang["addscene"] = "Add Scene"; // PLEASE TRANSLATE
$lang["editscene"] = "Edit Scene"; // PLEASE TRANSLATE
$lang["run"] = "Run"; // PLEASE TRANSLATE
?>
