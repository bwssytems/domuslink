<?php
/*
 * Class Page
 */
class Page {
	var $page;
	var $title;
	var $year;
	var $theme;

	function Page($title, $theme) {
		$this->page = '';
		$this->title = $title;
		$this->theme = $theme;

		$this->addHeader();
	}

	function addHeader() {
		$this->page .= include (INC_FILE_LOCATION.'header.inc.php');
		$this->addMenu();
	}

	function addMenu() {
		$this->page .= include (INC_FILE_LOCATION.'menu.inc.php');
		$this->page .= "\n\n<!-- start content -->\n<div id='content'>\n";
	}

	function addContent($content) {
		$this->page .= $content;
	}

	function addFooter() {
		$this->page .= "</div>\n<!-- end content -->\n\n";
		$this->page .= include (INC_FILE_LOCATION.'footer.inc.php');
	}

	// Gets the contents of the page
	function get() {
		$this->addFooter();
		$page = $this->page;

		return $page;
	}
}
?>