
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


function showAllEmployee(){
    var idcampana=$('#campana').val();
    var idnodo=$('#nodo').val();
    $.ajax({
        type: 'ajax',
        method:'get',
        url: '../gc/Crear_c/pendientes',
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
            '<td>Fecha de Envío</td>'+
        '</tr>';
            var i;
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            for(i=0; i<data.length; i++){
            
                html +='<tr>'+
                            
                            
                            '<td>'+data[i].descripcion+'</td>'+
                            
                            '<td><img src="'+baseUrl+'/'+'uploads'+'/'+data[i].fileimagen+'" height="50px" ></td>'+
                            
                            
                            '<td>'+data[i].comentario+'</td>'+
                            '<td>'+data[i].fechaenvio+'</td>'+
                            
                            
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






//delete- 
function nodos(){
    var idcampana=$('#campana').val();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../gc/Crear_c/mostrarnodopendientes',
        data:{idcampana:idcampana},
        async: false,
        dataType: 'json',
        success: function(data){


            var html2 = '';
            var i;
           
            html2 += " <option value='0' disabled='' selected=''>Elegir Nodo</option>";


            for(i=0; i<data.length; i++){
                html2 +='<option  value='+data[i].id_red+'>'+data[i].nodo+'</option>';			
            }
            $('#nodo').html(html2);
            
        },
        error: function(){
            alert('No se pudo obtener datosss');
        }
    });
}
