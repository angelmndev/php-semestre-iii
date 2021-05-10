function main_usuario() {
	$.ajax({
		cache: false,
		url: 'vista/control_usuario.php',
		type: 'post',
		beforeSend: function () {
			$("#ct_principal").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {
			$("#ct_principal").html(response);
			listar_usuario();
			filtrar_usuario();
		}

	}); //end ajax		
}


function listar_usuario() {
	$.ajax({
		cache: false,
		url: 'controlador/ctrl_usuario_listar.php',
		type: 'post',
		beforeSend: function () {
			$("#ct_datos").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {

			$("#ct_datos").html(response);
		}

	}); //end ajax		
}

function nuevo_usuario() {
	$.ajax({
		cache: false,
		url: 'vista/view_usuario_nuevo.php',
		type: 'post',
		beforeSend: function () {
			$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");

		},
		success: function (response) {
			$('#frm_modal_size').addClass("modal-lg");

			$('#frm_modal_titulo').html("NUEVO USUARIO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button><button type='button' onclick='validar_datos_usuario();' class='btn btn-primary'>Aceptar</button>");
			$('#frm_modal_box').modal({ backdrop: 'static', keyboard: false });
			$('#frm_modal_box').modal('show');
		}

	}); //end ajax	

}


function validar_datos_usuario(){
	var estado = true;
	/*var usuario = $('#txt_usuario').val();
	if(usuario== ""){
		estado = false;
		$('#txt_usuario').focus();
	}

	var login = $('#txt_login').val();
	if(login == ""){
		estado = false;
		$('#txt_login').focus();
	}

	var password = $('#txt_password').val();
	var password_2 = $('#txt_password_2').val();

	if(password.trim() != password_2){
			estado = false;
			('#txt_password_2').focus();
	}	*/

	if(estado == true){
		insertar_usuario();
	}else{
		mkNoti("Aviso", "Rellena todos los campos", { status: 'success', duration: 1000, sound: true });
	}
}



function insertar_usuario() {

	var usuario = $('#txt_usuario').val();
	var login = $('#txt_login').val();
	var password = $('#txt_password').val();
	var password_2 = $('#txt_password_2').val();
	var privilegios = $('#cb_privilegios').val();
	var estado = $('#cb_estado').val();

	var p_postulante = $('#chk_control_postulante').prop("checked")? 1: 0;
	var p_carrera = $('#chk_control_carrera').prop("checked")? 1: 0;
	var p_usuario = $('#chk_control_usuario').prop("checked")? 1: 0;
	var p_reporte = $('#chk_control_reporte').prop("checked")? 1: 0;

	if (password == password_2) {
		var parametros = { "usu": usuario, "log": login, "pass": password, "privi": privilegios, "esta": estado, "p-p":p_postulante,"p-c":p_carrera,"p-u":p_usuario,"p-r":p_reporte};
		$.ajax({
			data: parametros,
			cache: false,
			url: 'controlador/ctrl_usuario_insertar.php',
			type: 'post',
			beforeSend: function () {

			},
			success: function (response) {
				alert(response);
				listar_usuario();
				$('#frm_modal_box').modal('hide');

				mkNoti("Aviso", "Registro insertado", { status: 'success', duration: 1000, sound: true });

			}

		});
	}else{
		mkNoti("Aviso", "La contraseña no coincide", { status: 'danger', duration: 5000, sound: true });
	}

}


function modificar_usuario() {
	var pk = $("#txt_pk_registro").val();

	if (pk > 0) {
		var parametros = { "pk": pk };
		$.ajax({
			data: parametros,
			cache: false,
			url: 'controlador/ctrl_usuario_modificar.php',
			type: 'post',
			beforeSend: function () {
				$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");

			},
			success: function (response) {
				$('#frm_modal_size').addClass("modal-lg");
				$('#frm_modal_titulo').html("MODIFICAR USUARIO");
				$('#frm_modal_cuerpo').html(response);
				$('#frm_modal_pie').html("<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button><button type='button' onclick='actualizar_usuario();' class='btn btn-primary'>Actualizar</button>");

				$('#frm_modal_box').modal('show');
			}

		}); //end ajax	

	} else {

		mkNoti("Aviso", "Seleccione un registro", { status: 'info', duration: 1000, sound: true });

	}//si tiene pk

}


function actualizar_usuario() {
	var pk_usuario = $('#txt_pk_usuario').val();
	var passwor_db = $('#txt_password_db').val(); 
	var password_actual = $('#txt_password').val();
	var password_nuevo = $('#txt_password_2').val();

	var usuario = $('#txt_usuario').val();
	var login = $('#txt_login').val(); 
	var privilegios = $('#cb_privilegios').val();
	var estado = $('#cb_estado').val();

	var p_postulante = $('#chk_control_postulante').prop("checked")? 1: 0;
	var p_carrera = $('#chk_control_carrera').prop("checked")? 1: 0;
	var p_usuario = $('#chk_control_usuario').prop("checked")? 1: 0;
	var p_reporte = $('#chk_control_reporte').prop("checked")? 1: 0;
	var parametros = {"pk":pk_usuario,"pass_db":passwor_db,"pass": password_actual,"pass_2":password_nuevo, "usu": usuario, "log": login, "privi": privilegios, "esta": estado, "p-p":p_postulante,"p-c":p_carrera,"p-u":p_usuario,"p-r":p_reporte};
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_usuario_actualizar.php',
		type: 'post',
		beforeSend: function () {

		},
		success: function (response) {
			if(response != "0"){
				listar_usuario();
				$('#frm_modal_box').modal('hide');
				mkNoti("Aviso", "Se actualizo correctamente", { status: 'success', duration: 1000, sound: true });
			}else{
				mkNoti("Aviso", "La contraseña no coincide con el de servidor", { status: 'danger', duration: 5000, sound: true });
			}
			
		}

	}); //end ajax
}


function msg_eliminar_usuario() {
	var pk = $("#txt_pk_registro").val();
	if (pk > 0) {
		$('#frm_modal_size').removeClass("modal-lg");
		$('#frm_modal_titulo').html("ELIMINAR REGISTRO");
		$('#frm_modal_cuerpo').html("Desea eliminar el registro?");
		$('#frm_modal_pie').html("<button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button><button type='button' onclick='eliminar_usuario();' class='btn btn-primary'>Si</button>");
		$('#frm_modal_box').modal({ backdrop: 'static', keyboard: true });
		$('#frm_modal_box').modal('show');
	} else {

		mkNoti("Aviso", "Seleccione un registro", { status: 'info', duration: 1000, sound: true });
	}//si tiene pk
}

function eliminar_usuario() {
	var pk = $('#txt_pk_registro').val();
	var parametros = { "pk": pk };

	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_usuario_eliminar.php',
		type: 'post',
		beforeSend: function () {

		},
		success: function (response) {
			listar_usuario();
			$('#frm_modal_box').modal('hide');
			mkNoti("Aviso", "Registro eliminado", { status: 'danger', duration: 1000, sound: true });
		}

	}); //end ajax	
}


function filtrar_usuario(){
	var nombre = $('#txt_buscar_usuario').val();
	var parametros = {"nom":nombre};
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_usuario_listar.php',
		type: 'post',
		beforeSend: function(){

		},

		success: function(response){
			$('#ct_datos').html(response); 
		}
	});
}