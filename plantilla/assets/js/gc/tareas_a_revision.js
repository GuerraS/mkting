
var error_nombre = false;
$("#contenido").focusout(function(){check_nombre();});	
    function check_nombre() {
        

 var pattern = /^[a-zA-Z0-9 Ñ-ñ.áéíóúäëïöü\'-]+$/;
    var correo = $("#contenido").val();

    if((pattern.test(correo) && correo.length>0)){

        
       $('#nombreError').html("Contenido Aceptado").css({"font-size": "12px", "color": "#34F458"});
       $("#nombreError").show();
       $("#contenido").css("border-bottom","2px solid #34F458");
      
       return error_nombre = true;

    }else{
    $("#nombreError").html("Contenido invalido").css({"font-size": "14px", "color": "red"});
    $("#nombreError").show();
    $("#contenido").css("border-bottom","2px solid #F90A0A");
     
    return error_nombre = false;
    }
   
}
var error_ffecha = false;
	$("#finicio").focusout(function(){check_ffecha();});	
		function check_ffecha(){
			
   
	 	var pattern = new Date();				
		var correo = $("#finicio").val();
		
		var AnyoFechastr = correo.substring(0,4); 
		var MesFechastr = correo.substring(5, 7);
		var DiaFechastr = correo.substring(8, 10);
		
		var AnyoFecha = parseInt(AnyoFechastr, 10);
		var MesFecha = parseInt(MesFechastr, 10);
		var DiaFecha = parseInt(DiaFechastr, 10);
		console.log(correo);
		console.log(AnyoFecha);
		console.log(MesFecha);
		console.log(DiaFecha);
		var AnyoHoy = pattern.getFullYear();
		var MesHoy = pattern.getMonth();
		var DiaHoy = pattern.getDate();
		MesHoy=MesHoy+1;
		console.log(MesHoy);
        if(AnyoFecha>AnyoHoy){
			$('#finicioError').html("Fecha Valida").css({"font-size": "12px", "color": "#34F458"});
			$("#finicioError").show();
			$("#finicio").css("border-bottom","2px solid #34F458");
			return error_ffecha = true;
        }else{
			if(AnyoFecha==AnyoHoy){
				if(MesFecha>MesHoy){
					$('#finicioError').html("Fecha Valida").css({"font-size": "12px", "color": "#34F458"});
					$("#finicioError").show();
					$("#finicio").css("border-bottom","2px solid #34F458");
				   
					return error_ffecha = true;
	
				}else{
					if(MesFecha==MesHoy && DiaFecha>DiaHoy){
						$('#finicioError').html("Fecha Valida").css({"font-size": "12px", "color": "#34F458"});
						$("#finicioError").show();
						$("#finicio").css("border-bottom","2px solid #34F458");
						return error_ffecha = true;


					}else{
						$("#finicioError").html("Fecha Invalida").css({"font-size": "14px", "color": "red"});
						$("#finicioError").show();
						$("#finicio").css("border-bottom","2px solid #F90A0A");
						return error_ffecha = false;

					}

				}
			}
			else{
				$("#finicioError").html("Año menor al actual").css({"font-size": "14px", "color": "red"});
				$("#finicioError").show();
				$("#finicio").css("border-bottom","2px solid #F90A0A");
				return error_ffecha = false;

			}
        
        }
       
    }
function nodos(){
    var idcampana=$('#campana').val();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../gc/Asignar_tareas_c/mostrarnodostareasasignadas',
        data:{idcampana:idcampana},
        async: false,
        dataType: 'json',
        success: function(data){
            if(data){
                var html2 = '';
            var i;
           
            html2 += " <option value='0' disabled='' selected=''>Elegir Nodo</option>";


            for(i=0; i<data.length; i++){
                html2 +='<option  value='+data[i].id_red+'>'+data[i].nodo+'</option>';			
            }
            $('#nodo').html(html2);

            }else{
                alert('No hay contenido por aprobar en esta campaña ');

            }
 
        },
        error: function(){
            alert('No se pudo obtener datosss');
        }
    });
}

