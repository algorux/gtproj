
$(document).ready(function() {

//Initialize Select2 Elements
//Go fetch categories
	var base_url = $("#base_url").attr('data-target');
	$.get(base_url +"/tags?limit=0")
	 .done(function(data){
	 	var obj = JSON.parse(data);
	 	$.each(obj, function(index,value){
	 		$('.select2bs4').each(function(){
	 			//console.log(ids_selected)
	 			var ids_selected = $(this).attr("meta-data-ids");
	 			if (ids_selected) {
		 			
		 			if (ids_selected.includes(value.id)) {
		 				$(this).append(new Option(value.name, value.id, true, true));
		 			}
		 			else
		 				$(this).append(new Option(value.name, value.id));
		 			
	 			}
	 			else
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