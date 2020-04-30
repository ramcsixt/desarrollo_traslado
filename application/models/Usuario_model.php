<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model
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
 /*   function loginMe($usuario, $contrasena)
    {
       
        $this->db->select( 'u.nombre, u.apellido, u.cargo, u.id_usuario, lu.usuario, lu.clave, m.nombre as modulo, um.*');
        $this->db->from('usuario u');
        $this->db->join('login_usuario lu','u.id_usuario = lu.id_usuario');
        $this->db->join('modulo_usuario um','um.id_usuario = u.id_usuario');
        $this->db->join('modulos m','m.id_modulos = um.id_modulo');
        $this->db->where('lu.usuario', $usuario);
        $this->db->where('lu.status', '1');
        $query = $this->db->get();
        $user = $query->result();
        if(!empty($user)){
            if($contrasena == $user[0]->clave){
                return $user;
            } else {
                return 2;
            }
        } else {
            return 1;
        }
    }

    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkEmailExist($email)
    {
        $this->db->select('userId');
        $this->db->where('email', $email);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }


    /**
     * This function used to insert reset password data
     * @param {array} $data : This is reset password data
     * @return {boolean} $result : TRUE/FALSE
     */
    function resetPasswordUser($data)
    {
        $result = $this->db->insert('tbl_reset_password', $data);

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * This function is used to get customer information by email-id for forget password email
     * @param string $email : Email id of customer
     * @return object $result : Information of customer
     */
    function getCustomerInfoByEmail($email)
    {
        $this->db->select('userId, email, name');
        $this->db->from('tbl_users');
        $this->db->where('isDeleted', 0);
        $this->db->where('email', $email);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function used to check correct activation deatails for forget password.
     * @param string $email : Email id of user
     * @param string $activation_id : This is activation string
     */
    function checkActivationDetails($email, $activation_id)
    {
        $this->db->select('id');
        $this->db->from('tbl_reset_password');
        $this->db->where('email', $email);
        $this->db->where('activation_id', $activation_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    // This function used to create new password by reset link
    function createPasswordUser($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', array('password'=>getHashedPassword($password)));
        $this->db->delete('tbl_reset_password', array('email'=>$email));
    }
}

?>

