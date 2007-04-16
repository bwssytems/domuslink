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

	function load($filename) {
		$this->heyuconf = load_file($filename);
	}

	function get() {
		$content = $this->heyuconf;
		return $content;
	}
}

?>