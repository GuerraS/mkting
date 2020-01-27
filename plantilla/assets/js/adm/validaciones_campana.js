

    //Add New
	$(document).ready(function(){
        console.log( "ready!" );
        ////////////////// validacion nombre
    var error_nombre = false;
	$("#nombre").focusout(function(){check_nombre();});	
		function check_nombre() {
			
   
     var pattern = /^[a-zA-Z Ñ-ñ.áéíóúäëïöü\'-]+$/;
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

    ////////////////// validacion objetivo
    var error_objetivo = false;
	$("#objetivo").focusout(function(){check_objetivo();});	
		function check_objetivo() {
			
   
     var pattern = /^[a-zA-Z Ñ-ñ.áéíóúäëïöü\'-]+$/;
        var correo = $("#objetivo").val();

        if((pattern.test(correo) && correo.length>0)){
    
			
           $('#objetivoError').html("objetivo Aceptado").css({"font-size": "12px", "color": "#34F458"});
           $("#objetivoError").show();
           $("#objetivo").css("border-bottom","2px solid #34F458");
          
           return error_objetivo = true;
 
        }else{
        $("#objetivoError").html("objetivo invalido").css({"font-size": "14px", "color": "red"});
        $("#objetivoError").show();
        $("#objetivo").css("border-bottom","2px solid #F90A0A");
         
        return error_objetivo = false;
        }
       
    }
    ///////////////validacion de fecha
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
		
		var AnyoHoy = pattern.getFullYear();
		var MesHoy = pattern.getMonth();
		var DiaHoy = pattern.getDate();
		MesHoy=MesHoy+1;
        console.log(MesHoy);

        if (correo.length>0) {
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
                        MesHoy=0;
                        return error_ffecha = true;
        
                    }else{
                        if(MesFecha==MesHoy && DiaFecha>DiaHoy){
                            $('#ffinalError').html("Fecha Valida").css({"font-size": "12px", "color": "#34F458"});
                            $("#ffinalError").show();
                            $("#ffinal").css("border-bottom","2px solid #34F458");
                            MesHoy=0;
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
                    $("#ffinalError").html("Fecha invalida").css({"font-size": "14px", "color": "red"});
                    $("#ffinalError").show();
                    $("#ffinal").css("border-bottom","2px solid #F90A0A");
                    return error_ffecha = false;

                }
            
            }
        }else{
            $("#ffinalError").html("Ingresa fecha de termino").css({"font-size": "14px", "color": "red"});
                    $("#ffinalError").show();
                    $("#ffinal").css("border-bottom","2px solid #F90A0A");
                    return error_ffecha = false;

        }
    }
		
	showAllEmployee();
			$('#btnAdd').click(function(){
                
				$('#myForm')[0].reset();
				$("#nombreError").hide();
				$("#nombre").css("border-bottom","2px solid #D1D1D1");

				$("#objetivoError").hide();
				$("#objetivo").css("border-bottom","2px solid #D1D1D1");

				$("#ffinalError").hide();
				$("#ffinal").css("border-bottom","2px solid #D1D1D1");
                
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Nueva Campaña');
			$('#myForm').attr('action', '../adm/Campana_c/insertar');
			selectnuevo();
		});
		//guardar
        $('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			//validate form
			check_nombre();
            check_objetivo();
            check_ffecha();
			
			
			
			

			if(error_nombre===true 
                && error_objetivo===true
                && error_ffecha===true){		
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						
						if(response.success){
							console.log(response.success);
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if(response.type=='add'){
								var type = 'agregada'
							}else if(response.type=='update'){
							
								var type ="actualizado"
							}
							$('.alert-success').html('Campaña '+type+' exitosamente').fadeIn().delay(4000).fadeOut('slow');
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
			$('#myModal').find('.modal-title').text('Editar Campaña');
			$('#myForm').attr('action', '../adm/Campana_c/actualizar');
			$.ajax({
				type: 'ajax',
				method:'get',
				url: '../adm/Campana_c/mostrar_editar',
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
				url: '../adm/Campana_c/editar',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					
					$('input[name=id]').val(data.id);
					$('input[name=objetivo]').val(data.objetivo);
					$('input[name=nombre]').val(data.nombre);
					
					
					$('input[name=finicio]').val(data.fecha_inicio);
					$('input[name=ffinal]').val(data.fecha_fin);
					
					
					
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
					url: '../adm/Campana_c/eliminar',
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
				url: '../adm/Campana_c/mostrarnuevo',
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
					alert('Could not get Data from Database');
				}
			});
		}
		

		//function
		function showAllEmployee(){
			$.ajax({
				type: 'ajax',
				url: '../adm/Campana_c/mostrar',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									
									'<td>'+data[i].nombre+'</td>'+
									'<td>'+data[i].objetivo+'</td>'+
									'<td>'+data[i].fecha_inicio+'</td>'+
									'<td>'+data[i].fecha_fin+'</td>'+
									
									
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