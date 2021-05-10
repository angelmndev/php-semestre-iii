// JavaScript Document


function main_inicio(){
	$.ajax({
		 cache: false,
		 url: 'vista/control_inicio.php',
		 type: 'post',
		 beforeSend: function () {
			$("#ct_principal").html("<img src='recursos/images/loader2.gif'>Procesando...");
	
		 },
		 success: function (response) {
		 	$("#ct_principal").html(response); 
			
		 }		
		
	}); //end ajax		
}
