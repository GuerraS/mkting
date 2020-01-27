<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_campaña_m extends CI_Model {

	public function mostrar() {
		//Se obtiene el id de la empresa a la que pertenece el CM logeado
		//Para posterioremnte EL resultado utilizarlo en la ocnsulta para mostrar comunitys y campañas
		$cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
		//Se obtiene el id de la campaña actual por metodo get
		$id = $this->input->get('id');

		//SE muestran las campañas de la empresa(admin logeado)
		$query = $this->db->query("SELECT e.id, e.nombre, e.apaterno, ti.tipo FROM empleado_campaña ec 
		INNER JOIN empleado e ON EC.idEmpelado = e.id INNER JOIN tipo_usuario ti ON e.idTipo_usuario=ti.id 
		WHERE ec.idCampaña='$id' AND e.id NOT IN(SELECT e.id FROM empleado WHERE e.id='$cmlogeado' ) ");

				
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	//Funcion para asignar campañas al dc
	public function asignar_campanadc(){
		$cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
		$status=1;

		
			//Se obtiene el id de campaña y cm para posteriormente hacer el insert
			$campanadc=$this->input->post('campanadc');
			$dc=$this->input->post('dc');
			//Insertar nuevo a tabla empleado_campaña
			$this->db->set('idEmpelado', $dc);
			$this->db->set('idCampaña', $campanadc);
			$this->db->insert('empleado_campaña');

			if($this->db->affected_rows() > 0){
				//Si se logra el insert se realiza el update del status del emppleado
				$data = array(
					'status' => $status
				);
				$this->db->where('id', $dc);
				$this->db->update('empleado', $data);
				
				return true;
			}else{
				return false;
			}

			
	}
		//Funcion para asignar campañas al gc
	public function asignar_campanagc(){
		$cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
		$status=1;

		
			//Se obtiene el id de campaña y cm para posteriormente hacer el insert
			$campanagc=$this->input->post('campanagc');
			$gc=$this->input->post('gc');
			//Insertar nuevo a tabla empleado_campaña
			$this->db->set('idEmpelado', $gc);
			$this->db->set('idCampaña', $campanagc);
			$this->db->insert('empleado_campaña');

			if($this->db->affected_rows() > 0){
				//Si se logra el insert se realiza el update del status del emppleado
				$data = array(
					'status' => $status
				);
				$this->db->where('id', $gc);
				$this->db->update('empleado', $data);
				
				return true;
			}else{
				return false;
			}

			
	}
	
	//mostrar campañas para asignar a dc
	public function mostrarcampanadc() {
		//se selecciona el cm logeado para despues mostrar las campañas creadas por ese admin
		
        $cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
        
		//Muestra en el select de asignacion de campaña los nombres
		$query = $this->db->query("SELECT c.id, c.nombre FROM campaña c INNER JOIN empleado_campaña ec ON c.id=ec.idCampaña 
		INNER JOIN empleado e ON EC.idEmpelado = e.id INNER JOIN tipo_usuario ti ON e.idTipo_usuario=ti.id 
		WHERE e.id=$cmlogeado");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	//mostrar campañas para asignar a gc
	public function mostrarcampanagc() {
		//se selecciona el cm logeado para despues mostrar las campañas creadas por ese admin
		
        $cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
        
		//Muestra en el select de asignacion de campaña los nombres
		$query = $this->db->query("SELECT c.id, c.nombre FROM campaña c INNER JOIN empleado_campaña ec ON c.id=ec.idCampaña 
		INNER JOIN empleado e ON EC.idEmpelado = e.id INNER JOIN tipo_usuario ti ON e.idTipo_usuario=ti.id 
		WHERE e.id=$cmlogeado");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	//mostrar campañas en asignacion de capañas dc
	public function mostrardc(){
		//se selecciona el cm logeado para despues mostrar las campañas creadas por ese admin
		$cmlogeado= $this->session->userdata('id');
		$campana=$this->input->get('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
        
		//Muestra en el select de asignacion de campaña los nombres
		$query = $this->db->query("SELECT e.nombre, e.apaterno, e.id FROM empleado e 
		INNER JOIN empleado_empresa ee ON e.id=ee.idEmpelado WHERE e.idTipo_usuario=4 AND ee.idEmpresa='$idEmpresaActual' and 
		NOT EXISTS(SELECT ec.id FROM empleado_campaña ec 
		WHERE ec.idCampaña='$campana' AND ec.idEmpelado=e.id)");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
		
	}
		//mostrar campañas en asignacion de capañas gc
	public function mostrargc(){
		//se selecciona el cm logeado para despues mostrar las campañas creadas por ese admin
		$cmlogeado= $this->session->userdata('id');
		$campana=$this->input->get('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
        
		//Muestra en el select de asignacion de campaña los nombres
		$query = $this->db->query("SELECT e.nombre, e.apaterno, e.id FROM empleado e 
		INNER JOIN empleado_empresa ee ON e.id=ee.idEmpelado WHERE e.idTipo_usuario=5 AND ee.idEmpresa='$idEmpresaActual' and 
		NOT EXISTS(SELECT ec.id FROM empleado_campaña ec 
		WHERE ec.idCampaña='$campana' AND ec.idEmpelado=e.id)");
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	function mostrarnodopadre(){
        $idcampana = $this->input->get('id');

        

        $query=$this->db->query("SELECT * FROM campaña WHERE id='$idcampana'");
        if($query->num_rows() > 0){
			return $query->result_array()[0];
		}else{
			return false;
		}
        

        
    }
	//Metodo para llenar el select para mostrar empleados asignados a campañas
	public function selectcampana($cmlogeado) {
		//se selecciona el cm logeado para despues mostrar las campañas creadas por ese admin
		$query = $this->db->query("SELECT c.id, c.nombre FROM campaña c 
		INNER JOIN empleado_campaña ec ON c.id=ec.idCampaña 
		WHERE ec.idEmpelado='$cmlogeado'");
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function campanas($cm) {
		//se selecciona el cm logeado para despues mostrar las campañas creadas por ese admin
		$query = $this->db->query("SELECT c.id, c.nombre FROM campaña c 
		INNER JOIN empleado_campaña ec ON c.id=ec.idCampaña
		WHERE ec.idEmpelado='$cm'");
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	//Mostrar campañas asignadas al comunity manager
	public function campanas_asignadas() {
		//Se obtiene el id de la empresa a la que pertenece el administrador logeado
		//Para posterioremnte EL resultado utilizarlo en la ocnsulta para mostrar comunitys y campañas
		$cmlogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];

		//SE muestran las campañas de la empresa(admin logeado)
		$query = $this->db->query("SELECT c.id, c.nombre,c.objetivo,c.fecha_inicio FROM campaña c 
		INNER JOIN empleado_campaña ec ON c.id=ec.idCampaña 
		INNER JOIN empleado e ON EC.idEmpelado = e.id 
		INNER JOIN tipo_usuario ti ON e.idTipo_usuario=ti.id WHERE e.id='$cmlogeado'");

				
		if($query->num_rows() > 0){
			return $query->result_array();
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
}