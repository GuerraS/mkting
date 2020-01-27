$(document).ready(function(){
    showAllEmployee() 

		function showAllEmployee(){
			$.ajax({
				type: 'ajax',
				url: '../cm/Asignar_campanas_c/campanas_asignadas',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									
									
									'<td>'+data[i].nombre+' </td>'+
                                    '<td>'+data[i].objetivo+'</td>'+
                                    '<td>'+data[i].fecha_inicio+'</td>'+
									
									
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
	

		

		
		
		
		
		

})