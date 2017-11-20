<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('facebook');
	$this->load->helper('url');
        $this->load->model('Auth_model'); 
    }
    
    public function index()
    {       
            // FACEBOOK LOGIN
            $data['user'] = array();
            // verifica se o usuario esta logado pelo face
            if ($this->facebook->is_authenticated())
            {
                    // User logged in, get user details
                    $user = $this->facebook->request('get', '/me?fields=id,name,email');
                    if (!isset($user['error']))
                    {
                            $data['user'] = $user;
                    }
                    $this->session->set_userdata('login',true);
                    $this->session->set_userdata('user_profile',$data['user']);
            }

            // GOOGLE LOGIN
            if($this->session->userdata('login') == true){
                    redirect('auth/profile');
            }

            if (isset($_GET['code'])) {
                    $this->googleplus->getAuthenticate();
                    $this->session->set_userdata('login',true);
                    $this->session->set_userdata('user_profile',$this->googleplus->getUserInfo());
                    redirect('auth/profile');

            }
            $contents['login_url'] = $this->googleplus->loginURL();
            $this->load->view('login',$contents,$data);
    }

    public function profile(){

            if($this->session->userdata('login') != true){
                    redirect('');
            }

            $contents['user_profile'] = $this->session->userdata('user_profile');
            //$this->load->view('profile',$contents);
            $this->load->view('html-header',$contents);        
            $this->load->view('header');
            $this->load->view('menu');   
            $this->load->view('home');
            $this->load->view('html-footer');

    }

    public function logout(){

            $this->session->sess_destroy();
            $this->googleplus->revokeToken();
            redirect('');

    }
    
    public function registrar()
    {
        $this->load->view('registrar');
    }
 
    function cadastrar()
    {            
            $this->load->library('form_validation');
            
            $nome =  $this->input->post('nome');
            $this->form_validation->set_rules('nome', 'nome','required');
            
            $email =  $this->input->post('email');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            $senha =  $this->input->post('senha');
            $this->form_validation->set_rules('senha', 'Senha','required');            
            $this->form_validation->set_rules('confirmar-senha', 'Confirmar senha','required|matches[senha]');
            
            if ($this->form_validation->run() == FALSE) {
                 $erros = array('mensagens' => validation_errors());
                 $this->registrar();
            }
            else
            {
                $this-> result = $this->Auth_model->Registrar($nome,$email,$senha);
                $data = array(
                    'name' => $nome,
                    'email' => $email
                );
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('user_profile',$data);

                redirect(base_url('auth/profile'), 'refresh');                       
            }              
    }
     
   // Logar
      
    public function login()
    {            
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required');            
            
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|callback_db_check');
            
	if($this->form_validation->run()==false){
            $contents['login_url'] = $this->googleplus->loginURL();
            $this->load->view('login',$contents);
        }
        else{
            redirect(base_url('auth/profile'), 'refresh');
        }
    }
    
    function db_check($senha)
    {
        $email = $this->input->post('email');
        $usuario = $this->Auth_model->verifica($email, $senha);        
        
            if($usuario){
                
                $usuario = $this->Auth_model->buscarUsuario($email);
                
                $data = array(
                    'id' => $usuario[0]->id,
                    'name' => $usuario[0]->nome,
                    'email' => $usuario[0]->email
                );
                
                $this->session->set_userdata('login',true);
                $this->session->set_userdata('user_profile',$data);         
                return true;
                
            }else{
                $this->form_validation->set_message('db_check', 'E-mail ou senha inválido.');
                return false;
            }            
    } 
}
