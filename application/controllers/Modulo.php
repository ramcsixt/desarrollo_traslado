<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Usuario extends CI_Controller
{
	public function __construct(){
		
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		parent::__construct();
		$this->load->model('usuario_model');
		$this->request = json_decode(file_get_contents('php://input'));	
		$this->load->database();
		$this->load->library('session');
		if(!$this->session->userdata('legueado')){
			redirect('/');
		}
        
	}

	public function index()
	{
		$this->load->view('include/escritorio/head');
		$this->load->view('usuario/index');
		$this->load->view('include/escritorio/footer');
	}

	public function listar_usuario(){

		$draw = intval($this->input->get("draw"));
	    $start = intval($this->input->get("start"));
	    $length = intval($this->input->get("length"));
	    $query = $this->usuario_model->listar_usuario();
		$data = [];
		$estado = '';
	    foreach($query->result() as $r) {
			if ($r->status == 1) {
				$estado = '<button type="button" class="btn btn-success btn-sm">Activo</button>';
			}
			else{
				$estado = '<button type="button" class="btn btn-warning btn-sm">Inactivo</button>';
			}
			$sel = '<input type="radio" id="autovia" name="idUsuario" onclick="ruUsuario('.$r->id_usuario.','.$r->status.');"><label for="radio1"></label>';
			$data[] = array(
				$r->nombre,
				$r->apellido,
				$r->cargo,
				$r->usuario,
				$estado,
				$sel
			);
     	}
	  $result = array(
	       	"draw" => $draw,
	        "recordsTotal" => $query->num_rows(),
	        "recordsFiltered" => $query->num_rows(),
	        "data" => $data
      	);
  
	    echo json_encode($result);
	    exit();
			

	}
	public function crear()
	{
		$data = $this->input->post();
		$result = $this->usuario_model->registrar($data);
		echo json_encode($result);
	    exit();
	}
	public function buscar()
	{
	
		$data = $this->input->post();
		$result = $this->usuario_model->buscar($data);
		echo json_encode($result);
	    exit();
	}

	public function actualizar()
	{
		$data = $this->input->post();
		$result = $this->usuario_model->actualizar($data);
		echo json_encode($result);
	    exit();
	}
	public function cambio_status()
	{
		$data = $this->input->post();
		$result = $this->usuario_model->cambio_status($data);
		echo json_encode($result);
	    exit();
	}
}
