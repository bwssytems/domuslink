<?php
/*
 * French International Language File
 *
 */

/** v0.1 **/

$lang['dlurl'] = 'http://domus.link.co.pt';
$lang['title'] = 'domus.Link';

$lang['all'] = 'Tout';
$lang['lights'] = 'Lumières';
$lang['appliances'] = 'Appareils';
$lang['irrigation'] = 'Irrigation';
$lang['hvac'] = 'Thermostat';
$lang['events'] = 'Evènements';
$lang['setup'] = 'Configuration';
$lang['heyusetup'] = 'Configuration de Heyu';
$lang['frontend'] = 'Panneau';

$lang['add'] = 'Ajouter';
$lang['edit'] = 'Modifier';
$lang['save'] = 'Sauvegarder';
$lang['cancel'] = 'Annuler';
$lang['delete'] = 'Supprimer';
$lang['deleteconfirm'] = 'Cliquez sur OK pour confirmer la suppression.';    

$lang['heyustatus'] = 'Heyu Status';
$lang['start'] = 'DÉMARRER';
$lang['reload'] = 'REDÉMARRER';
$lang['stop'] = 'ARRÊT';

$lang['frontendadmin'] = 'Configuration du Panneau';
$lang['heyuconf'] = 'Configuration de Heyu';
$lang['heyuconfile'] = 'Fichier de configuration Heyu';
$lang['heyuexec'] = 'Executable Heyu';
$lang['password'] = 'Configuration du Area Password';
$lang['language'] = 'Sélection du Language';
$lang['imgs'] = 'Menu Images';
$lang['urlpath'] = 'Lien URL';
$lang['theme'] = 'Sélection du Thème';

$lang['aliases'] = 'Liste des Alias';
$lang['addalias'] = 'Ajouts d'Alias';
$lang['editalias'] = 'Modifications d'Alias';
$lang['code'] = 'Code';
$lang['label'] = 'Étiquette';
$lang['module'] = 'Module';
$lang['type'] = 'Type';
$lang['actions'] = 'Actions';

/*** aliases txt ***/
$lang['code_txt'] = 'Entrez le House et Unit code. Assurez-vous qu'il n'est pas déjà utilisé. Les Alias tel que "A1,2" ne sont présentement pas supportés.';

$lang['label_txt'] = 'Entrez une description pour ce module. Veuillez noter que tous les espaces seront remplacés par des "_" et les majuscules seront converties en minuscules.';

$lang['module_txt'] = 'Sélectionnez le type de module utilisé.';

$lang['type_txt'] = 'Quel type d'appareil ce module contrôlera t'il.';

/*** heyuconf txt ***/
$lang['heyuconfile_txt'] = 'Le fichier de configuration contient de l'information critique' .
		'au bon fonctionnement de Heyu ' .
		'ainsi que plusieurs options usagers. Ce fichier est généralement nommé <span class="code">x10.conf</span> ' .             'et est généralement situé sous <span class="code">/etc/heyu</span>.';

$lang['heyuexec_txt'] = 'Cette entrée spécifie l'emplacement le d'exécutable de Heyu' .
		'Généralement il est situé sous <span class="code">/usr/local/bin/</span>';

$lang['password_txt'] = 'Définissez un mot-de-passe ici pour limiter l'accès au panneau de configuration. ' .
		'Laissez <span class="code">vide</span> si vous ne désirez pas utiliser de mot-de-passe.';

$lang['language_txt'] = 'Sélectrionnez le language désiré ici. Vous pouvez également ' .
		'choisir le mode auto qui utilisera le language par défault de l'utilisatueur. Si le language ' .
		'désiré est introuvable, le language par default (Anglais) sera sélectionné';

$lang['theme_txt'] = 'Sélection d'un thème pour l'interface graphique.';

$lang['imgs_txt'] = 'Selection de l'affichage ou non des images dans la barre de menu.';

$lang['urlpath_txt'] = 'Ici vous pouvez ajuster selon vos besoin le URL ou se situe Domus. ' .
		'Par exemple si Domus est exécuté à partir d'un sous-répertroire, <span class="code">' .
		'http://your-host/domuslink</span>, alors ce champ devrait indiquer ' .
		'<span class="code">/domuslink</span>. Laissez vide si Domus est installé au niveau du root ' .
		'de votre serveur. Ex: <span class="code">http://your-host/</span>';

/*** other txt ***/
$lang['setup_txt'] = 'C'est à partir d'ici que vous pouvez tout configurer.<br>' .
		'SVP sélectionnez une option du sous menu "Configuration"';


?>
