<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Model {

	public function mostrar() {
		//Empresa del admin logeado
		$cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
		
		$query = $this->db->query("SELECT e.id, e.nombre,e.apaterno,e.amaterno,e.telefono,e.email,e.usuario,e.contraseña,tu.tipo 
		FROM empleado_empresa ee INNER JOIN empleado e ON ee.idEmpelado=e.id 
		INNER JOIN tipo_usuario tu ON e.idTipo_usuario = tu.id WHERE ee.idEmpresa='$idEmpresaActual'
		AND e.idTipo_usuario !=2 AND e.idTipo_usuario !=3
		");
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function insertar(){
		$cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];

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


			$query=$this->db->query("SELECT id FROM empleado WHERE id=(SELECT MAX(id) AS id FROM empleado)");
			$temp=$query->result_array()[0];
			$lastEmpleado=$temp['id'];
			

			$this->db->set('idEmpresa', $idEmpresaActual);
			$this->db->set('idEmpelado', $lastEmpleado);
			$this->db->insert('empleado_empresa');
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
	function editar($id){
		
		$this->db->where('id', $id);
		$query = $this->db->get('empleado');
		if($query->num_rows() > 0){
			return $query->row_array();
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
			'idTipo_usuario'=>$this->input->post('tipo'),
			'fechainicio'=>date('Y-m-d'),
			
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
		$this->db->where('idEmpelado', $id);
		$this->db->delete('empleado_empresa');


		$this->db->where('id', $id);
		$this->db->delete('empleado');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}
}