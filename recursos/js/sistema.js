$(document).ready(function(){
	main_inicio();
	$("#menu_inicio").click(function(){
		main_inicio();
	});

	$("#menu_producto").click(function(){
		main_producto();
		
	});
	
	$('#menu_usuario').click(function(){
		main_usuario();
	});

	$('#menu_categoria').click(function(){
		main_categoria();
	});

	$('#menu_salida').click(function(){
		main_salida();
	});

	$('#menu_entrada').click(function(){
		main_entrada();
	});

	$('#menu_reporte').click(function(){
		main_reporte();
	});

	$('#menu_reporte_salida').click(function(){
		main_reporte_salida();
	});

	//para los Msgs cortos
	var config = {positionX:"top",positionY:"center"};
	mkNotifications(config);
});


function pasar_pk_registro(pk){
	$('#txt_pk_registro').val(pk);
}



    