<?php $tipo= $this->session->userdata('tipo') ?>

<!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                
                            <?= $this->session->userdata('name') ?> - 
                            
                            <?php if ($tipo==1){?>
                                <?= $Sa ?>
                                </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="sa.php"  aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            
                          

                            <?php } ?>

                            <?php if ($tipo==2){?>
                                <?= $Admin ?>
                                </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="<?= base_url()?>index.php/inicio/admin"  aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            
                            
                            <?php } ?>
                            <?php if ($tipo==3){?>
                                <?= $CM ?>
                                </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="<?= base_url()?>index.php/inicio/cm"  aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            
                          
                            <?php } ?>

                            <?php if ($tipo==4){?>
                                <?= $DC ?>  
                                </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="dc.php"  aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            
                           
                            <?php } ?>

                            <?php if ($tipo==5){?>
                                <?= $GC ?>
                                </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="<?= base_url()?>index.php/inicio/gc"  aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                
                            </li>
                            
                            
                            <?php } ?>
                            
                            
                            <?php if ($tipo==1){?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Gestion</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>index.php/inicio/gestion_usuarios">Usuarios <span class="badge badge-secondary">New</span></a>
                                            
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>index.php/inicio/gestion_empresa">Empresa</a>
                                        </li>
            
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if ($tipo==2){?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-chart-bar"></i>Gestion</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>index.php/inicio/gestion_usuarios_camp">Usuarios <span class="badge badge-secondary">New</span></a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>index.php/inicio/gestion_campana">Campañas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url()?>index.php/inicio/usuario_campana">Asignar Empleados</a>
                                        </li> 
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if ($tipo==3){?>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-users"></i>Gestion de usuarios</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                       
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/gestion_usuarios_cm">Administrar Usuarios <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/asignar_campanas_cm">Asignar a campañas <span class="badge badge-secondary">New</span></a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-chart-bar"></i>Gestion de Campañas</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                       
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/campanas_asignadas">Campañas Asociadas <span class="badge badge-secondary">New</span></a>

                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/red_semantica">Red Semantica <span class="badge badge-secondary">New</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-tasks"></i>Tareas</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                       
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/asignar_tareas">Asignar tareas<span class="badge badge-secondary">New</span></a>

                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_enviadas_a_cm">Tareas Asignadas <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/pendientes_de_revision">Pendientes de Revisión/Publicar<span class="badge badge-secondary">New</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <?php } ?>
                            <?php if ($tipo==4){?>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-rocket"></i>Tareas</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                            <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_asignadas_dc">Asignadas <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_enviadas_dc">Enviadas a Revisión<span class="badge badge-secondary">New</span></a>

                                        </li> 
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/contenido_rechazado_dc">Rechazadas<span class="badge badge-secondary">New</span></a>

                                        </li>  
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if ($tipo==5){?>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-book"></i></i>Tareas</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                       
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_asignadas_gc">Asignadas <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_a_revision_gc">Enviadas a revisión <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_rechazadas">Rechazadas<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_enviadas_a_disenador">Enviadas a diseñador <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/tareas_recibidas_de_disenador">Recibidas del diseñador<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        
                                    </ul>
                                    
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-fw fa-rocket"></i>Gestion de Campañas</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                       
                                        <li class="nav-item">
                                        <a class="nav-link" href="<?= base_url()?>index.php/inicio/campanas_asignadas">Campañas Asociadas <span class="badge badge-secondary">New</span></a>

                                        </li>
                                        
  
                                    </ul>
                                    
                                </div>
                            </li>
                            
                            <?php } ?>
                            
                            
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
