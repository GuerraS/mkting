 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('cm/Asignar_campaña_m','e');
		$this->load->model('gc/Guardado_m','g');
		$this->load->library('form_validation');
		$this->load->model('gc/Crear_m','a');
		$this->load->model('dc/Aprobar_m','c');
		$this->load->model('gc/Rechazados_m','rc');
		$this->load->model('cm/Asignar_tareas_m','at');
		$this->load->model('gc/Asignar_tareas_gc_m','atgc');
		$this->load->model('dc/Asignar_tareas_dc_m','atdc');
		
		
		
	}
	public function index()
	{	
		$this->load->view('guest/head');
		
		$this->load->view('login_view');
		$this->load->view('guest/footer');
		
	}
	public function ingresar()
	{	
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','required');

		

		$username=$this->input->post('username');
		$password=$this->input->post('password');
	
		$result= $this->Login->login_validation($username,$password);
		$result2= $this->Login->get_empresa($username,$password);
		if($this->form_validation->run()){
		if($result){
			
			

			$data=[
				"id"=>$result->id,
				"name"=>$result->usuario,
				"password"=>$result->contraseña,
				"tipo"=>$result->idTipo_usuario,
				
				"login"=> TRUE];
				$this->session->set_userdata($data);

				
			$tipo = array(
				'Sa' => 'Super Administrador',
				'Admin' => 'Administrador' ,
				'CM' => 'Comunity Manager',
				'DC' => 'Diseñador de Contenido',
				'GC' => 'Generador de Contenido');				

			if($data['tipo']==1){
				
				$this->load->view('guest/head');
				
				$this->load->view('guest/nav_bar',$tipo);
				$this->load->view('guest/left_menu');
				$this->load->view('usuarios/sa/sa',$tipo);
				$this->load->view('guest/footer');

			}
			elseif($data['tipo']==2){
				$data2=[
					"razon_social"=>$result2->razon_social,
					"login"=> TRUE];
				$this->session->set_userdata($data2);
				
				$this->load->view('guest/head');
				$this->load->view('guest/nav_bar',$tipo);
				$this->load->view('guest/left_menu');
				
				$this->load->view('usuarios/adm/adm',$tipo);
				$this->load->view('guest/footer');

			}
			elseif($data['tipo']==3){
				$data2=[
					"razon_social"=>$result2->razon_social,
					"login"=> TRUE];
				$this->session->set_userdata($data2);
				$this->load->view('guest/head');
				$this->load->view('guest/nav_bar',$tipo);
				$this->load->view('guest/left_menu');
				
				$this->load->view('usuarios/cm/cm',$tipo);
				$this->load->view('guest/footer');
			}
			elseif($data['tipo']==4){
				$data2=[
					"razon_social"=>$result2->razon_social,
					"login"=> TRUE];
				$this->session->set_userdata($data2);
				$this->load->view('guest/head');
				$this->load->view('guest/nav_bar',$tipo);
				$this->load->view('guest/left_menu');
			
				$this->load->view('usuarios/dc/dc',$tipo);
				$this->load->view('guest/footer');

			}
			elseif($data['tipo']==5){
				$data2=[
					"razon_social"=>$result2->razon_social,
					"login"=> TRUE];
				$this->session->set_userdata($data2);
				$this->load->view('guest/head');
				$this->load->view('guest/nav_bar',$tipo);
				$this->load->view('guest/left_menu');
				
				$this->load->view('usuarios/gc/gc',$tipo);
				$this->load->view('guest/footer');

			}
			
		
	}else{
		$this->session->set_flashdata('error','Nombre o Contraseña Invalidos');
		redirect(base_url());
	}
}
}
function cm(){
	$tipo = array(
		'Sa' => 'Super Administrador' ,
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
	$campanas['campanas'] = $this->e->selectcampana($cmlogeado);	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/cm',$tipo+$campanas);
	$this->load->view('guest/footer');

}
function gc(){
	$tipo = array(
		'Sa' => 'Super Administrador' ,
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
	$campanas['campanas'] = $this->e->selectcampana($cmlogeado);	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/gc',$tipo+$campanas);
	$this->load->view('guest/footer');

}

function cerrar_sesion(){
	$this->session->sess_destroy();
	redirect(base_url());
}
function gestion_usuarios(){
	$tipo = array(
		'Sa' => 'Super Administrador' ,
		'Admin' => 'Administrador' ,
		'CM' => 'Administrador',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/sa/gestion_usuarios',$tipo);
	$this->load->view('guest/footer');
}
function gestion_empresa(){
	$tipo = array(
		'Sa' => 'Super Administrador' ,
		'Admin' => 'Administrador' ,
		'CM' => 'Administrador',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/sa/gestion_empresa',$tipo);
	$this->load->view('guest/footer');
	
}

function gestion_usuarios_camp(){
	$tipo = array(
		'Sa' => 'Super Administrador' ,
		'Admin' => 'Administrador' ,
		'CM' => 'Administrador',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/adm/gestion_usuarios',$tipo);
	$this->load->view('guest/footer');
}
function gestion_campana(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/adm/gestion_campana',$tipo);
	$this->load->view('guest/footer');
	
}
function usuario_campana(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/adm/usuario_campaña_v',$tipo);
	$this->load->view('guest/footer');
	
}

function gestion_usuarios_cm(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/gestion_usuarios',$tipo);
	$this->load->view('guest/footer');
}
function asignar_campanas_cm(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/asignar_campanas_cm',$tipo);
	$this->load->view('guest/footer');
}
function campanas_asignadas(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/campanas_asignadas',$tipo);
	$this->load->view('guest/footer');
}
function red_semantica(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
	$campanas['campanas'] = $this->e->selectcampana($cmlogeado);
			
	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo+$campanas);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/red_semantica',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function crear(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$gclogeado= $this->session->userdata('id');
	$campanas['campanas'] = $this->e->campanas($gclogeado);
		
			
	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/crear',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function guardado(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$gclogeado= $this->session->userdata('id');
	$campanas['campanas'] = $this->e->campanas($gclogeado);
		
			
	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/guardado',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function aprovar(){
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
	$campanas['campanas'] = $this->e->campanas($cmlogeado);
		
			
	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/aprovar',$tipo+$campanas);
	$this->load->view('guest/footer');
}

function edit_save(){
	$id = $this->input->get('id');
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
	$contenido['editar'] = $this->g->editar_publicaciones_guardadas($id);
	
	
	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/edit_save',$tipo+$contenido);
	$this->load->view('guest/footer');
}
function pendientes(){
	$id = $this->input->get('id');
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$gclogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($gclogeado);

	
	
	
	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/pendientes',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function autorizado(){
	$id = $this->input->get('id');
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DS' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/autorizado',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function dis_recibido(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$dclogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($dclogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/dc/contenido_recibido',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function dis_enviado(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$dclogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($dclogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/dc/contenido_enviado',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function enviado_disenador(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$dclogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($dclogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/enviado_disenador',$tipo+$campanas);
	$this->load->view('guest/footer');
}function recibido_disenador(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$dclogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($dclogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/recibido_disenador',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function contenido_rechazado(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/contenido_rechazado',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function asignar_tareas(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/asignar_tareas',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function tareas_enviadas_a_cm(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/tareas_enviadas_a_cm',$tipo+$campanas);
	$this->load->view('guest/footer');
}



function tareas_asignadas_gc(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/tareas_asignadas',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function tareas_a_revision_gc(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/tareas_a_revision',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function tareas_rechazadas(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/tareas_rechazadas',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function tareas_enviadas_a_disenador(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/tareas_enviadas_a_disenador',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function tareas_recibidas_de_disenador(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/gc/tareas_recibidas_de_disenador',$tipo+$campanas);
	$this->load->view('guest/footer');
}

function tareas_asignadas_dc(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/dc/tareas_asignadas_dc',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function tareas_enviadas_dc(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/dc/tareas_enviadas_a_revision',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function contenido_rechazado_dc(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/dc/tareas_rechazadas',$tipo+$campanas);
	$this->load->view('guest/footer');
}
function pendientes_de_revision(){
	
	$tipo = array(
		'Sa' => 'Super Administrador',
		'Admin' => 'Administrador' ,
		'CM' => 'Comunity Manager',
		'DC' => 'Diseñador de Contenido',
		'GC' => 'Generador de Contenido');
		$cmlogeado= $this->session->userdata('id');
		$campanas['campanas'] = $this->e->campanas($cmlogeado);

	$this->load->view('guest/head');
	$this->load->view('guest/nav_bar',$tipo);
	$this->load->view('guest/left_menu');
				
	$this->load->view('usuarios/cm/pendientes_de_revision',$tipo+$campanas);
	$this->load->view('guest/footer');
}



































///////////////////////////////////////////////////////// 
function preautorizacion(){


	if (isset($_POST['guardar'])) {
	//$preaut = $this->input->post('idAccion');
	$gclogeado= $this->session->userdata('id');
	$contenido = $this->input->post('contenido');
	$nombre =$_FILES['fileimagen']['name'];
	$idCampana = $this->input->post('campana');
	$idNodo = $this->input->post('nodo');
	$cmresponsable=$this->a->cm($idNodo);
	$comentario = $this->input->post('comentario');
	$guardar = $this->input->post('guardar');
	$aprovacion = $this->input->post('aprovacion');
	$dise = $this->input->post('dise');
	$fechaenvio=date('Y-m-d');
	
	
	
	for($i=0;$i<1;$i++){
		$idcm=$cmresponsable['id_usuario'];
		}
		$info['id_campana'] = $idCampana;
		$info['id_gc']=$gclogeado;
		$info['descripcion'] = $contenido;
		$info['imagen'] = $_FILES['fileimagen']['name'];
		$info['comentario']=$comentario;
		$info['id_cm']=$idcm;
		$info['id_nodo']=$idNodo;	
		$info['fechaenvio']=$fechaenvio;
		$result=$this->a->guardar($info);
		$info['fechaenvio']=$fechaenvio;
		$foto=$_FILES['fileimagen']['name'];
		$ruta=$_FILES["fileimagen"]["tmp_name"];
		$destino="uploads/$foto";
		copy($ruta,$destino);
		if($result){
			echo '<script type="text/javascript">alert("Agregado Correctamente");</script>';

			redirect("inicio/crear","refresh");

		}
	
	}
	if (isset($_POST['aprobacion'])) {
		//$preaut = $this->input->post('idAccion');
		$gclogeado= $this->session->userdata('id');
		$contenido = $this->input->post('contenido');
		$nombre =$_FILES['fileimagen']['name'];
		$idCampana = $this->input->post('campana');
		$idNodo = $this->input->post('nodo');
		$cmresponsable=$this->a->cm($idNodo);
		$comentario = $this->input->post('comentario');
		$guardar = $this->input->post('guardar');
		$aprovacion = $this->input->post('aprovacion');
		$dise = $this->input->post('dise');
		$fechaenvio=date('Y-m-d');

		for($i=0;$i<1;$i++){
			$idcm=$cmresponsable['id_usuario'];
			}
			$info['id_campana'] = $idCampana;
			$info['id_gc']=$gclogeado;
			$info['descripcion'] = $contenido;
			$info['fileimagen'] = $_FILES['fileimagen']['name'];
			$info['comentario']=$comentario;
			$info['id_cm']=$idcm;
			$info['id_nodo']=$idNodo;	
			$info['fechaenvio']=$fechaenvio;
			$result=$this->a->aprovacion($info);
			$foto=$_FILES['fileimagen']['name'];
			$ruta=$_FILES["fileimagen"]["tmp_name"];
			$destino="uploads/$foto";
			copy($ruta,$destino);
			if($result){
				echo '<script type="text/javascript">alert("Enviado a aprovacion");</script>';
	
				redirect("inicio/crear","refresh");
	
			}
		
		}

		if (isset($_POST['diseñador'])) {
			if (isset($_POST['dc'])) {
			//$preaut = $this->input->post('idAccion');
			$gclogeado= $this->session->userdata('id');
			$contenido = $this->input->post('contenido');
			$nombre =$_FILES['fileimagen']['name'];
			$idCampana = $this->input->post('campana');
			$idNodo = $this->input->post('nodo');
			$cmresponsable=$this->a->cm($idNodo);
			$comentario = $this->input->post('comentario');
			$guardar = $this->input->post('guardar');
			$aprovacion = $this->input->post('aprovacion');
			$dc = $this->input->post('dc');
			$dise = $this->input->post('dise');
			$fechaenvio=date('Y-m-d');
			
			
			
			
			for($i=0;$i<1;$i++){
				$idcm=$cmresponsable['id_usuario'];
				}
				$info['id_campana'] = $idCampana;
				$info['id_gc']=$gclogeado;
				$info['descripcion'] = $contenido;
				$info['fileimagen'] = $_FILES['fileimagen']['name'];
				$info['comentario']=$comentario;
				$info['id_cm']=$idcm;
				$info['id_dc']=$dc;
				$info['id_nodo']=$idNodo;
				$info['fechaenvio']=$fechaenvio;		
				$result=$this->a->enviardisenador($info);
		
				$foto=$_FILES['fileimagen']['name'];
				$ruta=$_FILES["fileimagen"]["tmp_name"];
				$destino="uploads/$foto";
				copy($ruta,$destino);
				if($result){
					echo '<script type="text/javascript">alert("Enviado Correctamente");</script>';
		
					redirect("inicio/crear","refresh");
				}
				}else{
					echo "<script>alert('Selecciona Diseñador de Contenido'); window.history.back()</script>";

				}
			
			}
		
		}

















		///////////////////////////////Editar
		function guardar_aprobar_contguardado(){
			if (isset($_POST['guardar'])) {
			$id_publicacion = $this->input->post('id_publicacion');
			$gclogeado= $this->session->userdata('id');
			$contenido = $this->input->post('contenido');
			$idCampana = $this->input->post('campana');
			$idNodo = $this->input->post('nodo');
			$cmresponsable=$this->a->cm($idNodo);
			$comentario = $this->input->post('comentario');
			$dise = $this->input->post('dise');
			$fechaenvio=date('Y-m-d');
			$info['fechaenvio']=$fechaenvio;
				if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
					$my_img = $this->input->post('my_img');
					$info['imagen'] =$my_img;
					
				}else{
				$info['imagen'] = $_FILES['fileimagen']['name'];
				$foto=$_FILES['fileimagen']['name'];
				$ruta=$_FILES["fileimagen"]["tmp_name"];
				$destino="uploads/$foto";
				copy($ruta,$destino);

				}
			
			for($i=0;$i<1;$i++){
				$idcm=$cmresponsable['id_usuario'];
				}
				$info['id_campana'] = $idCampana;
				$info['id_gc']=$gclogeado;
				$info['descripcion'] = $contenido;
				
				$info['comentario']=$comentario;
				$info['id_cm']=$idcm;
				$info['id_nodo']=$idNodo;	
				$result=$this->a->updatecontenido($info,$id_publicacion);
		
				if($result){
					echo '<script type="text/javascript">alert("Editado Correctamente");</script>';
					redirect("inicio/guardado","refresh");
				}
			}






			if (isset($_POST['aprobacion'])) {
				$id_publicacion = $this->input->post('id_publicacion');
			$gclogeado= $this->session->userdata('id');
			$contenido = $this->input->post('contenido');
			$idCampana = $this->input->post('campana');
			$idNodo = $this->input->post('nodo');
			$cmresponsable=$this->a->cm($idNodo);
			$comentario = $this->input->post('comentario');
			$dise = $this->input->post('dise');
			$fechaenvio=date('Y-m-d');
			$info['fechaenvio']=$fechaenvio;
				if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
					$my_img = $this->input->post('my_img');
					$info['fileimagen'] =$my_img;
					
				}else{
				$info['fileimagen'] = $_FILES['fileimagen']['name'];
				$foto=$_FILES['fileimagen']['name'];
				$ruta=$_FILES["fileimagen"]["tmp_name"];
				$destino="uploads/$foto";
				copy($ruta,$destino);

				}
			for($i=0;$i<1;$i++){
				$idcm=$cmresponsable['id_usuario'];
				}
				$info['id_campana'] = $idCampana;
				$info['id_gc']=$gclogeado;
				$info['descripcion'] = $contenido;
				
				$info['comentario']=$comentario;
				$info['id_cm']=$idcm;
				$info['id_nodo']=$idNodo;	
				$result=$this->a->aprovacion($info,$id_publicacion);
		
				
				if($result){
					echo '<script type="text/javascript">alert("Enviado a Aprobación");</script>';
		
					redirect("inicio/guardado","refresh");
		
				}
				
				}

				if (isset($_POST['diseñador'])) {
					if (isset($_POST['dc'])) {
						$id_publicacion = $this->input->post('id_publicacion');
			$gclogeado= $this->session->userdata('id');
			$contenido = $this->input->post('contenido');
			$idCampana = $this->input->post('campana');
			$idNodo = $this->input->post('nodo');
			$cmresponsable=$this->a->cm($idNodo);
			$comentario = $this->input->post('comentario');
			$dc = $this->input->post('dc');
			$fechaenvio=date('Y-m-d');
			$info['fechaenvio']=$fechaenvio;
				if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
					$my_img = $this->input->post('my_img');
					$info['fileimagen'] =$my_img;
					
				}else{
				$info['fileimagen'] = $_FILES['fileimagen']['name'];
				$foto=$_FILES['fileimagen']['name'];
				$ruta=$_FILES["fileimagen"]["tmp_name"];
				$destino="uploads/$foto";
				copy($ruta,$destino);

				}
			for($i=0;$i<1;$i++){
				$idcm=$cmresponsable['id_usuario'];
				}
				$info['id_campana'] = $idCampana;
				$info['id_gc']=$gclogeado;
				$info['descripcion'] = $contenido;
				$info['id_dc']=$dc;
				$info['comentario']=$comentario;
				$info['id_cm']=$idcm;
				$info['id_nodo']=$idNodo;	
				$result=$this->a->pub_dise($info,$id_publicacion);
					



						if($result){
							echo '<script type="text/javascript">alert("Enviado Correctamente");</script>';
							redirect("inicio/guardado","refresh");
						}
						}else{
							echo "<script>alert('Selecciona Diseñador de Contenido'); window.history.back()</script>";
							
						}
					
					}

}










function publicar_programar_rechazar(){
	$this->load->library('facebook');


	if (isset($_POST['publicar'])) {
		$id_preautorizacion = $this->input->post('id_preautorizacion');
		$cmlogeado= $this->session->userdata('id');
		$contenido = $this->input->post('contenido');
		$idCampana = $this->input->post('id_campana');
		$idNodo = $this->input->post('id_nodo');
		
		$id_gc = $this->input->post('id_gc');
		$fechapub=date('Y-m-d');
		$hora= date("H:i:s");

			if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
				$my_img = $this->input->post('my_img');
				$info['fileimagen'] =$my_img;
				$path=pathinfo($info['fileimagen']);
			$base=base_url();
			$ruta=$base."uploads/".$info['fileimagen'];
				
			}
			if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
			$info['fileimagen'] = $_FILES['fileimagen']['name'];
			$foto=$_FILES['fileimagen']['name'];
			$ruta=$_FILES["fileimagen"]["tmp_name"];
			$destino="uploads/$foto";
			copy($ruta,$destino);
			$path=pathinfo($info['fileimagen']);
			$base=base_url();
			$ruta=$base."uploads/".$info['fileimagen'];

			}
			if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
				$info['fileimagen'] = $_FILES['fileimagen']['name'];
				$foto=$_FILES['fileimagen']['name'];
				$ruta=$_FILES["fileimagen"]["tmp_name"];
				$destino="uploads/$foto";
				copy($ruta,$destino);
				$path=pathinfo($info['fileimagen']);
			$base=base_url();
			$ruta=$base."uploads/".$info['fileimagen'];
	
				}
			$info['fecha']=$fechapub;
			$info['hora_p']=$hora;
			$info['id_campana'] = $idCampana;
			$info['id_gc']=$id_gc;
			$info['descripcion'] = $contenido;
			$info['id_cm']=$cmlogeado;
			$info['id_nodo']=$idNodo;	
			

			echo '<script type="text/javascript">alert("'.$path.'");</script>';

			$formatoimagen=array('jpg','png','gif');
			$formatovideo=array('mp4','mov','wmv','avi','mkv','xvid','mpeg-1','3gp','m4v','mpg','flv','rm');
			if (!empty($info['fileimagen'])) {
				if (in_array($path['extension'], $formatoimagen)) {
				$arr = array('message' => $contenido,'source' => $this->facebook->object()->fileToUpload($ruta),);
				$userProfile = $this->facebook->request('post', '2325078441038936'.'/photos/', $arr, 'EAADDccDBPtsBAGhpIs57ZCRaj22yPzijfjSZAVSClNf5ZAlH47cNEbpfh5RPzrens1JLX5NiFQQ2QYNU4vaTa8PLsq4xTBPomujyB2FWOtN7aEMDYk8ZCaonMHIieiDfdZAbyfSlzlwJ3e57jpNm5elGXdKlk8iK3ThjSykOORKhAqu3oVTFjiIDRvJcsuRuEx3D8fpEkAjcwXKUYLcdA');
					
						print_r($userProfile);
					
			}

			if (in_array($path['extension'], $formatovideo)) {
				$arr = array('description' => $contenido,'source' => $this->facebook->object()->fileToUpload($ruta),);
				$userProfile = $this->facebook->request('post', '2325078441038936'.'/videos/', $arr, 'EAADDccDBPtsBAGhpIs57ZCRaj22yPzijfjSZAVSClNf5ZAlH47cNEbpfh5RPzrens1JLX5NiFQQ2QYNU4vaTa8PLsq4xTBPomujyB2FWOtN7aEMDYk8ZCaonMHIieiDfdZAbyfSlzlwJ3e57jpNm5elGXdKlk8iK3ThjSykOORKhAqu3oVTFjiIDRvJcsuRuEx3D8fpEkAjcwXKUYLcdA');
				print_r($userProfile);
			}
			}else{
				$arr = array('message' => $contenido,);
				$userProfile = $this->facebook->request('post', '2325078441038936'.'/feed/', $arr, 'EAADDccDBPtsBAGhpIs57ZCRaj22yPzijfjSZAVSClNf5ZAlH47cNEbpfh5RPzrens1JLX5NiFQQ2QYNU4vaTa8PLsq4xTBPomujyB2FWOtN7aEMDYk8ZCaonMHIieiDfdZAbyfSlzlwJ3e57jpNm5elGXdKlk8iK3ThjSykOORKhAqu3oVTFjiIDRvJcsuRuEx3D8fpEkAjcwXKUYLcdA');
				print_r($userProfile);
			}

			$result=$this->a->publicar($info,$id_preautorizacion);

	
			if($result){
				echo '<script type="text/javascript">alert("Publicado Correctamente");</script>';
				redirect("inicio/aprovar","refresh");
			}
		}





		if (isset($_POST['publicartarea'])) {
			$descripciontarea= $this->input->post('descripciontarea');
					$id_tarea= $this->input->post('id_tarea');
					$idCampana= $this->input->post('id_campana');
					$idNodo= $this->input->post('id_nodo');
					$id_cm= $this->input->post('id_cm');
					$id_gc= $this->input->post('id_gc');
					$id_dc= $this->input->post('id_dc');
					$comentario = $this->input->post('comentario');
					$contenido = $this->input->post('contenido');
					$fechapub=date('Y-m-d');
					$fechaenvio=date('Y-m-d');
					$hora= date("H:i:s");

					
					if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
						$my_img = $this->input->post('my_img');
						$info['fileimagen'] =$my_img;
						$info2['fileimagen'] =$my_img;
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
						
					}
					if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
					$info['fileimagen'] = $_FILES['fileimagen']['name'];
					$info2['fileimagen'] = $_FILES['fileimagen']['name'];

					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
					$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
		
					}
					if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
						$info['fileimagen'] = $_FILES['fileimagen']['name'];
						$info2['fileimagen'] = $_FILES['fileimagen']['name'];
						$foto=$_FILES['fileimagen']['name'];
						$ruta=$_FILES["fileimagen"]["tmp_name"];
						$destino="uploads/$foto";
						copy($ruta,$destino);
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
			
						}
						
						
					
						$info['contenido']=$contenido;
						
						$info['fechaenvio']=$fechaenvio;
						$info['comentario']=$comentario;
						
						$info['statuscm']=0;
							$info['statusgc']=0;
							$info['statusdc']=0;
							$info['statusrech']=0;
							$info['statusrev']=0;
						$result=$this->atgc->enviar_tarea_revision_gc($info,$id_tarea);
	
				
	
				$formatoimagen=array('jpg','png','gif');
				$formatovideo=array('mp4','mov','wmv','avi','mkv','xvid','mpeg-1','3gp','m4v','mpg','flv','rm');
				if (!empty($info['fileimagen'])) {
					if (in_array($path['extension'], $formatoimagen)) {
					$arr = array('message' => $contenido,'source' => $this->facebook->object()->fileToUpload($ruta),);
					$userProfile = $this->facebook->request('post', '2325078441038936'.'/photos/', $arr, 'EAADDccDBPtsBAGhpIs57ZCRaj22yPzijfjSZAVSClNf5ZAlH47cNEbpfh5RPzrens1JLX5NiFQQ2QYNU4vaTa8PLsq4xTBPomujyB2FWOtN7aEMDYk8ZCaonMHIieiDfdZAbyfSlzlwJ3e57jpNm5elGXdKlk8iK3ThjSykOORKhAqu3oVTFjiIDRvJcsuRuEx3D8fpEkAjcwXKUYLcdA');
						
							print_r($userProfile);
						
				}
	
				if (in_array($path['extension'], $formatovideo)) {
					$arr = array('description' => $contenido,'source' => $this->facebook->object()->fileToUpload($ruta),);
					$userProfile = $this->facebook->request('post', '2325078441038936'.'/videos/', $arr, 'EAADDccDBPtsBAGhpIs57ZCRaj22yPzijfjSZAVSClNf5ZAlH47cNEbpfh5RPzrens1JLX5NiFQQ2QYNU4vaTa8PLsq4xTBPomujyB2FWOtN7aEMDYk8ZCaonMHIieiDfdZAbyfSlzlwJ3e57jpNm5elGXdKlk8iK3ThjSykOORKhAqu3oVTFjiIDRvJcsuRuEx3D8fpEkAjcwXKUYLcdA');
					print_r($userProfile);
				}
				}else{
					$arr = array('message' => $contenido,);
					$userProfile = $this->facebook->request('post', '2325078441038936'.'/feed/', $arr, 'EAADDccDBPtsBAGhpIs57ZCRaj22yPzijfjSZAVSClNf5ZAlH47cNEbpfh5RPzrens1JLX5NiFQQ2QYNU4vaTa8PLsq4xTBPomujyB2FWOtN7aEMDYk8ZCaonMHIieiDfdZAbyfSlzlwJ3e57jpNm5elGXdKlk8iK3ThjSykOORKhAqu3oVTFjiIDRvJcsuRuEx3D8fpEkAjcwXKUYLcdA');
					print_r($userProfile);
				}
				$info2['fecha']=$fechapub;
			$info2['hora_p']=$hora;
				$info2['id_gc']=$id_gc;
				$info2['id_dc']=$id_dc;
				$info2['id_campana']=$idCampana;
				$info2['descripcion']=$contenido;
				$info2['id_cm']=$id_cm;
				$info2['id_nodo']=$idNodo;
				
			

				$result=$this->a->publicartarea($info2);
	
		
				if($result){
					echo '<script type="text/javascript">alert("Publicado Correctamente");</script>';
					redirect("inicio/pendientes_de_revision","refresh");
				}
			}

			if (isset($_POST['rechazartarea'])) {
						
				$id_tarea= $this->input->post('id_tarea');
				
				$comentario = $this->input->post('comentario');
				$contenido = $this->input->post('contenido');
				$fechaenvio=date('Y-m-d');
				
				if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
					$my_img = $this->input->post('my_img');
					$info['fileimagen'] =$my_img;
					$path=pathinfo($info['fileimagen']);
				$base=base_url();
				$ruta=$base."uploads/".$info['fileimagen'];
					
				}
				if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
				$info['fileimagen'] = $_FILES['fileimagen']['name'];
				$foto=$_FILES['fileimagen']['name'];
				$ruta=$_FILES["fileimagen"]["tmp_name"];
				$destino="uploads/$foto";
				copy($ruta,$destino);
				$path=pathinfo($info['fileimagen']);
				$base=base_url();
				$ruta=$base."uploads/".$info['fileimagen'];
	
				}
				if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
					$info['fileimagen'] = $_FILES['fileimagen']['name'];
					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
					$path=pathinfo($info['fileimagen']);
				$base=base_url();
				$ruta=$base."uploads/".$info['fileimagen'];
		
					}
					
					
					$info['contenido']=$contenido;
					
					$info['fechaenvio']=$fechaenvio;
					$info['comentario']=$comentario;
					
					$info['statuscm']=0;
					$info['statusgc']=1;
					$info['statusdc']=0;
					$info['statusrech']=1;
					$info['statusrev']=0;
					$result=$this->atgc->rechazar_tarea_a_disenador_gc($info,$id_tarea);

					if($result){
						echo '<script type="text/javascript">alert("Enviado a Generador de Contenido Correctamente");</script>';
						redirect("inicio/tareas_recibidas_de_disenador","refresh");
					}
					else{
						alert("No se pudo");
					}
				}


















		if (isset($_POST['aprobacion'])) {
		$id_publicacion = $this->input->post('id_publicacion');
		$gclogeado= $this->session->userdata('id');
		$contenido = $this->input->post('contenido');
		$idCampana = $this->input->post('campana');
		$idNodo = $this->input->post('nodo');
		$cmresponsable=$this->a->cm($idNodo);
		$comentario = $this->input->post('comentario');
		$dise = $this->input->post('dise');
		$fechaenvio=date('Y-m-d');
		$info['fechaenvio']=$fechaenvio;
			if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
				$my_img = $this->input->post('my_img');
				$info['fileimagen'] =$my_img;
				
			}else{
			$info['fileimagen'] = $_FILES['fileimagen']['name'];
			$foto=$_FILES['fileimagen']['name'];
			$ruta=$_FILES["fileimagen"]["tmp_name"];
			$destino="uploads/$foto";
			copy($ruta,$destino);

			}
		for($i=0;$i<1;$i++){
			$idcm=$cmresponsable['id_usuario'];
			}
			$info['id_campana'] = $idCampana;
			$info['id_gc']=$gclogeado;
			$info['descripcion'] = $contenido;
			
			$info['comentario']=$comentario;
			$info['id_cm']=$idcm;
			$info['id_nodo']=$idNodo;	
			$result=$this->a->aprovacion($info,$id_publicacion);
	
			
			if($result){
				echo '<script type="text/javascript">alert("Enviado a Aprobación");</script>';
	
				redirect("inicio/guardado","refresh");
	
			}
			
			}

			if (isset($_POST['rechazar'])) {
				
		$id_preautorizacion = $this->input->post('id_preautorizacion');
		$cmlogeado= $this->session->userdata('id');
		$contenido = $this->input->post('contenido');
		$idCampana = $this->input->post('id_campana');
		$idNodo = $this->input->post('id_nodo');
		$comentario = $this->input->post('comentario');
		$id_gc = $this->input->post('id_gc');
		$fechaenvio=date('Y-m-d');

		$info['fechaenvio']=$fechaenvio;
			if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
				$my_img = $this->input->post('my_img');
				$info['fileimagen'] =$my_img;
				
			}else{
			$info['fileimagen'] = $_FILES['fileimagen']['name'];
			$foto=$_FILES['fileimagen']['name'];
			$ruta=$_FILES["fileimagen"]["tmp_name"];
			$destino="uploads/$foto";
			copy($ruta,$destino);

			}
		
			$info['id_campana'] = $idCampana;
			$info['id_gc']=$id_gc;
			$info['descripcion'] = $contenido;
			
			$info['comentario']=$comentario;
			$info['id_cm']=$cmlogeado;
			$info['id_nodo']=$idNodo;
			$info['estatus']=1;	
			$result=$this->a->rechazar($info,$id_preautorizacion);
					if($result){
						echo "<script>alert('Enviado a Diseñador de Contenido'); window.history.back()</script>";
						redirect("inicio/aprovar","refresh");
					}
					
				
				}
		
		}
		function disenador(){
			if (isset($_POST['guardar'])) {
				$id_publicacion = $this->input->post('id_pub_dise');
				$comentario = $this->input->post('comentario');
				$fechaenvio=date('Y-m-d');
				$info['fechaenvio']=$fechaenvio;
					if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
						$my_img = $this->input->post('my_img');
						$info['fileimagen'] =$my_img;
						
					}else{
					$info['fileimagen'] = $_FILES['fileimagen']['name'];
					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
	
					}
					$info['comentario']=$comentario;
					$info['estatus']=1;
					$result=$this->c->updatepubdise($info,$id_publicacion);

					if($result){
						echo '<script type="text/javascript">alert("Enviado a Revision");</script>';
						redirect("inicio/dis_recibido","refresh");
					}
				}
			
					
					
			}

			function cont_recibido_disenador(){
			if (isset($_POST['guardar'])) {
				$id_pub_dise= $this->input->post('id_pub_dise');
				$idCampana= $this->input->post('id_campana');
				$idNodo= $this->input->post('id_nodo');
				$id_cm= $this->input->post('id_cm');
				$id_gc= $this->input->post('id_gc');
				$id_dc= $this->input->post('id_dc');
				$comentario = $this->input->post('comentario');
				$contenido = $this->input->post('contenido');
				$fechaenvio=date('Y-m-d');
				
					if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
						$my_img = $this->input->post('my_img');
						$info['imagen'] =$my_img;
						
					}else{
					$info['imagen'] = $_FILES['fileimagen']['name'];
					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
					}
					$info['id_gc']=$id_gc;
					$info['id_campana']=$idCampana;
					$info['descripcion']=$contenido;
					$info['id_cm']=$id_cm;
					$info['id_nodo']=$idNodo;
					$info['fechaenvio']=$fechaenvio;
					$info['comentario']=$comentario;
					
					$info2['estatus']=1;
					$result=$this->c->guardar_cont_enviado_por_disenador($info,$id_pub_dise);

					if($result){
						echo '<script type="text/javascript">alert("Guardado Correctamente");</script>';
						redirect("inicio/recibido_disenador","refresh");
					}
				}
				if(isset($_POST['rechazar'])){
					$id_pub_dise= $this->input->post('id_pub_dise');
					$comentario = $this->input->post('comentario');
					$fechaenvio=date('Y-m-d');

					if(isset($_POST['my_img']) && empty($_FILES['fileimagen']['name'])){
						$my_img = $this->input->post('my_img');
						$info['imagen'] =$my_img;
						
					}else{
					$info['imagenimagen'] = $_FILES['fileimagen']['name'];
					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
					}

					$info['fechaenvio']=$fechaenvio;
					$info['comentario']=$comentario;


					$result=$this->c->rechazar_cont_enviado_por_disenador($info,$id_pub_dise);


				}
			
					
					
			}
			function preautorizacion_rechazada(){
				if (isset($_POST['revision'])) {
					$id_preautorizacion= $this->input->post('id_preautorizacion');
					$idCampana= $this->input->post('id_campana');
					$idNodo= $this->input->post('id_nodo');
					$id_cm= $this->input->post('id_cm');
					$id_gc= $this->input->post('id_gc');
					$id_dc= $this->input->post('id_dc');
					$comentario = $this->input->post('comentario');
					$contenido = $this->input->post('contenido');
					$fechaenvio=date('Y-m-d');
					
					if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
						$my_img = $this->input->post('my_img');
						$info['fileimagen'] =$my_img;
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
						
					}
					if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
					$info['fileimagen'] = $_FILES['fileimagen']['name'];
					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
					$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
		
					}
					if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
						$info['fileimagen'] = $_FILES['fileimagen']['name'];
						$foto=$_FILES['fileimagen']['name'];
						$ruta=$_FILES["fileimagen"]["tmp_name"];
						$destino="uploads/$foto";
						copy($ruta,$destino);
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
			
						}
						
						$info['id_gc']=$id_gc;
						$info['id_campana']=$idCampana;
						$info['descripcion']=$contenido;
						$info['id_cm']=$id_cm;
						$info['id_nodo']=$idNodo;
						$info['fechaenvio']=$fechaenvio;
						$info['comentario']=$comentario;
						
						$info['estatus']=0;
						$result=$this->rc->preautorizacion_guardar($info,$id_preautorizacion);
	
						if($result){
							echo '<script type="text/javascript">alert("Guardado Correctamente");</script>';
							redirect("inicio/contenido_rechazado","refresh");
						}
					}
					if (isset($_POST['guardar'])) {
						$id_preautorizacion= $this->input->post('id_preautorizacion');
						$idCampana= $this->input->post('id_campana');
						$idNodo= $this->input->post('id_nodo');
						$id_cm= $this->input->post('id_cm');
						$id_gc= $this->input->post('id_gc');
						$id_dc= $this->input->post('id_dc');
						$comentario = $this->input->post('comentario');
						$contenido = $this->input->post('contenido');
						$fechaenvio=date('Y-m-d');
						
						if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
							$my_img = $this->input->post('my_img');
							$info['fileimagen'] =$my_img;
							$path=pathinfo($info['fileimagen']);
						$base=base_url();
						$ruta=$base."uploads/".$info['fileimagen'];
							
						}
						if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
						$info['fileimagen'] = $_FILES['fileimagen']['name'];
						$foto=$_FILES['fileimagen']['name'];
						$ruta=$_FILES["fileimagen"]["tmp_name"];
						$destino="uploads/$foto";
						copy($ruta,$destino);
						$path=pathinfo($info['fileimagen']);
						$base=base_url();
						$ruta=$base."uploads/".$info['fileimagen'];
			
						}
						if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
							$info['fileimagen'] = $_FILES['fileimagen']['name'];
							$foto=$_FILES['fileimagen']['name'];
							$ruta=$_FILES["fileimagen"]["tmp_name"];
							$destino="uploads/$foto";
							copy($ruta,$destino);
							$path=pathinfo($info['fileimagen']);
						$base=base_url();
						$ruta=$base."uploads/".$info['fileimagen'];
				
							}
							
							$info['id_gc']=$id_gc;
							$info['id_campana']=$idCampana;
							$info['descripcion']=$contenido;
							$info['id_cm']=$id_cm;
							$info['id_nodo']=$idNodo;
							$info['fechaenvio']=$fechaenvio;
							$info['comentario']=$comentario;
							
							$info['estatus']=0;
							$result=$this->rc->preautorizacion_guardar($info,$id_preautorizacion);
		
							if($result){
								echo '<script type="text/javascript">alert("Guardado Correctamente");</script>';
								redirect("inicio/contenido_rechazado","refresh");
							}
						}

			}
			function asignar_tareas_cm(){
				$cmlogeado= $this->session->userdata('id');
				$idCampana= $this->input->post('id_campana');
						$idNodo= $this->input->post('id_nodo');
						$descripciontarea= $this->input->post('descripciontarea');
						$id_gc= $this->input->post('id_gc');

							$info['id_cm']=$cmlogeado;
							$info['id_campana']=$idCampana;
							$info['descripciontarea']=$descripciontarea;
							$info['id_gc']=$id_gc;
							$info['id_nodo']=$idNodo;
							$info['statuscm']=0;
							$info['statusgc']=1;
							$info['statusdc']=0;
							$info['statusrech']=0;
							$info['statusrev']=0;
							$info['fechaenvio']=date('Y-m-d');
							
							$result=$this->at->insertar_tarea($info);
							if($result){
								echo '<script type="text/javascript">alert("Tarea Asignada Correctamente");</script>';
								redirect("inicio/asignar_tareas","refresh");
							}



			}
			function revision_tarea_gc(){
				if (isset($_POST['revision'])) {
					$descripciontarea= $this->input->post('descripciontarea');
					$id_tarea= $this->input->post('id_tarea');
					$idCampana= $this->input->post('id_campana');
					$idNodo= $this->input->post('id_nodo');
					$id_cm= $this->input->post('id_cm');
					$id_gc= $this->input->post('id_gc');
					$id_dc= $this->input->post('disenadortarea');
					$comentario = $this->input->post('comentario');
					$contenido = $this->input->post('contenido');
					$fechaenvio=date('Y-m-d');
					
					if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
						$my_img = $this->input->post('my_img');
						$info['fileimagen'] =$my_img;
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
						
					}
					if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
					$info['fileimagen'] = $_FILES['fileimagen']['name'];
					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
					$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
		
					}
					if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
						$info['fileimagen'] = $_FILES['fileimagen']['name'];
						$foto=$_FILES['fileimagen']['name'];
						$ruta=$_FILES["fileimagen"]["tmp_name"];
						$destino="uploads/$foto";
						copy($ruta,$destino);
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
			
						}
						
						$info['id_gc']=$id_gc;
						$info['descripciontarea']=$descripciontarea;
						$info['id_campana']=$idCampana;
						$info['contenido']=$contenido;
						$info['id_cm']=$id_cm;
						$info['id_nodo']=$idNodo;
						$info['fechaenvio']=$fechaenvio;
						$info['comentario']=$comentario;
						
						$info['statuscm']=1;
							$info['statusgc']=0;
							$info['statusdc']=0;
							$info['statusrech']=0;
							$info['statusrev']=1;
						$result=$this->atgc->enviar_tarea_revision_gc($info,$id_tarea);
	
						if($result){
							echo '<script type="text/javascript">alert("Enviado a Revisión correctamente");</script>';
							redirect("inicio/tareas_asignadas_gc","refresh");
						}
					}
					///////////////////////////////////////////////////////
					if (isset($_POST['disenador'])) {
						$descripciontarea= $this->input->post('descripciontarea');
						$id_tarea= $this->input->post('id_tarea');
						$idCampana= $this->input->post('id_campana');
						$idNodo= $this->input->post('id_nodo');
						$id_cm= $this->input->post('id_cm');
						$id_gc= $this->input->post('id_gc');
						$id_dc= $this->input->post('disenadortarea');
						$comentario = $this->input->post('comentario');
						$contenido = $this->input->post('contenido');
						$fechaenvio=date('Y-m-d');
						
						if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
							$my_img = $this->input->post('my_img');
							$info['fileimagen'] =$my_img;
							$path=pathinfo($info['fileimagen']);
						$base=base_url();
						$ruta=$base."uploads/".$info['fileimagen'];
							
						}
						if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
						$info['fileimagen'] = $_FILES['fileimagen']['name'];
						$foto=$_FILES['fileimagen']['name'];
						$ruta=$_FILES["fileimagen"]["tmp_name"];
						$destino="uploads/$foto";
						copy($ruta,$destino);
						$path=pathinfo($info['fileimagen']);
						$base=base_url();
						$ruta=$base."uploads/".$info['fileimagen'];
			
						}
						if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
							$info['fileimagen'] = $_FILES['fileimagen']['name'];
							$foto=$_FILES['fileimagen']['name'];
							$ruta=$_FILES["fileimagen"]["tmp_name"];
							$destino="uploads/$foto";
							copy($ruta,$destino);
							$path=pathinfo($info['fileimagen']);
						$base=base_url();
						$ruta=$base."uploads/".$info['fileimagen'];
				
							}
							
							$info['id_gc']=$id_gc;
							$info['descripciontarea']=$descripciontarea;
							$info['id_campana']=$idCampana;
							$info['contenido']=$contenido;
							$info['id_cm']=$id_cm;
							$info['id_dc']=$id_dc;
							$info['id_nodo']=$idNodo;
							$info['fechaenvio']=$fechaenvio;
							$info['comentario']=$comentario;
							
							$info['statuscm']=0;
							$info['statusgc']=0;
							$info['statusdc']=1;
							$info['statusrech']=0;
							$info['statusrev']=0;
							$result=$this->atgc->enviar_tarea_a_disenador_gc($info,$id_tarea);
		
							if($result){
								echo '<script type="text/javascript">alert("Enviado a diseñador correctamente");</script>';
								redirect("inicio/tareas_asignadas_gc","refresh");
							}
						}
						if (isset($_POST['rechazar'])) {
						
							$id_tarea= $this->input->post('id_tarea');
							
							$comentario = $this->input->post('comentario');
							$contenido = $this->input->post('contenido');
							$fechaenvio=date('Y-m-d');
							
							if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
								$my_img = $this->input->post('my_img');
								$info['fileimagen'] =$my_img;
								$path=pathinfo($info['fileimagen']);
							$base=base_url();
							$ruta=$base."uploads/".$info['fileimagen'];
								
							}
							if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
							$info['fileimagen'] = $_FILES['fileimagen']['name'];
							$foto=$_FILES['fileimagen']['name'];
							$ruta=$_FILES["fileimagen"]["tmp_name"];
							$destino="uploads/$foto";
							copy($ruta,$destino);
							$path=pathinfo($info['fileimagen']);
							$base=base_url();
							$ruta=$base."uploads/".$info['fileimagen'];
				
							}
							if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
								$info['fileimagen'] = $_FILES['fileimagen']['name'];
								$foto=$_FILES['fileimagen']['name'];
								$ruta=$_FILES["fileimagen"]["tmp_name"];
								$destino="uploads/$foto";
								copy($ruta,$destino);
								$path=pathinfo($info['fileimagen']);
							$base=base_url();
							$ruta=$base."uploads/".$info['fileimagen'];
					
								}
								
								
								$info['contenido']=$contenido;
								
								$info['fechaenvio']=$fechaenvio;
								$info['comentario']=$comentario;
								
								$info['statuscm']=0;
								$info['statusgc']=0;
								$info['statusdc']=1;
								$info['statusrech']=1;
								$info['statusrev']=0;
								$result=$this->atgc->rechazar_tarea_a_disenador_gc($info,$id_tarea);
			
								if($result){
									echo '<script type="text/javascript">alert("Enviado a diseñador correctamente");</script>';
									redirect("inicio/tareas_recibidas_de_disenador","refresh");
								}
								else{
									alert("No se pudo");
								}
							}

			}
			function revision_tarea_dc(){
				if (isset($_POST['revision'])) {
					$descripciontarea= $this->input->post('descripciontarea');
					$id_tarea= $this->input->post('id_tarea');
					$idCampana= $this->input->post('id_campana');
					$idNodo= $this->input->post('id_nodo');
					
					$comentario = $this->input->post('comentario');
					
					$fechaenvio=date('Y-m-d');
					
					if(($_POST['my_img']!=null) && ($_FILES['fileimagen']['name']==null)){
						$my_img = $this->input->post('my_img');
						$info['fileimagen'] =$my_img;
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
						
					}
					if(($_POST['my_img']==null) && ($_FILES['fileimagen']['name']!=null)){
					$info['fileimagen'] = $_FILES['fileimagen']['name'];
					$foto=$_FILES['fileimagen']['name'];
					$ruta=$_FILES["fileimagen"]["tmp_name"];
					$destino="uploads/$foto";
					copy($ruta,$destino);
					$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
		
					}
					if(($_POST['my_img']==!null) && ($_FILES['fileimagen']['name']!=null)){
						$info['fileimagen'] = $_FILES['fileimagen']['name'];
						$foto=$_FILES['fileimagen']['name'];
						$ruta=$_FILES["fileimagen"]["tmp_name"];
						$destino="uploads/$foto";
						copy($ruta,$destino);
						$path=pathinfo($info['fileimagen']);
					$base=base_url();
					$ruta=$base."uploads/".$info['fileimagen'];
			
						}
						
						
						
						$info['comentario']=$comentario;
						
						$info['statuscm']=0;
							$info['statusgc']=1;
							$info['statusdc']=0;
							$info['statusrech']=0;
							$info['statusrev']=1;
						$result=$this->atdc->enviar_tarea_revision_dc($info,$id_tarea);
	
						if($result){
							echo '<script type="text/javascript">alert("Enviado a Revisión correctamente");</script>';
							redirect("inicio/tareas_asignadas_gc","refresh");
						}
					}
					
			}
}