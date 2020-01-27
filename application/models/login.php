<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function login_validation($username,$password) {
        $resultado=$this->db->query("SELECT * FROM empleado 
        WHERE usuario='$username' and contraseña ='$password'");

        if($resultado->num_rows()>0){
            return $resultado->row();
        }
        else{
            return false;
        }

		
    }

    public function get_empresa($username,$password) {

        $resultado=$this->db->query("SELECT * FROM empresa er 
        INNER JOIN empleado_empresa ee ON er.id = ee.idEmpresa 
        INNER JOIN empleado emp ON ee.idEmpelado = emp.id
        WHERE usuario='$username' and contraseña ='$password'");

        if($resultado->num_rows()>0){
            return $resultado->row();
        }
        else{
            return false;
        }

		
    }

    
}