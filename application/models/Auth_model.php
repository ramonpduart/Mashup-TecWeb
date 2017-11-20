<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
    }
        
    public function verifica($email = '', $senha = '')
    {
        $this->db->select('id, nome, email');
        $this->db->where(array('email'=>$email, 'senha'=>md5($senha)));
        $res = $this->db->get('usuario'); // coletando usuarios no banco

        if($res->num_rows()==1) {
            return $res->result();
        } 
        else
        {
            return false;
        }			
    }
    
    function Registrar($nome,$email,$senha)
    {
           $data = array(
            'nome' => $nome,
            'email' => $email,            
            'senha'=>md5($senha)
           );                     
           $this->db->insert('usuario',$data);        
           
    }
    
    function buscarUsuario($email)
    {        
        $this->db->select('id, nome, email');
        $this->db->where('email',$email);
        $res = $this->db->get('usuario'); // coletando usuarios no banco
            
            if($res->num_rows()==1)
                return $res->result();
            else
                return false;
    }
}