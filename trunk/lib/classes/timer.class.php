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
require_once(CLASS_FILE_LOCATION."scheduleelement.class.php");
require_once(CLASS_FILE_LOCATION."heyusched.const.php");
/*
 * The Timer class decomposes a line from an heyu sched file element into an Object. It Also
 * allows the construction of a new timer line/object.
 * 
 * Validation of elements occurs and it will throw exceptions if they cannot be parsed.
 * This class handles all the valid cases for a timer.
 * 
 */
class Timer extends ScheduleElement {
	private $daysOfWeek = '';
	private $startDate;
	private $stopDate;
	private $startTime;
	private $stopTime;
	private $startMacro = '';
	private $stopMacro = '';
	private $timerOptions;
	
	function __construct() {
    	$args = func_get_args();
        if(!empty($args)) {
			parent::__construct($args[0]);
			$this->timerOptions = array();
			if(strtolower(trim($this->getType())) == TIMER_D) {
				$this->parseTimerLine($this->getElementLine());
				$this->rebuildElementLine();
			}
			else
				throw new Exception("This is not a timer line!");
        }
        else
        {
        	parent::__construct();
        	$this->setType(TIMER_D);
        	$this->setDaysOfWeek(".......");
        	$this->parseDates("01/01-12/31");
        	$this->parseStartTime("00:01");
        	$this->parseStopTime("23:59");
        	$this->setStartMacro("null");
        	$this->setStopMacro("null");
        	$this->timerOptions = array();
        	$this->rebuildElementLine();
        }
	}
	
	function rebuildElementLine() {
		$anArray = array($this->getType(),$this->getDaysOfWeek(),$this->getStartDate()."-".$this->getStopDate(),$this->getStartTime(),$this->getStopTime(),$this->getStartMacro(),$this->getStopMacro());
		if(count($this->timerOptions)) {
			foreach($this->timerOptions as $timerOption )
				array_push($anArray, "".$timerOption);
		}
		$this->setElementLine($anArray);
	}
	
	function parseTimerLine($timerLine) {
		// Split line into elements of the timer
		$elements = preg_split('/\s{1,}/', $timerLine);
		$elementCount = count($elements);
		
		if($elementCount < 7)
			throw new Exception("Timer line has less than 7 elements. Something is missing! ".print_r($elements, true));

		if($elementCount == 9 || $elementCount == 11 || $elementCount == 13 || $elementCount == 15)
			$this->parseTimerOptions($elements);
		elseif($elementCount != 7)
			throw new Exception("Timer line has incorrect number of options: ".print_r($elements, true));

		$this->setDaysOfWeek(rtrim(ltrim($elements[1])));
		$this->parseDates(rtrim(ltrim($elements[2])));
		$this->parseStartTime(rtrim(ltrim($elements[3])));
		$this->parseStopTime(rtrim(ltrim($elements[4])));
		$this->setStartMacro(rtrim(ltrim($elements[5])));
		$this->setStopMacro(rtrim(ltrim($elements[6])));
	}
	
	function getDaysOfWeek() {
		return $this->daysOfWeek;
	}

	function setDaysOfWeek($theDays) {
		if(strlen($theDays) != 7)
			throw new Exception("Timer line invalid Days of Week: ".$theDays);
		$this->daysOfWeek = $theDays;
	}
	
	function parseDates($dateRange) {
		// Dates are comprised of four components separated by :,-,/,.
		// The order we will use as default will be mm/dd-mm/dd
		// also check for the expire-dd as it is a valid construct
		
		$matchValue = preg_match('/(^(\d{1,2})[\/\.:]\d{1,2}-\d{1,2}[\/\.:]\d{1,2}$)|(^(expire-)\d{1,3}$)/', $dateRange, $matches);
		if($matchValue == 0)
			throw new Exception("Timer line invalid Date Range in timer: [".$dateRange."]");
			
		$dates = preg_split('/:|-|\/|\./', $dateRange);
		if(count($dates) == 2) {
			$this->startDate = new Date($dates[0]);
			$this->stopDate = new Date($dates[1]);
		}
		else {
			$this->startDate = new Date($dates[0], $dates[1]);
			$this->stopDate = new Date($dates[2], $dates[3]);
		}
	}
	
	function getStartDate() {
		return $this->startDate;
	}
	
	function getStopDate() {
		return $this->stopDate;
	}
	
	function parseStartTime($startTime) {
		$this->startTime = new Time($startTime);
	}
	
	function parseStopTime($stopTime) {
		$this->stopTime = new Time($stopTime);
	}
	

