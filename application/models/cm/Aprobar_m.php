        <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprobar_m extends CI_Model {
	function mostrarnodos(){
		$idCampana = $this->input->get('idcampana');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT  r.id_red, r.nodo 
        FROM preautorizacion p INNER JOIN red r ON p.id_nodo=r.id_red 
        WHERE P.id_campana='$idCampana' AND P.id_cm='$cmlogeado' AND p.estatus=0 GROUP BY r.id_red ");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
	}
	function mostrarnodospublicadas(){
		$idCampana = $this->input->get('idcampana');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT  r.id_red, r.nodo 
        FROM publicaciones p INNER JOIN red r ON p.id_nodo=r.id_red 
        WHERE P.id_campana='$idCampana' AND P.id_cm='$cmlogeado' GROUP BY r.id_red");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
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
	function mostrarnodosenviadosdisenador2(){
		$idCampana = $this->input->get('idcampana');
		$gclogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT r.id_red, r.nodo 
		FROM pub_dise p 
		INNER JOIN red r ON p.id_nodo=r.id_red 
		WHERE P.id_campana='$idCampana' AND P.id_gc='$gclogeado' AND p.estatus=1 GROUP BY r.id_red
		");	
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

	function mostrarpreautorizacion(){
		$idCampana = $this->input->get('idcampana');
		$idNodo = $this->input->get('idnodo');
		$cmlogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT p.id_preautorizacion,e.nombre, e.apaterno, p.descripcion,p.fileimagen,p.comentario 
		FROM empleado e INNER JOIN preautorizacion p ON e.id=p.id_gc 
		WHERE p.id_nodo='$idNodo' AND p.id_campana='$idCampana' AND p.estatus=0");	
		if($query->num_rows() > 0){
			
			return $query->result_array();
		}else{
			return false;
		}
		
	
	
	
}
function mostrarautorizadas(){
	$idCampana = $this->input->get('idcampana');
	$idNodo = $this->input->get('idnodo');
	$query=$this->db->query("SELECT p.id_preautorizacion,e.nombre, e.apaterno, p.descripcion,p.fileimagen,p.comentario 
		FROM empleado e INNER JOIN preautorizacion p ON e.id=p.id_gc 
		WHERE p.id_nodo='$idNodo' AND p.id_campana='$idCampana'");
		
	if($query->num_rows() > 0){
		
		return $query->result_array();
	}else{
		return false;
	}
	



}
function form_preaut(){
	$idpre = $this->input->get('id_preautorizacion');
	$idNodo = $this->input->get('idnodo');
	$cmlogeado= $this->session->userdata('id');
	$query=$this->db->query("SELECT * FROM preautorizacion WHERE id_preautorizacion='$idpre'");	
	if($query->num_rows() > 0){
		
		return $query->result_array()[0];
	}else{
		return false;
	}
}
function mostrarpublicadas(){
	$idCampana = $this->input->get('idcampana');
	$idNodo = $this->input->get('idnodo');
	$query=$this->db->query("SELECT * FROM empleado e INNER JOIN publicaciones p ON e.id= p.id_gc INNER JOIN red r ON p.id_nodo = r.id_red WHERE p.id_campana ='$idCampana' AND p.id_nodo ='$idNodo'
	");	

	 if($this->db->affected_rows() > 0){
		return $query->result_array();
	}else{
		return false;
	}

}
function contenido_gc_a_dc(){
	$id_gc= $this->session->userdata('id');
	$idCampana = $this->input->get('idcampana');
	$idNodo = $this->input->get('idnodo');
	$query=$this->db->query("SELECT * FROM pub_dise pd 
	INNER JOIN empleado e on pd.id_dc=e.id 
	WHERE pd.id_campana ='$idCampana' AND pd.id_nodo='$idNodo' 
	AND pd.estatus=0 
	");	

	 if($this->db->affected_rows() > 0){
		return $query->result_array();
	}else{
		return false;
	}

}
function contenido_dc_a_gc(){
	$id_dc= $this->session->userdata('id');
	$idCampana = $this->input->get('idcampana');
	$idNodo = $this->input->get('idnodo');
	$query=$this->db->query("SELECT * FROM pub_dise pd 
	INNER JOIN empleado e on pd.id_dc=e.id 
	WHERE pd.id_campana ='$idCampana' AND pd.id_nodo='$idNodo' 
	AND pd.estatus=1 
	");	

	 if($this->db->affected_rows() > 0){
		return $query->result_array();
	}else{
		return false;
	}

}

}
    