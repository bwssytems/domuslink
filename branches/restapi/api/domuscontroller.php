<?php
## Includes

class DomusController
{
	
	public function authorize()
	{
		error_log("Enter authorize");
		require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		## Load config file functions and grab settings
		//$config =& parse_config($frontObj->getConfig());
		$config = $_SESSION['frontObj']->getConfig();
		$myLogin = new Login($config['password']);
		error_log("authorize for level ".$config['seclevel']." and this login status is ".$myLogin->login());
		## Security validation's
		if ($config['seclevel'] != "0" && $myLogin->login() != true) {
			if(isset($_SERVER['PHP_AUTH_PW'])) {
				error_log("validate password ".$_SERVER['PHP_AUTH_PW']);
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
        return "DomusController test call successful.";
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
    		return(array("alaises" => $heyuconf->getAliases(false, true)));
        }
    }

    /**
     * Gets the aliases by location in the floorplan
     * @url GET /location/$label
     * @url GET /location
     */
    public function getAliasesByLocation($label = null)
    {
		error_log("Enter getAliasesByLocation");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');
		$theLocation = new location($heyuconf);

		if($label == null)
			$label = "unknown";
		return(array($label => $theLocation->getAliasesByLocation($label, true)));
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
     * @url GET /floorplan
     */
    public function getFloorPlan()
    {
		error_log("Enter getFloorPlan");
    	require_once('.'.DIRECTORY_SEPARATOR.'apiinclude.php');
		require_once('.'.DIRECTORY_SEPARATOR.'include_globals.php');

//   		return(array("floorplan" => $heyuconf->getFloorPlan(false)));
   		return($heyuconf->getFloorPlan(true));
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
					heyu_action($config, "db", $anAlias->getHouseDevice(), $state, $curr, $req);
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