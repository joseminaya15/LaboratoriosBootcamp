function buscar() {
	var buscador = $('#buscador').val();
	$.ajax({
		data  : { buscador : buscador},
		url   : 'Admin/buscar',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		$('tbody').find('tr').remove();
        		$('tbody').append(data.html);
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

function cambiarFecha() {
	var fecha = $('#fecha').val();
	var evento = $('#evento').val();
	$.ajax({
		data  : { fecha  : fecha,
				  evento : evento},
		url   : 'Admin/cambiarFecha',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		$('tbody').find('tr').remove();
        		$('tbody').append(data.html);
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

function cambiarEvento() {
	var evento = $('#evento').val();
	var fecha = $('#fecha').val();
	$.ajax({
		data  : { evento : evento,
				  fecha : fecha},
		url   : 'Admin/cambiarEvento',
		type  : 'POST'
	}).done(function(data){
		try{
        	data = JSON.parse(data);
        	if(data.error == 0){
        		$('tbody').find('tr').remove();
        		$('tbody').append(data.html);
        	}else {
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}

function cerrarCesion() {
    $.ajax({
        url   : 'Admin/cerrarCesion',
        type  : 'POST'
    }).done(function(data){
        try{
            data = JSON.parse(data);
            if(data.error == 0){
                location.href = 'Login';
            }else {
                return;
            }
      } catch (err){
        msj('error',err.message);
      }
    });
}