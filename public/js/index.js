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

var cont = 0;
function inscribir(num, vacant) {
	var i = $('#vacantes'+num).text();
	if(cont == 1) {
		return;
	}
	cont++;
	i--;
	if(i < 1) {
		return;
	}
	$('#vacantes'+num).text(i);
	$( ".cards .col-xs-3" ).each(function() {
		if($(this).attr('id') != 'card'+num) {
			$( this ).css( "background", "#E0E0E0" );
			$(this).children().find('.boton').children().attr('id');
			var boton = $(this).children().find('.boton').children().attr('id');
			$('#'+boton).prop( "disabled", true );
			var texto = $(this).children().find('.nombre').find('h4').text()
			console.log(texto);
		}
	});
}