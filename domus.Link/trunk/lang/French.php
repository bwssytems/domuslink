<?php
/*
 * French Language File
 *
 */
 
// new start v0.1.2
$lang['pcinterface'] = 'Computer Interface Type';
$lang['refresh'] = 'Page Refresh Timer';
$lang['pcinterface_txt'] = 'The Computer Interface can either be the CM11A or the CM17A. The CM11A is the most common and therefore selected by default.';
$lang['refresh_txt'] = 'By setting this field the main page in which the modules are shown shall be refreshed every X seconds. To disable, leave field blank.';
// new end

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
$lang['heyuexec'] = 'Ex�cutable Heyu';
$lang['password'] = 'Mot de passe de la zone de param�trage';
$lang['language'] = 'Langage de l\'interface publique';
$lang['imgs'] = 'Menu Images';
$lang['urlpath'] = 'Chemin de l\'URL';
$lang['theme'] = 'Th�me de l\'interface publique';
$lang['heyubaseloc'] = 'Localisation du fichier Heyu';

$lang['code_txt'] = 'Entrez le code Maison et Unit�. Assurez vous qu\'il n\'est pas d�j� utilis�. Les noms symboliques tels que "A1,2" ne sont pas support� pour le moment.';
$lang['label_txt'] = 'Entrez une description pour ce module. Notez que tous les espaces seront remplac�s par un "_" et que les lettres majuscules seront sauvegard�es comme des minuscules.';
$lang['module_txt'] = 'Choisissez le type de mod�le du module.';
$lang['type_txt'] = 'S�lectionnez ce que ce module contr�le.';

$lang['heyuexec_txt'] = 'Ce param�tre sp�cifie l\'endroit o� se trouve le fichier ex�cutable Heyu. Typiquement, il se trouve dans <span class="code">/usr/local/bin/</span>';
$lang['password_txt'] = 'D�finissez un mot de passe ici pour acc�der � la zone de param�trage de l\'interface publique. Laissez <span class="code">vide</span> pour d�sactiver le mot de passe.';
$lang['theme_txt'] = 'S�lectionnez un th�me pour l\'interface graphique.';
$lang['imgs_txt'] = 'S�lectionnez si vous voulez ou non utiliser des images � la place du texte dans la barre de menu.';
$lang['setup_txt'] = 'C\'est ici que vous pouvez configurer tous les param�tres.<br>S\'il vous pla�t, s�lectionnez une option dans le sous-menu sous "Installation"';
$lang['heyubaseloc_txt'] = 'R�pertoire de base de Heyu - Ce r�pertoire indique o� Heyu va chercher ses fichiers de configuration, et o� il stocke ses informations d\'�tat';
$lang['language_txt'] = 'D�finissez le langage de l\'interface utilisateur ici. Vous pouvez aussi ' .
		's�lectionner auto, pour utiliser le langage pr�f�r� du navigateur. Dans le cas o� le langage ' .
		'n\'est pas trouv�, English sera s�lectionn� par d�faut';
$lang['heyuconfile_txt'] = 'Le fichier de configuration contient plusieurs informations critiques ' .
		'dont le programme heyu a besoin pour fonctionner correctement, ' .
		'ainsi que des options utilisateur. Ce fichier s\'appelle typiquement <span class="code">x10.conf</span> ' .
		'et il est g�n�ralement situ� dans <span class="code">/etc/heyu</span> pour les utilisations classiques du syst�me.';
$lang['urlpath_txt'] = 'Ce param�tre d�finit le chemin de l\'URL de l\'interface publique. ' .
		'Par exemple, si vous ex�cutez domus.Link dans un sous r�pertoire, indiquez <span class="code">' .
		'http://your-host/domuslink</span>, ensuite vous devez d�finir le chemin de l\'url comme ' .
		'<span class="code">/domuslink</span>. Laissez vide si vous ex�cutez domus.Link � la racine ' .
		'c-a-d <span class="code">http://your-host/</span>';

$lang['error_not_running'] = '<h1>HEYU EST ARRETE !</h1>S\'il vous pla�t, d�marrez heyu!<br />Vous pouvez avoir � changer les permissions du port tty.';
$lang['error_special_chars'] = 'Les caract�res sp�ciaux dans les noms symboliques ne sont pas autoris�s.<br><br>R�essayez s\'il vous pla�t. <a href=admin/aliases.php>Retour</a>';

?>