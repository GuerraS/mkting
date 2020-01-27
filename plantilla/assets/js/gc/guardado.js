
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
$('#campana').on('change', function() {
    showAllEmployee();
});

function showAllEmployee(){
    var idcampana=$('#campana').val();
    $.ajax({
        type: 'ajax',
        method:'get',
        url: '../gc/Guardado_c/mostrar',
        data:{idcampana:idcampana},
        async: false,
        dataType: 'json',
        success: function(data){

            var html = '';
            var html2 = '';
            html2+= '<tr>'+
				
            '<td>Campaña</td>'+
            '<td>Contenido</td>'+
            '<td>Contenido Multimedia</td>'+
            '<td>Comentarios</td>'+
            '<td align="center"><i class="fas fa-cog mr-2"></i></td>'+
        '</tr>';
            var i;
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
            for(i=0; i<data.length; i++){
            
                html +='<tr>'+
                            
                            '<td>'+data[i].nombre+'</td>'+
                            '<td>'+data[i].descripcion+'</td>'+
                            
                            '<td><img src="'+baseUrl+'/'+'uploads'+'/'+data[i].imagen+'" height="50px" ></td>'+
                            
                            
                            '<td>'+data[i].comentario+'</td>'+
                            
                            '<td>'+
                                '<a href="../inicio/edit_save?id='+data[i].id_publicacion+'" class="btn btn-info item-edit" data="" >Edit</a>'+
                                '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id_publicacion+'">Delete</a>'+
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






//delete- 
$('#showdata').on('click', '.item-delete', function(){
    var id = $(this).attr('data');
    $('#deleteModal').modal('show');
    
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: '../gc/Crear_c/eliminar_save',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                if(response.success){
                    
                    $('.alert-success').html('Eliminado correctamente').fadeIn().delay(4000).fadeOut('slow');
                    showAllEmployee();
                }else{
                    alert('Error');
                }
            },
            error: function(){
                alert('Error al borrar');
            }
        });
    
});
