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
require_once(CLASS_FILE_LOCATION.'element.const.php');

abstract class ElementFile {

	private $filename;
	private $lineStore;
	private $elementObjects;

	/**
	 * Constructor
	 *
	 * @args[0] $filename represents name and location
	 */
	function __construct() {
    	$args = func_get_args();
        if(!empty($args))
        {
			$this->filename = $args[0];
			$this->lineStore = array(END_D => array(), BEGIN_D => array());
			$this->load();
        }
	}

	/**
	 * Load elements from fiven file
	 */
	function load() {
		$elementData = load_file($this->filename);

		$i = 0;
		foreach ($elementData as $num => $line) {
			try {
				$this->elementObjects[$i] = $this->createElement($line);
				$this->elementObjects[$i]->setLineNum($num);
				$i++;
			}
			catch(Exception $e ) {
				throw new Exception("Error loading ".$this->filename." - line ".$num.", ".$e->getMessage());
			}
		}
	}

	function save() {
		save_file_raw($this->getObjects(), $this->filename);
	}

	function addElement($anElement) {
		$arrayIndex = $this->getLine($anElement->getType(), END_D);
		$arrayLength = count($this->elementObjects);
		if(!$arrayIndex && $arrayLength)
			$arrayIndex = $arrayLength - 1;

		array_splice($this->elementObjects, $arrayIndex + 1, 0, array($anElement));
		$this->setLine($anElement->getType(), $arrayIndex + 1, END_D);
	}
	
	function deleteElement($arrayIndex) {
		array_splice($this->elementObjects, $arrayIndex, 1);
	}

	function reorderElements($arrayIndex, $newArrayIndex) {
		$tmp = $this->elementObjects[$arrayIndex];
		$this->elementObjects[$arrayIndex] = $this->elementObjects[$newArrayIndex];
		$this->elementObjects[$newArrayIndex] = $tmp;
	}
	
	function getObjects() {
		return $this->elementObjects;
	}

	protected function setObjects($elements) {
		$this->elementObjects = $elements;
	}
	
	/**
	 * Get Element Objects by a type
	 *
	 * Description: Returns an array containing the Objects of the specified types along
	 * with their respective line numbers in the file.
	 */
	function getElementObjects($objectType) {
		$i = 0;
		$objectArray = array();
		$beginLine = 0;
		$beginLineSet = false;
		$endLine = 0;
		foreach($this->elementObjects as $anElementObject) {
			if ($anElementObject->getType() == $objectType || $objectType == ALL_OBJECTS_D) {
				$objectArray[$i] = $anElementObject;
				$objectArray[$i]->setArrayNum($i);
				$i++;
				if (!$beginLineSet) {
					$this->setLine($objectType, $anElementObject->getLineNum(), BEGIN_D);
					$beginLine = $anElementObject->getLineNum();
					$beginLineSet = true;
				}
				elseif ($beginLine) {
					$this->setLine($objectType, $anElementObject->getLineNum(), END_D);
					$endLine = $anElementObject->getLineNum();
				}
			}
		}
		
		if(!$endLine) {
			$this->setLine($objectType, $anElementObject->getLineNum(), END_D);
		} 
		return $objectArray;
	}
	
	function setLine($theObjType, $theLine, $theLocation) {
		$this->lineStore[$theLocation] = array_merge($this->lineStore[$theLocation], array($theObjType => $theLine));
	}

	function getLine($theObjType, $theLocation) {
		$theLineLocation = $this->lineStore[$theLocation];
		return $theLineLocation[$theObjType];
	}
	
	abstract protected function createElement($aLine);
}
?>