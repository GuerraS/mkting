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
                                <h2 class="pageheader-title">Asignación de empleados a campañas</h2>
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
<div id="myModalDC" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
	<div class="alert alert-success" style="display: none;">
	</div>
	<div id="form"class="modal-body">
      <form id="myFormDC" action="" method="" role="form">
    
                
                
                <div class="row">
                <div class="col-md-6 mb-3">
                <label>Campaña</label>
                <select class="form-control" name="campanadc" id="campanadc">

                </select>
                </div>
                

                <div class="col-md-4 mb-3">
                <label>Diseñador de Contenido</label>
                <select class="form-control" name="dc" id="dc">
					
					
                
                </select>
                </div>
				</div>	                       
                </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" id="btnSelectDC" class="btn btn-primary">Seleccionar</button>
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="myModalGC" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
	<div class="alert alert-success" style="display: none;">
	</div>
	<div id="form"class="modal-body">
      <form id="myFormGC" action="" method="" role="form">
    
                
                
                <div class="row">
                <div class="col-md-6 mb-3">
                <label>Campaña</label>
                <select class="form-control" name="campanagc" id="campanagc">

                </select>
                </div>
                

                <div class="col-md-4 mb-3">
                <label>Generador de de Contenido</label>
                <select class="form-control" name="gc" id="gc">
					
					
                
                </select>
                </div>
				</div>	                       
                </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" id="btnSelectGC" class="btn btn-primary">Seleccionar</button>
      </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
    
    
      
	
      <button id="btnAddDC" class="btn btn-success">Asignar Diseñador de Contenido</button>
      <button id="btnAddGC" class="btn btn-success">Asignar Generador de Contenido</button>
      
      <br>
      <br>
      <br>
      <br>
      <div class="row">
            
                <div id="form"class="modal-body">
                <form id="myFormselec" action="" method="post" role="form">
                
                            
                            
                            <div class="row">
                            
                            <div class="col-md-6 mb-3">
                            
                            <select class="form-control" name="selectcampana" id="selectcampana">
                            

                            </select>
                            </div>
                            

                        
                            </div>	                       
                            </form>
                </div>
      <div class="modal-footer">
        
        <button type="button" id="btnmostrarcampanas" class="btn btn-primary">Mostrar</button>
      </div>
      
      </div>
	<table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead>
			<tr>
				
				<td>Nombre</td>
				<td>Rol</td>
				
                
			</tr>
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>

</div>

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Confirmar Borrado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        	Quieres eliminar este registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Eliminar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
		<script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/cm/validacion_asignar_campanas_cm.js"></script>
