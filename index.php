<?php
require_once 'parts/header.php';

// Checks the session
if ($_SESSION["loggedin"] == true){
	echo 'Welcome back User!';
}else{
	// User not logged in, load log-in pane (with fade)
	?>
	<script>
	$( document ).ready(function() {
    	$("#loadPane").load("pages/splash.php");
    	$( document ).ajaxSuccess(function( event, request, settings ) {
  			$( ".wrapper" ).fadeIn( "slow" );
		});
    });
	</script>
<?php
}
?>

<div id="loadPane">
</div>

<?php
require_once 'parts/footer.php';
?>