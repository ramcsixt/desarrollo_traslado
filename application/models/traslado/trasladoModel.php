<?php
class trasladoModel extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function enviar_prospecto($data)
	{
		$queryConsultarProspecto = $this->db->select("correo");
		$queryConsultarProspecto = $this->db->from('prospecto');
		$queryConsultarProspecto = $this->db->where("correo", $data['correo'],);
        $queryConsultarProspecto = $this->db->get();
		$existeCorreo = $queryConsultarProspecto->result();

		if(empty($existeCorreo)) {
			$result = $this->db->insert('prospecto', array(
				'id_prospecto'   => 0,
				'tipo_documento' => 0,
				'nro_documento'  => 0,
				'full_nombre'    => strtoupper($data['full_nombre']),
				'correo'         => $data['correo'],
				'tel_movil'      => $data['tel_movil'],
				'created_at'     =>  date('Y-m-d H:i:s'),
				'update_at'      =>  date('Y-m-d H:i:s'),	
			));
		}else{
			$result = $this->db
				->where('correo', $data['correo'])
				->update('prospecto', array(
					'full_nombre'    => strtoupper($data['full_nombre']),
					'tel_movil'      => $data['tel_movil'],
					'update_at'      =>  date('Y-m-d H:i:s'),	
				));
		}
		if ($result){
			return $result;
		} else{
			return null; 
		}
	}
}
/* 
	$.ajax({
			type: "POST",
			url: ...,
			data: {'array': JSON.stringify(array)},//capturo array     
			success: function(data){

			}
	});
	De esta forma de recibe en el backend por php

	$data = json_decode($_POST['array']);
	var_dump($data);
 */