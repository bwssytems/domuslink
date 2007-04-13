<?php
/*
 * Heyu Config Class
 */

class heyuConf {

	//var $location;
	//var $file;

	function heyuConf() {
		$this->heyuconf = '';
	}

	function get($file) {
		$this->heyuconf = load_file($file);
		$content = $this->heyuconf;

		return $content;
	}

	function edit() {

	}

	function save() {

	}

}

?>