<?php
session_start();
$_SESSION["last-page"] = "login-register/activate";
?>
<div class="wrapper register">
	<h1>MKB</h1>
	<div class="button-wrap">
		<h2>Activate</h2>
		<form>
			<input name="email" type="email" placeholder="email" />
			<input name="activationkey" type="text" placeholder="activation key" />
			<input type="submit" value="Activate" class="button" />
		</form>
	</div>
	<div class="click" data-page="splash">Home</div>
</div>