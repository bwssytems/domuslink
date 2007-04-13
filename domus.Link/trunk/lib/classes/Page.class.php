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
	}

	// Adds some more text to the page
	function addContent($content) {
		$this->page .= $content;
	}

	// Generates the bottom of the page
	function addFooter() {
		$this->page .= <<<EOD
<div align="center">&copy; $this->year $this->copyright</div>
</body>
</html>
EOD;
	}

	// Gets the contents of the page
	function get() {
		$this->addFooter();
		$page = $this->page;

		return $page;
	}
}
?>