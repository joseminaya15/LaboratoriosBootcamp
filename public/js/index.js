function ingresar() {
	var correo = $('#correo').val();
	if(correo == null) {
		$('#correo').parent().addClass('is-invalid');
		return;
	}
	if (!validateEmail(correo)) {
		$('#correo').parent().addClass('is-invalid');
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
	var i = $('#vacantes'+num).find('label').text();
	//console.log(evento);
	if(cont == 1) {
		return;
	}
	cont++;
	i--;
	if(i < 1) {
		return;
	}
	$('#vacantes'+num).find('label').text(i);
	$.ajax({
		data  : { vacantes : i,
				  evento : evento,
				  pant   : pant},
		url   : 'Inicio/inscribir',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	var texto = '.mdl-card.mdl-card-fecha.cards'+pant;
        	if(data.error == 0){
        		$(texto).each(function() {
				$(this).css( "background", "#E0E0E0" );
				var boton = $(this).find('.mdl-card__actions').find('button').attr('id');
				$('#'+boton).prop( "disabled", true );
				cont = 0;
			});
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}