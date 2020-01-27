<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear_m extends CI_Model {
	function mostrarnodo(){
		$idCampana = $this->input->get('id');
		$gclogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT r.id_red,r.nodo FROM empleado_nodo en 
		INNER JOIN red r ON en.id_nodo = r.id_red 
		WHERE r.id_campana='$idCampana' AND en.id_empleado='$gclogeado'");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
	}
	function enviardisenador($info){
		$this->db->insert('pub_dise',$info);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}

	}
	function mostrarnodopendientes(){
		$idCampana = $this->input->get('idcampana');
		$gclogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT r.id_red,r.nodo FROM preautorizacion p 
		INNER JOIN red r ON p.id_nodo=r.id_red WHERE r.id_campana='$idCampana' AND p.id_gc='$gclogeado' group by r.nodo");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
	}
	function mostrardiseñadores(){
		$idCampana = $this->input->post('idCampana');
		$idNodo = $this->input->post('idNodo');
        $query=$this->db->query("SELECT e.id, e.nombre FROM empleado_campaña ec 
		INNER JOIN empleado e ON ec.idEmpelado=e.id 
		INNER JOIN empleado_nodo en ON e.id=en.id_empleado 
		WHERE ec.idCampaña='$idCampana' AND en.id_nodo='$idNodo' AND e.idTipo_usuario=4");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
	}
	function guardar($info){
			$this->db->insert('pub_save',$info);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
	}
	
	function aprovacion($info){
		$this->db->insert('preautorizacion',$info);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
}
function pub_dise($info,$id_publicacion){
	$this->db->insert('pub_dise',$info);
	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}
	function cm($idNodo){
		$gclogeado= $this->session->userdata('id');
		$query=$this->db->query("SELECT id_usuario FROM red r 
		INNER JOIN empleado_nodo en on r.id_red=en.id_nodo 
		WHERE r.id_red='$idNodo' and en.id_empleado='$gclogeado'");	
		if($query->num_rows() > 0){
			
			return $query->result_array()[0];
		}else{
			return false;
		}


		
        
	}
	function updatecontenido($info,$id_publicacion){
		$this->db->where('id_publicacion',$id_publicacion);
	 $this->db->update('pub_save', $info);
	 if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
	}
	
	function mostrar_save(){
		$id_publicacion = $this->input->get('id');
		$this->db->where('id_publicacion',$id_publicacion);
        $query = $this->db->get('pub_save');

        return $query->result_array()[0];
		



	}
	function mostrar_pendientes(){
		$idCampana = $this->input->get('idcampana');
		$idnodo = $this->input->get('idnodo');
		
		$this->db->where('id_campana',$idCampana);
		$this->db->where('id_nodo',$idnodo);
        $query = $this->db->get('preautorizacion');
        return $query->result_array();
	}
	function eliminar_save(){
		$id_publicacion = $this->input->get('id');
		$this->db->where('id_publicacion',$id_publicacion);
        $this->db->delete('pub_save');

        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		



	}
	function rechazar($info,$id_preautorizacion){
        $this->db->where('id_preautorizacion',$id_preautorizacion);
	 $this->db->update('preautorizacion', $info);
        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function publicar($info,$id_preautorizacion){
		$this->db->insert('publicaciones',$info);
		
		$this->db->where('id_preautorizacion',$id_preautorizacion);
        $this->db->delete('preautorizacion');
        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function publicartarea($info){
		$this->db->insert('publicaciones',$info);
		
		
        if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
}
    