
$(document).ready(function() {

	//carga inicial del primer selector de imagenes
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  var sample = $("#upload-sample").html();
  $("#form-file-container").append(sample);
  $("#btn-adder").on('click',function(){
    var lengi = $("#form-file-container").find("div.input-group").length
    if (lengi < 9) {
      $("#form-file-container").append("<br>");
      var sample = $("#upload-sample").html();
      
      $("#form-file-container").append(sample);

      $(".custom-file-input").on("change", function(){
        var fileName = $(this).val();
        if (fileName.includes("/")) {
          var splitName = fileName.split("/");
        }
        else
          var splitName = fileName.split("\\");
        
         
                //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(splitName[splitName.length -1]);
      });
    }
    else {
      // $(document).Toasts('create', {
      //   title: 'Calma pequeñito!',
      //   body: 'Más de 10 archivos es excederse no?'
      // });
      Toast.fire({
        type: 'error',
        title: 'Mas de 10 a la vez es excedese ¿No?'
      });
      
    }
    
    // $(".")
  });
  $("#btn-dismisser").on('click',function(){
  if ($("#form-file-container").find("div.input-group").length > 1) {
    $("#form-file-container").find("br").last().remove();
    $("#form-file-container").find("div.input-group").last().remove();
  }
  else {
      // $(document).Toasts('create', {
      //   title: 'Alto ahí pequeño!',
      //   body: '¿Acaso no quieres subir archivos?'
      // });
      Toast.fire({
        type: 'error',
        title: '¿Acaso no quieres subir archivos?'
      });
    }
    // $("#form-file-container").append(sample);
  });




$(".custom-file-input").on("change", function(){
        var fileName = $(this).val();
        if (fileName.includes("/")) {
          var splitName = fileName.split("/");
        }
        else
          var splitName = fileName.split("\\");
        
         
                //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(splitName[splitName.length -1]);
});

});