<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear_c extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('gc/Crear_m','a');
		
		
		$this->load->library('form_validation');
		
	}
	function mostrarnodo(){
	$result=$this->a->mostrarnodo();
	echo json_encode($result);
	}
	
	function pendientes(){
		$result=$this->a->mostrar_pendientes();
		echo json_encode($result);
		}
	function mostrarnodopendientes(){
		$result=$this->a->mostrarnodopendientes();
		echo json_encode($result);
		}
	function mostrardisenadores(){
	$result=$this->a->mostrardiseñadores();
	echo json_encode($result);

}

function aprovacion(){

			//$preaut = $this->input->post('idAccion');
			$gclogeado= $this->session->userdata('id');
			$contenido = $this->input->post('contenido');
		//	$nombreimg =$_FILES['fileimagen']['tmp_name'];
			$idCampana = $this->input->post('campana');
			$idNodo = $this->input->post('nodo');
			$cmresponsable=$this->a->cm($idNodo);
			$comentario = $this->input->post('comentario');
			$guardar = $this->input->post('guardar');
			$aprovacion = $this->input->post('aprovacion');
			$dise = $this->input->post('dise');
			
			
			
			for($i=0;$i<1;$i++){
				$idcm=$cmresponsable['id_usuario'];
			
			
				}
				$info['id_campana'] = $idCampana;
				$info['id_gc']=$gclogeado;
				$info['descripcion'] = $contenido;
		//		$info['imagen'] = $_FILES['fileimagen']['name'];
				$info['comentario']=$comentario;
				$info['id_cm']=$idcm;
				$info['id_nodo']=$idNodo;	
				
				$result=$this->a->aprovacion($info);
		
				echo json_encode($result);
				
				
				
				}
				function pub_dis(){

					//$preaut = $this->input->post('idAccion');
					$gclogeado= $this->session->userdata('id');
					$contenido = $this->input->post('contenido');
				//	$nombreimg =$_FILES['fileimagen']['tmp_name'];
					$idCampana = $this->input->post('campana');
					$idDc = $this->input->post('dc');
					$idNodo = $this->input->post('nodo');
					$cmresponsable=$this->a->cm($idNodo);
					$comentario = $this->input->post('comentario');
					$guardar = $this->input->post('guardar');
					$aprovacion = $this->input->post('aprovacion');
					$dise = $this->input->post('dise');
					
					
					
					for($i=0;$i<1;$i++){
						$idcm=$cmresponsable['id_usuario'];
					
					
						}
						$info['id_dc'] = $idDc;
						$info['id_campana'] = $idCampana;
						$info['id_gc']=$gclogeado;
						$info['descripcion'] = $contenido;
				//		$info['imagen'] = $_FILES['fileimagen']['name'];
						$info['comentario']=$comentario;
						$info['id_cm']=$idcm;
						$info['id_nodo']=$idNodo;	
						
						$result=$this->a->pub_dis($info);
				
						echo json_encode($result);
						
						
						
						}			

	function actualizar(){
		$result = $this->a->actualizar();
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
				$msg['success'] = true;
			}
			echo json_encode($msg);
		
	}
	function mostrar_save(){
		$result=$this->a->mostrar_save();
		echo json_encode($result);

	}
	function eliminar_save(){
		$result=$this->a->eliminar_save();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
		

	}
	
}