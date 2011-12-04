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

class DomusController
{
	private $apiVersion = "4";
	private $apiQualifier = "prod";
	private $myLogin;
	
	public function authorize()
	{
		require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		## Load config file functions and grab settings
		//$config =& parse_config($frontObj->getConfig());
		$config = $_SESSION['frontObj']->getConfig();
		if(!isset($this->myLogin))
			$this->myLogin = new Login(USERDB_FILE_LOCATION, $config['use_domus_security']);
		## error_log("Enter authorize and this login status is ".$this->myLogin->login());
		## Security validation's
		if ($this->myLogin->login() != true) {
			if(isset($_SERVER['PHP_AUTH_PW'])) {
				## error_log("user: [".$_SERVER['PHP_AUTH_USER']."] validate password ******");
				if($this->myLogin->checkLogin($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'], true))
					return true;
				if($this->myLogin->checkLoginByPin($_SERVER['PHP_AUTH_PW'], true))
					return true;
			}
			return false;
		}

		return true;
	}
	
    /**
     * Returns a JSON string object to the browser when hitting the root of the domain
     * @noAuth
     * @url GET /
     */
    public function test()
    {
        return(array("test" => "DomusController test call successful."));
    }

    /**
     * Returns a JSON version of the RESTAPI for domus.Link
     * @noAuth
     * @url GET /version
     */
    public function version()
    {
        return(array("api" => array("name" => "domus.Link.RESTAPI.v".$this->apiVersion.$this->apiQualifier, "version" => $this->apiVersion)));
    }
    
    /**
     * Gets the aliases by label or current for all
     * @url GET /aliases/$label
     * @url GET /aliases/all
     */
    public function getAliases($label = null)
    {
		## error_log("Enter getAliases");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');

        if ($label && $label != 'all') {
            return($heyuconf->getAliasForLabel($this->myLogin->getUser(), $label, true));
        }
        else
        {
        	// Will only return enabled aliases
    		return(array("alaises" => $heyuconf->getAliases($this->myLogin->getUser(), true, true)));
        }
    }

    /**
     * Gets the aliases by location in the floorplan
     * @url GET /location/$label/$visible
     * @url GET /location/$label
     * @url GET /location
     */
    public function getAliasesByLocation($label = null, $visible = "false")
    {
		## error_log("Enter getAliasesByLocation");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$theLocation = new location($heyuconf);

		if($label == null)
			$label = "unknown";
		$passVisible = false;
		if($visible == "true")
			$passVisible = true;
		return(array($label => $theLocation->getAliasesByLocation($label, $this->myLogin->getUser(), true, $passVisible)));
    }

    /**
     * Gets the alias state and dim level
     * @url GET /aliasstate/$label
     */
    public function getAliasState($label = null)
    {
		## error_log("Enter getAliasState");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();
		$moduleTypes = $_SESSION['frontObj']->getModuleTypes();

        if ($label) {
        	$anAlias = $heyuconf->getAliasforLabel($this->myLogin->getUser(), $label, false);
        	if($anAlias->isHVACAlias()) {
        		$theResult = heyu_action($config, "hvac_control", $anAlias->getHouseDevice(), null, null, "mode");
        		if($theResult[0] == "Error in HVAC result" || $theResult[0] == "OFF")
        			$theState = false;
        		else
        			$theState = true;
        	}
        	elseif($anAlias->isMultiAlias())
        		$theState = false;
        	else
        		$theState = on_state($config, $anAlias->getHouseDevice());
        		
        	if($moduleTypes->getModuleType($anAlias->getAliasMap()->getType())->getModuleType() == DIMMABLE_D)
        		$theLevel = dim_level($config, $anAlias->getHouseDevice());
        	else
        		$theLevel = 0;
        		
        	if($theState)
            	return(array("state" => 1, "level" => $theLevel));
        }

        return(array("state" => 0, "level" => 0));
    }
    
    /**
     * Gets the floorplan
     * @url GET /floorplan/$visible
     * @url GET /floorplan
     */
    public function getFloorPlan($visible = "false")
    {
		## error_log("Enter getFloorPlan");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$passVisible = false;
		if($visible == "true")
			$passVisible = true;
   		return($heyuconf->getFloorPlan($this->myLogin->getUser(), true, $passVisible));
    }
    
    /**
     * Gets the module types
     * @url GET /moduletypes
     */
    public function getModuleTypes()
    {
		## error_log("Enter getModuleTypes");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$moduleTypes = $_SESSION['frontObj']->getModuleTypes();
		return(array("moduletypes" => $moduleTypes->getElementObjects(ALL_OBJECTS_D, true)));
    }
    
    /**
     * Turn on an alias
     * @url POST /on/$label
     */
    public function turnOn($label)
    {
		## error_log("Enter turnOn for - ".$label);
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();
		
		if($label) {
			$anAlias = $heyuconf->getAliasForLabel($this->myLogin->getUser(), $label, false);
			if($anAlias)
			{
				try {
					if($anAlias->isHVACAlias())
						heyu_action($config, "hvac_control", $anAlias->getHouseDevice(), null, null, "auto");
					else
						heyu_action($config, "on", $anAlias->getHouseDevice());
				}
				catch(Exception $e) {
					// noop
				}
				return(array("status"=>"done"));
			}
			else
				error_log("turnOn no alias found ".$label);
		}
		return(array("status"=>"not done"));
    }

    /**
     * Turn off an alias
     * @url POST /off/$label
     */
    public function turnOff($label)
    {
		## error_log("Enter turnOff for - ".$label);
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();
		
		if($label) {
			$anAlias = $heyuconf->getAliasForLabel($this->myLogin->getUser(), $label, false);
			if($anAlias)
			{
				try {
					if($anAlias->isHVACAlias())
						heyu_action($config, "hvac_control", $anAlias->getHouseDevice(), null, null, "off");
					else
						heyu_action($config, "off", $anAlias->getHouseDevice());
				}
				catch(Exception $e) {
					// noop
				}
				return(array("status"=>"done"));
			}
			else
				error_log("turnOff no alias found ".$label);
		}
		return(array("status"=>"not done"));
    }

    /**
     * dim or bright an alias
     * @url POST /dimbright/$label/$state/$curr/$req
     */
    public function dimBright($label, $state, $curr, $req)
    {
		## error_log("Enter dimBright for - ".$label);
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();
		$moduleTypes = $_SESSION['frontObj']->getModuleTypes();
		
		if($label) {
			$anAlias = $heyuconf->getAliasForLabel($this->myLogin->getUser(), $label, false);
			if($anAlias && $moduleTypes->getModuleType($anAlias->getAliasMap()->getType())->getModuleType() == DIMMABLE_D)
			{
				try {
					heyu_action($config, "dbapi", $anAlias->getHouseDevice(), $state, $curr, $req);
				}
				catch(Exception $e) {
					// noop
				}
				return(array("status"=>"done"));
			}
			else
			{
				error_log("dimBright no dimmable alias found ".$label);
			}
		}
		return(array("status"=>"not done"));
		
    }
}
?>