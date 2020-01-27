<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Model {

	public function mostrar() {
		
		$query = $this->db->query("SELECT * FROM empleado WHERE idTipo_usuario=2");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function insertar(){
		$nombre=$this->input->post('nombre');
			$apaterno=$this->input->post('apaterno');
			$amaterno=$this->input->post('amaterno');
			
			$telefono=$this->input->post('tel');
			$email=$this->input->post('email');
			$usuario=$this->input->post('user');
			$contraseña=$this->input->post('pass');
			$idTipo_usuario=$this->input->post('tipo');
			$fechainicio=date('Y-m-d');
			
			

			$this->db->set('nombre', $nombre);
			$this->db->set('apaterno', $apaterno);
			$this->db->set('amaterno', $amaterno);
			
			$this->db->set('email', $email);
			$this->db->set('usuario', $usuario);
			$this->db->set('contraseña', $contraseña);
			$this->db->set('idTipo_usuario', $idTipo_usuario);
			$this->db->set('fechainicio', $fechainicio);
			
			$this->db->insert('empleado');
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		// $field = array(
		// 	'nombre'=>$this->input->post('nombre'),
		// 	'apaterno'=>$this->input->post('apaterno'),
		// 	'amaterno'=>$this->input->post('amaterno')
			
		// 	);
		// $this->db->insert('empleado',$field);

	}
	function editar(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('empleado');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
		
	}
	function actualizar(){
		$id = $this->input->post('id');
		$field = array(
			'nombre'=>$this->input->post('nombre'),
			'apaterno'=>$this->input->post('apaterno'),
			'amaterno'=>$this->input->post('amaterno'),
		
			'telefono'=>$this->input->post('tel'),
			'email'=>$this->input->post('email'),
			'usuario'=>$this->input->post('user'),
			'contraseña'=>$this->input->post('pass'),
			'idTipo_usuario'=>$this->input->post('tipo')
			
			
		);
		$this->db->where('id', $id);
		$this->db->update('empleado', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}
	function eliminar(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('empleado');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}
}