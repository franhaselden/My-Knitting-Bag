<?php

require_once 'login-register-functions.php';
require_once '../connect-db.php';

$password = '1234';
$password2 = '1234';

// Check passwords compare
//$password = htmlspecialchars($_POST["password"]);
//$password2 = htmlspecialchars($_POST["password2"]);
if ($password == $password2){
	// Continue
	//$username = htmlspecialchars($_POST["username"]);
	//$email = htmlspecialchars($_POST["email"]);
	$username = 'frankchester';
	$email = 'fran@haselden.co.uk';

	$usernameAlreadyExists = usernameAlreadyExists($username); // check username
	if ($usernameAlreadyExists == true){
		echo 'That username already exists!';
	}else{
		// Username OK - continue
		$emailAlreadyExists = emailAlreadyExists($email); // check email
		if ($emailAlreadyExists == true){
			echo 'That email is already in use!';
		}else{
			// Email OK - continue
			
			$hashedPassword = hashPassword($password);
			$success = insertRegisterDetails($username,$email,$hashedPassword);
			echo $success;

		}
	}

}else{
	break;
}


?>