<!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Asignación de tareas </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        
                        <div class="row">
                          

                
<div class="container">
	<div class="alert alert-success" style="display: none;">
		
	</div>
    <div class="row">
	
    <div class="col-sm-4 ">
            <input type="hidden" type="number" name="idAccion" id="idAccion" value="0">
            <label for="validationServer03">Campaña</label>
                    <select   name="campana"  id="campana" tabindex="1" class="form-control" onchange="nodos()"  required>
                    <option value="" disabled="" selected="">Elejir campaña</option>
                    <?php 
                    foreach ($campanas as $key => $value) {?>
                    <option   value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option><?php  } ?>
                    </select>
    </div>
	
    <div class="col-sm-4 ">
    <label for="validationServer03">Nodos</label>  
                    <select   name="nodo"  id="nodo" tabindex="1" class="form-control"onchange="selectempleados()"  required>
                    
                    
                    
                    </select>
    </div>
    <div class="col-sm-4 ">
    <label for="validationServer03">Comunity manager</label>
                    <select   name="empleado"  id="empleado" tabindex="1" class="form-control"onchange="showAllEmployee()"  required>

                    </select>
    </div>
    
    </div>
	
    
	<table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead id="showhead">
			
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
</div>

<div id="myModal"  style="display:none" tabindex="-1" role="dialog">
  
      <div class="modal-header">
      
      <div class="modal-body">
      <form id="myForm" action="<?php echo base_url()?>index.php/inicio/asignar_tareas_cm" method="post" enctype="multipart/form-data" role="form">
      
      <input type="hidden" id="id_campana" name="id_campana" value="0">
      <input type="hidden" id="id_nodo" name="id_nodo" value="0">
      <input type="hidden" id="id_gc" name="id_gc" value="0">
                <div class="row">  
                <div class="col-md-12 mb-6">
                <label for="validationServer03">Descripcion</label>
                <textarea  class="form-control" name="descripciontarea"cols="60" rows="5" id="descripciontarea" required  >
                </textarea>
                <span class="error" id="nombreError"></span>
				</div>

                <div class="col-md-12 mb-6">
                <input type="hidden" name="my_img" id="my_img" width="100" height="100" value="">
                <img id="img"  src="">
                
				</div>
   
                </div>
                <br>
            
                <div class="form-group">
                <div class="col-md-12 mb-6"> 
                <button type="submit" name="asignar" class="btn btn-info ">Asignar Tarea</button>
                
                </div>
                </div>                      
                </form>
      </div>
    </div><!-- /.modal -->
</div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/cm/validacion_tareas.js"></script>
        