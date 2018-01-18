function log(msj) {
	console.log(msj);
}
function tocar(event){
	$(event).css("cursor", "move");
	
	$(event).mouseup(function() {
		$(event).css("cursor", "pointer");
	});
}
var CONFIG = (function() {
	var private = {
		'ANP' : 'Acci&oacute;n No permitida',
		'MSJ_ERR' : 'Comun&iacute;quese con alguna persona a cargo :(',
		'EST_INACTIVO' : 0,
		'CABE_ERR'   : 'Error',
		'EST_LLAMAR' : 'SU_TURNO',
		'EST_PERDID' : 'PERDIO_TURNO',
		'EST_ENTREV' : 'EN_ENTREVISTA',
		'TIPOS'      : 'image/*,video/*'
	};
	return {
		get : function(name) {
			return private[name];
		}
	};
})();
function modal(idModal) {
	$('#'+idModal).modal('toggle');
}
function abrirCerrarModal(idModal) {
	$('#'+idModal).modal('toggle');
}
function msj(tipo, msj, cabecera) {
	if (tipo == 'error') {
		toastr.error(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else if (tipo == 'warning') {
		toastr.warning(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else {
		toastr.success(msj, cabecera, {timeOut: 4000});
	}
}
function mostrarNotificacion(tipo, msj, cabecera) {
	if (tipo == 'error') {
		toastr.error(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else if (tipo == 'warning') {
		toastr.warning(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	} else {
		toastr.success(msj, cabecera, {
			positionClass: "toast-bottom-center",
			showDuration: 500,
		    hideDuration: 500,
			timeOut: 2500,
			showEasing: "linear",
			hideEasing: "linear",
			showMethod: "slideDown",
			hideMethod: "slideUp"
		});
	}
}
function existCampoById(campo, valor, tbl) {
	$.ajax({
		type : "POST",
		'url' : 'exiCampoById',
		data : {
			'p_campo' : campo,
			'p_valor' : valor,
			'p_tbl' : tbl
		}
	}).done(function(data) {
		return data;
	});
}
(function($) {
	$.fn.clickToggle = function(func1, func2) {
		var funcs = [ func1, func2 ];
		this.data('toggleclicked', 0);
		this.click(function() {
			var data = $(this).data();
			var tc = data.toggleclicked;
			$.proxy(funcs[tc], this)();
			data.toggleclicked = (tc + 1) % 2;
		});
		return this;
	};
}(jQuery));
var menuC = 0;
function successValidConfig(idTabla, indexRow, indexCampo, pk, nuevoValor, msj, clase, idGrupo, idNota) {
	$('#' + idTabla).bootstrapTable(
			'updateCell',
			{
				rowIndex : indexRow,
				fieldName : indexCampo,
				fieldValue : '<span class="' + clase
						+ ' editable editable-click" data-pk="' + pk + '" data-grupo="'+idGrupo+'" data-id_nota="'+idNota+'">'
						+ nuevoValor + '</span>'
			});
}
function successValid(idTabla, indexRow, indexCampo, pk, nuevoValor, msj, clase) {
	$('#' + idTabla).bootstrapTable(
			'updateCell',
			{
				rowIndex : indexRow,
				fieldName : indexCampo,
				fieldValue : '<span class="' + clase
						+ ' editable editable-click" data-pk="' + pk + '">'
						+ nuevoValor + '</span>'
			});
}
function marcarNodo(id) {
	$("#" + id).addClass("active");
	$("#" + id).find("a").addClass("active");
}
function setValor(idNameCombo,valores) {
	$('select[name='+idNameCombo+']').val(valores);
	$('#'+idNameCombo).selectpicker('refresh');
}
function disableEnableCombo(idCombo, disaEna){
	$('#'+idCombo).prop('disabled', disaEna);
	$('#'+idCombo).selectpicker('refresh');
}
function isInt(value) {
	return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value));
}
function isFloat(value) {
	return value != "" && !isNaN(value) && Math.round(value) != value;
}
function isNumerico(value) {
	if(isInt(value) || isFloat(value)) {
        return true;
   }
   return false;
}
function setChecked(idCheck, boolCheck){
	if(boolCheck == 'true'){
		$("#"+idCheck).parent().addClass("is-checked");
		$("#"+idCheck).attr("checked", true);
	}else{
		$("#"+idCheck).parent().removeClass("is-checked");
		$("#"+idCheck).attr("checked", false);
	}
}
function isChecked(element){
	var tof = false;
	if($(element).parent().hasClass("is-checked")){
		tof = true;
	}
	
	return tof;
}