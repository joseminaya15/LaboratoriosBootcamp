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
        		/*location.href = 'Inicio';
        		$('#correo').val("");*/
        	}else {
        		/*$('#correo').css('border-color','red');*/
        		return;
        	}
      } catch (err){
        msj('error',err.message);
      }
	});
}