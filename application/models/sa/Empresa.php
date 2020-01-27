<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Model {

	public function mostrar() {
		
		$query=$this->db->query("SELECT er.id, razon_social, er.rfc, fecha_creacion, er.fecha_termino, telefono_contacto, email_contacto, emp.nombre, emp.apaterno FROM empresa er INNER JOIN empleado_empresa ee ON er.id = ee.idEmpresa INNER JOIN empleado emp ON ee.idEmpelado = emp.id
		where emp.idTipo_usuario=2");
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
		//Consulta para el llenar select del admin seleccionado y los admin disponibles
		//Llenar el array con los datos
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
		$query=$this->db->query("SELECT id, id_admin FROM empresa WHERE id=(SELECT MAX(id) AS id FROM empresa)");
		$temp=$query->result_array()[0];
		$idtemp=$temp['id'];
		$id_admintemp=$temp['id_admin'];
			$nombre=$this->input->post('nombre');
			$status=1;
			$telefono=$this->input->post('tel');
			$email=$this->input->post('email');
			$idTipo_usuario=$this->input->post('tipo');
			$data = array(
				'status' => $status
			);
			$this->db->where('id', $idTipo_usuario);
			$this->db->update('empleado', $data);
			$fechainicio=date('Y-m-d');
			
			
			$this->db->set('razon_social', $nombre);
			
			$this->db->set('email_contacto', $email);
			$this->db->set('telefono_contacto', $telefono);
			$this->db->set('id_admin', $idTipo_usuario);
			$this->db->set('fecha_creacion', $fechainicio);
			
			$this->db->insert('empresa');
			if($this->db->affected_rows() > 0){
				$this->db->set('idEmpresa', $idtemp);
			$this->db->set('idEmpelado', $id_admintemp);
			$query=$this->db->insert('empleado_empresa');


				return true;
			}else{
				return false;
			}
			//Se actualiza el status de la tabla empleado
			

			//Se insertan las llaves de empleado y empresa en el detalle empleado_empresa,
			
			

			

			

			
			
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
		$query = $this->db->get('empresa');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
		
	}
	function actualizar(){
		$id = $this->input->post('id');
 
		//Se obtiene el id de admin del select y el id del admin de la empresa que se selecciono para editar
		$status=1;
		$status2=0;
		$query=$this->db->query("SELECT * FROM empresa where id='$id'");
		$tempid=$query->row_array();
		$idadminempresa=$tempid['id_admin'];
		$id_adminempleado = $this->input->post('tipo');
		$cont=0;
		
			
			$data = array(
				'status' => $status2
			);
			$this->db->where('id',$idadminempresa);
			$this->db->update('empleado', $data);
			if($this->db->affected_rows() > 0){
				print('Consulta 1 hecha');
				$cont=$cont+1;
			}
			$data2 = array(
				'status' => $status
			);
			$this->db->where('id', $id_adminempleado);
			$this->db->update('empleado', $data2);
			if($this->db->affected_rows() > 0){
				print('Consulta 2 hecha');
				$cont=$cont+1;
			}
			
			$field = array(
				'idEmpelado'=>$this->input->post('tipo')
			);
			$this->db->where('idEmpresa', $id);
			$this->db->update('empleado_empresa', $field);
			if($this->db->affected_rows() > 0){
				print('Consulta 3 hecha');
				$cont=$cont+1;
			}
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
				
				$cont=$cont+1;
			}
			if($cont == 4 || $cont == 2){
				
				return true;
			}else{
				return false;
			}
			
		//Hacer el update de la empresa
		
		
	}
	function eliminar(){
		$id = $this->input->get('id');
		$query=$this->db->query("SELECT * FROM empresa where id='$id'");
		$tempid=$query->row_array();
		$idadminempresa=$tempid['id_admin'];
		$status=0;

		
		$data2 = array(
			'status' => $status
		);
		$this->db->where('id', $idadminempresa);
		$this->db->update('empleado', $data2);

		$this->db->where('idEmpresa', $id);
		$this->db->delete('empleado_empresa');

		$this->db->where('id', $id);
		$this->db->delete('empresa');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		
	}
}