$(document).ready(function(){ 
	
	showAllEmployee();
	$('#btnAdd').click(function(){
                
	$('#myForm')[0].reset();
	$('#myModal').modal('show');
	$('#myModal').find('.modal-title').text('Asignar Comunity Manager');
	
	selectnuevo();
});
	
		
	// setInterval(function() {
	// 	$("#form").load("getLatestData.php");
	// }, 1000);
		//Consultar
        $('#btnSelect').click(function(){
	
			$('#myForm').attr('action', '../adm/Asignar_campanas_c/asignar_campana');
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			//validate form	
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
								var type = 'asignado'
							}else if(response.type=='update'){
								var type ="actualizado"
							}
							$('.alert-success').html('Comunity manager  '+type+' exitosamente').fadeIn().delay(4000).fadeOut('slow');
							
							showAllEmployee();
						}else{
							alert('No se pudo agregar');
						}
						
						
						
					},
					error: function(){
						alert("No hay CM o campañas disponibles");	
					}
				});
		});
		function showAllEmployee(){
			$.ajax({
				type: 'ajax',
				url: '../adm/Asignar_campanas_c/mostrar',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									
									'<td>'+data[i].nombre_campana+'</td>'+
									'<td>'+data[i].nombre+' '+data[i].apaterno+'</td>'+
									
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
		//edit
		$('#showdata').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Editar empresa');
			$('#myForm').attr('action', '../adm/Asignar_campanas_c/actualizar');
			$.ajax({
				type: 'ajax',
				method:'get',
				url: '../adm/Asignar_campanas_c/mostrar_editar',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					console.log(data);
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<option value='+data[i].id+'>'+data[i].nombre+' '+data[i].apaterno+'</option>';
									
									
					}
					$('#tipousuario').html(html);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '../adm/Asignar_campanas_c/editar',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('input[name=id]').val(data.id);
					$('input[name=rfc]').val(data.rfc);
					$('input[name=nombre]').val(data.razon_social);
					$('input[name=tel]').val(data.telefono_contacto);
					$('input[name=email]').val(data.email_contacto);
					$('input[name=ffinal]').val(data.fecha_termino);
					$('input[name=tipo]').val(data.id_admin);
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
					url: '../adm/Asignar_campanas_c/eliminar',
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
		function selectnuevo(){
			$.ajax({
				type: 'ajax',
				url: '../adm/Asignar_campanas_c/mostrarcm',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					
					for(i=0; i<data.length; i++){
						html +='<option value='+data[i].id+'>'+data[i].nombre+'</option>';			
					}
					$('#cm').html(html);
				},
				error: function(){
					alert('No se pudo obtener datos');
				}

			});
			$.ajax({
				type: 'ajax',
				url: '../adm/Asignar_campanas_c/mostrarcampana',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					
					for(i=0; i<data.length; i++){
						html +='<option value='+data[i].id+'>'+data[i].nombre+'</option>';			
					}
					$('#tipousuario').html(html);
				},
				error: function(){
					alert('No se pudo obtener datos');
				}
			});
		}
		
		

})