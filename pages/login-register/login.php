<?php
session_start();
$_SESSION["last-page"] = "login-register/login";
?>
<div class="wrapper login">
	<h1>MKB</h1>
	<div class="button-wrap">
		<h2>Login</h2>
		<form>
			<input name="username" type="text" placeholder="username" />
			<input name="password" type="password" placeholder="password" />
			<input type="submit" value="Log in" class="button" />
			<div class="click" data-page="forgot-password">Forgot password?</div>
		</form>
	</div>
	<div class="click" data-page="splash">Home</div>
</div>