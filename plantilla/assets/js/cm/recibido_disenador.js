
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
	$("#ffinal").focusout(function(){check_ffecha();});	
		function check_ffecha(){
			
   
	 	var pattern = new Date();				
		var correo = $("#ffinal").val();
		
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
			$('#ffinalError').html("Fecha Valida").css({"font-size": "12px", "color": "#34F458"});
			$("#ffinalError").show();
			$("#ffinal").css("border-bottom","2px solid #34F458");
			return error_ffecha = true;
        }else{
			if(AnyoFecha==AnyoHoy){
				if(MesFecha>MesHoy){
					$('#ffinalError').html("Fecha Valida").css({"font-size": "12px", "color": "#34F458"});
					$("#ffinalError").show();
					$("#ffinal").css("border-bottom","2px solid #34F458");
				   
					return error_ffecha = true;
	
				}else{
					if(MesFecha==MesHoy && DiaFecha>DiaHoy){
						$('#ffinalError').html("Fecha Valida").css({"font-size": "12px", "color": "#34F458"});
						$("#ffinalError").show();
						$("#ffinal").css("border-bottom","2px solid #34F458");
						return error_ffecha = true;


					}else{
						$("#ffinalError").html("Fecha Invalida").css({"font-size": "14px", "color": "red"});
						$("#ffinalError").show();
						$("#ffinal").css("border-bottom","2px solid #F90A0A");
						return error_ffecha = false;

					}

				}
			}
			else{
				$("#ffinalError").html("Año menor al actual").css({"font-size": "14px", "color": "red"});
				$("#ffinalError").show();
				$("#ffinal").css("border-bottom","2px solid #F90A0A");
				return error_ffecha = false;

			}
        
        }
       
    }
function nodos(){
    var idcampana=$('#campana').val();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../cm/Aprobar_c/mostrarnodosenviadosdisenador2',
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
            alert("No hay contenido para esa campaña");
        } 
        },
        error: function(){
            alert('No se pudo obtener datosss');
        }
    });
}
function showAllEmployee(){
    var idcampana=$('#campana').val();
    var idnodo=$('#nodo').val();
    $.ajax({
        type: 'ajax',
        method:'get',
        url: '../cm/Aprobar_c/contenido_dc_a_gc',
        data:{idcampana:idcampana,idnodo:idnodo},
        async: false,
        dataType: 'json',
        success: function(data){

            var html = '';
            var html2 = '';
            html2+= '<tr>'+
				
            
            
            '<td>Contenido</td>'+
            '<td>Contenido Multimedia</td>'+
            '<td>Comentarios</td>'+
            '<td>Recibido de</td>'+
            '<td>Fecha de recibido</td>'+
            '<td align="center"><i class="fas fa-cog mr-2"></i></td>'+
            
           
        '</tr>';
        
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            var i;
            for(i=0; i<data.length; i++){
            
                html +='<tr>'+
                
                            '<td>'+data[i].descripcion+'</td>'+
                            '<td><img src="'+baseUrl+'/'+'uploads'+'/'+data[i].fileimagen+'" height="50px" ></td>'+
                            '<td>'+data[i].comentario+'</td>'+
                            '<td>'+data[i].nombre+' '+data[i].apaterno+'</td>'+
                            '<td>'+data[i].fechaenvio+'</td>'+
                           
                            '<td>'+
                                '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id_pub_dise+'" >Visualizar</a>'+

                            '</td>'+
                        '</tr>';
            }
            $('#showhead').html(html2);
            $('#showdata').html(html);
        },
        error: function(){
            var html = '';
            var html2 = '';
            $('#showhead').html(html2);
            $('#showdata').html(html);
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

             $("#ffinalError").hide();
             $("#ffinal").css("border-bottom","2px solid #D1D1D1");

             $("#userError").hide();
             $("#user").css("border-bottom","2px solid #D1D1D1");

             $("#passError").hide();
             $("#pass").css("border-bottom","2px solid #D1D1D1");
    var id_pub_dise = $(this).attr('data');
    $('#myModal').modal('show');
    $('#myModal').find('.modal-title').text('Preautoriazcion');
    
    //Me quede em mostrar valores en el formulario
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../dc/Aprobar_c/form_dis',
        data: {id_pub_dise: id_pub_dise},
        async: false,
        dataType: 'json',
        success: function(data){
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            console.log(data);
            $('#id_pub_dise').val(data.id_pub_dise);
            $('#id_campana').val(data.id_campana);
            $('#id_nodo').val(data.id_nodo);
            $('#id_gc').val(data.id_gc);
            $('#id_dc').val(data.id_dc);
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




//delete- 

