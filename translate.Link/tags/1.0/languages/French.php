<?php

$lang["dlurl"]="http://domus.link.co.pt";
$lang["title"]="domus.Link";
$lang["home"]="Home";
$lang["lights"]="Lumières";
$lang["appliances"]="Appareils";
$lang["irrigation"]="Irrigation";
$lang["login"]="Identification";
$lang["setup"]="Installation";
$lang["aliases"]="Noms des modules";
$lang["floorplan"]="Floorplan";
$lang["frontend"]="Interface publique";
$lang["heyusetup"]="Configuration de Heyu";
$lang["add"]="Ajouter";
$lang["edit"]="Modifier";
$lang["save"]="Enregistrer";
$lang["cancel"]="Annuler";
$lang["delete"]="Supprimer";
$lang["code"]="Code";
$lang["label"]="Nom symbolique";
$lang["module"]="Module";
$lang["type"]="Type";
$lang["actions"]="Actions";
$lang["start"]="DEMARRER";
$lang["reload"]="RECHARGER";
$lang["stop"]="ARRETER";
$lang["move"]="Move";
$lang["info"]="Info";
$lang["running"]="Running";
$lang["down"]="Down";
$lang["addalias"]="Ajouter un module";
$lang["editalias"]="Modifier un module";
$lang["frontendadmin"]="Configuration de l'interface publique";
$lang["heyuconf"]="Configuration de Heyu";
$lang["heyuconfile"]="Fichier de configuration de Heyu";
$lang["heyuexec"]="Exécutable Heyu";
$lang["password"]="Mot de passe de la zone de paramétrage";
$lang["language"]="Langage de l'interface publique";
$lang["imgs"]="Menu Images";
$lang["urlpath"]="Chemin de l'URL";
$lang["theme"]="Thème de l'interface publique";
$lang["heyubaseloc"]="Localisation du fichier Heyu";
$lang["seclevel"]="Security Level";
$lang["pcinterface"]="Computer Interface Type";
$lang["refresh"]="Page Refresh Timer";
$lang["location"]="Location";
$lang["addlocation"]="Add Location";
$lang["editlocation"]="Edit Location";
$lang["heyustatus"]="Etat de Heyu";
$lang["deleteconfirm"]="Cliquer sur OK pour confirmer la suppression.";
$lang["enter_password"]="Please enter your password to access the administration area.";
$lang["heyuexec_txt"]="Ce paramètre spécifie l'endroit où se trouve le fichier exécutable Heyu. Typiquement, il se trouve dans /usr/local/bin/";
$lang["password_txt"]="Définissez un mot de passe ici pour accéder à la zone de paramétrage de l'interface publique. Laissez vide pour désactiver le mot de passe.";
$lang["theme_txt"]="Sélectionnez un thème pour l'interface graphique.";
$lang["imgs_txt"]="Sélectionnez si vous voulez ou non utiliser des images à la place du texte dans la barre de menu.";
$lang["setup_txt"]="C'est ici que vous pouvez configurer tous les paramètres.<br />S'il vous plaît, sélectionnez une option dans le sous-menu sous 'Installation'";
$lang["heyubaseloc_txt"]="Répertoire de base de Heyu - Ce répertoire indique où Heyu va chercher ses fichiers de configuration, et où il stocke ses informations d'état";
$lang["language_txt"]="Définissez le langage de l'interface utilisateur ici. Vous pouvez aussi sélectionner auto, pour utiliser le langage préféré du navigateur. Dans le cas où le langage n'est pas trouvé, English sera sélectionné par défaut";
$lang["heyuconfile_txt"]="Le fichier de configuration contient plusieurs informations critiques dont le programme heyu a besoin pour fonctionner correctement, ainsi que des options utilisateur. Ce fichier s'appelle typiquement x10.conf et il est généralement situé dans /etc/heyu pour les utilisations classiques du système.";
$lang["urlpath_txt"]="Ce paramètre définit le chemin de l'URL de l'interface publique. Par exemple, si vous exécutez domus.Link dans un sous répertoire, indiquez http://your-host/domuslink, ensuite vous devez définir le chemin de l'url comme /domuslink. Laissez vide si vous exécutez domus.Link à la racine c-a-d http://your-host/";
$lang["seclevel_txt"]="Possible values are: 0 - None; 1 - Only administration; 2 - Entire frontend.";
$lang["pcinterface_txt"]="The Computer Interface can either be the CM11A or the CM17A. The CM11A is the most common and therefore selected by default.";
$lang["refresh_txt"]="By setting this field the main page in which the modules are shown shall be refreshed every X seconds. To disable, leave field blank.";
$lang["error_not_running"]="<h1>HEYU EST ARRETE !</h1>S'il vous plaît, démarrez heyu!<br />Vous pouvez avoir à changer les permissions du port tty.";
$lang["error_special_chars"]="Les caractères spéciaux dans les noms symboliques ne sont pas autorisés.<br /><br />Réessayez s'il vous plaît. <a href=admin/aliases.php>Retour</a>";
$lang["error_wrong_pass"]="<b>Error</b>. Your password is incorrect.";
$lang["error_loc_in_use"]="The location you are attempting to remove is currently in use. <br />First remove all usages from <a href=admin/aliases.php>aliases</a> then delete the location.<br />";

?>