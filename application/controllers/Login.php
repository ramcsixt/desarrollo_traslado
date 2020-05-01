<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Login extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		$this->load->model('Login_model');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		//$this->request = json_decode(file_get_contents('php://input'));
	}

	public function index()
	{
		$dato=array(
			'error'=>$this->session->flashdata('error'),
			'username'=>$this->session->flashdata('username'),
			'type'=>$_GET["type"]

		);
			$this->load->view('include/login/head');
			$this->load->view('login/index',$dato);
			$this->load->view('include/login/footer');
	}

	public function validar_acceso()
	{
		
		$data = $this->input->post();
		$usuario = $data['correo'];
		$contrasena = md5($data['password']);
		$result = $this->Login_model->loginMe($usuario, $contrasena);
		if ($result != 1 && $result != 2) {
			$dato['usuario']= $result;
			$user_data = array(
				'apellido' 	 => $result[0]->apellido, 
				'id_usuario' => $result[0]->id_usuario,
				'nombre'    => $result[0]->nombre,
				'cargo' 	 => $result[0]->cargo,
				'correo'   => $result[0]->usuario,
				'legueado'  => 1 
			);
			$this->session->set_userdata($user_data);
			$this->load->view('include/escritorio/head');
			$this->load->view('escritorio/index',$dato);
			$this->load->view('include/escritorio/footer');
		}
		else{
			$dato['error'] = $result;
			$this->load->view('include/login/head');
			$this->load->view('login/index',$dato);
			$this->load->view('include/login/footer');
		}

		
	}

	/*
		$data = $this->input->post();
		$usuario = $data['usuario'];
		$contrasena = $data['password'];
		$result = $this->Login_model->loginMe($usuario, $contrasena);
		$data['error'] = $result;
		if (($result==2) || ($result==1)|| ($result==3)) {
			$this->load->view('login', $data);
			
		}else{
			
			$user_data = array(
				'apellido_p' => $result[0]->apellido_p, 
				'dni' 		 => $result[0]->dni,
				'nombres'    => $result[0]->nombres,
				'personal_id'=> $result[0]->personal_id,
				'perfil' 	 => $result[0]->perfil,
				'sucursal'   => $result[0]->sucursal,
				'logeado'	 => true 
 			);
			$this->session->set_userdata($user_data);
			$perfil = $this->session->userdata('personal_id');
			if (($perfil == 1)||($perfil == 2)||($perfil == 3)) {
				$sucursal = '0';
				$data['perfil'] = $this->session->userdata('perfil');
			}
			else{
				$sucursal = $this->session->userdata('sucursal');
				$data['perfil'] = $this->session->userdata('perfil');
			}

		//$data['sucursales'] = $this->sucursalModel->buscarSucursal($sucursal);

			$this->load->view('principal', $perfil);
			//$this->load->view('includes/footer');
		}
	
	public function Verificador()
	{
		$this->load->model(array(
			'General/Usuario_model',
			'Comercial/Contacto_model'
		));
		$type=$_POST["type"];
		$correo=$_POST["correo"];
		$password=$_POST["password"];

		$usuario=$this->Usuario_model->sesion($correo);
		if($usuario->contador>0){
			if($password==$usuario->password){
				$usuario_data = array(
					'idusuario' => $usuario->idusuario,
					'username'=>$usuario->username,
					'nombre' => $usuario->nombre." ".$usuario->apellido,
					'logueado' => TRUE
				);
				$this->session->set_userdata($usuario_data);
				redirect('Dashboard');
			}else{
				$this->session->set_flashdata('error','La Contraseña es Incorrecta');
			//	$this->session->set_flashdata('username',$correo);
				redirect("/",'refresh');
			}
		}else{
			$this->session->set_flashdata('error','El Correo electronico no existe en el Sistema');
			redirect("/",'refresh');
		}
	}

	public function Cerrar_sesion() {
		$usuario_data = array(
			'logueado' => FALSE
		);
		$this->session->set_userdata($usuario_data);
		redirect('/','refresh');
	}*/

}
