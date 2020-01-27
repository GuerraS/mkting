<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('sa/Empleado','e');
		$this->load->library('form_validation');
		
	}
	
function insertar(){
	$result = $this->e->insertar();
		$msg['succes'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	
}
function editar(){
	$result = $this->e->editar();
	echo json_encode($result);
	
}
function actualizar(){
	$result = $this->e->actualizar();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	
}
function mostrar(){
	$result=$this->e->mostrar();
	echo json_encode($result);
}

function eliminar(){
	$result = $this->e->eliminar();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	
}

}