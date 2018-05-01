$(document).ready(function(){
	$('#tablaUsuarios').DataTable({
      "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
    });


    M.AutoInit();
});

function prueba(){
		flag = false;
		$("#divLider").html("<center><img src='giphy-preview.gif'/></center>");
		usuarios = [];
		token = $("[name='_token']").val();
    	$("input:checkbox:checked").each(function() {
       	   flag = true;
           usuarios.push($(this).val());
            
        
        });
    	if(flag){
    		$.post("/obtenerLider", { "usuarios": usuarios, "_token": token}, function(data){
        		$("#divLider").html(data);
        	});
    	}else{
    		$("#divLider").html("<h3>Debes seleccionar al menos un usuario</h3>");
    	}
        
        
    }
