<?php
session_start();
$_SESSION["last-page"] = "splash";
?>
<div class="wrapper splash">
	<h1>MKB</h1>
	<div class="button-wrap">
		<div class="button click" data-page="login-register/login">Log in</div>
		<div class="button click" data-page="login-register/register">Register</div>
	</div>
	<div class="click" data-page="splash">Home</div>
</div>