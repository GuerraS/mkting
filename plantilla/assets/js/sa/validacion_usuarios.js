$(document).ready(function(){
     ////////////////// validacion nombre
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
	 ////////////////// validacion apellido paterno
	 var error_apaterno = false;
	 $("#apaterno").focusout(function(){check_apaterno();});	
		 function check_apaterno() {
			 
	
	  var pattern = /^[a-zA-Z]+$/;
		 var correo = $("#apaterno").val();
 
		 if((pattern.test(correo) && correo.length>0)){
	 
			 
			$('#apaternoError').html("Apellido paterno aceptado").css({"font-size": "12px", "color": "#34F458"});
			$("#apaternoError").show();
			$("#apaterno").css("border-bottom","2px solid #34F458");
		   
			return error_apaterno = true;
  
		 }else{
		 $("#apaternoError").html("Apellido paterno invalido").css({"font-size": "14px", "color": "red"});
		 $("#apaternoError").show();
		 $("#apaterno").css("border-bottom","2px solid #F90A0A");
		  
		 return error_apaterno = false;
		 }
		
	 }
	 ////////////////// validacion apellido materno
	 var error_amaterno = false;
	 $("#amaterno").focusout(function(){check_amaterno();});	
		 function check_amaterno() {
			 
	
	  var pattern = /^[a-zA-Z]+$/;
		 var correo = $("#amaterno").val();
 
		 if((pattern.test(correo) && correo.length>0)){
	 
			 
			$('#amaternoError').html("Apellido materno aceptado").css({"font-size": "12px", "color": "#34F458"});
			$("#amaternoError").show();
			$("#amaterno").css("border-bottom","2px solid #34F458");
		   
			return error_amaterno = true;
  
		 }else{
		 $("#amaternoError").html("Apellido materno invalido").css({"font-size": "14px", "color": "red"});
		 $("#amaternoError").show();
		 $("#amaterno").css("border-bottom","2px solid #F90A0A");
		  
		 return error_amaterno = false;
		 }
		
	 }
	 //////////////Validacion telefono
	 var error_telefono = false;
	 $("#tel").focusout(function(){check_tel();});	
		 function check_tel() {
			 
	
	  var pattern = /^[0-9]+$/;
		 var correo = $("#tel").val();
 
		 if((pattern.test(correo) && correo.length===10)){
	 
			 
					$('#telError').html("Telefono Aceptado").css({"font-size": "12px", "color": "#34F458"});
			$("#telError").show();
			$("#tel").css("border-bottom","2px solid #34F458");
		   
			return error_telefono = true;
  
		 }else{
			$("#telError").html("Telefono invalido").css({"font-size": "14px", "color": "red"});
		 $("#telError").show();
		 $("#tel").css("border-bottom","2px solid #F90A0A");
		  
		 return error_telefono = false;
		 }
		
	 }
	 ///////////////validacion email
	 var error_email = false;
	 $("#email").focusout(function(){check_email();});	
		 function check_email() {
			 
	
	  var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
		 var correo = $("#email").val();
 
		 if((pattern.test(correo) && correo.length>0)){
	 
			 
					$('#correoError').html("Correo Aceptado").css({"font-size": "12px", "color": "#34F458"});
			$("#correoError").show();
			$("#email").css("border-bottom","2px solid #34F458");
		   
			return error_email = true;
  
		 }else{
			$("#correoError").html("Correo invalido").css({"font-size": "14px", "color": "red"});
		 $("#correoError").show();
		 $("#email").css("border-bottom","2px solid #F90A0A");
		  
		 return error_email = false;
		 }
		
	 }
	 ///////////////validacion de fecha
	 /* var error_ffecha = false;
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
  */
	 ////////////////// validacion usuario
	 var error_usuario = false;
	 $("#user").focusout(function(){check_usuario();});	
		 function check_usuario() {
			 
	
	  var pattern = /^[a-zA-Z]+$/;
		 var correo = $("#amaterno").val();
 
		 if((pattern.test(correo) && correo.length>0)){
	 
			 
			$('#userError').html("Usuario aceptado").css({"font-size": "12px", "color": "#34F458"});
			$("#userError").show();
			$("#user").css("border-bottom","2px solid #34F458");
		   
			return error_usuario = true;
  
		 }else{
		 $("#userError").html("Usuario invalido").css({"font-size": "14px", "color": "red"});
		 $("#userError").show();
		 $("#user").css("border-bottom","2px solid #F90A0A");
		  
		 return error_usuario = false;
		 }
		
	 }
 
	  ////////////////// validacion password
	  var error_password = false;
	  $("#pass").focusout(function(){check_pass();});	
		  function check_pass() {
			  
	 
	   var pattern = /^[a-zA-Z0-9]+$/;
		  var correo = $("#pass").val();
  
		  if((pattern.test(correo) && correo.length>0)){
	  
			  
			 $('#passError').html("Contraseña aceptada").css({"font-size": "12px", "color": "#34F458"});
			 $("#passError").show();
			 $("#pass").css("border-bottom","2px solid #34F458");
			
			 return error_password = true;
   
		  }else{
		  $("#passError").html("Contraseña invalida").css({"font-size": "14px", "color": "red"});
		  $("#passError").show();
		  $("#pass").css("border-bottom","2px solid #F90A0A");
		   
		  return error_password = false;
		  }
		 
	  }
    showAllEmployee();
			$('#btnAdd').click(function(){
                $('#myForm')[0].reset();
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
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Nuevo administrador');
			$('#myForm').attr('action', '../sa/Empleado_c/insertar');
		});
		//guardar
        $('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			//validate form
			check_nombre();
            check_apaterno();
            check_amaterno();
			check_email();
			
			
            check_tel();
            check_usuario();
            check_pass();
			
			

			if(error_nombre===true 
                && error_apaterno===true
                && error_amaterno===true 
                && error_telefono===true
				&& error_email===true
				
                && error_usuario===true
                && error_password===true){		
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if(response.type=='add'){
								var type = 'agregado'
							}else if(response.type=='update'){
								var type ="actualizado"
							}
							$('.alert-success').html('Administrador '+type+' exitosamente').fadeIn().delay(4000).fadeOut('slow');
							showAllEmployee();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('No se pudo agregar');
					}
				});
			}else{
				alert('Llene todos los campos');
			}
		});

		//edit
		$('#showdata').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Editar administrador');
			$('#myForm').attr('action', '../sa/Empleado_c/actualizar');
			
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '../sa/Empleado_c/editar',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('input[name=id]').val(data.id);
				
					$('input[name=nombre]').val(data.nombre);
					$('input[name=apaterno]').val(data.apaterno);
					$('input[name=amaterno]').val(data.amaterno);
					
					$('input[name=tel]').val(data.telefono);
					$('input[name=email]').val(data.email);
					
					$('input[name=user]').val(data.usuario);
					$('input[name=pass]').val(data.contraseña);
					$('input[name=tipo]').val(data.idTipo_usuario);
				},
				error: function(){
					alert('No se pudo editar');
				}
			});
		});

		//delete- 
		$('#showdata').on('click', '.item-delete', function(){
			var id = $(this).attr('data');
			$('#deleteModal').modal('show');
			//prevent previous handler - unbind()
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '../sa/Empleado_c/eliminar',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
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
		});



		//function
		function showAllEmployee(){
			$.ajax({
				type: 'ajax',
				url: '../sa/Empleado_c/mostrar',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									
									'<td>'+data[i].nombre+'</td>'+
									'<td>'+data[i].apaterno+'</td>'+
									'<td>'+data[i].amaterno+'</td>'+
									
									'<td>'+data[i].telefono+'</td>'+
									'<td>'+data[i].email+'</td>'+
									'<td>'+data[i].usuario+'</td>'+
									'<td>'+
										'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
									'</td>'+
							    '</tr>';
					}
					$('#showdata').html(html);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}

    
});
