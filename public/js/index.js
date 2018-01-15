function ingresar() {
	var correo = $('#correo').val();
	if(correo == null) {
		$('#correo').css('border-color','red');
		return;
	}
	if (!validateEmail(correo)) {
		$('#correo').css('border-color','red');
		return;
	}
	$.ajax({
		data  : { correo : correo},
		url   : 'Login/ingresar',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		location.href = 'Inicio';
        		$('#correo').val("");
        	}else {
        		$('#correo').css('border-color','red');
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}