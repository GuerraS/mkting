<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_campanas_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('cm/Asignar_campaña_m','e');
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
function asignar_campanadc(){
	$result=$this->e->asignar_campanadc();
	$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
}
function asignar_campanagc(){
	$result=$this->e->asignar_campanagc();
	$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
}
function mostrarcampanadc(){
	$result=$this->e->mostrarcampanadc();
	echo json_encode($result);
}
function mostrarcampanagc(){
	$result=$this->e->mostrarcampanagc();
	echo json_encode($result);
}
function mostrardc(){
	$result=$this->e->mostrardc();
	echo json_encode($result);
}
function mostrargc(){
	$result=$this->e->mostrargc();
	echo json_encode($result);
}
function selectcampana(){
	$cmlogeado= $this->session->userdata('id');
	$result=$this->e->selectcampana($cmlogeado);

	echo json_encode($result);
}
function mostrarnodopadre(){
	$result=$this->e->mostrarnodopadre();
	echo json_encode($result);
}
function campanas_asignadas(){
	$result=$this->e->campanas_asignadas();
	echo json_encode($result);
}

function mostrar_editar(){
	
	$result=$this->e->mostrareditar();
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