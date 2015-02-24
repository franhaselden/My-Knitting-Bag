<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$db_name = 'mkb';


$con = mysqli_connect($host,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>