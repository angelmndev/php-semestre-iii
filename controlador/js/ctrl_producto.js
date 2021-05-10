// JavaScript Document


function main_producto(){
	$.ajax({
		 cache: false,
		 url: 'vista/control_producto.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_principal").html("<img  src='recursos/images/loading_4'>Procesando...");
	
		 },
		 success: function (response) {
		 	$("#ct_principal").html(response); 
			listar_producto();
			filtrar_producto();
	
		 }		
		
	}); //end ajax		
}



function listar_producto(){
	$.ajax({
		 cache: false,
		 url: 'controlador/ctrl_producto_listar.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_datos").html("<img src='recursos/images/loading_4.gif'>Procesando...");
	
		 },
		 success: function (response) {
			
			 $("#ct_datos").html(response);
			
			 ver_detalle();
		 }		
		
	}); //end ajax		
}

function nuevo_producto(){
	$.ajax({
		 cache: false,
		 url: 'vista/view_producto_nuevo.php',
		 type: 'post',
		 beforeSend: function () {
			$("#frm_modal_cuerpo").html("<img src='recursos/images/loading_4.gif'>Procesando...");
	
		 },
		 success: function (response) {
			$('#frm_modal_size').addClass("modal-lg");
			
		 	$('#frm_modal_titulo').html("<i class='fas fa-file'></i> NUEVO PRODUCTO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='insertar_producto();' class='btn btn-aceptar'>Aceptar</button>");
			$('#frm_modal_box').modal({backdrop: 'static', keyboard: false});
			$('#frm_modal_box').modal('show'); 	
		 }		
		
	}); //end ajax	

}

function insertar_producto(){
	
	var nombre =$('#txt_nombre').val();
	var descripcion =$('#txt_descripcion').val();
	var marca =$('#txt_marca').val();
	var precio =$('#txt_precio').val();
	var stock = $('#txt_stock').val();
	var foto = "";
	var fk_categoria = $('#cb_categoria').val();
	var fk_unidad = $('#cb_unidad_medida').val();
	var parametros={"nom":nombre,"des":descripcion,"marc":marca,"pre":precio,"stk":stock,"fot":foto,"fk_cat":fk_categoria,"fk_un":fk_unidad};
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_producto_insertar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			 listar_producto();
			 filtrar_producto();
			$('#frm_modal_box').modal('hide'); 
		
			mkNoti("Aviso","Registro insertado",{status:'success', duration:1000,sound:true});	
			
		 }		
		
	});  
}


function modificar_producto(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		var parametros={"pk":pk};
		$.ajax({
			 data: parametros,
			 cache: false,
			 url: 'controlador/ctrl_producto_modificar.php',
			 type: 'post',
			 beforeSend: function () {
				$("#frm_modal_cuerpo").html("<img src='recursos/images/cargando.gif'>Procesando...");
		
			 },
			 success: function (response) {
				$('#frm_modal_titulo').html("<i class='fas fa-edit'></i> MODIFICAR PRODUCTO");
				$('#frm_modal_cuerpo').html(response);
				$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='actualizar_producto();' class='btn btn-aceptar'>Actualizar</button>");
				
				$('#frm_modal_box').modal('show'); 	
			 }		
			
		}); //end ajax	
	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});
		
	}//si tiene pk
	
	

}


function actualizar_producto(){
	var pk = $('#txt_pk_producto').val();
	var nombre =$('#txt_nombre').val();
	var descripcion =$('#txt_descripcion').val();
	var marca =$('#txt_marca').val();
	var precio =$('#txt_precio').val();
	var stock = $('#txt_stock').val();
	var foto = "";
	var fk_categoria = $('#cb_categoria').val();
	var fk_unidad = $('#cb_unidad_medida').val();

	var parametros={"pk":pk,"nom":nombre,"des":descripcion,"marc":marca,"pre":precio,"stk":stock,"fot":foto,"fk_cat":fk_categoria,"fk_un":fk_unidad};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_producto_actualizar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			 listar_producto();
			 filtrar_producto();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Se actualizo correctamente",{status:'success', duration:1000,sound:true});
		 }		
		
	}); //end ajax
}


function msg_eliminar_producto(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		$('#frm_modal_size').removeClass("modal-lg");
		$('#frm_modal_titulo').html("<i class='fas fa-trash'></i> ELIMINAR REGISTRO");
		$('#frm_modal_cuerpo').html("Desea eliminar el registro?");
		$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>No</button><button type='button' onclick='eliminar_producto();' class='btn btn-aceptar'>Si</button>");
		$('#frm_modal_box').modal({backdrop: 'static', keyboard: true});
		$('#frm_modal_box').modal('show');	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});		
	}//si tiene pk
}

function eliminar_producto(){
	var pk=$('#txt_pk_registro').val();
	var parametros={"pk":pk};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_producto_eliminar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			 listar_producto();
			 filtrar_producto();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Registro eliminado",{status:'danger', duration:1000,sound:true});
		 }		
		
	}); //end ajax	
}

function seleccionar_foto(){	
	$.ajax({
		 cache: false,
		 url: 'vista/view_producto_foto.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			$('#frm_modal_size').removeClass("modal-lg");
			$('#frm_modal_titulo').html("<i class='fas fa-image'></i> SELECCIONAR FOTO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='cargar_foto();' class='btn btn-aceptar'>Aceptar</button>");
			
			$('#frm_modal_box').modal('show');	
		 }		
		
	}); //end ajax	
	//si tiene pk
}


function cargar_foto(){	
	var pk=$("#txt_pk_registro").val();

	var datax = new FormData();
	datax.append('pk',pk);
	datax.append('foto',$('#txt_foto')[0].files[0]);

	$.ajax({
		 data: datax,
		 cache: false,
		 url: 'controlador/ctrl_producto_foto.php',
		 type: 'post',
		 enctype: 'multipart/form-data',
		 processData: false,
		 contentType: false,
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			listar_producto();
			filtrar_producto();
			$('#frm_modal_box').modal('hide');	
		 }		
		
	}); //end ajax	
	//si tiene pk
}

function ver_detalle(){
	var pk=$('#txt_pk_registro').val();
	var parametros={"pk":pk};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_producto_detalle.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			$('#ct_detalle').html(response); 	
		 }		
		
	}); //end ajax
}


function filtrar_producto(){
	var nombre = $('#txt_busqueda').val();
	var parametros = {"nom":nombre};
	$.ajax({
		data:parametros,
		url: 'controlador/ctrl_producto_listar.php',
		type: 'post',
		beforeSend: function(){

		},
		success: function(response){
			$('#ct_datos').html(response);
		}
	});
}