<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Usuario_model extends CI_Model
{
    public function __construct(){
		parent::__construct();
	}
    
    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     *  u.nombre, u.apellido, u.id_usuario, lu.usuario, lu.clave,m.nombre, um.* 
     */
    function listar_usuario()
    {
        $query = $this->db->select("u.id_usuario, u.nombre, u.apellido, u.cargo, u.status, lu.usuario");
        $query = $this->db->from('usuario u');
        $query = $this->db->join('login_usuario lu','u.id_usuario = lu.id_usuario');
		$query = $this->db->order_by('u.cargo', 'desc');
        $query = $this->db->get();
		return $query;
    }
    function registrar($data)
    {
        $correo = $data['correo'];
        $query = $this->db->query("SELECT usuario FROM login_usuario WHERE usuario = '$correo' ");
        $valor = $query->row();
        
		if ($valor) {
           return 3;
        }else{

            $result = $this->db->insert('usuario', array(
                'id_usuario' => 0,
                'dni'        => $data['dni'],
                'nombre'     => strtoupper($data['nombre']),
                'apellido'   => strtoupper($data['apellido']),
                'cargo'      => strtoupper($data['cargo']),
                'status'     => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ));
            if ($result){
                $ultimoId = $this->db->insert_id();
                $resultCredenciales = $this->db->insert('login_usuario', array(
                    'id_login_usuario' => 0,
                    'id_usuario'       => $ultimoId,
                    'usuario'          => $data['correo'],
                    'clave'            => md5($data['apellido']),
                    'created_at'       => date('Y-m-d H:i:s'),
                    'updated_at'       => date('Y-m-d H:i:s')
                ));
                return $result;
            } else{
                return null; 
            }
        }
        
        
    }

    function buscar($data)
    {
        return $this->db
			->select('u.nombre, u.apellido, u.cargo, u.dni, lu.usuario, lu.clave')
            ->from('usuario u')
            ->join('login_usuario lu','u.id_usuario = lu.id_usuario')
			->where('u.id_usuario', $data['id_usuario'])
			->get()
			->result();
    }

    public function actualizar($data)
    {
                
        $resultu = $this->db->where('id_usuario', $data['id_usuario'])
                ->update('usuario', array(
                'dni'        => $data['dni'],
                'nombre'     => strtoupper($data['nombre']),
                'apellido'   => strtoupper($data['apellido']),
                'cargo'      => strtoupper($data['cargo']),
                'status'     => 1,
                'updated_at' =>date('Y-m-d H:i:s')
        ));
        if ($resultu) {
        $resultl = $this->db->where('id_usuario', $data['id_usuario'])
                ->update('login_usuario', array(
                'usuario'        => $data['correo'],
                'clave'     => $data['password'],
                'updated_at' =>date('Y-m-d H:i:s')
            ));
        }

        return $resultl;
    }

    public function cambio_status($data)
    {
       
       if ($data['status'] == 1) {
         $status = 0;
       } 
       else{
         $status = 1;
       }        
        $resultu = $this->db->where('id_usuario', $data['id_usuario'])
                ->update('usuario', array(
                'status'     => $status,
                'updated_at' => date('Y-m-d H:i:s')
        ));
    
       return $resultu;
    }
    
    
}

?>


