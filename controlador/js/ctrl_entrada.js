// JavaScript Document


function main_entrada(){
	$.ajax({
		 cache: false,
		 url: 'vista/control_entrada.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_principal").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
		 	$("#ct_principal").html(response); 
			listar_entrada();
			filtrar_entrada();
		 }		
		
	}); //end ajax		
}


function listar_entrada(){
	$.ajax({
		 cache: false,
		 url: 'controlador/ctrl_entrada_listar.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_datos").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
			
			 $("#ct_datos").html(response);
			
			 ver_detalle();
		 }		
		
	}); //end ajax		
}

function nuevo_entrada(){
	var pk = $('#txt_pk_registro').val();
	if(pk>0){
		var parametros = {"pk":pk};
	$.ajax({
		 data: parametros,	
		 cache: false,
		 url: 'vista/view_entrada_nuevo.php',
		 type: 'post',
		 beforeSend: function () {
			$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
			$('#frm_modal_size').addClass("modal-md");
			
		 	$('#frm_modal_titulo').html("<i class='fas fa-sign-out-alt'></i> NUEVO ENTRADA PRODUCTO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='entrada_producto();' class='btn btn-aceptar'>Aceptar</button>");
			$('#frm_modal_box').modal({backdrop: 'static', keyboard: false});
			$('#frm_modal_box').modal('show'); 	
		 }		
		
	}); //end ajax	
	}else{
		mkNoti("Aviso","SELECCIONA UN REGISTRO",{status:'info', duration:2000,sound:true});			
	}
	

}


function entrada_producto(){
	var pk = $('#txt_pk_registro').val();
	var nombre = $('#txt_nombre').text().toLowerCase();
	var medida = $('#txt_medida').text().toLowerCase();
	var fecha = $('#txt_fecha').val();
	var hora = $('#txt_hora').val();
	var cantidad_entrada =  $('#txt_cantidad_entrada').val(); 
	if(cantidad_entrada > 0){
		var parametros = {"pk":pk,"fech":fecha,"hor":hora,"cant":cantidad_entrada};
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_entrada_producto.php',
		type: 'post',
		beforeSend: function(){

		},

		success:function(response){
			listar_producto();
			filtrar_producto();
			$('#frm_modal_box').modal('hide');	
			mkNoti("Aviso","Se agrego"+" "+cantidad_entrada+" "+medida+" de "+ nombre,{status:'success', duration:5000,sound:true});			
		}
	});
	}else{
		mkNoti("Aviso","Cantidad de entrada de producto no valido",{status:'warning', duration:4000,sound:true});			
	}
	
}


function nuevo_entrada_main(){
	var pk = $('#txt_pk_registro').val();

	var parametros = {"pk":pk};
	$.ajax({
		 data: parametros,	
		 cache: false,
		 url: 'vista/view_entrada_nuevo_main.php',
		 type: 'post',
		 beforeSend: function () {
			$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
			$('#frm_modal_size').addClass("modal-lg");
			
		 	$('#frm_modal_titulo').html("NUEVO entrada PRODUCTO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='insertar_entrada();' class='btn btn-aceptar'>Aceptar</button>");
			$('#frm_modal_box').modal({backdrop: 'static', keyboard: false});
			$('#frm_modal_box').modal('show'); 	
		 }		
		
	}); //end ajax	

}


function insertar_entrada(){
	var nombre =$('#cb_nombre').val();
	var descripcion =$('#txt_descripcion').val();
	var marca =$('#cb_marca').val();
	var precio =$('#txt_precio').val();
	var stock = $('#txt_stock').val();
	var foto = "";
	var fk_categoria = $('#cb_categoria').val();
	var fk_unidad = $('#cb_unidad_medida').val();
	var fecha = $('#txt_fecha').val();
	var hora = $('#txt_hora').val();

	alert(nombre);
	var parametros={"nom":nombre,"des":descripcion,"marc":marca,"pre":precio,"stk":stock,"fot":foto,"fk_cat":fk_categoria,"fk_un":fk_unidad,"fech":fecha,"hor":hora};
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_entrada_insertar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			alert(response);
		 	listar_entrada();
			$('#frm_modal_box').modal('hide'); 
		
			mkNoti("Aviso","Registro insertado",{status:'success', duration:1000,sound:true});	
			
		 }		
		
	});  
}


