function nodos(){
    var idcampana=$('#campana').val();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../cm/Asignar_tareas_c/mostrarnodostareasasignadas',
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

function selectempleados(){
    var idcampana=$('#campana').val();
    var idNodo=$('#nodo').val();
    
$.ajax({
    type: 'ajax',
    method:'get',
    url: '../gc/Asignar_tareas_c/publicacionesrealizadas',
    data:{idcampana:idcampana,idNodo:idNodo},
    async: false,
    dataType: 'json',
    success: function(data){
        if(data){
        console.log(data);

        var html = '';
        var html2 = '';
        html2+= '<tr>'+
            
        
        
        
        '<td>Contenido</td>'+
        '<td>Contenido Multimedia</td>'+
        
        
        '<td>Generador de Contenido</td>'+
        '<td>Fecha Publicación</td>'+
        '<td>Hora publicación</td>'+
        
       
    '</tr>';
    
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        var i;
        for(i=0; i<data.length; i++){
        
            html +='<tr>'+
            
                        
                        '<td>'+data[i].descripcion+'</td>'+
                        '<td><img src="'+baseUrl+'/'+'uploads'+'/'+data[i].fileimagen+'" height="50px" ></td>'+
                       
                        '<td>'+data[i].nombre+' '+data[i].apaterno+'</td>'+
                        '<td>'+data[i].fecha+'</td>'+
                        '<td>'+data[i].hora_p+'</td>'+
                       
                       
                        
                    '</tr>';
        }
        
        $('#showhead').html(html2);
        $('#showdata').html(html);
    }else{
        alert('No hay publicaciones realizadas en este nodo');
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
$.ajax({
    type: 'ajax',
    method:'get',
    url: '../gc/Asignar_tareas_c/publicacionessem',
    data:{idcampana:idcampana,idNodo:idNodo},
    async: false,
    dataType: 'json',
    success: function(data){
        
        console.log(data)
        if(data){
            $('#publicacion').html(data.count); 
            
        
    }else{
        alert('No hay publicaciones');
    }
    },
    error: function(){
        alert('No se pudo obtener información');
    }
});
}