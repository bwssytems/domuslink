<?php

// session_start();
require_once($dirname.DIRECTORY_SEPARATOR.'fileloc.php');

function registerUser($type, $user, $pass1, $pass2, $level, $levelType) {
	$errorText = '';
	
	// Check passwords
	if ($pass1 != $pass2) $errorText = "Passwords are not identical!";
	elseif (strlen($pass1) < 6 && $type == USER_TYPE_D) $errorText = "Password is to short!";
	
	// Check user existance	
	$pfile = fopen(USERDB_FILE_LOCATION,"a+");
    rewind($pfile);

    while (!feof($pfile)) {
        $line = fgets($pfile);
        $tmp = explode(':', $line);
        if ($tmp[0] == $user) {
            $errorText = "The selected user name is taken!";
            break;
        }
    }
	
    // If everything is OK -> store user data
    if ($errorText == ''){
		// Secure password string
		$userpass = md5($pass1, $salt);
    	
		fwrite($pfile, "\r\n$user:$userpass");
    }
    
    fclose($pfile);
	
	
	return $errorText;
}

function loginUser($user,$pass){
	$errorText = '';
	$validUser = false;
	
	// Check user existance	
	$pfile = fopen(USERDB_FILE_LOCATION,"r");
    rewind($pfile);

    while (!feof($pfile)) {
        $line = fgets($pfile);
        $tmp = explode(':', $line);
        if ($tmp[0] == $user) {
            // User exists, check password
            if (trim($tmp[1]) == trim(md5($pass, $salt))){
            	$validUser= true;
//            	$_SESSION['userName'] = $user;
            }
            break;
        }
    }
    fclose($pfile);

    if ($validUser != true) $errorText = "Invalid username or password!";
    
//    if ($validUser == true) $_SESSION['validUser'] = true;
//    else $_SESSION['validUser'] = false;
	
	return $errorText;	
}

// function logoutUser(){
//	unset($_SESSION['validUser']);
//	unset($_SESSION['userName']);
// }

// function checkUser(){
//	if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true)){
//		header('Location: login.php');
//	}
// }

?>