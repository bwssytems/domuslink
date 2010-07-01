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
require_once('..'.DIRECTORY_SEPARATOR.'include_globals.php');

## Security validation's
if ($config['seclevel'] != "0" && !$authenticated) {
	header("Location: ../login.php?from=events/upload");
	exit();
}

if(!isset($heyusched) || !count($heyusched->getObjects())) {
	gen_error(null,"No schedule file defined.");
	exit();
}

## Set template parameters
$tpl->set('title', $lang['timers']);

$tpl_body = new Template(TPL_FILE_LOCATION.'upload.tpl');
$tpl_body->set('lang', $lang);
$tpl_body->set('config', $config);

if (isset($_GET["action"])) {
	switch ($_GET["action"]) {
		case "upload":
			try {
				$rs = heyu_upload();
				$tpl_body->set('type', 'upload');
			}
			catch(Exception $e) {
				gen_error("heyu upload", $e);
				exit();
			}
			break;
		case "erase":
			try {
				$rs = heyu_erase();
				$tpl_body->set('type', 'erase');
			}
			catch(Exception $e) {
				gen_error("heyu erase", $e);
				exit();
			}
			break;
	}
	$tpl_body->set('out', $rs);
}
else {
	$tpl_body->set('type', 'none');
}

## Display the page
$tpl->set('content', $tpl_body);

echo $tpl->fetch(TPL_FILE_LOCATION.'layout.tpl');

?>