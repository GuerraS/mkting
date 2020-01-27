<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignar_tareas_m extends CI_Model {
	function mostrarnodos(){
		$idCampana = $this->input->get('idcampana');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT r.id_red, r.nodo FROM red r WHERE r.id_campana='$idCampana'");	
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	function mostrarnodostareasasignadas(){
		$idCampana = $this->input->get('idcampana');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT r.id_red, r.nodo FROM tareas t INNER JOIN red r on t.id_nodo=r.id_red WHERE t.id_campana='$idCampana' GROUP BY r.id_red");	
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	function mostrarcm(){
		$idCampana = $this->input->get('idcampana');
		$idNodo = $this->input->get('idNodo');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT e.id, e.nombre, e.apaterno FROM empleado e INNER JOIN empleado_nodo en ON e.id=en.id_empleado 
		INNER JOIN red r ON en.id_nodo=r.id_red WHERE e.idTipo_usuario=5 AND r.id_campana='$idCampana' AND r.id_red='$idNodo'");	
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	function mostrartareasasignadas(){
		$idCampana = $this->input->get('idcampana');
		$idNodo = $this->input->get('idNodo');
		$id_gc = $this->input->get('id_gc');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT * FROM tareas t WHERE t.id_campana ='$idCampana' AND t.id_nodo='$idNodo' AND t.id_gc = '$id_gc' 
		AND statuscm=0 AND statusgc=1  AND statusdc=0 AND statusrech=0 AND statusrev=0
		");	
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	function insertar_tarea($info){
		
		$cmlogeado= $this->session->userdata('id');
        $this->db->insert("tareas",$info);
		if($this->db->affected_rows() > 0){
			
			return true;
		}else{
			return false;
		}
	}
	function mostrarnodosenviadosdisenador(){
		$idCampana = $this->input->get('idcampana');
		$gclogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT r.id_red, r.nodo 
		FROM pub_dise p 
		INNER JOIN red r ON p.id_nodo=r.id_red 
		WHERE P.id_campana='$idCampana' AND P.id_gc='$gclogeado' AND p.estatus=0 GROUP BY r.id_red
		");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
	}
	function mostra_tareas_enviadas_a_revision(){
		$idCampana = $this->input->get('idcampana');
		$idNodo = $this->input->get('idNodo');
		
		 $id_cm= $this->session->userdata('id');
        $query=$this->db->query("SELECT * FROM tareas t INNER JOIN empleado e ON t.id_gc=e.id 
		WHERE t.id_campana ='$idCampana' AND t.id_nodo='$idNodo' AND t.id_cm = '$id_cm' 
		AND statuscm=1 AND statusgc=0 AND statusdc=0  AND statusrech=0 AND statusrev=1");
		if($query->num_rows() > 0){
			return $query->result_array();
		}else{
			return false;
		}                    

	}

}
    