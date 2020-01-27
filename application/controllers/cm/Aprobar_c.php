<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprobar_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('cm/Aprobar_m','e');
        $this->load->library('form_validation');
        $this->load->library('facebook');
		
    }
    function mostrarnodos(){
        $result=$this->e->mostrarnodos();
	    echo json_encode($result);

       
            }
            function mostrarnodospublicadas(){
                $result=$this->e->mostrarnodospublicadas();
                echo json_encode($result);
        
               
                    }
            function mostrarpub(){
                $result=$this->e->mostrarpreautorizacion();
                echo json_encode($result);
        
               
                    }
    function form_preaut(){
                $result=$this->e->form_preaut();
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