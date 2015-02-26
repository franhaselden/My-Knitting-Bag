<?php
session_start();
$_SESSION["last-page"] = "login-register/register";
?>
<div class="wrapper register">
	<h1>MKB</h1>
	<div class="button-wrap">
		<h2>Register</h2>
		<form>
			<input name="username" type="text" placeholder="username" />
			<input name="password" type="password" placeholder="password" />
			<input name="password2" type="password" placeholder="password again" />
			<input name="email"type="email" placeholder="email" />
			<input type="submit" value="Register" class="button" />
			<div class="click" data-page="login-register/login">Already registered?</div>
		</form>
	</div>
	<div class="click" data-page="splash">Home</div>
</div>