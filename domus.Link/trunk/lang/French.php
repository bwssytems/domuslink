<?php
/*
 * French Language File
 *
 */

/** v0.1 **/

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['all'] = 'Tous';
$lang['lights'] = 'Lumières';
$lang['appliances'] = 'Appareils';
$lang['irrigation'] = 'Irrigation';
$lang['hvac'] = 'HVAC';
$lang['events'] = 'Evènements';
$lang['setup'] = 'Installation';
$lang['heyusetup'] = 'Configuration de Heyu';
$lang['frontend'] = 'Interface publique';

$lang['add'] = 'Ajouter';
$lang['edit'] = 'Modifier';
$lang['save'] = 'Enregistrer';
$lang['cancel'] = 'Annuler';
$lang['delete'] = 'Supprimer';
$lang['deleteconfirm'] = 'Cliquer sur OK pour confirmer la suppression.';

$lang['heyustatus'] = 'Etat de Heyu';
$lang['start'] = 'DEMARRER';
$lang['reload'] = 'RECHARGER';
$lang['stop'] = 'ARRETER';

$lang['frontendadmin'] = 'Configuration de l\'interface publique';
$lang['heyuconf'] = 'Configuration de Heyu';
$lang['heyuconfile'] = 'Fichier de configuration de Heyu';
$lang['heyuexec'] = 'Exécutable Heyu';
$lang['password'] = 'Mot de passe de la zone de paramétrage';
$lang['language'] = 'Langage de l\'interface publique';
$lang['imgs'] = 'Menu Images';
$lang['urlpath'] = 'Chemin de l\'URL';
$lang['theme'] = 'Thème de l\'interface publique';

$lang['aliases'] = 'Noms des modules';
$lang['addalias'] = 'Ajouter un module';
$lang['editalias'] = 'Modifier un module';
$lang['code'] = 'Code';
$lang['label'] = 'Nom symbolique';
$lang['module'] = 'Module';
$lang['type'] = 'Type';
$lang['actions'] = 'Actions';

/*** aliases txt ***/
$lang['code_txt'] = 'Entrez le code Maison et Unité. Assurez vous qu\'il n\'est pas déjà utilisé. Les noms symboliques tels que "A1,2" ne sont ' .
		' pas supporté pour le moment.';

$lang['label_txt'] = 'Entrez une description pour ce module. Notez que tous les espaces seront remplacés par un "_" ' .
		'et que les lettres majuscules seront sauvegardées comme des minuscules.';

$lang['module_txt'] = 'Choisissez le type de modèle du module.';

$lang['type_txt'] = 'Sélectionnez ce que ce module contrôle.';

/*** heyuconf txt ***/
$lang['heyuconfile_txt'] = 'Le fichier de configuration contient plusieurs informations critiques ' .
		'dont le programme heyu a besoin pour fonctionner correctement, ' .
		'ainsi que des options utilisateur. Ce fichier s\'appelle typiquement <span class="code">x10.conf</span> ' .
		'et il est généralement situé dans <span class="code">/etc/heyu</span> pour les utilisations classiques du système.';

$lang['heyuexec_txt'] = 'Ce paramètre spécifie l\'endroit où se trouve le fichier exécutable Heyu. ' .
		'Typiquement, il se trouve dans <span class="code">/usr/local/bin/</span>';

$lang['password_txt'] = 'Définissez un mot de passe ici pour accéder à la zone de paramétrage de l\'interface publique. ' .
		'Laissez <span class="code">vide</span> pour désactiver le mot de passe.';

$lang['language_txt'] = 'Définissez le langage de l\'interface utilisateur ici. Vous pouvez aussi ' .
		'sélectionner auto, pour utiliser le langage préféré du navigateur. Dans le cas où le langage ' .
		'n\'est pas trouvé, English sera sélectionné par défaut';

$lang['theme_txt'] = 'Sélectionnez un thème pour l\'interface graphique.';

$lang['imgs_txt'] = 'Sélectionnez si vous voulez ou non utiliser des images à la place du texte dans la barre de menu.';

$lang['urlpath_txt'] = 'Ce paramètre définit le chemin de l\'URL de l\'interface publique. ' .
		'Par exemple, si vous exécutez domus.Link dans un sous répertoire, indiquez <span class="code">' .
		'http://your-host/domuslink</span>, ensuite vous devez définir le chemin de l\'url comme ' .
		'<span class="code">/domuslink</span>. Laissez vide si vous exécutez domus.Link à la racine ' .
		'c-a-d <span class="code">http://your-host/</span>';

/*** other txt ***/
$lang['setup_txt'] = 'C\'est ici que vous pouvez configurer tous les paramètres.<br>' .
		'S\'il vous plaît, sélectionnez une option dans le sous-menu sous "Installation"';


/**** v0.1.1 aditions/changes ***/

$lang['login'] = 'Login';
$lang['heyubaseloc'] = 'Heyu File Location';
$lang['heyubaseloc_txt'] = 'Heyu base directory - This directory is where Heyu searches for it\'s configuration files, and stores state information';
$lang['error_not_running'] = '<h1>HEYU IS NOT RUNNING!</h1>Please start heyu!<br />You may need to change permissions to tty port.';
$lang['error_special_chars'] = 'Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>';

?>
