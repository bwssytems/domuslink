<?php
/*
 * Heyu Config Class
 */

class heyuConf {

	var $heyuconf;
	var $filename;

	function heyuConf($filename)
	{
		$this->heyuconf = '';
		$this->filename = $filename;
		$this->alias = '';
	}

	function load()
	{
		$this->heyuconf = load_file($this->filename);
	}

	function get_aliases()
	{
		$this->load();
		$i = 0;
		foreach ($this->heyuconf as $line)
		{
			if (substr($line, 0, 5) == "ALIAS")
			{
				$array[$i] = $line;
				$i++;
			}
		}
		return $array;
	}

	function get()
	{
		$content = $this->heyuconf;
		return $content;
	}
}

?>