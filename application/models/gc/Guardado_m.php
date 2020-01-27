<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guardado_m extends CI_Model {
	function mostrar(){
		$idCampana = $this->input->get('idcampana');
		$gclogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT ps.id_publicacion,c.nombre,ps.descripcion,ps.comentario,ps.imagen 
        FROM campaña c INNER JOIN pub_save ps ON c.id=ps.id_campana 
        WHERE ps.id_campana='$idCampana' AND ps.id_gc='$gclogeado'");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
	}
	function mostrarnodos(){
		$idCampana = $this->input->get('idcampana');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT  r.id_red, r.nodo 
        FROM preautorizacion p INNER JOIN red r ON p.id_nodo=r.id_red 
        WHERE P.id_campana='$idCampana' AND P.id_cm='$cmlogeado' GROUP BY r.id_red");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
	}
	function cont_save($id){
		$query=$this->db->query("SELECT * FROM campaña c 
		INNER JOIN pub_save ps ON c.id=ps.id_campana 
		INNER JOIN red r ON ps.id_nodo=r.id_red WHERE ps.id_publicacion='$id'");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}


	}
	function editar(){
		$id = $this->input->get('id');
		$this->db->where('id_publicacion', $id);
		$query = $this->db->get('pub_save');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}
	function editar_publicaciones_guardadas($id){
		$query=$this->db->query("SELECT * FROM campaña c 
		INNER JOIN pub_save ps ON c.id=ps.id_campana 
		INNER JOIN red r ON ps.id_nodo=r.id_red WHERE ps.id_publicacion='$id'");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
		

	}
	
	
}
    