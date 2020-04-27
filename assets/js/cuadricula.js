$(document).ready(function() {
	//cambio de tamaño en las cuadrículas
  $("#button-many-cards").on('click', function(){
  	$("#cuadricula").children().removeClass("col-lg-4");
  	$("#cuadricula").children().removeClass("col-lg-3");
  	$("#cuadricula").children().addClass("col-lg-3");
  });
  $("#button-few-cards").on('click', function(){
  	$("#cuadricula").children().removeClass("col-lg-3");
  	$("#cuadricula").children().removeClass("col-lg-4");
  	$("#cuadricula").children().addClass("col-lg-4");
  });
  $("#offset").on('click', function(){
    $.get('/gtproj/tags/offset')
    .done(function(){
      
    });
  });
});