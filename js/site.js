// Clicker
// This script is used for AJAX loading of content based on buttons
// To use this, the div must have a class of "click" and a data attribute
// The data attribute denotes the page-name that will be loaded (without file extension)
$(document).on('click', '.click', function(){
		var page = $(this).data('page');
		$("#loadPane").load("pages/"+page+".php");
	$(document).ajaxSuccess(function(event) {
		$(".wrapper").fadeIn("slow");
	});
});


// Action performs the same as above, but instead is handed the page and runs without a click. Can be called via the function
function loader(page){
	console.log('loader');
	console.log('page');
	$("#loadPane").load("pages/"+page+".php");
	$(document).ajaxSuccess(function(event) {
		$(".wrapper").fadeIn("slow");
	});
}


