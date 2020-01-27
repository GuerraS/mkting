<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_tareas_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('dc/Asignar_tareas_dc_m','e');
        $this->load->library('form_validation');
        $this->load->library('facebook');
		
    }
    function mostrarnodos(){
        $result=$this->e->mostrarnodos();
	    echo json_encode($result);

       
            }
            function mostrarnodostareasasignadas(){
                $result=$this->e->mostrarnodostareasasignadas();
                echo json_encode($result);
        
               
                    }
    function mostrarcm(){
    $result=$this->e->mostrarcm();
    echo json_encode($result);
    }
    function dis_disponibles(){
        $result=$this->e->dis_disponibles();
        echo json_encode($result);
        }
    function mostrartareasasignadas(){
        $result=$this->e->mostrartareasasignadas();
	    echo json_encode($result);
            }
            function mostrar_tareas_enviadas_a_cm(){
                $result=$this->e->mostrar_tareas_enviadas_a_cm();
                echo json_encode($result);
        
               
                    }
                    function mostrar_tareas_enviadas_a_dc(){
                        $result=$this->e->mostrar_tareas_enviadas_a_dc();
                        echo json_encode($result);
                
                       
                            }
                            function mostrar_tareas_enviadas_a_gc(){
                                $result=$this->e->mostrar_tareas_enviadas_a_gc();
                                echo json_encode($result);
                        
                               
                                    }
                                    function mostrartareasrechazadas(){
                                        $result=$this->e->mostrartareasrechazadas();
                                echo json_encode($result);

                                    }
           
    function form_asignadas(){
                $result=$this->e->form_asignadas();
                echo json_encode($result);
        
               
                    }    
    function publicacion(){
       

                $result=$this->e->publicacion();
                echo json_encode($result);
        
               
                    }                
                    function mostrarpublicadas(){
                        $result=$this->e->mostrarpublicadas();
                        echo json_encode($result);
                
                       
                            }
    function mostrarnodosenviadosdisenador(){
                        $result=$this->e->mostrarnodosenviadosdisenador();
                        echo json_encode($result);
                
                       
                            }
                            function mostrarnodosenviadosdisenador2(){
                                $result=$this->e->mostrarnodosenviadosdisenador2();
                                echo json_encode($result);
                        
                               
                                    }
function contenido_gc_a_dc(){
    $result=$this->e->contenido_gc_a_dc();
    echo json_encode($result);
}
function contenido_dc_a_gc(){
    $result=$this->e->contenido_dc_a_gc();
    echo json_encode($result);
}

                            


}