// JavaScript Document


function main_categoria(){
	$.ajax({
		 cache: false,
		 url: 'vista/control_categoria.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_principal").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
		 	$("#ct_principal").html(response); 
			listar_categoria();
			filtrar_categoria();
		 }		
		
	}); //end ajax		
}


function listar_categoria(){
	$.ajax({
		 cache: false,
		 url: 'controlador/ctrl_categoria_listar.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_datos").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
			
			 $("#ct_datos").html(response);
			
			 ver_detalle_categoria();
		 }		
		
	}); //end ajax		
}

function nuevo_categoria(){
	$.ajax({
		 cache: false,
		 url: 'vista/view_categoria_nuevo.php',
		 type: 'post',
		 beforeSend: function () {
			$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
			$('#frm_modal_size').addClass("modal-lg");
			
		 	$('#frm_modal_titulo').html("<i class='fas fa-bookmark'></i> NUEVA CATEGORIA");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='insertar_categoria();' class='btn btn-aceptar'>Aceptar</button>");
			$('#frm_modal_box').modal({backdrop: 'static', keyboard: false});
			$('#frm_modal_box').modal('show'); 	
		 }		
		
	}); //end ajax	

}

function insertar_categoria(){
	var categoria =$('#txt_categoria').val();
	var parametros={"cat":categoria,};
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_categoria_insertar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
		 	listar_categoria();
			$('#frm_modal_box').modal('hide'); 
			mkNoti("Aviso","Registro insertado",{status:'success', duration:1000,sound:true});	
			
		 }		
		
	});  
}


function modificar_categoria(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		var parametros={"pk":pk};
		$.ajax({
			 data: parametros,
			 cache: false,
			 url: 'controlador/ctrl_categoria_modificar.php',
			 type: 'post',
			 beforeSend: function () {
				$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
		
			 },
			 success: function (response) {
				$('#frm_modal_titulo').html("MODIFICAR categoria");
				$('#frm_modal_cuerpo').html(response);
				$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='actualizar_categoria();' class='btn btn-aceptar'>Actualizar</button>");
				
				$('#frm_modal_box').modal('show'); 	
			 }		
			
		}); //end ajax	
	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});
		
	}//si tiene pk
	
	

}


function actualizar_categoria(){
	var pk = $('#txt_pk_categoria').val();
	var categoria =$('#txt_categoria').val();
	var parametros={"cat":categoria,"pk":pk};

	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_categoria_actualizar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
		 	listar_categoria();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Se actualizo correctamente",{status:'success', duration:1000,sound:true});
		 }		
		
	}); //end ajax
}


function msg_eliminar_categoria(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		$('#frm_modal_size').removeClass("modal-lg");
		$('#frm_modal_titulo').html("ELIMINAR REGISTRO");
		$('#frm_modal_cuerpo').html("Desea eliminar el registro?");
		$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>No</button><button type='button' onclick='eliminar_categoria();' class='btn btn-aceptar'>Si</button>");
		$('#frm_modal_box').modal({backdrop: 'static', keyboard: true});
		$('#frm_modal_box').modal('show');	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});		
	}//si tiene pk
}

function eliminar_categoria(){
	var pk=$('#txt_pk_registro').val();
	var parametros={"pk":pk};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_categoria_eliminar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
		 	listar_categoria();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Registro eliminado",{status:'danger', duration:1000,sound:true});
		 }		
		
	}); //end ajax	
}

function seleccionar_foto_categoria(){	
	$.ajax({
		 cache: false,
		 url: 'vista/view_categoria_foto.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			$('#frm_modal_size').removeClass("modal-lg");
			$('#frm_modal_titulo').html("SELECCIONAR FOTO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='cargar_foto_categoria();' class='btn btn-aceptar'>Aceptar</button>");
			
			$('#frm_modal_box').modal('show');	
		 }		
		
	}); //end ajax	
	//si tiene pk
}

function cargar_foto_categoria(){	
	var pk=$("#txt_pk_registro").val();

	var datax = new FormData();
	datax.append('pk',pk);
	datax.append('foto',$('#txt_foto_categoria')[0].files[0]);

	$.ajax({
		 data: datax,
		 cache: false,
		 url: 'controlador/ctrl_categoria_foto.php',
		 type: 'post',
		 enctype: 'multipart/form-data',
		 processData: false,
		 contentType: false,
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			listar_categoria();
			$('#frm_modal_box').modal('hide');	
		 }		
		
	}); //end ajax	
	//si tiene pk
}

function ver_detalle_categoria(){
	var pk=$('#txt_pk_registro').val();
	var parametros={"pk":pk};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_categoria_detalle.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			$('#ct_detalle').html(response); 	
		 }		
		
	}); //end ajax
}


function filtrar_categoria(){
	var nombre = $('#txt_nombre_categoria').val();
	var parametros ={"nom":nombre};
	$.ajax({
		data: parametros,
		url: 'controlador/ctrl_categoria_listar.php',
		type: 'post',
		beforeSend: function(){

		},

		success: function(response){
			$('#ct_datos').html(response);
		}
	});
}