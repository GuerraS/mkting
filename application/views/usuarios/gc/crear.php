<!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <?php if (empty($campanas)) { ?>



 
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">No es posible crear contenido sin campañas asignadas</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!empty($campanas)) { ?>



 
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Creación de Contenido</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
<div class="ecommerce-widget">              
<div class="row">
                          

<?php if (!empty($campanas)) { ?>



 

                                    <!-- recent orders  -->
                            <!-- ============================================================== -->
<div class="container">
            <form class="form-horizontal" id="formGuardar" action="<?php echo base_url()?>index.php/inicio/preautorizacion" enctype="multipart/form-data" method="post" >
            <div class="form-group">
            <label class="col-sm-2 control-label ">Asociar a camapaña</label>
            <div class="col-sm-5 ">
            <input type="hidden" type="number" name="idAccion" id="idAccion" value="0">
                    <select   name="campana"  id="campana" tabindex="1" class="form-control" onchange="buscar()" required>
                    <option value="" disabled="" selected="">Elejir campaña</option>
                    <?php 
                    foreach ($campanas as $key => $value) {?>
                    <option   value="<?php echo $value['id']; ?>"><?php echo $value['nombre']; ?></option><?php  } ?>
                    </select>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Nodo</label>
            <div class="col-sm-5 ">
                    <select   name="nodo"  id="nodo" tabindex="1" class="form-control" onchange="llenardise()" required>
                    </select>
                    <span class="error" id="errorNodo"></span>
            </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Contenido</label>
            <div class="col-sm-5">
                <textarea class="form-control" name="contenido"  id="contenido" required></textarea>
                <span class="error" id="nombreError"></span>

            </div>
            </div>

            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Comentario</label>
            <div class="col-md-4"  >
            <textarea  class="form-control" name="comentario"  id="comentario"  >

            </textarea>
            </div>
            </div>
            




            <div class="form-group">
            <label class="col-sm-2 control-label col-sm-offset-2">Archivo Multimedia</label>
            <div class="col-sm-4">
                <input class="" type="file" name="fileimagen" >
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
            <button  type="submit" name="guardar"   value="1" class="btn btn-success">Guardar</button>
            <button  type="submit"name="aprobacion"  class="btn btn-primary">Enviar para aprovación</button>
            <button  type="submit" name="diseñador"   class="btn btn-info">Enviar a diseñador</button>
            

            </div>

            </div>
            <div class="form-group">
                        
            <label class="">Seleccione diseñador de contenido</label>
            
            </div>
        
 
            <input type="hidden" name="responsable" value="">
            </form>
	
	
</div>
<?php } ?>  





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
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/gc/crear.js"></script>
        