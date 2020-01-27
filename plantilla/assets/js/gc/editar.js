var error_nombre = false;
	$("#contenido").focusout(function(){check_nombre();});	
		function check_nombre() {
			
   
     var pattern = /^[a-zA-Z0-9 ñ.áéíóúäëïöü\ '-]+$/;
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
	

function buscar(){
	var id = $('#campana').val();
	
    $.ajax({
        type: 'ajax',
		method: 'get',
		url: '../gc/Crear_c/mostrarnodo',
		data:{id:id},
		async: false,
		dataType: 'json',
		success: function(data){

			var html = '';
			html += " <option value='' disabled=''  selected=''>...</option>";

					var i;
					for(i=0; i<data.length; i++){
						html +='<option  value='+data[i].id_red+'>'+data[i].nodo+'</option>';			
					}
					$('#nodo').html(html);
		},
		error: function(){
			alert('Could not get Data from Database');
		}
    });
}
function openmodal(){
	$('#modalDiseñador').modal('show');

}

	var idCampana = $('#campana').val();
	var idNodo = $('#nodo').val();
	$.ajax({
        type: 'ajax',
		method: 'post',
		url: '../gc/Crear_c/mostrardisenadores',
		data:{idCampana:idCampana,idNodo:idNodo},
		async: false,
		dataType: 'json',
		success: function(data){

			var html = '';
			html += " <option value='' disabled=''  selected=''>...</option>";

					var i;
					for(i=0; i<data.length; i++){
						html +='<option  value='+data[i].id+'>'+data[i].nombre+'</option>';			
					}
					$('#dc').html(html);
		},
		error: function(){
			alert('Could not get Data from Database');
		}
    });








function enviardis(){
	check_nombre();

if(error_nombre===true){
var data = $('#formGuardar').serialize();
$.ajax({
	type: 'ajax',
	method: 'POST',
	url: '../gc/Crear_c/pub_dis',
	data: data,
	async: false,
	dataType: 'json',
	success: function(response){
			
				alert("Enviado a diseñador");
	},
	error: function(){
		alert('No se envio');
	}
})
}else{
	alert("Redacta Contenido");
}
}










/////////////////////////////////// Parte del editar contenido
$('#guardarEdit').click(function(){
	$('#idAccion').val('');
	$('#idAccion').val(1
	 );
	 
	 updatecontenido();
});
function updatecontenido(){
	check_nombre();

if(error_nombre===true){
var data = $('#formEdit').serialize();

$.ajax({
	type: 'ajax',
	
	url: '../../gc/Crear_c/updatecontenido',
	data: data,
	async: false,
	dataType: 'json',
	success: function(response){
		
			console.log(response);	
	},
	error: function(){
		
	}
});}else{
	alert("Redacta Contenido");
}
}





