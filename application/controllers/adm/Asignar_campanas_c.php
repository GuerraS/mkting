<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_campanas_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('adm/Asignar_campaña_m','e');
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
function asignar_campana(){
	$result=$this->e->asignar_campana();
	$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
}
function mostrarcampana(){
	$result=$this->e->mostrarcampana();
	echo json_encode($result);
}
function mostrarcm(){
	$result=$this->e->mostrarcm();
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