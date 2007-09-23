<?php
/*
 * French Language File
 *
 */

/** v0.1 **/

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['all'] = 'Tous';
$lang['lights'] = 'Lumi�res';
$lang['appliances'] = 'Appareils';
$lang['irrigation'] = 'Irrigation';
$lang['hvac'] = 'HVAC';
$lang['events'] = 'Ev�nements';
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
$lang['heyuexec'] = 'Ex�cutable Heyu';
$lang['password'] = 'Mot de passe de la zone de param�trage';
$lang['language'] = 'Langage de l\'interface publique';
$lang['imgs'] = 'Menu Images';
$lang['urlpath'] = 'Chemin de l\'URL';
$lang['theme'] = 'Th�me de l\'interface publique';

$lang['aliases'] = 'Noms des modules';
$lang['addalias'] = 'Ajouter un module';
$lang['editalias'] = 'Modifier un module';
$lang['code'] = 'Code';
$lang['label'] = 'Nom symbolique';
$lang['module'] = 'Module';
$lang['type'] = 'Type';
$lang['actions'] = 'Actions';

/*** aliases txt ***/
$lang['code_txt'] = 'Entrez le code Maison et Unit�. Assurez vous qu\'il n\'est pas d�j� utilis�. Les noms symboliques tels que "A1,2" ne sont ' .
		' pas support� pour le moment.';

$lang['label_txt'] = 'Entrez une description pour ce module. Notez que tous les espaces seront remplac�s par un "_" ' .
		'et que les lettres majuscules seront sauvegard�es comme des minuscules.';

$lang['module_txt'] = 'Choisissez le type de mod�le du module.';

$lang['type_txt'] = 'S�lectionnez ce que ce module contr�le.';

/*** heyuconf txt ***/
$lang['heyuconfile_txt'] = 'Le fichier de configuration contient plusieurs informations critiques ' .
		'dont le programme heyu a besoin pour fonctionner correctement, ' .
		'ainsi que des options utilisateur. Ce fichier s\'appelle typiquement <span class="code">x10.conf</span> ' .
		'et il est g�n�ralement situ� dans <span class="code">/etc/heyu</span> pour les utilisations classiques du syst�me.';

$lang['heyuexec_txt'] = 'Ce param�tre sp�cifie l\'endroit o� se trouve le fichier ex�cutable Heyu. ' .
		'Typiquement, il se trouve dans <span class="code">/usr/local/bin/</span>';

$lang['password_txt'] = 'D�finissez un mot de passe ici pour acc�der � la zone de param�trage de l\'interface publique. ' .
		'Laissez <span class="code">vide</span> pour d�sactiver le mot de passe.';

$lang['language_txt'] = 'D�finissez le langage de l\'interface utilisateur ici. Vous pouvez aussi ' .
		's�lectionner auto, pour utiliser le langage pr�f�r� du navigateur. Dans le cas o� le langage ' .
		'n\'est pas trouv�, English sera s�lectionn� par d�faut';

$lang['theme_txt'] = 'S�lectionnez un th�me pour l\'interface graphique.';

$lang['imgs_txt'] = 'S�lectionnez si vous voulez ou non utiliser des images � la place du texte dans la barre de menu.';

$lang['urlpath_txt'] = 'Ce param�tre d�finit le chemin de l\'URL de l\'interface publique. ' .
		'Par exemple, si vous ex�cutez domus.Link dans un sous r�pertoire, indiquez <span class="code">' .
		'http://your-host/domuslink</span>, ensuite vous devez d�finir le chemin de l\'url comme ' .
		'<span class="code">/domuslink</span>. Laissez vide si vous ex�cutez domus.Link � la racine ' .
		'c-a-d <span class="code">http://your-host/</span>';

/*** other txt ***/
$lang['setup_txt'] = 'C\'est ici que vous pouvez configurer tous les param�tres.<br>' .
		'S\'il vous pla�t, s�lectionnez une option dans le sous-menu sous "Installation"';


/**** v0.1.1 aditions/changes ***/

$lang['login'] = 'Login';
$lang['heyubaseloc'] = 'Heyu File Location';
$lang['heyubaseloc_txt'] = 'Heyu base directory - This directory is where Heyu searches for it\'s configuration files, and stores state information';
$lang['error_not_running'] = '<h1>HEYU IS NOT RUNNING!</h1>Please start heyu!<br />You may need to change permissions to tty port.';
$lang['error_special_chars'] = 'Special characters in the alias label are not allowed.<br><br>Please try again. <a href=admin/aliases.php>Back</a>';

?>
