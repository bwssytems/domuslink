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

## Includes
require_once('../include.php');
require_once('../include_globals.php');
require_once('heyuconfold.class.php');
require_once('converttoaliasmap.func.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=utility/setupverify");
	exit();
}

## Set template parameters
$tpl->set('title', $lang['setupverify']);
$tpl->set('lang', $lang);

$oldHeyuConf = new heyuConfOld($config['heyuconfloc']);
$aliasMaps = $oldHeyuConf->getAliasesWithLocationAndType();

$tpl_body = & new Template(TPL_FILE_LOCATION.'setupverify.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('aliasMaps', $aliasMaps);

if (!isset($_GET["action"])) {
	$junk = 1;
}
else {
	if($_GET["action"] == "edit")
	{
		convert_to_alias_map($oldHeyuConf, $heyuconf);
		$heyuconf->save();
		$_SESSION['configChecked'] = true;
	}
	else
	{
		$_SESSION['configChecked'] = true;
				
	}
	
	header("Location: ".$config['url_path']);
}

## Display the page
if (!empty($tpl_body)) {
	$tpl->set('content', $tpl_body);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>