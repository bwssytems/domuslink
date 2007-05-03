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

		$this->load();
	}

	function load()
	{
		$this->heyuconf = load_file($this->filename);
	}

	function get()
	{
		$content = $this->heyuconf;
		return $content;
	}

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
				//$array[$i] = ("Code" => $code, "Label" => $label);
				$i++;
			}
			elseif ($req_type == "Appliances" && $type == "Appliance")
			{
				$array[$i] = $line;
				$i++;
			}
			elseif ($req_type == "Irrigation" && $type == "Irrigation")
			{
				$array[$i] = $line;
				$i++;
			}
			elseif ($req_type == "HVAC" && $type == "HVAC")
			{
				$array[$i] = $line;
				$i++;
			}

		}
		return $array;
	}
}

?>