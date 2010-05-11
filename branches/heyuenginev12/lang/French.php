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
 $lang["other"] = "Autres";
 $lang["login"]="Identification"; 
 $lang["setup"]="Installation"; 
 $lang["aliases"]="Noms des modules"; 
 $lang["floorplan"]="Plan"; 
 $lang["frontend"]="Interface publique"; 
 $lang["heyusetup"]="Configuration de Heyu"; 

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
 $lang["urlpath_txt"]="Ce paramètre définit le chemin de l'URL de l'interface publique. Par exemple, si vous exécutez domus.Link dans un sous répertoire, indiquez http://votre-domaine/domuslink, ensuite vous devez définir le chemin de l'url comme /domuslink. Laissez vide si vous exécutez domus.Link à la racine c-a-d http://votre-domaine/"; 
 $lang["seclevel_txt"]="Les valeurs possibles sont : 0 - Rien; 1 - Administration seulement; 2 - Interface publique complète"; 
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
$lang["macro"] = "Macro ";
$lang["macros"] = "Macros";
$lang["delay"] = "Retard";
$lang["addmacro"] = "Ajouter une macro";
$lang["editmacro"] = "Modifier une macro";
$lang["macro_unit"] = "Macro Unit"; // PLEASE TRANSLATE
$lang["macro_cmd"] = "Macro Command"; // PLEASE TRANSLATE
$lang["obdim"] = "On-Bright-Dim"; // PLEASE TRANSLATE
$lang["brightb"] = "Brighten"; // PLEASE TRANSLATE
$lang["timeraddadv"] = "Timer Add Advanced"; // PLEASE TRANSLATE
$lang["macro_on"] = "Macro On ";
$lang["macro_off"] = "Macro Off ";
$lang["timers_macro"] = "Programmateurs : menu avancé";
$lang["addmacrotimer"] = "Ajouter un programmateur";
$lang["editmacrotimer"] = "Modifier un programmateur";
$lang["simple_timers"] = "Programmateurs : menu simplifié";

$lang["null"] = "Null ";

/* Advanced Timer Text */
$lang["dawn"] = "Lever";
$lang["dusk"] = "Coucher";
$lang["reminder"] = "Rappel ";
$lang["dawnlt"] = "Lever avant";
$lang["dawngt"] = "Lever après";
$lang["dusklt"] = "Coucher avant";
$lang["duskgt"] = "Coucher après";
$lang["security"] = "Securité ";
$lang["now"] = "Maintenant";
$lang["timeroptions"] = "Options ";
$lang["option"] = "Option";
$lang["expire"] = "Expire";

/* Heyu Config Management Text */
$lang["heyumgmt"] = "Choix de la configuration à utiliser";
$lang["heyumgmtadmin"] = "Heyu Configuration Management"; // PLEASE TRANSLATE
$lang["heyumgmt_txt"] = "Permet d'indiquer quels fichiers de configuration Heyu va utiliser. Cette fonction est basée sur les sous-répertoires gérés pas Heyu pour avoir plusieurs configurations qui incluent le fichier de configuration et l'agenda.";
$lang["heyucurrentconfig"] = "Configuration courante de heyu ";
$lang["heyubaseuse"] = "Changer le répertoire de base de Heyu";
$lang["heyubaseuse_txt"] = "Si activée (Yes), cette option permet de forcer domus.Link à passer le répertoire contenant les fichiers de configuration en utilisant la directive -c de Heyu, avec le chemin indiqué dans 'Localisation des fichiers Heyu'. Si à NO, domus.Link utilisera les valeurs par défaut, à savoir /etc/heyu et x10.conf.";
$lang['heyuindir'] = "dans le répertoire";
?>
