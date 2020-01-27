<style type="text/css">
        #mynetwork {
            width: 1000px;
            height: 400px;
            border: 1px solid lightgray;
        }
    </style>
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
                                <h2 class="pageheader-title">Red Semantica</h2>
                                
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


            <div class="row">
            
                <div class="modal-body">
                <form id="myFormred" action="" method="" role="form">
   
                            <div class="row">
                            
                            <div class="col-md-6 mb-3">
                            
                            <select class="form-control" name="selectcampana" id="selectcampana">
                            <option  value="" disabled="" selected="">Selecciona Campaña</option>
                            
                            
                            <?php 
                            foreach ($campanas as $key => $value) {?>
                           <option   value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option>

                            <?php  } ?>
                            
                            

                            
                            </select>
                            <br>
                            <button type="button" id="btnmostrarred" class="btn btn-primary">Visualizar Red</button>
                            </div>
                            

                        
                            </div>	
                </form>
                <form>
                            <div class="row">
                            <div class="col-md-2 mb-3">
                            <label for="validationServer02">Nombre de nodo</label>
                            <input type="text" class="form-control " id="nombre" name="nombre" placeholder="..." value="" required>
                            <span class="error" id="nombreError"></span>

                            </div>
                            <div class="col-md-4 mb-3">
                            <label>Selecciona Nodo</label>
                            <select class="form-control" name="selectnodo" id="selectnodo">
                            
                            </select>
                            </div>
                            

                            </div>
                            
                            <div class="row">
                            <div class="col-md-6 mb-5">
                            <button type="button" id="agregarnodo" style="float: right"class="btn btn-primary">Agregar Nodo</button>
                            </div>
                            
                            
                            </div>
                </form>            	                         
                            
                </div>
                
      
            </div>
                      
            
            
      <div id="myModalAsignar" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <form id="myFormasignar" action="" method="" role="form">
      <input type="hidden" name="id" value="0">
                
                
                
               
                <div class="row">
                
                <div class="col-md-4 mb-3">
                <label>Nodo</label>
                <select class="form-control" name="NodoAsignar" id="NodoAsignar">
                
                </select>
				</div>
                <div class="col-md-8 mb-3">
                <label>Empleado</label>
                <select class="form-control" name="EmpleadoNodo" id="EmpleadoNodo">
                
                </select>
                </div>
                </div>                           
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnClose" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnSave" class="btn btn-primary">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <div id="mynetwork"></div>
	
    </div>
    
    
	
    <div class="alert alert-success" style="display: none;">
		
	</div>
    <br>
	<div class="col-md-5 mb-3">
    <button type="button" id="AsignarEmpleados"  class="btn btn-primary">Asignar Empleados</button>
    </div>
    
	<table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead id="showhead">
			
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
    




                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
 
                        </div>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/cm/red_semantica.js"></script>
        