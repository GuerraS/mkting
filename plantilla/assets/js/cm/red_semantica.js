var error_nombre = false;
$("#nombre").focusout(function(){check_nombre();});	
    function check_nombre() {
        

 var pattern = /^[a-zA-Z ñ.áéíóúäëïöü\'-]+$/;
    var correo = $("#nombre").val();

    if((pattern.test(correo) && correo.length>0)){

        
       $('#nombreError').html("Nombre Aceptado").css({"font-size": "12px", "color": "#34F458"});
       $("#nombreError").show();
       $("#nombre").css("border-bottom","2px solid #34F458");
      
       return error_nombre = true;

    }else{
    $("#nombreError").html("Nombre invalido").css({"font-size": "14px", "color": "red"});
    $("#nombreError").show();
    $("#nombre").css("border-bottom","2px solid #F90A0A");
     
    return error_nombre = false;
    }
   
}
/* mostrarCampanas(); */


/* function mostrarCampanas(){
    $.ajax({
        type: 'ajax',
        url: '../cm/Asignar_campanas_c/selectcampana',
        async: false,
        dataType: 'json',
        success: function(data){

            var html = '';
            

            for(var i=0; i<data.length;){
                html +='<option  value='+data[i].id+'>'+data[i].nombre+'</option>';	
                i++;		
            }
            
            $('#selectcampana').html(html);
            
            
        },
        error: function(){
            alert('No se pudo obtener datos');
        }

    });
    
    
} */
function mostrarnodos(){
    var id = $('#selectcampana').val();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../cm/Redsemantica_c/selectnodos',
        data:{id:id},
        async: false,
        dataType: 'json',
        success: function(data){


            var html2 = '';
            var i;
           
            html2 += " <option value='0'  selected=''>Nodo Raiz</option>";


            for(i=0; i<data.length; i++){
                html2 +='<option  value='+data[i].id_red+'>'+data[i].nodo+'</option>';			
            }
            $('#selectnodo').html(html2);
        },
        error: function(){
            alert('No se pudo obtener datos');
        }

    });


}




$('#btnmostrarred').click(function(){
    mostrarnodos();
    red_semantica();
});


$('#btnSave').click(function(){
    var url = $('#myFormasignar').attr('action');
    
   
    var NodoAsignar = $('#NodoAsignar').val();
    var EmpleadoNodo = $('#EmpleadoNodo').val();
    console.log(NodoAsignar);
    console.log(EmpleadoNodo);
    //validate form
    if(NodoAsignar!=null && EmpleadoNodo!=null){		
        $.ajax({
            type: 'ajax',
            method: 'get',
            url: url,
            data: {NodoAsignar:NodoAsignar,EmpleadoNodo:EmpleadoNodo},
            async: false,
            dataType: 'json',
            success: function(response){
                if(response.success){
                    
                   
                    if(response.type=='add'){
                        var type = 'Asignado'
                    }else if(response.type=='update'){
                        var type ="actualizado"
                    }
                    $('.alert-success').html('Empleado '+type+' Correctamentet').fadeIn().delay(4000).fadeOut('slow');
                    $('#myModalAsignar').modal('hide');
                    $('#EmpleadoNodo').empty().append('');
                    showAllEmployee()

                }else{
                    alert('No se pudo asignar nodo');
                } 
            },
            error: function(){
                alert("No Nodos o Empleados disponibles");
            }
        });
    }else{
        alert('Llene todos los campos');
    }
    
});


$('#agregarnodo').click(function(){
    var id = $('#selectcampana').val();
    var nodopadre = $('#selectnodo').val();
    var nombrenodo = $('#nombre').val();
    check_nombre();
    if(error_nombre===true){
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../cm/Redsemantica_c/agregarred',
        data:{id:id,nodopadre:nodopadre,nombrenodo:nombrenodo},
        async: false,
        dataType: 'json',
        success: function(data){
            if(data.success){
                $('#nombre').val('');
                
                alert("Nodo Agregado Correctamente");
                red_semantica();
                mostrarnodos();    
            }else{
                alert('No se pudo agregar Nodo');
            } 
        },
        error: function(){
            alert('No se pudo obtener datos');
        }
    });  
    }else{
        alert("Ingresa Nombre");
    }
});
 
