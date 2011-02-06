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
	private $apiVersion = "3";
	private $apiQualifier = "beta";
	
	public function authorize()
	{
		require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		## Load config file functions and grab settings
		//$config =& parse_config($frontObj->getConfig());
		$config = $_SESSION['frontObj']->getConfig();
		$myLogin = new Login($config['password']);
		error_log("Enter authorize for level ".$config['seclevel']." and this login status is ".$myLogin->login());
		## Security validation's
		if ($config['seclevel'] != "0" && $myLogin->login() != true) {
			if(isset($_SERVER['PHP_AUTH_PW'])) {
				error_log("validate password ******");
				if($myLogin->checkLogin($_SERVER['PHP_AUTH_PW'], true))
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
		error_log("Enter getAliases");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');

        if ($label && $label != 'all') {
            return($heyuconf->getAliasforLabel($label, true));
        }
        else
        {
        	// Will only return enabled aliases
    		return(array("alaises" => $heyuconf->getAliases(true, true)));
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
		error_log("Enter getAliasesByLocation");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$theLocation = new location($heyuconf);

		if($label == null)
			$label = "unknown";
		$passVisible = false;
		if($visible == "true")
			$passVisible = true;
		return(array($label => $theLocation->getAliasesByLocation($label, true, $passVisible)));
    }

    /**
     * Gets the floorplan and aliases
     * @url GET /map/$label
     * @url GET /map/all
     */
    public function getMap($label = null)
    {
		error_log("Enter getMap");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');

        if ($label && $label != 'all') {
            return($heyuconf->getAliasMapforLabel($label, true));
        }
        else
        {
			return(array("map" => $heyuconf->getAliasMap(true)));
        }
    }
    
    /**
     * Gets the alias state and dim level
     * @url GET /aliasstate/$houseDevice
     */
    public function getAliasState($houseDevice = null)
    {
		error_log("Enter getAliasState");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();

        if ($houseDevice) {
        	$theState = on_state($config, $houseDevice);
        	$theLevel = dim_level($config, $houseDevice);
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
		error_log("Enter getFloorPlan");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$passVisible = false;
		if($visible == "true")
			$passVisible = true;
   		return($heyuconf->getFloorPlan(true, $passVisible));
    }
    
    /**
     * Turn on an alias
     * @url POST /on/$label
     */
    public function turnOn($label)
    {
		error_log("Enter turnOn for - ".$label);
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();
		
		if($label) {
			$anAlias = $heyuconf->getAliasforLabel($label, false);
			if($anAlias)
			{
				try {
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
		error_log("Enter turnOff for - ".$label);
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();
		
		if($label) {
			$anAlias = $heyuconf->getAliasforLabel($label, false);
			if($anAlias)
			{
				try {
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
		error_log("Enter dimBright for - ".$label);
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$config = $_SESSION['frontObj']->getConfig();
		
		if($label) {
			$anAlias = $heyuconf->getAliasforLabel($label, false);
			if($anAlias)
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
				error_log("dimBright no alias found ".$label);
			}
		}
		return(array("status"=>"not done"));
		
    }
}
?>