	function parseTimerOptions($theElements) {
		$numElements = count($theElements);
		$x = 0;

		for($i = 7; $i < $numElements; $i+=2) {
			if(strlen($theElements[$i])) {
				$anOption = new TimerOption($theElements[$i], $theElements[$i + 1]);
				if(!count($this->timerOptions)) {
					$this->timerOptions[$x] = $anOption;
					$x++;
				}
				else {
					$this->timerOptions[$x] = $anOption;
					$x++;
				}
			}
		}
	}
	
	function getStartTime() {
		return $this->startTime;
	}
	
	function getStopTime() {
		return $this->stopTime;
	}
	
	function setStartMacro($startMacro) {
		$this->startMacro = $startMacro;
	}

	function getStartMacro() {
		return $this->startMacro;
	}
	
	function setStopMacro($stopMacro) {
		$this->stopMacro = $stopMacro;
	}
	
	function getStopMacro() {
		return $this->stopMacro;
	}
	
	function getTimerOptions() {
		return $this->timerOptions;
	}
	
	function getTimerOption($aType) {
		if(count($this->timerOptions)) {
			foreach($this->timerOptions as $aTimerOption) {
				if($aTimerOption->getOptionType() == $aType)
					return $aTimerOption;
			}
		}
	}
	
	function removeTimerOption($aType) {
		if($aType && count($this->timerOptions) > 0) {
			for($i = 0; $i < count($this->timerOptions); $i++) {
				if($aType == $this->timerOptions[$i]->getOptionType())
					array_splice($this->timerOptions, $i, 1);
			}
		}
	}
	
	function addTimerOption($aTimerOption) {
		array_splice($this->timerOptions, -1, 0, array($aTimerOption));
	}
}

/* 
 * Date object to handle the start/stop date constructs in heyu.
 */
class Date {
	private $month;
	private $day;
	private $expire;

	function __construct() {
		$args = func_get_args();
		if(!empty($args)) {
			if(count($args) == 1) {
				$this->setExpire($args[0]);
			}
			else {
				$this->month = intval($args[0]);
				$this->day = intval($args[1]);
				$this->expire = 0;
			}
		}
		else {
			$this->month = 1;
			$this->day = 1;
			$this->expire = 0;
		}
	}
	
	function setMonth($theMonth) {
		$this->month = intval($theMonth);
	}
	
	function getMonth() {
		return $this->month;
	}
	
	function setDay($theDay) {
		$this->day = intval($theDay);
	}
	
	function getDay() {
		return $this->day;
	}
	
	function setExpire($anExpireType) {
		if($anExpireType == "expire") {
			$this->month = 0;
			$this->day = 0;
			$this->expire = 1;
		}
		elseif($anExpireType) {
			$this->month = 0;
			$this->day = intval($anExpireType);
			$this->expire = 2;
		}
	}

	function getExpire() {
		return $this->expire;
	}
	
	function __toString() {
		if($this->expire == 0)
			return ($this->month<10?"0".$this->month:$this->month)."/".($this->day<10?"0".$this->day:$this->day);
		elseif($this->expire == 2)
			return "".$this->day;
		elseif($this->expire == 1)
			return "expire";
	}
}

/* 
 * Time object to handle the start/stop time constructs in heyu.
 */
class Time {
	private $min = 0;
	private $hour = 0;
	private $dawnDusk = '';
	private $security = false;
	private $offsetMin = 0;
	private $plusMinus = '';
	private $now = '';

	function __construct() {
		$args = func_get_args();
		if(!empty($args))
		{
			// Need to determine if we have a time (hh:mm), dawn/dusk with opt +/-mins, now with opt +mins,  and security flag
			$checkTime = rtrim(ltrim(strtolower($args[0])));
			
			// Validate time to rules of heyu
			$theMatchValue = preg_match('/(^(dawn|dusk)[\+-](\d{1,4})[s]?$)|(^(dawn|dusk)s$)|(^(dawn|dusk)$)|(^now[\+]\d{1,2}$)|(^now$)|(^\d{1,2}:\d{1,2}[s]?$)/', $checkTime, $matches);
			if($theMatchValue) {
				// match found for correct formats with restrictions
				if(substr($checkTime, 0, 4) == "dawn" || substr($checkTime, 0, 4) == "dusk") {
					if(strlen($checkTime) > 5 ) {
						$this->setPlusMinus(substr($checkTime, 4, 1));
						$this->setOffsetMin(substr($checkTime, 5, strlen($checkTime) - 5));
					}

					$this->setDawnDusk(substr($checkTime, 0, 4));
				}
				elseif(substr($checkTime, 0, 3) == "now" ) {
					if(strlen($checkTime) >= 5) {
						// now can only have now[+nums] and s is invalid, so go ahead and set values
						$this->setPlusMinus(substr($checkTime, 3, 1));
						$this->setOffsetMin(substr($checkTime, 4, strlen($checkTime) - 4));
					}
	
					$this->setNow();
				}
				else {
					// time is nums:nums[s] only
					$colonPos = strpos($checkTime, ":");
					$this->setHours(substr($checkTime, 0, $colonPos));
					$timeLen = strlen($checkTime);
					if(substr($checkTime, strlen($checkTime) - 1, 1 ) == "s" )
						$minLen = $timeLen - 2 - $colonPos;
					else
						$minLen = $timeLen - 1 - $colonPos;
					$this->setMins(substr($checkTime, $colonPos + 1, $minLen)); 
				}
	
				if(substr($checkTime, strlen($checkTime) - 1, 1 ) == "s" )
					$this->setSecurity(true);
			}
			else
				throw new Exception("Time string is not valid: ".$theTime."\n");
		}
	}
	
