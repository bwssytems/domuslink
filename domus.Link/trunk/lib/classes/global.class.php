<?php
/*
 * Global Class
 *
 */

class frontObject {

	// Config object containing variable from config.php
	var $config;
	var $lang;

	function & GetConfig()
	{
		if (!isset($this->config))
		{
			$configinstance = config_load();
			$this->config = &$configinstance;
		}

		return $this->config;
	}

	function & GetLanguageFile($cfglang)
	{
		if (!isset($this->lang))
		{
			$langinstance = lang_load($cfglang);
			$this->lang = &$langinstance;
		}

		return $this->lang;
	}
}