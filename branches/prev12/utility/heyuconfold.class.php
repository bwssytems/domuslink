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

class heyuConfOld {

        var $heyuconf;
        var $filename;

        /**
         * Constructor
         *
         * @param $filename represents name and location
         */
        function heyuConfOld($filename) {
                $this->heyuconf = '';
                $this->filename = $filename;

                $this->load();
        }

        /**
         * Load heyu settings from defined file in config.php
         */
        function load() {
                $this->heyuconf = load_file($this->filename);
        }
       
        /**
         * Get Aliases
         *
         */
        function getAliases() {
        	$i = 0;
        	$aliases = array();
            foreach ($this->heyuconf as $num => $line) {
            	if (substr($line, 0, 5) == "ALIAS") {
                    $aliases[$i] = $line;
                    $i++;
                }
			}
               
            return $aliases;
        }
       
        function getAliasesWithLocationAndType() {
        	global $modtypes;
        	$theAliases = $this->getAliases();
        	$request = array();
        	if(count($theAliases)) {
                foreach ($theAliases as $line) {
                    $typeFound = false;
                	$aliasInfo = explode("#", trim($line), 2);
                	list($temp, $label, $stuff) = explode(" ", trim($aliasInfo[0]), 3);
                	if(count($aliasInfo) > 1 && strlen(trim($aliasInfo[1]))) {
                    	list($type, $orgloc) = explode(",", trim($aliasInfo[1]), 2);

	                   	foreach($modtypes as $aModType) {
	                    	if($type == $aModType)
	                    	{
	                    		$typeFound = true;
	                    		break;
	                    	}
	                    }
                	}

                    if(!$typeFound)
                    	$type = "Other";
                    if(!isset($orgloc) || trim($orgloc) == "")
                    	$orgloc = "unknown";
                   	$request[$label] = $label.",".trim($type).",".trim($orgloc).",visible";
                }
               
                if (!empty($request)) return $request;
        	}
        	else 
        		throw new Exception("No Aliases in old format");
        }
}
?>