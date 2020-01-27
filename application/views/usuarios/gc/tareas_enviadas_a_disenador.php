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
                                <h2 class="pageheader-title">Tareas Enviadas a Diseñador</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        
                        <div class="row">
                          

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
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
                    <select   name="nodo"  id="nodo" tabindex="1" class="form-control"onchange="showAllEmployee()"  required>            
                    </select>
    </div>
    </div>
	
    
	<div id="mytable"  style="display:none" tabindex="-1" role="dialog">
  
<table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead id="showhead">
			
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
      </div>
</div>
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
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/gc/tareas_enviadadas_a_disenador.js"></script>
        