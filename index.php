<?php
require_once 'parts/header.php';

// Checks if there is a last-page variable set, and returns user to that page if true

if(!empty($_SESSION["last-page"])){
	echo $_SESSION["last-page"];
?>
	<script>
		loader("<?php echo $_SESSION["last-page"]; ?>");
	</script>
	<?php
}else{
	echo 'empty';
}

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