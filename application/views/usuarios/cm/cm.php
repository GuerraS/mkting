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
                                <h2 class="pageheader-title">Comunity Manager</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        </ol>
                                    </nav>
                                </div>
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
                           <section class="content">
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
    </div>
	<br><br><br>
                           
      <div class="row">
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Publicaciones realizadas</span>
              <span class="info-box-number"><div class="errores_encontrados"><label id="publicacion"></label></div></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fab fa-facebook-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Publicaciones Semanales</span>
              <span class="info-box-number"><div class="errores_solucionados"><label id="semanal"></label></div></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="far fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reacciones Semanales</span>
              <span class="info-box-number"><div class="tablasdb"><p id="reacciones"></p></div></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- Default box -->
      <br>
      <br>
      <br>
      <div class="row">
      <h5>Publicaciones Realizadas</h5>
      <table class="table table-striped table-bordered" style="margin-top: 20px;" style="width:100%" id="example">
		<thead id="showhead">
			
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
      </div>
      
    </section>
    
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        	<form id="myForm" action="" method="post" class="form-horizontal">
        		<input type="hidden" name="txtId" value="0">
        		<div class="form-group">
        			<label for="name" class="label-control col-md-4">Employee Name</label>
        			<div class="col-md-8">
        				<input type="text" name="txtEmployeeName" class="form-control">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="address" class="label-control col-md-4">Address</label>
        			<div class="col-md-8">
        				<textarea class="form-control" name="txtAddress"></textarea>
        			</div>
        		</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        	Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->
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
        <!-- ============================================================== -->
        <!-- end wrapper  --> 
        <script type="text/javascript" src="<?php echo base_url()?>plantilla/assets/js/cm/dashboardcm.js"></script>
