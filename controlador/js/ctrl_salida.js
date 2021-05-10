// JavaScript Document


function main_salida(){
	$.ajax({
		 cache: false,
		 url: 'vista/control_salida.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_principal").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
		 	$("#ct_principal").html(response); 
			listar_salida();
			salida_filtrar();
		 }		
		
	}); //end ajax		
}


function listar_salida(){
	$.ajax({
		 cache: false,
		 url: 'controlador/ctrl_salida_listar.php',
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

function nuevo_salida(){
	var pk = $('#txt_pk_registro').val();
	if(pk>0){
		var parametros = {"pk":pk};
	$.ajax({
		 data: parametros,	
		 cache: false,
		 url: 'vista/view_salida_nuevo.php',
		 type: 'post',
		 beforeSend: function () {
			$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
			$('#frm_modal_size').addClass("modal-md");
			
		 	$('#frm_modal_titulo').html("<i class='fas fa-sign-out-alt'></i> NUEVO SALIDA PRODUCTO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='salida_producto();' class='btn btn-aceptar'>Aceptar</button>");
			$('#frm_modal_box').modal({backdrop: 'static', keyboard: false});
			$('#frm_modal_box').modal('show'); 	
		 }		
		
	}); //end ajax	
	}else{
		mkNoti("Aviso","Selecciona un registro",{status:'info', duration:2000,sound:true});	
	}
	

}


function salida_producto(){

	var pk = $('#txt_pk_registro').val();
	var nombre = $('#txt_nombre').text().toLowerCase();
	var medida = $('#txt_medida').text().toLowerCase();
	var fecha = $('#txt_fecha').val();
	var hora = $('#txt_hora').val();
	var cantidad_salida = $('#txt_cantidad_salida').val();
	var parametros = {"pk":pk,"fech":fecha,"hor":hora,"cant":cantidad_salida};
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_salida_producto.php',
		type: 'post',
		beforeSend: function(){

		},

		success:function(response){
			if(response != "0"){
				listar_producto();
				filtrar_producto();
				$('#frm_modal_box').modal('hide');
				mkNoti("Aviso","Salio "+cantidad_salida+" "+medida+" de "+nombre,{status:'success', duration:6000,sound:true});	
			}else{
				mkNoti("Aviso","No tiene suficiente productos",{status:'warning', duration:1000,sound:true});	
			}
			
		}

	});
}

function nuevo_salida_main(){
	var pk = $('#txt_pk_registro').val();

	var parametros = {"pk":pk};
	$.ajax({
		 data: parametros,	
		 cache: false,
		 url: 'vista/view_salida_nuevo_main.php',
		 type: 'post',
		 beforeSend: function () {
			$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
			$('#frm_modal_size').addClass("modal-lg");
			
		 	$('#frm_modal_titulo').html("<i class='fas fa-file'></i> NUEVO SALIDA PRODUCTO");
			$('#frm_modal_cuerpo').html(response);
			$('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button' onclick='insertar_salida();' class='btn btn-aceptar'>Aceptar</button>");
			$('#frm_modal_box').modal({backdrop: 'static', keyboard: false});
			$('#frm_modal_box').modal('show'); 	
		 }		
		
	}); //end ajax	

}



function insertar_salida(){
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

	var parametros={"nom":nombre,"des":descripcion,"marc":marca,"pre":precio,"stk":stock,"fot":foto,"fk_cat":fk_categoria,"fk_un":fk_unidad,"fech":fecha,"hor":hora};
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_salida_insertar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
			alert(response);
		 	listar_salida();
			$('#frm_modal_box').modal('hide'); 
		
			mkNoti("Aviso","Registro insertado",{status:'success', duration:1000,sound:true});	
			
		 }		
		
	});  
}


function modificar_salida(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		var parametros={"pk":pk};
		$.ajax({
			 data: parametros,
			 cache: false,
			 url: 'controlador/ctrl_salida_modificar.php',
			 type: 'post',
			 beforeSend: function () {
				$("#frm_modal_cuerpo").html("<img src='recursos/images/loader2.gif'>Procesando...");
		
			 },
			 success: function (response) {
				$('#frm_modal_titulo').html("<i class='fas fa-edit'></i> MODIFICAR SALIDA");
				$('#frm_modal_cuerpo').html(response);
				$('#frm_modal_pie').html("<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button><button type='button' onclick='actualizar_salida();' class='btn btn-primary'>Actualizar</button>");
				
				$('#frm_modal_box').modal('show'); 	
			 }		
			
		}); //end ajax	
	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});
		
	}//si tiene pk
	
	

}


function actualizar_salida(){
	var pk = $('#txt_pk_salida').val();
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
		 url: 'controlador/ctrl_salida_actualizar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
		 	listar_salida();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Se actualizo correctamente",{status:'success', duration:1000,sound:true});
		 }		
		
	}); //end ajax
}


function msg_eliminar_salida(){
	var pk=$("#txt_pk_registro").val();
	if(pk>0){
		$('#frm_modal_size').removeClass("modal-lg");
		$('#frm_modal_titulo').html("<i class='fas fa-trash'></i> ELIMINAR REGISTRO");
		$('#frm_modal_cuerpo').html("Desea eliminar el registro?");
		$('#frm_modal_pie').html("<button type='button' class='btn btn-secondary' data-dismiss='modal'>No</button><button type='button' onclick='eliminar_salida();' class='btn btn-primary'>Si</button>");
		$('#frm_modal_box').modal({backdrop: 'static', keyboard: true});
		$('#frm_modal_box').modal('show');	
	}else{
		
		mkNoti("Aviso","Seleccione un registro",{status:'info', duration:1000,sound:true});		
	}//si tiene pk
}

function eliminar_salida(){
	var pk=$('#txt_pk_registro').val();
	var parametros={"pk":pk};
	
	$.ajax({
		 data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_salida_eliminar.php',
		 type: 'post',
		 beforeSend: function () {
			 
		 },
		 success: function (response) {
		 	listar_salida();
			$('#frm_modal_box').modal('hide'); 	
			mkNoti("Aviso","Registro eliminado",{status:'danger', duration:1000,sound:true});
		 }		
		
	}); //end ajax	
}



function ver_detalle_salida(){
	var pk=$('#txt_pk_registro').val();

	if(pk>0){
		var parametros = {"pk":pk};
	$.ajax({
		data: parametros,
		 cache: false,
		 url: 'controlador/ctrl_salida_detalle.php',
		 type: 'post',
		 beforeSend: function () {
			 $('#frm_modal_cuerpo').html("Procesando");
		 },
		 success: function (response) {
				 $('#frm_modal_titulo').html("<i class='fas fa-eye'></i> DETALLE DE SALIDA DE PRODUCTO");
				 $('#frm_modal_cuerpo').html(response);
				 $('#frm_modal_pie').html("<button type='button' class='btn btn-cancelar' data-dismiss='modal'>Cancelar</button><button type='button';' class='btn btn-aceptar'>Aceptar</button>")
				 $('#frm_modal_box').modal('show');
		 }		

	}); //end ajax
	}
	
}

function salida_filtrar(){
	var nombre = $('#txt_nombre_salida').val();
	var parametros = {"nom":nombre};
	$.ajax({
		data: parametros,
		cache: false,
		url: 'controlador/ctrl_salida_listar.php',
		type: 'post',
		beforeSend: function(){

		},

		success:function(response){
			$('#ct_datos').html(response);
		}
	});
}
