<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redsemantica_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('cm/Redsemantica_m','e');
		$this->load->library('form_validation');
		
	}
	


function nodos(){
	$raiz=$this->e->mostrarnodopadre();
	$nodos=$this->e->selectnodos();
	$result=array($raiz,$nodos);
	echo json_encode($result);
}
function mostrar(){
	
	$result=$this->e->mostrar();
	
	echo json_encode($result);
}
function selectnodos(){
	$result=$this->e->selectnodos();
	echo json_encode($result);
}
function agregarred(){
	$result=$this->e->agregarred();
	$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
}
function Asignar_Empleado_Nodo(){
	$result=$this->e->Asignar_Empleado_Nodo();
	echo json_encode($result);
}
function selectnodosAasignar(){
	$result=$this->e->selectnodosAasignar();
	echo json_encode($result);
}
function Asignar_Empleado(){
	$result=$this->e->Asignar_Empleado();
	$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);

}

}