<?php
/*
 * Created on 2007/03/12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

function get_file($filename) {
	if (is_readable($filename) == true) {
		$lines = file($filename);
	}
	else {
		die($filename.' dosent exist or isnt readable!');
	}
	return $lines;
}

?>
