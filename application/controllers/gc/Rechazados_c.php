<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rechazados_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('gc/Rechazados_m','e');
        $this->load->library('form_validation');
        $this->load->library('facebook');
		
    }
    function mostrarnodosrechazados(){
        $result=$this->e->mostrarnodos();
        echo json_encode($result);
}
function mostrarpubrechazadas(){
    $result=$this->e->mostrarpubrechazadas();
    echo json_encode($result);
}
function contenido_dc_a_gc(){
    $result=$this->e->contenido_dc_a_gc();
    echo json_encode($result);
}
function form_rechazadas(){
    $result=$this->e->form_rechazadas();
    echo json_encode($result);

   
        }   


                            


}