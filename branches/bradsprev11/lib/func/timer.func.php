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

/**
 * Weekdays
 * 
 * Description: This function generates the weekday's table. It can
 * be used for viewing existing timers, adding new timers and editing
 * 
 * @param $string if received will contain string such as: 'sm.w.fs' from schedule file
 * @param $lang contains all the language strings to be used
 * @param $list boolean if true weekday's belong to timer listing
 * @param $enabled represent boolean for status of timer
 */
function weekdays($string, $lang, $list, $enabled) {
	global $wdayo;
	$wdayt = array(substr($lang['sun'], 0, 1),
					substr($lang['mon'], 0, 1),
					substr($lang['tue'], 0, 1),
					substr($lang['wed'], 0, 1),
					substr($lang['thu'], 0, 1),
					substr($lang['fri'], 0, 1),
					substr($lang['sat'], 0, 1));
	
	$week_tpl = & new Template(TPL_FILE_LOCATION.'weekdays.tpl');
	$week_tpl->set('wdayt', $wdayt);
	$week_tpl->set('wdayo', $wdayo);
	$week_tpl->set('weekdays', $string);
	$week_tpl->set('enabled', $enabled);
	$week_tpl->set('list', $list);
	
	return $week_tpl->fetch(TPL_FILE_LOCATION.'weekdays.tpl');
}

?>