<?php 
/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
require_once(CLASS_FILE_LOCATION.'heyuconf.class.php');
require_once(CLASS_FILE_LOCATION.'location.class.php');
require_once(CLASS_FILE_LOCATION.'heyusched.class.php');

class frontObject {

	// Config object containing variable from config.php
	var $config;
	var $lang;
	var $directives;
	var $modlist;
	var $heyuConf;
	var $heyuSched;

	function & getConfig($reload = false) {
		if (!isset($this->config) || $reload) {
			$_SESSION['load_count'] += 1;
			$configinstance = config_load();
			$this->config = &parse_config($configinstance);
		}

		return $this->config;
	}

	function & getLanguageFile($reload = false) {
		if (!isset($this->lang) || $reload) {
			$_SESSION['load_count'] += 1;
			$langinstance = lang_load($this->config['lang']);
			$this->lang = &$langinstance;
		}

		return $this->lang;
	}

	function & getDirectives() {
		if (!isset($this->directives)) {
			$_SESSION['load_count'] += 1;
			$directivesinstance = execute_cmd_ret($this->config['heyuexecreal']." conflist");
			for($i = 0; $i < count($directivesinstance); $i++) {
				if(trim($directivesinstance[$i]) == "")
					array_splice($directivesinstance, $i, 1);
			}
			$this->directives = &$directivesinstance;
		}

		return $this->directives;
	}

	function & getModList() {
		if (!isset($this->modlist)) {
			$_SESSION['load_count'] += 1;
			$modlistinstance = execute_cmd_ret($this->config['heyuexecreal']." modlist");
			$this->modlist = &$modlistinstance;
		}

		return $this->modlist;
	}

	function & getHeyuConf($reload = false) {
		if(isset($this->heyuConf) && !$reload) {
			if($this->heyuConf->hasFileChanged())
				$reload = true;
		}
		
		if(!isset($this->heyuConf) || $reload) {
			$_SESSION['load_count'] += 1;
			$heyuconfinstance = new heyuConf($this->config['heyuconfloc']);
			$this->heyuConf = &$heyuconfinstance;
		}
		
		return $this->heyuConf;
	}

	function & getHeyuSched($reload = false) {
		if(isset($this->heyuSched) && !$reload) {
			if($this->heyuSched->hasFileChanged())
				$reload = true;
		}
		
		if(!isset($this->heyuSched) || $reload) {
			$_SESSION['load_count'] += 1;
			$schedfileloc = $this->config['heyu_base_real'].$this->heyuConf->getSchedFile();
			$heyuschedinstance = new heyuSched($schedfileloc);
			$this->heyuSched = &$heyuschedinstance;
		}
		
		return $this->heyuSched;
	}
	
	function & getHeyuConfigName() {
		return $this->heyuConf->getFirstSection();
	}
}