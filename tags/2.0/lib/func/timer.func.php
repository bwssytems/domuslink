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
	
	$week_tpl = new Template(TPL_FILE_LOCATION.'weekdays.tpl');
	$week_tpl->set('wdayt', $wdayt);
	$week_tpl->set('wdayo', $wdayo);
	$week_tpl->set('weekdays', $string);
	$week_tpl->set('enabled', $enabled);
	$week_tpl->set('list', $list);
	
	return $week_tpl->fetch(TPL_FILE_LOCATION.'weekdays.tpl');
}

/*
 * post_data_to_timer
 * 
 * Description: Post all common timer data to a timer object. Macros are not included
 * due to the non common usage between simple and advacned timer pages.
 * 
 * @param $aTimer The timer object to apply page post data to
 * 
 */
function post_data_to_timer($aTimer) {
	global $wdayo;
	$wdaystr = "";
	foreach ($wdayo as $num => $day) {
		if (isset($_POST[$num.$day])) 
			$wdaystr .= $_POST[$num.$day]; 
		else 
			$wdaystr .= ".";
	}
	
	$aTimer->setDaysOfWeek($wdaystr);
	
	if(isset($_POST["expiredatetype"])) {
		$aTimer->getStartDate()->setExpire("expire");
		$aTimer->getStopDate()->setExpire($_POST["expiredays"]);
	}
	else {
		$aTimer->getStartDate()->setMonth($_POST["onmonth"]);
		$aTimer->getStartDate()->setDay($_POST["onday"]);
		$aTimer->getStopDate()->setMonth($_POST["offmonth"]);
		$aTimer->getStopDate()->setDay($_POST["offday"]);
	}
	
	if($_POST["starttimetype"] == "time") {
		$aTimer->getStartTime()->setHours($_POST["onhour"]);
		$aTimer->getStartTime()->setMins($_POST["onmin"]);
	}
	elseif($_POST["starttimetype"] == "now") {
		$aTimer->getStartTime()->setNow();
		if(isset($_POST["startnowmins"]) && intval($_POST["startnowmins"]) != 0) {
			$aTimer->getStartTime()->setOffsetMin($_POST["startnowmins"]);
			$aTimer->getStartTime()->setPlusMinus("+");
		}
		else {
			$aTimer->getStartTime()->setPlusMinus("");
			$aTimer->getStartTime()->setOffsetMin(0);
		}
	}
	elseif($_POST["starttimetype"] == "dawn" || $_POST["starttimetype"] == "dusk") {
		$aTimer->getStartTime()->setDawnDusk($_POST["starttimetype"]);
		if(isset($_POST["startdawnduskplus"]) && $_POST["startdawnduskplus"] != "") {
			$aTimer->getStartTime()->setPlusMinus($_POST["startdawnduskplus"]);
			$aTimer->getStartTime()->setOffsetMin($_POST["startdawnduskmins"]);
		}
		else {
			$aTimer->getStartTime()->setPlusMinus("");
			$aTimer->getStartTime()->setOffsetMin(0);
		}
	}
	
	if(isset($_POST["startsecurity"]))
		$aTimer->getStartTime()->setSecurity(true);
	else
		$aTimer->getStartTime()->setSecurity(false);
	
	if($_POST["stoptimetype"] == "time") {
		$aTimer->getStopTime()->setHours($_POST["offhour"]);
		$aTimer->getStopTime()->setMins($_POST["offmin"]);
	}
	elseif($_POST["stoptimetype"] == "now") {
		$aTimer->getStopTime()->setNow();
		if(isset($_POST["stopnowmins"]) && intval($_POST["stopnowmins"]) != 0) {
			$aTimer->getStopTime()->setOffsetMin($_POST["stopnowmins"]);
			$aTimer->getStopTime()->setPlusMinus("+");
		}
		else {
			$aTimer->getStopTime()->setPlusMinus("");
			$aTimer->getStopTime()->setOffsetMin(0);
		}
	}
	elseif($_POST["stoptimetype"] == "dawn" || $_POST["stoptimetype"] == "dusk") {
		$aTimer->getStopTime()->setDawnDusk($_POST["stoptimetype"]);
		if(isset($_POST["stopdawnduskplus"]) && $_POST["stopdawnduskplus"] != "") {
			$aTimer->getStopTime()->setPlusMinus($_POST["stopdawnduskplus"]);
			$aTimer->getStopTime()->setOffsetMin($_POST["stopdawnduskmins"]);
		}
		else {
			$aTimer->getStopTime()->setPlusMinus("");
			$aTimer->getStopTime()->setOffsetMin(0);
		}
	}
	
	if(isset($_POST["stopsecurity"]))
		$aTimer->getStopTime()->setSecurity(true);
	else
		$aTimer->getStopTime()->setSecurity(false);

	if(isset($_POST["timeroptionsdawnlt"])) {
		$aTimerOption = $aTimer->getTimerOption("dawnlt");
		if($aTimerOption) {
			$aTimerOption->setOptionHour($_POST["dawnlthour"]);
			$aTimerOption->setOptionMin($_POST["dawnltmin"]);
		}
		else {
			$aTimerOption = new TimerOption("dawnlt", $_POST["dawnlthour"].":".$_POST["dawnltmin"]);
			$aTimer->addTimerOption($aTimerOption);
		}
	}
	else {
		$aTimer->removeTimerOption("dawnlt");
	}

	if(isset($_POST["timeroptionsdawngt"])) {
		$aTimerOption = $aTimer->getTimerOption("dawngt");
		if($aTimerOption) {
			$aTimerOption->setOptionHour($_POST["dawngthour"]);
			$aTimerOption->setOptionMin($_POST["dawngtmin"]);
		}
		else {
			$aTimerOption = new TimerOption("dawngt", $_POST["dawngthour"].":".$_POST["dawngtmin"]);
			$aTimer->addTimerOption($aTimerOption);
		}
	}
	else {
		$aTimer->removeTimerOption("dawngt");
	}

	if(isset($_POST["timeroptionsdusklt"])) {
		$aTimerOption = $aTimer->getTimerOption("dusklt");
		if($aTimerOption) {
			$aTimerOption->setOptionHour($_POST["dusklthour"]);
			$aTimerOption->setOptionMin($_POST["duskltmin"]);
		}
		else {
			$aTimerOption = new TimerOption("dusklt", $_POST["dusklthour"].":".$_POST["duskltmin"]);
			$aTimer->addTimerOption($aTimerOption);
		}
	}
	else {
		$aTimer->removeTimerOption("dusklt");
	}

	if(isset($_POST["timeroptionsduskgt"])) {
		$aTimerOption = $aTimer->getTimerOption("duskgt");
		if($aTimerOption) {
			$aTimerOption->setOptionHour($_POST["duskgthour"]);
			$aTimerOption->setOptionMin($_POST["duskgtmin"]);
		}
		else {
			$aTimerOption = new TimerOption("duskgt", $_POST["duskgthour"].":".$_POST["duskgtmin"]);
			$aTimer->addTimerOption($aTimerOption);
		}
	}
	else {
		$aTimer->removeTimerOption("duskgt");
	}
}
?>