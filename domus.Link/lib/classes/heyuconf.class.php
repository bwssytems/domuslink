<?php
/*
 * Heyu Config Class
 */

class heyuConf {

	var $heyuconf;
	var $filename;

	function heyuConf($filename) {
		$this->heyuconf = '';
		$this->filename = $filename;

		$this->load($filename);
	}

	function load($file) {
		$this->heyuconf = load_file($file);
	}

	function edit() {

	}

	function save() {

	}

	function get() {
		$content = $this->heyuconf;
		return $content;
	}

}

?>