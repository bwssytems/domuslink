<?php 
/*
 * domus.Link :: Web-based frontend for Heyu
 * Copyright 2007, Istvan Hubay Cebrian
 * All Rights Reserved
 * http://domus.link.co.pt
 *
 * This software is licensed free of charge for non-commercial distribution
 * and for personal and internal business use only.  Inclusion of this
 * software or any part thereof in a commercial product is prohibited.
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

	function & GetLanguageFile()
	{
		if (!isset($this->lang))
		{
			$langinstance = lang_load($this->config['lang']);
			$this->lang = &$langinstance;
		}

		return $this->lang;
	}
}