function modificar_entrada(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		var parametros={"pk":pk};
		$.ajax({
			 data: parametros,
			 cache: false,
			 url: 'controlador/ctrl_entrada_modificar.php',
			 type: 'post',
			 beforeSend: function () {
				$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
		
			 },
			 success: function (response) {
				$('#frm_modal_titulo').html("MODIFICAR entrada");
				$('#frm_modal_cuerpo').html(response);
				$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='actualizar_entrada();' class='btn btn-aceptar'>Actualizar</button>");
				
				$('#frm_modal_box').modal('show'); 	
			 }		
			
		}); //end ajax	
	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});
		
	}//si tiene pk
	
	

}


function actualizar_entrada(){
	var pk = $('#txt_pk_entrada').val();
	var nombre =$('#cb_nombre').val();
	var descripcion =$('#txt_descripcion').val();
	var marca =$('#cb_marca').val();
	var precio =$('#txt_precio').val();
	var stock = $('#txt_stock').val();
	var foto = "";
	var fk_categoria = $('#cb_categoria').val();
	var fk_unidad = $('#cb_unidad_medida').val();
	var fecha = $('#txt_fecha').val();
	var hora = $('#txt_hora').val();

	var parametros={"nom":nombre,"des":descripcion,"marc":marca,"pre":precio,"stk":stock,"fot":foto,"fk_cat":fk_categoria,"fk_un":fk_unidad,"fech":fecha,"hor":hora,"pk":pk};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_entrada_actualizar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
		 	listar_entrada();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Se actualizo correctamente",{status:'success', duration:1000,sound:true});
		 }		
		
	}); //end ajax
}


function msg_eliminar_entrada(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		$('#frm_modal_size').removeClass("modal-lg");
		$('#frm_modal_titulo').html("ELIMINAR REGISTRO");
		$('#frm_modal_cuerpo').html("Desea eliminar el registro?");
		$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>No</button><button type='button' onclick='eliminar_entrada();' class='btn btn-aceptar'>Si</button>");
		$('#frm_modal_box').modal({backdrop: 'static', keyboard: true});
		$('#frm_modal_box').modal('show');	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});		
	}//si tiene pk
}

function eliminar_entrada(){
	var pk=$('#txt_pk_registro').val();
	var parametros={"pk":pk};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_entrada_eliminar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
		 	listar_entrada();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Registro eliminado",{status:'danger', duration:1000,sound:true});
		 }		
		
	}); //end ajax	
}



function ver_detalle_entrada(){
	var pk=$('#txt_pk_registro').val();

	if(pk>0){
		var parametros = {"pk":pk};
	$.ajax({
		data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_entrada_detalle.php',
		 type: 'post',
		 beforeSend: function () {
			 $('#frm_modal_cuerpo').html("Procesando");
		 },
		 success: function (response) {
				 $('#frm_modal_titulo').html("DETALLE DE entrada DE PRODUCTO");
				 $('#frm_modal_cuerpo').html(response);
				 $('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button';' class='btn btn-aceptar'>Aceptar</button>")
				 $('#frm_modal_box').modal('show');
		 }		

	}); //end ajax
	}
	
}

function filtrar_entrada(){
	var nombre = $('#txt_buscar_entrada').val();
	var parametros = {"nom":nombre};
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_entrada_listar.php',
		type: 'post',
		beforeSend: function(){

		},

		success: function(response){
			$('#ct_datos').html(response);
		}
	});
}