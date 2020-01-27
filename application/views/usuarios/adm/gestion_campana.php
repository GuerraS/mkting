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
                                <h2 class="pageheader-title">Gestion de Campañas </h2>
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
	<h5>Campañas</h5>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<button id="btnAdd" class="btn btn-success">Nueva Campaña</button>
	<table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead>
			<tr>
				
				<td>Nombre </td>
				<td>Objetivo</td>
				<td>Fecha de Inicio</td>
				<td>Fecha de Finalización</td>
				
                

                <td align="center"><i class="fas fa-cog mr-2"></i></td>
			</tr>
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <form id="myForm" action="" method="post" role="form">
      <input type="hidden" name="id" value="0">
	  <input type="hidden" name="nombreselect" value="0">
                <div class="row">  

                
                <div class="col-md-6 mb-6">
                <label for="validationServer03">Nombre</label>
                <input type="text" class="form-control is-valid" id="nombre" name="nombre" placeholder="Ingresa Nombre" value="" required>
                <span class="error" id="nombreError"></span>
				</div>
				<div class="col-md-6 mb-5">
                <label for="validationServer03">Objetivo</label>
                <input type="text"  class="form-control is-valid" id="objetivo" name="objetivo" placeholder="Ingresa Objetivo" value="" required>
                <span class="error" id="objetivoError"></span>
				</div>
                </div>
                <div class="row"><br> 
                <div class="col-md-6 mb-3">
                <label for="validationServer05">Fecha Termino</label>
                <input type="date" class="form-control is-valid" id="ffinal" name="ffinal" placeholder="Ingresa tu ffinal Electronico" value="" required>
                <span class="error" id="ffinalError"></span>
				</div>
                </div>
                                         
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btnSave" class="btn btn-primary">Guardar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
		<script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/adm/validaciones_campana.js"></script>

        