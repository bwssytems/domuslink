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
require_once(CLASS_FILE_LOCATION."element.const.php");
abstract class Element {

	private $elementType = '';
	private $elementLine = '';
	private $lineNum = 0;
	private $arrayNum = 0;
	private $enabled = true;
	
    function __construct() {
    	$args = func_get_args();
        if(!empty($args))
        {
    		$this->parseElementLine($args[0]);
        }
     }

     private function parseElementLine($elementLine) {
     	// Split line into commented whitespace/empty lines and object lines
		$testforcomments = preg_split('/\s{0,}#|(?i)comment\s{0,}/', $elementLine);
		$i = 0;
		if(strlen(ltrim(rtrim($testforcomments[$i]))) == 0 && count($testforcomments) > 1) {
			// line is commented
			$this->setEnabled(false);
			for(; $i < count($testforcomments); $i++) {
				//find element comment data
				if(strlen(ltrim(rtrim($testforcomments[$i]))) != 0)
					break;
			}	

			if($i >= count($testforcomments)) {
				//This is a blank line with a commnet delimeter. Set it and exit
				$this->setType(COMMENT_D);
				$this->setEnabled(true);
				$this->setElementLine("");
				return;
			}
		}
		elseif(strlen(ltrim(rtrim($testforcomments[$i]))) == 0 && count($testforcomments) == 1) {
			//This is a blank line without a commnet delimeter. Set it and exit
			$this->setType(COMMENT_D);
			$this->setEnabled(true);
			$this->setElementLine($elementLine);
			return;
		}
		// Split line into elements of the type that are not comments
		$elements = preg_split('/\s{1,}/', ltrim(rtrim($testforcomments[$i])));
		$type = rtrim(ltrim($elements[0]));
		// validate type and if not valid throw exceptions
		if($this->validateType(strtolower($type))) {
			$this->setElementLine($elements);
			$this->setType(strtolower($type));
		}
		elseif($this->isEnabled())
			throw new Exception("Invalid element type: ".print_r($elements, true));
		else {
			$this->setType(COMMENT_D);
			$this->setEnabled(true);
			$this->setElementLine($elementLine);
		}
	}

	abstract protected function validateType($theType);
	
    function getType() {
		return $this->elementType;
    }

    function getElementLine() {
		return $this->elementLine;
    }

    public function setElementLine($lineElements) {
    	$newLine = "";
    	if(is_array($lineElements)) {
    		foreach($lineElements as $anElement) {
				$newLine = $newLine.rtrim(ltrim($anElement))." ";

    		}
    		$this->elementLine = rtrim($newLine);
    	}
    	else
    		$this->elementLine = $newLine.ltrim(rtrim($lineElements));
    }
    
    public function setType($aType) {
    	$this->elementType = $aType;
    }
	
	public function setEnabled($flag) {
		$this->enabled = $flag;
	}
	
	public function isEnabled() {
		return $this->enabled;
	}
	
	public function setLineNum($aLineNum) {
		$this->lineNum = $aLineNum;
	}
	
	public function getLineNum() {
		return $this->lineNum;
	}
	
	public function setArrayNum($anArrayNum) {
		$this->arrayNum = $anArrayNum;
	}
	
	public function getArrayNum() {
		return $this->arrayNum;
	}
	
	/*
	 * Fetch function is to support the tpl.class.php object fetch call
	 */
	public function fetch() {
		return $this;
	}
	
	public function __toString() {
		return ($this->isEnabled() ? "" : COMMENT_SIGN_D).$this->elementLine."\n";
	}
}
?>