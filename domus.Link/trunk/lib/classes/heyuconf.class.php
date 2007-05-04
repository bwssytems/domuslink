<?php
/*
 * Heyu Config Class
 */

class heyuConf {

	var $heyuconf;
	var $filename;

	/**
	 * Constructor
	 *
	 * @param $filename represents name and location
	 */
	function heyuConf($filename)
	{
		$this->heyuconf = '';
		$this->filename = $filename;

		$this->load();
	}

	/**
	 * Load heyu settings from defined file in config.php
	 */
	function load()
	{
		$this->heyuconf = load_file($this->filename);
	}

	/**
	 * Return heyu settings from defined file in config.php
	 */
	function get()
	{
		$content = $this->heyuconf;
		return $content;
	}

	/**
	 * Get Aliases
	 *
	 * @param $req_type Type of alias requested
	 */
	function get_aliases($req_type)
	{
		$i = 0;
		foreach ($this->heyuconf as $line)
		{
			if (substr($line, 0, 5) == "ALIAS")
			{
				$aliases[$i] = $line;
				$i++;
			}
		}
		$i = 0;
		foreach ($aliases as $line)
		{
			list($alias, $label, $code, $module_type) = split(" ", $line, 4);
			list($module, $typenf) = split(" # ", $module_type, 2);
			$type = rtrim($typenf);

			if ($req_type == "Lights" && $type == "Light")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}
			elseif ($req_type == "Appliances" && $type == "Appliance")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}
			elseif ($req_type == "Irrigation" && $type == "Irrigation")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}
			elseif ($req_type == "HVAC" && $type == "HVAC")
			{
				$array[$i] = $code." ".$label;
				$i++;
			}

		}
		return $array;
	}
}

?>