function showAllEmployee(){
    var idcampana=$('#campana').val();
    var idNodo=$('#nodo').val();
    
    
    
    $("#mytable").css("display", "block");
    $.ajax({
        type: 'ajax',
        method:'get',
        url: '../gc/Asignar_tareas_c/mostrar_tareas_enviadas_a_cm',
        data:{idcampana:idcampana,idNodo:idNodo},
        async: false,
        dataType: 'json',
        success: function(data){
            if(data){
            console.log(data);

            var html = '';
            var html2 = '';
            html2+= '<tr>'+
				
            
            
            '<td>Descripción</td>'+
            '<td>Multimedia</td>'+
            '<td>Contenido</td>'+
            '<td>Comentario</td>'+
            '<td>Enviado a</td>'+
            '<td>Fecha de Envío</td>'+
            
            
           
        '</tr>';
        
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            var i;
            for(i=0; i<data.length; i++){
            
                html +='<tr>'+
                
                            '<td>'+data[i].descripciontarea+'</td>'+
                            '<td><img src="'+baseUrl+'/'+'uploads'+'/'+data[i].fileimagen+'" height="50px" ></td>'+
                            '<td>'+data[i].contenido+'</td>'+
                            '<td>'+data[i].comentario+'</td>'+
                            '<td>'+data[i].nombre+' '+data[i].apaterno+'</td>'+
                            '<td>'+data[i].fechaenvio+'</td>'+
                           
                           
                            
                        '</tr>';
            }
            
            $('#showhead').html(html2);
            $('#showdata').html(html);
        }else{
            alert('No has enviado ninguna tarea ');
            var html = '';
            var html2 = '';
            $('#showhead').html(html2);
            $('#showdata').html(html);
            $("#mytable").css("display", "block");
        }
        },
        error: function(){
            alert('No se pudo obtener información');
        }
    });
}


$('#showdata').on('click', '.item-edit', function(){
    $("#nombreError").hide();
             $("#nombre").css("border-bottom","2px solid #D1D1D1");

             $("#apaternoError").hide();
             $("#apaterno").css("border-bottom","2px solid #D1D1D1");

             $("#amaternoError").hide();
             $("#amaterno").css("border-bottom","2px solid #D1D1D1");

             $("#telError").hide();
             $("#tel").css("border-bottom","2px solid #D1D1D1");

             $("#correoError").hide();
             $("#email").css("border-bottom","2px solid #D1D1D1");

             $("#finicioError").hide();
             $("#finicio").css("border-bottom","2px solid #D1D1D1");

             $("#userError").hide();
             $("#user").css("border-bottom","2px solid #D1D1D1");

             $("#passError").hide();
             $("#pass").css("border-bottom","2px solid #D1D1D1");
    var id_tarea = $(this).attr('data');
    $('#myModal').modal('show');
    $('#myModal').find('.modal-title').text('Creación de contenido');
    
    
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '../gc/Asignar_tareas_c/form_asignadas',
        data: {id_tarea: id_tarea},
        async: false,
        dataType: 'json',
        success: function(data){
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            console.log(data);
            $('#id_tarea').val(data.id_tarea);
            $('#descripciontarea').val(data.descripciontarea);
            $('#id_campana').val(data.id_campana);
            $('#id_nodo').val(data.id_nodo);
            $('#id_gc').val(data.id_gc);
            $('#id_cm').val(data.id_cm);
            $('#contenido').val(data.descripcion);
            $('#comentario').val(data.comentario);
            $("#img").attr("src",baseUrl+'/'+'uploads'+'/'+data.fileimagen);
            $("#my_img").val(data.fileimagen);
            
        },
        error: function(){
            alert('No se pudo editar');
        }
    });
});

function mostrardisenador(){
    var idcampana=$('#campana').val();
    var idNodo=$('#nodo').val();
    $("#mydisenador").css("visibility","visible"); 
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '../gc/Asignar_tareas_c/dis_disponibles',
        data: {idcampana:idcampana,idNodo:idNodo},
        async: false,
        dataType: 'json',
        success: function(data){
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            console.log(data);
            if(data){
                var html2 = '';
            var i;
           
            html2 += " <option value='0' disabled='' selected=''>Selecciona Diseñador</option>";


            for(i=0; i<data.length; i++){
                html2 +='<option  value='+data[i].id+'>'+data[i].nombre+' '+data[i].apaterno+'</option>';			
            }
            $('#disenadortarea').html(html2);

            }else{
                alert('No hay diseñador de contenido disponible ');

            }

            
            
        },
        error: function(){
            alert('No de pudo obtener información');
        }
    });

}




//delete- 

