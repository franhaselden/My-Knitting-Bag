<?php
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

	$todaysDate = date('Y-m-d'); // generate timestamp

	$sql = "INSERT INTO users (username,email,password,dateRegistered) VALUES ('$username','$email','$password','$todaysDate')";
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

function confirmationEmail($username,$email){
	$to = $email;
	$subject = 'Welcome '.$username.'!';

	$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
	$headers .= "CC: susan@example.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
}















    
?>