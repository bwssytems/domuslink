<?php
/*
 * Global Class
 *
 */

class frontObject {

	// Config object containing variable from config.php
	var $config;

	function & GetConfig()
	{
		if (!isset($this->config))
		{
			$configinstance = config_load();
			$this->config = &$configinstance;
		}

		return $this->config;
	}
}