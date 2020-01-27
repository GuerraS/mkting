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
                                <h2 class="pageheader-title">Gestion de Usuarios </h2>
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
	<h5>Administradores</h5>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<button id="btnAdd" class="btn btn-success">Nuevo</button>
	<table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead>
			<tr>
				
				<td>Nombre </td>
				<td>Apellido paterno</td>
				<td>Apellido materno</td>
                
                <td>Telefono</td>
                <td>Email</td>
                <td>Usuario</td>
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
                <div class="row">  

                
                <div class="col-md-12 mb-6">
                <label for="validationServer03">Nombre</label>
                <input type="text" class="form-control is-valid" id="nombre" name="nombre" placeholder="Ingresa tu Nombre" value="" required>
                <span class="error" id="nombreError"></span>
				</div>
                <div class="col-md-6 mb-6">
                <label for="validationServer04">Apellido Paterno</label>
                <input type="text" class="form-control is-valid" id="apaterno" name="apaterno" placeholder="Ingresa tu Apellido Paterno" value="" required>
				<span class="error" id="apaternoError"></span>

				</div>
                <div class="col-md-6 mb-6">
                <label for="validationServer01">Apellido Materno</label>
                <input type="text" class="form-control is-valid" id="amaterno" name="amaterno" placeholder="Ingresa tu Apellido Materno" value="" required>
				<span class="error" id="amaternoError"></span>

				</div>
                </div>
                
                <div class="row"><br> 
                <div class="col-md-4 mb-3">
                <label for="validationServer02">Telefono</label>
                <input type="text" class="form-control is-valid" id="tel" name="tel" placeholder="Ingresa tu Telefono" value="" required>
				<span class="error" id="telError"></span>

                </div>
                <div class="col-md-8 mb-3">
                <label for="validationServer05">Correo Electronico</label>
                <input type="text" class="form-control is-valid" id="email" name="email" placeholder="Ingresa tu Correo Electronico" value="" required>
                <span class="error" id="correoError"></span>
				
				</div>
                </div>
                
                <div class="row">
                <div class="col-md-4 mb-3">
                <label for="validationServer02">Usuario</label>
                <input type="text" class="form-control is-valid" id="user" name="user" placeholder="Ingresa tu Usuario" value="" required>
				<span class="error" id="userError"></span>

				</div>
                <div class="col-md-4 mb-3">
                <label for="validationServer02">Contraseña</label>
                <input type="password" class="form-control is-valid" id="pass" name="pass" placeholder="Ingresa tu Password" value="" required>
				<span class="error" id="passError"></span>

				</div>
                <div class="col-md-4 mb-3">
                <label>Tipo de usuario</label>
                <select class="form-control" name="tipo" id="validationServer12">
                <option value="2">Admin</option>
                <textarea  class="form-control" name="descripcion" placeholder="¿Cúal es tu requerimiento?"  id="contenido" required  >
                </textarea>
                
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
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/sa/validacion_usuarios.js"></script>
        