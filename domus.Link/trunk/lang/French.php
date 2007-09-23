<?php
/*
 * French Language File
 *
 */

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
$lang['login'] = 'Identification';

$lang['add'] = 'Ajouter';
$lang['edit'] = 'Modifier';
$lang['save'] = 'Enregistrer';
$lang['cancel'] = 'Annuler';
$lang['delete'] = 'Supprimer';
$lang['deleteconfirm'] = 'Cliquer sur OK pour confirmer la suppression.';

$lang['aliases'] = 'Noms des modules';
$lang['addalias'] = 'Ajouter un module';
$lang['editalias'] = 'Modifier un module';
$lang['code'] = 'Code';
$lang['label'] = 'Nom symbolique';
$lang['module'] = 'Module';
$lang['type'] = 'Type';
$lang['actions'] = 'Actions';

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
$lang['heyubaseloc'] = 'Localisation du fichier Heyu';

$lang['code_txt'] = 'Entrez le code Maison et Unité. Assurez vous qu\'il n\'est pas déjà utilisé. Les noms symboliques tels que "A1,2" ne sont pas supporté pour le moment.';
$lang['label_txt'] = 'Entrez une description pour ce module. Notez que tous les espaces seront remplacés par un "_" et que les lettres majuscules seront sauvegardées comme des minuscules.';
$lang['module_txt'] = 'Choisissez le type de modèle du module.';
$lang['type_txt'] = 'Sélectionnez ce que ce module contrôle.';

$lang['heyuexec_txt'] = 'Ce paramètre spécifie l\'endroit où se trouve le fichier exécutable Heyu. Typiquement, il se trouve dans <span class="code">/usr/local/bin/</span>';
$lang['password_txt'] = 'Définissez un mot de passe ici pour accéder à la zone de paramétrage de l\'interface publique. Laissez <span class="code">vide</span> pour désactiver le mot de passe.';
$lang['theme_txt'] = 'Sélectionnez un thème pour l\'interface graphique.';
$lang['imgs_txt'] = 'Sélectionnez si vous voulez ou non utiliser des images à la place du texte dans la barre de menu.';
$lang['setup_txt'] = 'C\'est ici que vous pouvez configurer tous les paramètres.<br>S\'il vous plaît, sélectionnez une option dans le sous-menu sous "Installation"';
$lang['heyubaseloc_txt'] = 'Répertoire de base de Heyu - Ce répertoire indique où Heyu va chercher ses fichiers de configuration, et où il stocke ses informations d\'état';
$lang['language_txt'] = 'Définissez le langage de l\'interface utilisateur ici. Vous pouvez aussi ' .
		'sélectionner auto, pour utiliser le langage préféré du navigateur. Dans le cas où le langage ' .
		'n\'est pas trouvé, English sera sélectionné par défaut';
$lang['heyuconfile_txt'] = 'Le fichier de configuration contient plusieurs informations critiques ' .
		'dont le programme heyu a besoin pour fonctionner correctement, ' .
		'ainsi que des options utilisateur. Ce fichier s\'appelle typiquement <span class="code">x10.conf</span> ' .
		'et il est généralement situé dans <span class="code">/etc/heyu</span> pour les utilisations classiques du système.';
$lang['urlpath_txt'] = 'Ce paramètre définit le chemin de l\'URL de l\'interface publique. ' .
		'Par exemple, si vous exécutez domus.Link dans un sous répertoire, indiquez <span class="code">' .
		'http://your-host/domuslink</span>, ensuite vous devez définir le chemin de l\'url comme ' .
		'<span class="code">/domuslink</span>. Laissez vide si vous exécutez domus.Link à la racine ' .
		'c-a-d <span class="code">http://your-host/</span>';

$lang['error_not_running'] = '<h1>HEYU EST ARRETE !</h1>S\'il vous plaît, démarrez heyu!<br />Vous pouvez avoir à changer les permissions du port tty.';
$lang['error_special_chars'] = 'Les caractères spéciaux dans les noms symboliques ne sont pas autorisés.<br><br>Réessayez s\'il vous plaît. <a href=admin/aliases.php>Retour</a>';

?>