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
    var selector = $(this);
    var current_page = parseInt(selector.attr("current-page"));
    current_page ++;
    $.get('/gtproj/tags?limit=10&offset=' + current_page)
    .done(function(data){
      // console.log(data);
      data = JSON.parse(data);
      selector.attr("current-page",current_page);
      $.each(data,function(index,value){
        $("#taglist-delimitator").append('<li class="nav-item"><a href="/gtproj?tags[]='+value.name+'" class="nav-link"><p>'+ value.name +'</p></a></li>')
      });
    });
    
  });


  ///Funciones de modal
  $('#modal-lg').on('shown.bs.modal', function () {
    console.log('catch!');
  })
});