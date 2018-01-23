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
//var datos_array = [];
var respuestas = [];
var pantalla = "";
var arr_vacantes = [];
var i = "";
var pant1 = 0;
var pant2 = 0;
var pant3 = 0;
function inscribir(num, pant, dato) {
	var suma = '';
	var suma2 = '';
	var resta = '';
	var resta2 = '';
	var resta3 = '';
	var spl = '';
	var evento = $(dato).parent().parent().find('.mdl-card__supporting-text').find('p').text();
	i = $('#vacantes'+num).find('label').text();
	/*if(respuestas.length == 3) {
		return;
	}*/
	if(cont == 1) {
		return;
	}
	cont++;
	i--;
	if(i < 1) {
		return;
	}
	select++;
	arr_vacantes.push(i);
	spl = pant-1;
	if(pant == 2 && modifi2 == 1) {
		respuestas.splice(spl, 1, evento);
		pant2 = 0;
	}else if(pant == 2 && modifi2 == 0){
		respuestas.push(evento);
		pant2 = 1;
	}
	if(pant == 1 && modifi1 == 0) {
		respuestas.push(evento);
		pant1 = 1;
	}else if(pant == 1 && modifi1 == 1) {
		respuestas.splice(spl, 1, evento);
	}
	if(pant == 3) {
		respuestas.push(evento);
		pant3 = 1;
	}
	pantalla = pant;
	var texto = '.mdl-card.mdl-card-fecha.cards'+pant;
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
				if(pant == 1) {
					num_pant = suma;
					num_pant3 = suma2;
				}
				if(pant == 2) {
					sec_pant = suma;
					resta_num = num-10;
				}
				$('#card'+suma).css( "background", "#E0E0E0" );
				$('#btnInscr'+suma).prop( "disabled", true );
				$('#card'+suma2).css( "background", "#E0E0E0" );
				$('#btnInscr'+suma2).prop( "disabled", true );
			}
			/*datos_array.push(num);
			if(datos_array.length == 3) {
				$('#ModalThank').modal('show');
			}*/
		}else {
			$('#'+boton).text('Reserve');
		}
		$('#'+boton).prop( "disabled", true );
		cont = 0;
	});


	$('#vacantes'+num).find('label').text(i);
	$('#btnmodificar'+num).prop( "disabled", false );
	cont = 0;//eliminar
	return;
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
					/*datos_array.push(num);
					if(datos_array.length == 3) {
						$('#ModalThank').modal('show');
					}*/
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
	if(respuestas.length < 3) {
		return;
	}
	$.ajax({
		data  : { respuestas   : respuestas,
				  vacantes 	   : arr_vacantes},
		url   : 'inicio/gotoLogin',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		if(respuestas.length == 3) {
					$('#ModalThank').modal('show');
				}
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
} 

var modifi2 = 0;
var modifi1 = 0;
var num_pant3 = 0;
var num_pant = "";
var sec_pant = "";
var resta_num = "";
function modificar(nume, panta, datos){
	var suma   = '';
	var suma2  = '';
	var suma3  = '';
	var resta  = '';
	var resta2 = '';
	var resta3 = '';
	var dec = '';
	var pos = '';
	var spl = '';
	if(i == 25) {
		return;
	}
	spl = panta-1;
	if(panta == 3) {
		respuestas.splice(spl, 1);
		pant3 = 0;
	}
	if(panta == 2) {
		modifi2 = 1;
		pant2 = 0;
	}
	if(panta == 1){
		pant1 = 0;
		modifi1 = 1;
	}
	dec = $('#vacantes'+nume).find('label').text();
	dec++;
	var texto  = '.mdl-card.mdl-card-fecha.cards'+panta;
	$('#btnmodificar'+nume).prop( "disabled", true );
	$('#vacantes'+nume).find('label').text(dec);
	$(texto).each(function() {
		var boton = $(this).find('.mdl-card__actions').find('button').attr('id');
		pos = boton.substr(8,2);
		if(pos >= nume) {
			$(this).css( "background", "#FFFFFF" );
			if(panta == 2) {
				suma = nume+10;
				if(pant3 == 0) {
					$('#card'+suma).css( "background", "#FFFFFF" );
					$('#btnInscr'+suma).prop( "disabled", false );
				}
				if(pant1 == 0) {
					var menos = nume-10;
					$('#card'+menos).css( "background", "#FFFFFF" );
					$('#btnInscr'+menos).prop( "disabled", false );
				}
				/*$('#card'+suma).css( "background", "#FFFFFF" );
				$('#btnInscr'+suma).prop( "disabled", false );*/
			}
			if(panta == 1) {
				if(pant2 == 0) {
					suma2 = nume+10;
					$('#card'+suma2).css( "background", "#FFFFFF" );
					$('#btnInscr'+suma2).prop( "disabled", false );
				}else {
					$('#card'+resta_num).css( "background", "#E0E0E0" );
					$('#btnInscr'+resta_num).prop( "disabled", true );
				}
				if(pant3 == 0){
					suma3 = nume+20;
					$('#card'+suma3).css( "background", "#FFFFFF" );
					$('#btnInscr'+suma3).prop( "disabled", false );
				}
			}
			if(panta == 3) {
				if(pant1 == 0) {
					resta2 = nume-10;
					resta3 = nume-20;
					$('#card'+resta2).css( "background", "#FFFFFF" );
					$('#card'+resta3).css( "background", "#FFFFFF" );
					$('#btnInscr'+resta2).prop( "disabled", false );
					$('#btnInscr'+resta3).prop( "disabled", false );
				}
			}
			$('#'+boton).prop( "disabled", false );
		}else {
			$(this).css( "background", "#FFFFFF" );
			$('#'+boton).prop( "disabled", false );
			if(panta == 2 && pant1 == 1) {
				$('#card'+num_pant).css( "background", "#E0E0E0" );
				$('#btnInscr'+num_pant).prop( "disabled", true );
			}else if(panta == 2 && pant1 == 0) {
				var menos = nume-10;
				$('#card'+menos).css( "background", "#FFFFFF" );
				$('#btnInscr'+menos).prop( "disabled", false );
				$('#card'+num_pant).css( "background", "#FFFFFF" );
				$('#btnInscr'+num_pant).prop( "disabled", false );
			}
			if(panta == 3) {
				if(nume > 19 && nume < 24) {
					$('#'+$(this).attr('id')).css( "background", "#FFFFFF" );
					var id = $(this).attr('id');
					var idButton = $('#'+id).find('.boton').find('button').attr('id');
					$('#'+idButton).prop( "disabled", false );
					if(pant1 == 0) {
						resta2 = nume-20;
						$('#card'+resta2).css( "background", "#FFFFFF" );
						$('#btnInscr'+resta2).prop( "disabled", false );
						$('#card'+num_pant3).css( "background", "#FFFFFF" );
					$('#btnInscr'+num_pant3).prop( "disabled", false );
					}else {
						$('#card'+num_pant3).css( "background", "#E0E0E0" );
						$('#btnInscr'+num_pant3).prop( "disabled", true );
					}
					if(pant2 == 1) {
						$('#card'+sec_pant).css( "background", "#E0E0E0" );
						$('#btnInscr'+sec_pant).prop( "disabled", true );
					}else if(pant2 == 0){
						resta2 = nume-10;
						$('#card'+resta2).css( "background", "#FFFFFF" );
						$('#btnInscr'+resta2).prop( "disabled", false );
						$('#card'+sec_pant).css( "background", "#FFFFFF" );
						$('#btnInscr'+sec_pant).prop( "disabled", false );
					}
				}
			}
			if(panta == 1){
				console.log('entra menor');
			}
		}
		if('btnInscr'+nume == boton) {
			$('#'+boton).text('Reserve');
			$('#'+boton).css("color", "");
		}/*else {
			$('#'+boton).text('Reserve');
		}*/
		//$('#'+boton).prop( "disabled", false );
	});
}