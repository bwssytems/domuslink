<?php
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007-09, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
 *
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