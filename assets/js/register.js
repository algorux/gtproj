$(document).ready(function() {
  // $("#submit").on('click', function(){
  //   if ($('input[name=password]').val() != $('input[name=confirm_password]').val() ) {
  //     alert('Las contraseñas no coinciden');
  //   } 
  //   else
  //     $("#form").submit();
  // });
  var base_url = $("#base_url").attr("data-target");

  $('.datepicker').datepicker({
  	autoclose: true,
	 todayHighlight: false,
	 // format: 'dd/mm/yyyy',
	 startDate: 0,
	 endDate: new Date(new Date().setDate(new Date().getDate() - 6570))
  });
  ///////////////////checar legalidad del registro
  $("#email").blur( function(){
  	if ($('#email').val() != "") {
  		$.get(base_url + "/photos/checkUE/" + $('#email').val())
	  	.done(function(data){
	  		$('#email').removeClass('is-valid');
	  		$('#email').addClass('is-invalid');
	  		$('#email').val("Ese correo ya existe");
	  	})
	  	.fail(function(error){
	  		console.log(error);
	  		if (error.responseText == "No existe") {
		  		$('#email').removeClass('is-invalid');
		  		$('#email').addClass('is-valid');
	  		}
	  		else
	  		{
	  			$('#email').removeClass('is-valid');
	  			$('#email').addClass('is-invalid');
	  		}
	  	});
  	}
  	
  });
  $("#username").blur( function(){
  	if ($('#username').val() != "") {
  		$.get(base_url + "/photos/checkUN/" + $('#username').val())
	  	.done(function(data){
	  		$('#username').removeClass('is-valid');
	  		$('#username').addClass('is-invalid');
	  		$('#username').val("");
	  		$('#username').attr('placeholder',"El nombre de usuario ya existe");
	  	})
	  	.fail(function(error){
	  		console.log(error);
	  		if (error.responseText == "No existe") {
		  		$('#username').removeClass('is-invalid');
		  		$('#username').addClass('is-valid');
	  		}
	  		else
	  		{
	  			$('#username').removeClass('is-valid');
	  			$('#username').addClass('is-invalid');
	  		}
	  	});
  	}
  	
  });
  $("#confirm").blur(function(){
  	if ($("#password").val() != $(this).val()) {
  		$(this).removeClass('is-valid');
	  	$(this).addClass('is-invalid');
	  	$("#password").addClass('is-invalid');
	  	$("#password").removeClass('is-valid');
	  	$(this).val("");
	  	$(this).attr('placeholder',"Las contraseñas no coinciden");
  	}
  	else
  	{
  		$(this).removeClass('is-invalid');
	  	$(this).addClass('is-valid');
	  	$("#password").removeClass('is-invalid');
	  	$("#password").addClass('is-valid');
  	}
  });
  // $.get(base_url + "/photos/")
});