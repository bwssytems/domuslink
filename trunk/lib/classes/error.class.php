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
 
class error {

	var $msgs;
	var $page;

    function error($msgs) {
    	$this->msgs = $msgs;
    	
    	$this->setPage();
    }
    
    function setPage() {
    	global $lang;
    	$this->page = & new Template(TPL_FILE_LOCATION.'error.tpl');
    	$this->page->set('lang', $lang);
		$this->page->set('errormsgs', $this->msgs);
    }
    
    function getPage() {
    	return $this->page;
    }
}
?>