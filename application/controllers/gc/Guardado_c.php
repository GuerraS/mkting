<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guardado_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('gc/Guardado_m','a');
		$this->load->library('form_validation');
		
	}
function mostrar(){
	$result=$this->a->mostrar();
	echo json_encode($result);
	}

	function mostrarnodos(){
		$result=$this->a->mostrarnodos();
		echo json_encode($result);
		}
	

	
}