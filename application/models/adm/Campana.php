<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campana extends CI_Model {

	public function mostrar() {
		$admlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT C.id, C.nombre, C.objetivo, C.fecha_inicio,C.fecha_fin 
		FROM campaña C 
		INNER JOIN empresa E ON C.id_empresa=E.id 
		where E.id_admin='$admlogeado'");
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	//
	public function mostrarnuevo() {
		//Muestra en el select de nueva emrpesa los administradores disponibles
		$query = $this->db->query("SELECT * FROM `empleado` WHERE status=0 and idTipo_usuario = 2");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	//Consulta para mostrar datos en el select de editar
	public function mostrareditar() {
		$id = $this->input->get('id');
		$query = $this->db->query("SELECT er.id_admin as id, emp.nombre, emp.apaterno FROM empresa er 
		INNER JOIN empleado_empresa ee ON er.id = ee.idEmpresa 
		INNER JOIN empleado emp ON ee.idEmpelado = emp.id where er.id='$id'
		");
		$query2 = $this->db->query("SELECT id, nombre, apaterno FROM `empleado` WHERE status=0 and idTipo_usuario = 2");
		//Llenar el array con la consulta del admin seleccionado y los admin disponibles
		if($query->num_rows() > 0 && $query2->num_rows() > 0){
			foreach($query->result() as $row){
				$temp[]=$row;
				
			}
			foreach($query2->result() as $row){
				$temp[]=$row;
				
			}
		
			
			return $temp;
		}else{
			return false;
		}
	}
	public function insertar(){
		$adminLogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT id FROM empresa WHERE id_admin=$adminLogeado");
		$temp=$query->row_array();
		$idTemp=$temp['id'];
		//Insertar nuevo a tabla campaña
			
			$nombre=$this->input->post('nombre');
			$objetivo=$this->input->post('objetivo');
			$finicio=date('Y-m-d');
			$ffinal=$this->input->post('ffinal');
			$id_empresa=$this->input->post('tipo');
			
			$this->db->set('nombre', $nombre);
			$this->db->set('objetivo', $objetivo);
			
			$this->db->set('fecha_inicio', $finicio);
			$this->db->set('fecha_fin', $ffinal);
			$this->db->set('id_empresa', $idTemp);
			$this->db->insert('campaña');

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
		$query = $this->db->get('campaña');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
		
	}
	function actualizar(){
		$id = $this->input->post('id');
 		//Se obtiene el id de admin del select y el id del admin de la empresa que se selecciono para editar
		
			$field2 = array(
				'razon_social'=>$this->input->post('nombre'),
				'rfc'=>$this->input->post('rfc'),
				'telefono_contacto'=>$this->input->post('tel'),
				'email_contacto'=>$this->input->post('email'),
				'id_admin'=>$this->input->post('tipo'),
				'fecha_termino'=>$this->input->post('ffinal')
			);
			$this->db->where('id', $id);
			$this->db->update('empresa', $field2);
			if($this->db->affected_rows() > 0){
				print('Consulta 4 hecha');
				$cont=$cont+1;
			}
			if($cont == 4 || $cont == 2){
				
				return true;
			}else{
				return false;
			}
	}
	function eliminar(){
		$id = $this->input->get('id');
		$query=$this->db->query("SELECT * FROM empresa where id='$id'");
		$tempid=$query->row_array();
		$idadminempresa=$tempid['id_admin'];
		$status=0;

		
		

		$this->db->where('id', $id);
		$this->db->delete('campaña');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}
}