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
});