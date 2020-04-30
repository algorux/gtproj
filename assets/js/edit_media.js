
$(document).ready(function() {

//Initialize Select2 Elements
//Go fetch categories
	$.get("/gtproj/tags?limit=0")
	 .done(function(data){
	 	var obj = JSON.parse(data);
	 	$.each(obj, function(index,value){
	 		$('.select2bs4').each(function(){
	 			$(this).append(new Option(value.name, value.id));
    		});
	 	});

	 	
	 	// $('.select2').select2();
	    $('.select2bs4').select2({
	      theme: 'bootstrap4'
	    });
	 })
	 .fail(function(error){
	 	alert(error)
	 });
    
    

    

});