<?php

require_once 'login-register-functions.php';
require_once '../connect-db.php';

// Check passwords compare
$password = htmlspecialchars($_POST["password"]);
$password2 = htmlspecialchars($_POST["password2"]);
$username = htmlspecialchars($_POST["username"]);
$email = htmlspecialchars($_POST["email"]);

if(strlen($password) > 7){
	// continue
	if(strlen($password2) > 7){
		// continue
		if($password == $password2){
			// continue
			if(strlen($username) > 3){
				// continue
				$usernameAlreadyExists = usernameAlreadyExists($username);
				if ($usernameAlreadyExists == false){
					// continue
					if (!preg_match('/\s/',$username)){
						// continue	
						if(!empty($email)){
							// continue	
							if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
								// continue
								$emailAlreadyExists = emailAlreadyExists($email);
								if ($emailAlreadyExists == false){
									// VALIDATION COMPLETE

									// Hash the password
									$hashedPassword = hashPassword($password);

									// Submit details to DB
									$submissionSuccess = insertRegisterDetails($username,$email,$hashedPassword);
									if ($submissionSuccess == 1){
										// continue
										echo 'Your account has been created! You are now logged in.';
										confirmationEmail($username,$email);
									}else{
										echo "We're sorry, there was an unknown error. Please try again or contact the site administrator.";
									}
								}else if ($emailAlreadyExists == true){
									echo 'That email address is already in use';
								}else{
									echo "We're sorry, there was an unknown error. Please try again or contact the site administrator.";
								}
							}else{
								echo 'That is not a valid email address';
							}
						}else{
							echo 'You must enter an email address';
						}
					}else{
						echo 'Your username cannot contain any spaces';
					}
				}else if ($usernameAlreadyExists == true){
					echo "That username is already in use!";
				}else{
					echo "We're sorry, there was an unknown error. Please try again or contact the site administrator.";
				}
			}else{
				echo "Your username must be at least four characters";
			}
		}else{
			echo "Your passwords do not match";
		}
	}else{
		echo "Password must be at least 8 characters";
	}
}else{
	echo "Password must be at least 8 characters";
}




?>