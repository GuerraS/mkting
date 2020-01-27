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
                                <h2 class="pageheader-title">Editar Contenido</h2>
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
            
            <form class="form-horizontal" id="formEdit" action="<?php echo base_url()?>index.php/inicio/guardar_aprobar_contguardado" enctype="multipart/form-data" method="post" >
            <div class="form-group">
            <label class="col-sm-2 control-label ">Asociar a camapaña</label>
            <div class="col-sm-5 ">
            <input type="hidden" type="number" name="idAccion" id="idAccion" value="0">
                    <select   name="campana"  id="campana" tabindex="1" class="form-control" onchange="buscar()" required>
                    <?php 
                    foreach ($editar as $key => $value) {?>
                    <option   value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option><?php  } ?>
                    </select>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Nodo</label>
            <div class="col-sm-5 ">
                    <select   name="nodo"  id="nodo" tabindex="1" class="form-control" onchange="d();" required>
                    <?php 
                    foreach ($editar as $key => $value) {?>
                    <option   value="<?php echo $value['id_red']; ?>"><?php echo $value['nodo']; ?></option><?php  } ?>
                    </select>
                    <span class="error" id="errorNodo"></span>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Contenido</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="contenido"  id="contenido" required><?php echo $value['descripcion']; ?></textarea>
                <span class="error" id="nombreError"></span>

            </div>
            </div>

            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Comentario</label>
            <div class="col-md-4"  id="n">
            <textarea  class="form-control" name="comentario"  id="comentario" ><?php echo $value['comentario']; ?></textarea>
            </div>
            </div>
             <div class="form-group">
             <?php 
              $base=base_url();
              $imagen=$value['imagen'];
              $ruta=$base."uploads/".$imagen;
              
              
  			?>	
            <input type="hidden" name="my_img" value="<?php echo $imagen ?>">
             <img id="my_img"  src="<?php echo $ruta ?>"  >
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Archivo Multimedia</label>
            <div class="col-sm-4">
                <input id="multimedia" type="file" name="fileimagen" >
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Diseñador de contenido</label>
            <div class="col-sm-4">
            <select   name="dc"  id="dc" tabindex="1" class="form-control" ></select>

            </div>
            </div>

            <div class="form-group">
            <div class="col-sm-offset-8 col-sm-10">   
            <button type="submit" name="guardar"  id="guardar" value="guardar" class="btn btn-success">Guardar</button>
            <button  type="submit"name="aprobacion"  class="btn btn-primary">Enviar para aprovación</button>
            <button  type="submit" name="diseñador"   class="btn btn-info">Enviar a diseñador</button>
            
            </div>

            </div>
            <input type="hidden" name="id_publicacion" value="<?php echo $value['id_publicacion']; ?>">

            <input type="hidden" name="responsable" value="">
            </form>
	
	
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
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/gc/editar.js"></script>
