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
                                <h2 class="pageheader-title">Tareas Asignadas</h2>
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

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <form id="myForm" action="<?php echo base_url()?>index.php/inicio/revision_tarea_gc" method="post" enctype="multipart/form-data" role="form">
      <input type="hidden" id="id_tarea" name="id_tarea" value="0">
      <input type="hidden" id="id_campana" name="id_campana" value="0">
      <input type="hidden" id="id_nodo" name="id_nodo" value="0">
      <input type="hidden" id="id_cm" name="id_cm" value="0">
      <input type="hidden" id="id_gc" name="id_gc" value="0">
      <input type="hidden" id="id_dc" name="id_dc" value="0">
                <div class="row">  
                <div class="col-md-12 mb-6">
                <label for="validationServer03">Descripcion de Tarea</label>
                <textarea  class="form-control" name="descripciontarea"cols="60" rows="5" id="descripciontarea" required readonly  >
                </textarea>
                
				</div>
                
                <div class="col-md-12 mb-6">
                <label for="validationServer03">Contenido</label>
                <textarea  class="form-control" name="contenido"  id="contenido" required  >
                </textarea>
                <span class="error" id="nombreError"></span>
				</div>

                <div class="col-md-12 mb-6">
                <input type="hidden" name="my_img" id="my_img" width="100" height="100" value="">
                <img id="img"  src="">
                
				</div>

                <div class="col-md-6 mb-6">
                <label for="validationServer04">Contenido Multimedia</label>
                <input class="" type="file" name="fileimagen" >
                
				</div>
                
                </div>
                
                <div class="row"><br> 
                <div class="col-md-12 mb-6">
                <label for="validationServer03">Comentarios</label>
                <textarea  class="form-control" name="comentario"  id="comentario"  >
                </textarea>
                <span class="contenido" id=""></span>
				</div>
                </div>
                
                <br>
            
                <div class="form-group">
                <div class="col-md-12 mb-6"> 
                <button type="submit" name="revision" id="revision" onclick="cambiar()" class="btn btn-info ">Enviar a Revisión</button>
                
                <button  type="button"  onclick="mostrardisenador()" class="btn btn-success" >Enviar a disenador</button>
                </div>
                </div>
                <div id="mydisenador"   style="visibility:hidden" class="row">
                <div class="col-md-6 mb-6">
               
                    <select  name="disenadortarea"  id="disenadortarea" tabindex="1" class="form-control"onchange="showAllEmployee()" >            
                    </select>
                <span class="contenido" id=""></span>
				</div>
                <div class="col-md-6 mb-6">
                 
                <button  type="submit" name="disenador" id="disenador"  class="btn btn-success" >Enviar</button>

                <span class="contenido" id=""></span>
				</div>
                </div>

            
                                           
                </form>
      </div>
      
      

 
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
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
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/gc/tareas_asignadas.js"></script>
        