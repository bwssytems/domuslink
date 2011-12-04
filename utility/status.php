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
require_once('..'.DIRECTORY_SEPARATOR.'include.php');

## Security validation must be checked
$authCheck = new Login(USERDB_FILE_LOCATION, $config['use_domus_security']);
if (!$authCheck->login()) {
	header("Location: ../login.php?from=utility/status");
	exit();
}
//if($authCheck->getUser()->getSecurityLevel() > 2) {
//	header("Location: ../index.php");
//	exit();
//}
$tpl->set('sec_level', $authCheck->getUser()->getSecurityLevel());

## Set template parameters
$tpl->set('title', $lang['status']);

$tpl_body = new Template(TPL_FILE_LOCATION.'systemstatus.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('config', $config);
$tpl_body->set('sec_level', $authCheck->getUser()->getSecurityLevel());

## Display the page
if (!empty($tpl_body)) {
	$tpl->set('content', $tpl_body);
}

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>