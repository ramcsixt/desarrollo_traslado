<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Servicios extends CI_Controller {
	public function index()
	{
        $this->load->view('include/head');
        $this->load->view('traslado/index');
        $this->load->view('include/footer');
	}


}
