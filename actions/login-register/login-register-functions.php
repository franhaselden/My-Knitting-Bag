<?php
function createActivationKey(){
	$length = 50;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function usernameAlreadyExists($username){
	require '../connect-db.php';
	$sql = "SELECT username FROM users WHERE username = '$username'";
	if ($result = mysqli_query($con,$sql)) {
		$data = [];
			while($row = mysqli_fetch_array($result)){
			    $data[] = $row;
			}
		if(!empty($data)){
			// Record found
			$dataReturned = $data[0]['username'];
		}else{
			// No record found - continue
			$dataReturned = ''; // empty (no data)
		}
		mysqli_free_result($result);
		if (!empty($dataReturned)) {
   			return true;
		}else{
			return false;
		}
	}
}

function emailAlreadyExists($email){
	require '../connect-db.php';
	$sql = "SELECT email FROM users WHERE email = '$email'";
	if ($result = mysqli_query($con,$sql)) {
		$data = [];
			while($row = mysqli_fetch_array($result)){
			    $data[] = $row;
			}
		if(!empty($data)){
			// Record found
			$dataReturned = $data[0]['email'];
		}else{
			// No record found - continue
			$dataReturned = ''; // empty (no data)
		}
		mysqli_free_result($result);
		if (!empty($dataReturned)) {
   			return true;
		}else{
			return false;
		}
		
	}
}

function hashPassword($password){
	$salt = 'nLDAUPfLeYAgafuVcyiGDXvATkhdgLicLhpHZrbgqxizmmoTwNgdntYMQPxWGdAorlQXWoPKgOMKvdoEpffIjaNuoIYcIYNKFSCbfb1471970399893983273658676529110753837721755316';
 	$pw_hash = md5($salt.$password);
 	return $pw_hash;
}

function insertRegisterDetails($username,$email,$password){
	require '../connect-db.php';

	$activationKey = createActivationKey(); // generate activation key
	$todaysDate = date('Y-m-d'); // generate timestamp

	$sql = "INSERT INTO users (username,email,password,activated,activationKey,dateRegistered) VALUES ('$username','$email','$password',0,'$activationKey','$todaysDate')";
	if ($result = mysqli_query($con,$sql)) {
		$userID = mysqli_insert_id($con);
		$_SESSION["userID"] = $userID;
		$_SESSION["username"] = $username;
		$_SESSION["isLoggedIn"] = true;
		return true; // successful!
	}else{
		return false;
	}
}
    
?>