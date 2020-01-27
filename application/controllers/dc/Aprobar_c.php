<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprobar_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('dc/Aprobar_m','e');
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
    function form_dis(){
                $result=$this->e->form_dis();
                echo json_encode($result);
        
               
                    }    
    function publicacion(){
       

                $result=$this->e->publicacion();
                echo json_encode($result);
        
               
                    }                
                    function mostrar_pub_disenador(){
                        $result=$this->e->mostrar_pub_diseñador();
                        echo json_encode($result);
                
                       
                            }



}