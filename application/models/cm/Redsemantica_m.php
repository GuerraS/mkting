<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redsemantica_m extends CI_Model {
	function mostrar(){
		$idCampana = $this->input->get('id');
		
        $query=$this->db->query("SELECT e.id, e.nombre, e.apaterno, tu.tipo, r.nodo  
		FROM tipo_usuario tu 
		INNER JOIN empleado e ON tu.id=e.idTipo_usuario 
		INNER JOIN empleado_nodo en ON e.id=en.id_empleado 
		INNER JOIN red r ON en.id_nodo=r.id_red WHERE r.id_campana='$idCampana'");
		
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}


    }
    function mostrarnodopadre(){
        $idcampana = $this->input->get('id');
        $query=$this->db->query("SELECT * FROM campaña WHERE id='$idcampana'");
        if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}  
    }
    function agregarred(){
        $cmlogeado= $this->session->userdata('id');
        $idcampana = $this->input->get('id');
        $nodopadre = $this->input->get('nodopadre');
        $nombrenodo = $this->input->get('nombrenodo');
        

            $this->db->set('id_campana', $idcampana);
			$this->db->set('nodo', $nombrenodo);
            $this->db->set('id_usuario', $cmlogeado);
            $this->db->set('id_padre', $nodopadre);
			$this->db->insert('red');
        
        
            if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
  
    }
    function selectnodos(){
        $idcampana = $this->input->get('id');
        $query=$this->db->query("SELECT * FROM red WHERE id_campana='$idcampana'");
        if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}

    }
    function selectnodosAasignar(){
        $idcampana = $this->input->get('id');
        $query=$this->db->query("SELECT * FROM red WHERE id_campana='$idcampana' AND id_padre=0");
        if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}


    }
    function Asignar_Empleado_Nodo(){
        //Se obtiene el id de la empresa a la que pertenece el CM logeado
		//Para posterioremnte EL resultado utilizarlo en la ocnsulta para mostrar comunitys y campañas
		$cmlogeado= $this->session->userdata('id');
		$nodo= $this->session->userdata('nodo');
		$query=$this->db->query("SELECT idEmpresa FROM empleado_empresa WHERE idEmpelado='$cmlogeado'");
		$temp=$query->row_array();
		$idEmpresaActual=$temp['idEmpresa'];
		//Se obtiene el id de la campaña actual por metodo get
		$idCampana = $this->input->get('id');
		$idNodo = $this->input->get('nodo');

		//SE muestran las campañas de la empresa(admin logeado)
		$query = $this->db->query("SELECT e.id, e.nombre, e.apaterno, tu.tipo 
		FROM tipo_usuario tu INNER JOIN empleado e ON tu.id= e.idTipo_usuario 
		INNER JOIN empleado_campaña ec ON e.id=ec.idEmpelado 
		WHERE ec.idCampaña='$idCampana' AND e.idTipo_usuario!=3 AND 
		NOT EXISTS (SELECT * FROM empleado_nodo en INNER JOIN red r ON en.id_nodo = r.id_red 
		WHERE r.id_campana='$idCampana' AND en.id_nodo='$idNodo' AND en.id_empleado=e.id )");

				
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}


	}
	function Asignar_Empleado(){
        //Se obtiene el id de la empresa a la que pertenece el CM logeado
		//Para posterioremnte EL resultado utilizarlo en la ocnsulta para mostrar comunitys y campañas
		/* $cmlogeado= $this->session->userdata('id');
		$idcampana = $this->input->get('id'); */
		
        $nodo = $this->input->get('NodoAsignar');
        $empleado = $this->input->get('EmpleadoNodo');
        

            $this->db->set('id_empleado', $empleado);
			$this->db->set('id_nodo', $nodo);
			$this->db->insert('empleado_nodo');
        
        
            if($this->db->affected_rows() > 0){
				return $nodo;
			}else{
				return false;
			}
    }
    


}