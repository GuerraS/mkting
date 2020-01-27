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
                                <h2 class="pageheader-title">Gestion de Empresas </h2>
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
	<h5>Empresas</h5>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<button id="btnAdd" class="btn btn-success">Nuevo</button>
	<table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead>
			<tr>
				
				<td>Razón Social </td>
				
				<td>Fecha de creacion</td>
				
				<td>Telefono Contacto</td>
                <td>Email Contacto</td>
                <td>Admin</td>
                
                
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

               
                <div class="col-md-12 mb-6">
                <label for="validationServer03">Razon Social</label>
                <input type="text" class="form-control is-valid" id="nombre" name="nombre" placeholder="Ingresa tu Nombre" value="" required>
				<span class="error" id="nombreError"></span>

			    </div>
                </div>
                <div class="row"><br> 
                <div class="col-md-6 mb-3">
                <label for="validationServer02">Telefono Contacto</label>
                <input type="text" class="form-control is-valid" id="tel" name="tel" placeholder="Ingresa tu Telefono" value="" required>
				<span class="error" id="telError"></span>

				</div>
                <div class="col-md-6 mb-3">
                <label for="validationServer05">Email Contacto</label>
                <input type="text" class="form-control is-valid" id="email" name="email" placeholder="Ingresa tu Correo Electronico" value="" required>
				<span class="error" id="correoError"></span>

				</div>
               
                </div>
                <div class="row">
                <div class="col-md-4 mb-3">
                <label>Administrador</label>
                <select class="form-control" name="tipo" id="tipousuario">
                
                
                </select>
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
		<script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/sa/validacion_empresas.js"></script>
