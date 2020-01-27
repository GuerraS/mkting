$(document).ready(function(){ 
	
	
	$('#btnAddDC').click(function(){
		$('#dc').empty().append(''); 
		//$('#dc').remove();         
	$('#myFormDC')[0].reset();
	$('#myModalDC').modal('show');
	$('#myModalDC').find('.modal-title').text('Asignar Diseñador de Contenido');
	
	
});
$('#btnAddGC').click(function(){
	$('#gc').empty().append(''); 
	$('#myFormGC')[0].reset();
	$('#myModalGC').modal('show');
	$('#myModalGC').find('.modal-title').text('Asignar Generador de Contenido');
	
	
});
//Boton para mostrar las campañas asignadas
$('#btnmostrarcampanas').click(function(){
	var id = $('#selectcampana').val();
	
	$.ajax({
		type: 'ajax',
		method: 'get',
		url: '../cm/Asignar_campanas_c/mostrar',
		data:{id:id},
		async: false,
		dataType: 'json',
		success: function(data){

			var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									
									
									'<td>'+data[i].nombre+' '+data[i].apaterno+'</td>'+
									'<td>'+data[i].tipo+'</td>'+
									
									
								'</tr>';
					}
					$('#showdata').html(html);
		},
		error: function(){
			alert('Could not get Data from Database');
		}
	});
	
	
});
	
		
	// setInterval(function() {
	// 	$("#form").load("getLatestData.php");
	// }, 1000);
		//Consultar
        $('#btnSelectDC').click(function(){
	
			$('#myFormDC').attr('action', '../cm/Asignar_campanas_c/asignar_campanadc');
			var url = $('#myFormDC').attr('action');
			var data = $('#myFormDC').serialize();
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
							$('#myModalDC').modal('hide');
							$('#myFormDC')[0].reset();
							if(response.type=='add'){
								var type = 'asignado'
							}else if(response.type=='update'){
								var type ="actualizado"
							}
							$('.alert-success').html('Diseñador de Contenido  '+type+' exitosamente').fadeIn().delay(4000).fadeOut('slow');
							
							showAllEmployee();
						}else{
							alert('No se pudo agregar');
						}

					},
					error: function(){
						alert("No hay DC o campañas disponibles");	
					}
				});
		});
		$('#btnSelectGC').click(function(){
	
			$('#myFormGC').attr('action', '../cm/Asignar_campanas_c/asignar_campanagc');
			var url = $('#myFormGC').attr('action');
			var data = $('#myFormGC').serialize();
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
							$('#myModalGC').modal('hide');
							$('#myFormGC')[0].reset();
							if(response.type=='add'){
								var type = 'asignado'
							}else if(response.type=='update'){
								var type ="actualizado"
							}
							$('.alert-success').html('Generador de Contenido  '+type+' exitosamente').fadeIn().delay(4000).fadeOut('slow');
							
							showAllEmployee();
						}else{
							alert('No se pudo agregar');
						}
						
						
						
					},
					error: function(){
						alert("No hay GC o campañas disponibles");	
					}
				});
		});
        
		function showAllEmployee(){
			$.ajax({
				type: 'ajax',
				url: '../cm/Asignar_campanas_c/mostrar',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									
									
									'<td>'+data[i].nombre+' '+data[i].apaterno+'</td>'+
									'<td>'+data[i].tipo+'</td>'+
									
									
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
		

		//delete- 
		

			$('#campanagc').on('change', function() {
				var id=( this.value );
				$.ajax({
					type: 'ajax',
					method: 'get',
					url: '../cm/Asignar_campanas_c/mostrargc',
					data:{id:id},
					async: false,
					dataType: 'json',
					success: function(data){
	
						var html = '';
						var i;
						
						for(i=0; i<data.length; i++){
							html +='<option value='+data[i].id+'>'+data[i].nombre+' '+data[i].apaterno+'</option>';			
						}
						$('#gc').html(html);
					},
					error: function(){
						alert('No hay Generadores disponibles');
					}
				});
			});
			$.ajax({
				type: 'ajax',
				url: '../cm/Asignar_campanas_c/mostrarcampanagc',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					html += " <option value='0' disabled=''  selected=''>...</option>";

					for(i=0; i<data.length; i++){
						html +='<option value='+data[i].id+'>'+data[i].nombre+'</option>';			
					}
					$('#campanagc').html(html);
				},
				error: function(){
					alert('No se pudo obtener datos');
				}
			});
			$('#campanadc').on('change', function() {
				var id=( this.value );
				$.ajax({
					type: 'ajax',
					method: 'get',
					url: '../cm/Asignar_campanas_c/mostrardc',
					data:{id:id},
					async: false,
					dataType: 'json',
					success: function(data){
	
						var html = '';
						var i;
						
						for(i=0; i<data.length; i++){
							html +='<option value='+data[i].id+'>'+data[i].nombre+' '+data[i].apaterno+'</option>';			
						}
						$('#dc').html(html);
					},
					error: function(){
						alert('No hay Generadores disponibles');
					}
				});
			});
			$.ajax({
				type: 'ajax',
				url: '../cm/Asignar_campanas_c/mostrarcampanagc',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					html += " <option value='0' disabled=''  selected='' >...</option>";
					for(i=0; i<data.length; i++){
						html +='<option value='+data[i].id+'>'+data[i].nombre+'</option>';			
					}
					$('#campanadc').html(html);
				},
				error: function(){
					alert('No se pudo obtener datos');
				}
			});
		
		
			$.ajax({
				type: 'ajax',
				url: '../cm/Asignar_campanas_c/selectcampana',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					
					for(i=0; i<data.length; i++){
						html +='<option  value='+data[i].id+'>'+data[i].nombre+'</option>';			
					}
					$('#selectcampana').html(html);
				},
				error: function(){
					alert('No se pudo obtener datos');
				}
			});
})