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
function inscribir(num, pant, dato) {
	var evento = $(dato).parent().parent().find('.mdl-card__supporting-text').find('p').text();
	var i = $('#vacantes'+num).text();
	console.log(evento);
	if(cont == 1) {
		return;
	}
	cont++;
	i--;
	if(i < 1) {
		return;
	}
	$('#vacantes'+num).text(i);
	$.ajax({
		data  : { vacantes : i,
				  evento : evento},
		url   : 'Inicio/inscribir',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	var texto = '.mdl-card.mdl-card-fecha.cards'+cont;
        	if(data.error == 0){
        		$(texto).each(function() {
				$(this).css( "background", "#E0E0E0" );
				$(this).children().find('.boton').children().attr('id');
				var boton = $(this).children().find('.mdl-card__actions').children().attr('id');
				$('#'+boton).prop( "disabled", true );
			});
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}