function red_semantica(){
    var id = $('#selectcampana').val();
	$.ajax({
		type: 'ajax',
		method: 'get',
		url: '../cm/Redsemantica_c/nodos',
		data:{id:id},
		async: false,
		dataType: 'json',
		success: function(data){
            
            console.log(data[0]);
            var nodes=[{id: "", label: ""}];
            var edges=[{from: "", to: ""}]
            var ob,ob2;
            var nodes;
           var i;
           var j=0;
           //Mostrar Nodo padre
            for(i=0;i<data[0].length;i++){
                ob=data[0][i];
                nodes[i]=({id: ob['id'], label: ob['nombre'], group:1})
            }
            console.log(i);
            //Mostrar Nodos Hijos
           
            for(i=i;i<data[1].length+1;i++){
                ob=data[1][j];
                nodes[i]=({id: ob['id_red'], label: ob['nodo'], group:4})
                j++;
            }
            //muestra las uniones
            for(i=0;i<data[1].length;i++){
                ob=data[1][i];
                edges[i] = ({from: ob['id_red'], to: ob['id_padre']})
                j++;
            }
            for(i=0;i<data[1].length;i++){
                ob=data[1][i];
                if (ob['id_padre']==0) {
                edges[i] = ({from: ob['id_campana'], to: ob['id_red']})

                }
                j++;
            }
            console.log(nodes);

            // create a network
            var container = document.getElementById('mynetwork');
            var data = {
                nodes: nodes,
                edges: edges
            };
            var options = {
                nodes: {
                    shape: 'dot',
                    
                },
                edges: {
                    width: 2
                }
            };
            network = new vis.Network(container, data, options);

			
		},
		error: function(){
			alert('Could not get Data from Database');
		}
	});
}

$('#AsignarEmpleados').click(function(){
    $('#EmpleadoNodo').empty().append('');
    var id = $('#selectcampana').val();
    if(id){
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../cm/Redsemantica_c/selectnodosAasignar',
        data:{id:id},
        async: false,
        dataType: 'json',
        success: function(data){
            var html2 = '';
            var i;
            html2 += " <option value='0' disabled='' selected=''>...</option>";
            for(i=0; i<data.length; i++){
                html2 +='<option  value='+data[i].id_red+'>'+data[i].nodo+'</option>';			
            }
            $('#NodoAsignar').html(html2);
        },
        error: function(){
            alert('No se pudo obtener datos');
        }

    });     
            $('#myModalAsignar').modal('show');
            $('#myModalAsignar').find('.modal-title').text('Asignar Empelado');
            $('#myFormasignar').attr('action', '../cm/Redsemantica_c/Asignar_Empleado');

            }else{
                alert('Selecciona campaña');
};
});
 $('#selectcampana').on('change', function() {
    showAllEmployee();
});

$('#NodoAsignar').on('change', function() {     
    var id = $('#selectcampana').val();
    var nodo=( this.value );
    
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../cm/Redsemantica_c/Asignar_Empleado_Nodo',
        data:{id:id,nodo:nodo},
        async: false,
        dataType: 'json',
        success: function(data){


            var html2 = '';
            var i;
           
            html2 += " <option value='0' disabled='' selected=''>...</option>";


            for(i=0; i<data.length; i++){
                html2 +='<option  value='+data[i].id+'>'+data[i].nombre+''+data[i].apaterno+' ('+data[i].tipo+')'+'</option>';			
            }
            $('#EmpleadoNodo').html(html2);
        },
        error: function(){
            alert('No se pudo obtener datosss');
        }
    });
  });
    
function showAllEmployee(){
    var id = $('#selectcampana').val();
    $.ajax({
        type: 'ajax',
        method: 'get',
        url: '../cm/Redsemantica_c/mostrar',
        data:{id:id},
        async: false,
        dataType: 'json',
        success: function(data){
            
            if(data){

            console.log(data);
            var html = '';
            var html2 = '';
            var i;
            html2 += "<tr>"+
                        "<td>Nombre Empleado </td>"+
                        "<td>Rol</td>"+
                        "<td>Nodo</td>"+
                        "<td align='center'><i class='fas fa-cog mr-2'></i></td>"+
                        "</tr>";
            for(i=0; i<data.length; i++){
                
                html +='<tr>'+
                            
                            '<td>'+data[i].nombre+''+data[i].apaterno+'</td>'+
                            '<td>'+data[i].tipo+'</td>'+
                            '<td>'+data[i].nodo+'</td>'+
                            
                            
                            '<td>'+
                                '<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
                                '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
                            '</td>'+
                        '</tr>';
            }
            $('#showhead').html(html2);
            $('#showdata').html(html);
        }else{
            var html = '';
            var html2 = '';
            $('#showhead').html(html2);
            $('#showdata').html(html);
            alert("No hay empleados asignados ");

        }
        },
        error: function(){
            alert('No se pudo obtener información');
        }
    });
}
	


// create an array with nodes
    
