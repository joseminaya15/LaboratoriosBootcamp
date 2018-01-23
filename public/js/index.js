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
		url   : 'login/ingresar',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		location.href = 'inicio';
        		$('#correo').val("");
        	}else {
				$('#correo').parent().addClass('is-invalid');
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
var select = 0;
var datos_array = [];
function inscribir(num, pant, dato) {
	var suma = '';
	var suma2 = '';
	var resta = '';
	var resta2 = '';
	var resta3 = '';
	var evento = $(dato).parent().parent().find('.mdl-card__supporting-text').find('p').text();
	var i = $('#vacantes'+num).find('label').text();
	if(cont == 1) {
		return;
	}
	cont++;
	i--;
	if(i < 1) {
		return;
	}
	select++;
	$('#vacantes'+num).find('label').text(i);
	$.ajax({
		data  : { vacantes : i,
				  evento : evento,
				  pant   : pant,
				  select : select},
		url   : 'inicio/inscribir',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	var texto = '.mdl-card.mdl-card-fecha.cards'+pant;
        	if(data.error == 0){
        		$(texto).each(function() {
				$(this).css( "background", "#E0E0E0" );
				var boton = $(this).find('.mdl-card__actions').find('button').attr('id');
				if('btnInscr'+num == boton) {
					$('#'+boton).text('Reserved');
					$('#'+boton).css("color", "#000000");
					if(num > 9 && num < 14) {
						resta3 = num-10;
						$('#card'+resta3).css( "background", "#E0E0E0" );
						$('#btnInscr'+resta3).prop( "disabled", true );
					}
					if(num > 19 && num < 24) {
						resta = num-10;
						resta2 = num-20;
						$('#card'+resta).css( "background", "#E0E0E0" );
						$('#btnInscr'+resta).prop( "disabled", true );
						$('#card'+resta2).css( "background", "#E0E0E0" );
						$('#btnInscr'+resta2).prop( "disabled", true );
					}
					if(num == 15 || num == 24) {
						$('#card24').css( "background", "#E0E0E0" );
						$('#btnInscr24').prop( "disabled", true );
						$('#card15').css( "background", "#E0E0E0" );
						$('#btnInscr15').prop( "disabled", true );
					}
					if(num == 4 || num == 14) {
						$('#card'+num).css( "background", "#E0E0E0" );
						$('#btnInscr'+num).prop( "disabled", true );
					}else {
						suma = num+10;
						suma2 = num+20;
						$('#card'+suma).css( "background", "#E0E0E0" );
						$('#btnInscr'+suma).prop( "disabled", true );
						$('#card'+suma2).css( "background", "#E0E0E0" );
						$('#btnInscr'+suma2).prop( "disabled", true );
					}
					datos_array.push(num);
					if(datos_array.length == 3) {
						$('#ModalThank').modal('show');
					}
				}else {
					$('#'+boton).text('Reserve');
				}
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
function redirectPage(){
	setTimeout(function(){ 
		location.href = 'Login';
	}, 1000);
}

function gotoLogin(){
	location.href = 'Login';
} 