<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Traslado extends CI_Controller
{
	public function __construct(){
        if(!$this->session->userdata('logueado')){
			redirect('/');
		}
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->model('usuario_model');
        $this->request = json_decode(file_get_contents('php://input'));	
        
	}

	public function Index()
	{
		$this->load->view('include/login/head');
		$this->load->view('usuario/index');
		$this->load->view('include/login/footer');
	}

	public function enviar_prospecto(){

		$data = $this->input->post();
		$result = $this->trasladoModel->enviar_prospecto($data);
		echo json_encode($result);
	    exit();

	}
	public function guardar_traslado()
	{
		$data = $this->input->post();
		var_dump($_REQUEST);exit();
	}
}
