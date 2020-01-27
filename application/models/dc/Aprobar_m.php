        <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aprobar_m extends CI_Model {
	function mostrarnodos(){
		$idCampana = $this->input->get('idcampana');
		$dclogeado= $this->session->userdata('id');
        $query=$this->db->query("SELECT  r.id_red, r.nodo 
        FROM pub_dise p INNER JOIN red r ON p.id_nodo=r.id_red 
        WHERE P.id_campana='$idCampana' AND P.id_dc='$dclogeado' GROUP BY r.id_red");	
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
		WHERE p.id_nodo='$idNodo' AND p.id_campana='$idCampana'");	
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
function form_dis(){
	$idpub = $this->input->get('id_pub_dise');
	$idNodo = $this->input->get('idnodo');
	$cmlogeado= $this->session->userdata('id');
	$query=$this->db->query("SELECT * FROM pub_dise WHERE id_pub_dise='$idpub'");	
	if($query->num_rows() > 0){
		
		return $query->result_array()[0];
	}else{
		return false;
	}
}
function mostrar_pub_diseñador(){
	$id_dc= $this->session->userdata('id');
	$idCampana = $this->input->get('idcampana');
	$idNodo = $this->input->get('idnodo');
	$query=$this->db->query("SELECT * FROM pub_dise pd INNER JOIN empleado e on pd.id_gc=e.id WHERE pd.id_campana ='$idCampana' AND pd.id_nodo='$idNodo' 
	AND pd.estatus=0 AND pd.id_dc ='$id_dc'
	");	

	 if($this->db->affected_rows() > 0){
		return $query->result_array();
	}else{
		return false;
	}

}
function mostrar_pub_disenador_enviadas(){
	$id_dc= $this->session->userdata('id');
	$idCampana = $this->input->get('idcampana');
	$idNodo = $this->input->get('idnodo');
	$query=$this->db->query("SELECT * FROM pub_dise pd INNER JOIN empleado e on pd.id_gc=e.id WHERE pd.id_campana ='$idCampana' AND pd.id_nodo='$idNodo' 
	AND pd.estatus=1 AND pd.id_dc ='$id_dc'
	");	

	 if($this->db->affected_rows() > 0){
		return $query->result_array();
	}else{
		return false;
	}

}
function updatepubdise($info,$id_publicacion){
	$this->db->where('id_pub_dise',$id_publicacion);
	 $this->db->update('pub_dise', $info);
	 
	 if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}

}
function guardar_cont_enviado_por_disenador($info,$id_pub_dise){
	
	$this->db->insert('pub_save', $info);

	 if($this->db->affected_rows() > 0){
		$this->db->where('id_pub_dise',$id_pub_dise);
		$this->db->delete('pub_dise');

		return true;
	}else{
		return false;
	}

}
function rechazar_cont_enviado_por_disenador($info,$id_pub_dise){
	
	$this->db->insert('pub_save', $info);

	 if($this->db->affected_rows() > 0){
		$this->db->where('id_pub_dise',$id_pub_dise);
		$this->db->delete('pub_dise');

		return true;
	}else{
		return false;
	}

}
}
    