	function setDawnDusk($type) {
		$this->dawnDusk = $type;
		$this->now = "";
		$this->hour = 0;
		$this->min = 0;
	}

	function setSecurity($flag) {
		$this->security = $flag;
	}
	
	function setOffsetMin($minutes) {
		$this->offsetMin = intval($minutes);
	}
	
	function setPlusMinus($theValue) {
		$this->plusMinus = $theValue;
	}
	
	function setNow() {
		$this->now = "now";
		$this->hour = 0;
		$this->min = 0;
		$this->dawnDusk = "";
	}
	
	function setHours($hours) {
		$this->hour = intval($hours);
		$this->now = "";
		$this->dawnDusk = "";
		$this->offsetMin = 0;
		$this->plusMinus = "";
	}
	
	function setMins($mins) {
		$this->min = intval($mins);
	}
	
	function __toString() {
		if(strlen($this->dawnDusk))
			return $this->dawnDusk.$this->plusMinus.($this->offsetMin?$this->offsetMin:"").($this->security?"s":"");
		elseif(strlen($this->now))
			return $this->now.$this->plusMinus.($this->offsetMin?$this->offsetMin:"");
		else
			return ($this->hour<10?"0".$this->hour:$this->hour).":".($this->min<10?"0".$this->min:$this->min).($this->security?"s":"");
	}

	function getDawnDusk() {
		return $this->dawnDusk;
	}

	function isDawnDusk() {
		if(substr($this->dawnDusk,0,1) == "d")
			return true;
		else
			return false;
	}
	
	function getSecurity() {
		return $this->security;
	}
	
	function getOffsetMin() {
		return $this->offsetMin;
	}
	
	function getPlusMinus() {
		return $this->plusMinus;
	}
	
	function getNow() {
		return $this->now;
	}
	
	function isNow() {
		if($this->now == "now")
			return true;
		else
			return false;
	}

	function getHours() {
		return $this->hour;
	}
	
	function getMins() {
		return $this->min;
	}

}

/* 
 * Timer Option object to handle the dawn/dusk modifiers
 */
class TimerOption {
	private $optionType;
	private $optionHour;
	private $optionMin;

	function __construct() {
		$args = func_get_args();
		if(!empty($args)) {
			$this->parseOptions($args[0], $args[1]);
		}
	}

	function parseOptions($theType, $theTime) {
		$theType = strtolower(rtrim(ltrim($theType)));
		$theTime = rtrim(ltrim($theTime));
//		print("TimerOption args: ".$theType." ".$theTime."\n");
		if(preg_match('/\b(?>dawnlt|dawngt|dusklt|duskgt)\b/', $theType)) {
			if(preg_match('/\b\d{1,2}:\d{1,2}\b/', $theTime)) {
				$colonPos = strpos($theTime, ":");
				$this->optionType = $theType;
				$this->optionHour = intval(substr($theTime, 0, $colonPos));
				$this->optionMin = intval(substr($theTime, $colonPos + 1, strlen($theTime) - ($colonPos + 1)));
			}
			else
				throw new Exception("The timer option does not have a vaild time: ".$theTime);
		}
		else
			throw new Exception("Timer option does not have correct modifier: ".$theType);
	}

	function setOptionType($theType) {
		$this->optionType = $theType;
	}
	
	function setOptionHour($theHour) {
		$this->optionHour = intval($theHour);
	}

	function setOptionMin($theMin) {
		$this->optionMin = intval($theMin);
	}
	
	function getOptionType() {
		return $this->optionType;
	}
	
	function getOptionHour() {
		return $this->optionHour;
	}

	function getOptionMin() {
		return $this->optionMin;
	}
	
	function __toString() {
		return $this->optionType." ".($this->optionHour<10?"0".$this->optionHour:$this->optionHour).":".($this->optionMin<10?"0".$this->optionMin:$this->optionMin);
	}
}
?>
