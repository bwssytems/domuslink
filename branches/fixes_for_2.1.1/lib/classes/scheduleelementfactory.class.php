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
require_once(CLASS_FILE_LOCATION."timer.class.php");
require_once(CLASS_FILE_LOCATION."macro.class.php");
require_once(CLASS_FILE_LOCATION."trigger.class.php");

class ScheduleElementFactory {
	public static function createElement ($lineData) {
		try {
			$anElement = new ScheduleElement($lineData);
			switch(strtolower(trim($anElement->getType()))) {
				case TIMER_D:
					try {
						$aTimer = new Timer($lineData);
						return $aTimer;
					}
					catch(Exception $e) {
						// if the line is commented out, make it a comment as it is meant to be.
						// It is not a a disabled timer.
						if(!$anElement->isEnabled()) {
							$anElement->setType(COMMENT_D);
							return $anElement;
						}
						throw $e;
					}
					break;
				case MACRO_D:
					try {
						$aMacro = new Macro($lineData);
						return $aMacro;
					}
					catch(Exception $e) {
						// if the line is commented out, make it a comment as it is meant to be.
						// It is not a a disabled macro.
						if(!$anElement->isEnabled()) {
							$anElement->setType(COMMENT_D);
							return $anElement;
						}
						throw $e;
					}
					break;
				case TRIGGER_D:
					try {
						$aTrigger = new Trigger($lineData);
						return $aTrigger;
					}
					catch(Exception $e) {
						// if the line is commented out, make it a comment as it is meant to be.
						// It is not a a disabled trigger.
						if(!$anElement->isEnabled()) {
							$anElement->setType(COMMENT_D);
							return $anElement;
						}
						throw $e;
					}
					break;
				case CONFIG_D:
					return $anElement;
					break;
				case SECTION_D:
					return $anElement;
					break;
				case COMMENT_D:
					return $anElement;
					break;
			}
		}
		catch(Exception $e) {
			throw $e;
		}
	} 
}
?>