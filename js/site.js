// Clicker
// This script is used for AJAX loading of content based on buttons
// To use this, the div must have a class of "click" and a data attribute
// The data attribute denotes the page-name that will be loaded (without file extension)
$(document).on('click', '.click', function(){
  var page = $(this).data('page');
  console.log(page);
  $("#loadPane").load("pages/"+page+".php");
    $(document).ajaxSuccess(function(event) {
  			$(".wrapper").fadeIn("slow");
	});
});
