$(document).ready(function(){

//$('#summernote').summernote();
var iframe = $('#workzone').contents();
window.$iframe = $(iframe);
console.log(iframe);

$("#btn_add").on('click', function(event) {
	event.preventDefault();
	 $(iframe).location.reload(true);
	console.log("fgfgfggf");
});

$( "#draggable" ).draggable({
	helper: "clone",
});

$("#bg").on("click",function(){
	console.log('test');
});



$( "#sortable" ).sortable();
$( "#sortable" ).disableSelection();

$iframe.ready(function () {	
	$iframe.find('.text-content').dblclick(function() {
	 	$(this).attr("contenteditable","true");
	 	$(this).attr("selected");
	 	console.log('test');
	});
})

});