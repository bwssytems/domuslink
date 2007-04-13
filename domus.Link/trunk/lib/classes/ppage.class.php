<?php
/*
 * Class Page
 */
class Page {
	var $page;
	var $title;
	var $year;
	var $copyright;

	function Page($title, $year, $copyright) {
		$this->page = '';
		$this->title = $title;
		$this->year = $year;
		$this->copyright = $copyright;

		$this->addHeader();
	}

	function addHeader() {
		$this->page .= include (INC_FILE_LOCATION.'header.inc.php');
		$this->addMenu();
	}

	function addMenu() {
		$this->page .= include (INC_FILE_LOCATION.'menu.inc.php');
	}

	function addContent($content) {
		$this->page .= "\n\n<!-- start content -->\n<div id='content'>\n";
		$this->page .= $content;
		$this->page .= "</div>\n<!-- end content -->\n";
	}

	function addFooter() {
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