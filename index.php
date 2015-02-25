<?php require_once 'parts/header.php'; ?>

<div id="loadPane">
</div>

<?php
// Checks if there is a last-page variable set, and returns user to that page if true
if(!empty($_SESSION["last-page"])){
?>
	<script>
		loader("<?php echo $_SESSION["last-page"]; ?>");
	</script>
	<?php
}else{?>
	<script>
	loader("splash");
	</script>
<?php } ?>

<?php
require_once 'parts/footer.php';
?>