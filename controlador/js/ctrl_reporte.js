// JavaScript Document


function main_reporte() {
	$.ajax({
		cache: false,
		url: 'vista/control_reporte.php',
		type: 'post',
		beforeSend: function () {
			$("#ct_principal").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {
			$("#ct_principal").html(response);		
			reporte_entrada();
			reporte_salida();
		}

	}); //end ajax		
}

function reporte_salida(){
	$.ajax({
		cache: false,
		url: 'vista/view_reporte_salida.php',
		type: 'post',
		beforeSend: function () {
			$("#ct_form_salida").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {
			$("#ct_form_salida").html(response);
		}
	})
	
}

function reporte_entrada(){
	$.ajax({
		cache: false,
		url: 'vista/view_reporte_entrada.php',
		type: 'post',
		beforeSend: function () {
			$("#ct_form_entrada").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {
			$("#ct_form_entrada").html(response);
		}
	})
	
}

/*===============verv reporte salida===============*/
function ver_reporte_salida() {
	var nombre = $('#txt_nombre').val();
	var fecha = $('#txt_fecha').val();
	var parametros = {"nom": nombre, "fech": fecha };
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_reporte_salida.php',
		type: 'post',
		beforeSend: function () {
			$("#ct_datos").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {
			$("#ct_datos").html(response);
		}

	}); //end ajax			
}



/*=================ver reporte entrada================*/
function ver_reporte_entrada(){
	var nombre = $('#txt_nombre_entrada').val();
	var fecha = $('#txt_fecha_entrada').val();
	var parametros = {"nom": nombre, "fech": fecha };
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_reporte_entrada.php',
		type: 'post',
		beforeSend: function () {
			$("#ct_datos").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {
			$("#ct_datos").html(response);
		}

	}); //end ajax			
}






