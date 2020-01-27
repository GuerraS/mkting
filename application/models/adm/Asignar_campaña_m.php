<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_campaña_m extends CI_Model {

	public function mostrar() {
		//Se obtiene el id de la empresa a la que pertenece el administrador logeado
		//Para posterioremnte EL resultado utilizarlo en la ocnsulta para mostrar comunitys y campañas
		$adminLogeado= $this->session->userdata('id');
		$query2=$this->db->query("SELECT id FROM empresa WHERE id_admin=$adminLogeado");
		$temp=$query2->row_array();
		$idTemp=$temp['id'];

		//SE muestran las campañas de la empresa(admin logeado)
		$query = $this->db->query("SELECT em.id,em.nombre, em.apaterno, cam.nombre nombre_campana FROM campaña cam 
		INNER JOIN empleado_campaña ec ON cam.id=ec.idCampaña 
		INNER JOIN empleado em on EC.idEmpelado=EM.id WHERE cam.id_empresa='$idTemp'and em.idTipo_usuario=3");

				
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function asignar_campana(){
		$adminLogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT id FROM empresa WHERE id_admin='$adminLogeado'");
		$temp=$query->row_array();
		$idTemp=$temp['id'];
		$status=1;

		
			//Se obtiene el id de campaña y cm para posteriormente hacer el insert
			$campana=$this->input->post('campana');
			$cm=$this->input->post('cm');

			



			//Insertar nuevo a tabla empleado_campaña
			$this->db->set('idEmpelado', $cm);
			$this->db->set('idCampaña', $campana);
			$this->db->insert('empleado_campaña');

			if($this->db->affected_rows() > 0){
				//Se crea la red semantica
				
				//Si se logra el insert se realiza el update del status del emppleado
				$data = array(
					'status' => $status
				);
				$this->db->where('id', $cm);
				$this->db->update('empleado', $data);
				
				return true;
			}else{
				return false;
			}

			
	}
	//mostrar campañas en asignacion de capañas
	public function mostrarcampana() {
		//se selecciona el admin logeado para despues mostrar las campañas creadas por ese admin
		
        $adminLogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT id FROM empresa WHERE id_admin=$adminLogeado");
		$temp=$query->row_array();
        $idTemp=$temp['id'];
        
		//Muestra en el select de asignacion de campaña los nombres
		$query = $this->db->query("SELECT c.nombre, c.id FROM campaña c 
		WHERE c.id_empresa='$idTemp' and c.id NOT IN 
		(SELECT c.id FROM campaña c INNER JOIN empleado_campaña ec ON c.id = ec.idCampaña 
		WHERE c.id_empresa='$idTemp')
		");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	//mostrar campañas en asignacion de capañas
	public function mostrarcm(){
		//se selecciona el admin logeado para despues mostrar las campañas creadas por ese admin
        $adminLogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT id FROM empresa WHERE id_admin=$adminLogeado");
		$temp=$query->row_array();
        $idTemp=$temp['id'];
        
		//Muestra en el select de asignacion de campaña los nombres
		$query = $this->db->query("SELECT em.id, nombre, apaterno FROM empleado em 
		INNER JOIN empleado_empresa ee ON em.id=ee.idEmpelado 
		INNER JOIN empresa ep ON ee.idEmpresa=ep.id WHERE em.idTipo_usuario=3 and ep.id_admin='$adminLogeado' ");
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
			$finicio=$this->input->post('finicio');
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
	public function campanas_asignadas() {
		//Se obtiene el id de la empresa a la que pertenece el administrador logeado
		//Para posterioremnte EL resultado utilizarlo en la ocnsulta para mostrar comunitys y campañas
		$adminLogeado= $this->session->userdata('id');
		$query2=$this->db->query("SELECT id FROM empresa WHERE id_admin=$adminLogeado");
		$temp=$query2->row_array();
		$idTemp=$temp['id'];

		//SE muestran las campañas de la empresa(admin logeado)
		$query = $this->db->query("SELECT c.id, c.nombre,c.objetivo,c.fecha_inicio FROM campaña c 
		INNER JOIN empleado_campaña ec ON c.id=ec.idCampaña 
		INNER JOIN empleado e ON EC.idEmpelado = e.id 
		INNER JOIN tipo_usuario ti ON e.idTipo_usuario=ti.id WHERE e.id=31");

				
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
}