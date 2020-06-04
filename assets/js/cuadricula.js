$(document).ready(function() {
  //atrapar urlbase
  var base_url = $("#base_url").attr('data-target')
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
  $('.modal-click').on('click', function () {
    //console.log('catch!');
    var id = $(this).attr('data-target-id');
    // console.log(id);
    $.get(base_url + '/photos/show/' + id)
    .done(function(data){
     
      $.get(base_url + '/photos/comments/' + id).
      done(function(data){
        $("#comments-box").html("");
        $.each(data,function(index, value){
          var single_comment = $("#comment-container").html();
          single_comment = single_comment.replace("-what-", value.comment);
          single_comment = single_comment.replace("-when-", value.created_at);
          single_comment = single_comment.replace("-who-", value.username);
          single_comment = single_comment.replace("-whoid-", value.user_id);
          $("#comments-box").append(single_comment);
        });
      })
      .fail(function(){
        console.log("Comment load error");
      });
      $("#edit-element").hide();
      $("#edit-element").attr('href', (base_url + "/collection/edit/"+id));
      $("#download-element").attr('href', (data[0].url));
      $("#image-container").attr("src", data[0].url);
      $("#description-image").html(data[0].description);
      if ($("#user-info").attr('meta-user-id') != '0' && $("#user-info").attr('meta-user-id') == data[0].user_id) {
        $("#edit-element").show();
      }
      $("#modal-lg").modal('show');
    })
    .fail(function(){
      console.log("Photos get failed")
    });
    $("#push-comment").on('click', function(){
      var comment_added = $("#comment-add").val();
      $("#comment-add").val("");
      event.stopPropagation();
      $.post(base_url + "/photos/postComment/" + id, {comment: comment_added}).
      done(function(data){
        console.log(data);
        
        var single_comment = $("#comment-container").html();
        single_comment = single_comment.replace("-what-", data.comment);
        single_comment = single_comment.replace("-when-", data.when);
        single_comment = single_comment.replace("-who-", data.user.username);
        single_comment = single_comment.replace("-whoid-", data.user.id);
        $("#comments-box").prepend(single_comment);
          
      })
      .fail(function(error){
        // console.log(error);
        // console.log("Comment add fail " + error.responseText);
        if (error.responseText == "No autorizado") 
          alert("No ha iniciado sesión");
        else
          alert("Hubo un error al publicar tu comentario " + error.responseText);
      });
    })
    
  })
  //////función de search
  $( "#search-go" ).submit(function( event ) {
  
    event.preventDefault();
    var searchbartext = $(this).find("input[type=search]").val();
    var explodedtext = searchbartext.split(",");
    var outlinetext = "?tags[]=";
    $.each(explodedtext, function(index, value){
      if (index < explodedtext.length -1 ) 
        outlinetext += value.trim() + "&tags[]=";
      else
        outlinetext += value.trim() ;
    });
    window.location.href = base_url  + outlinetext;
  });
});