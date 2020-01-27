
     
    
function nodos(){
    var idcampana=$('#campana').val();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../dc/Asignar_tareas_c/mostrarnodostareasasignadas',
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
            alert('No se pudo obtener datos');
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
        url: '../dc/Asignar_tareas_c/mostrar_tareas_enviadas_a_gc',
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
            '<td>Contenido</td>'+
            '<td>Contenido Multimedia</td>'+
            '<td>Comentarios</td>'+
            '<td>Enviado a</td>'+
            '<td>Fecha de Envío</td>'+
            
           
        '</tr>';
        
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            var i;
            for(i=0; i<data.length; i++){
            
                html +='<tr>'+
                
                            '<td>'+data[i].descripciontarea+'</td>'+
                            '<td>'+data[i].contenido+'</td>'+
                            '<td><img src="'+baseUrl+'/'+'uploads'+'/'+data[i].fileimagen+'" height="50px" ></td>'+
                            '<td>'+data[i].comentario+'</td>'+
                            '<td>'+data[i].nombre+' '+data[i].apaterno+'</td>'+
                            
                            '<td>'+data[i].fechaenvio+'</td>'+
                           
                           
                            
                        '</tr>';
            }
            
            $('#showhead').html(html2);
            $('#showdata').html(html);
        }else{
            alert('No hay tareas asignadas ');
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

