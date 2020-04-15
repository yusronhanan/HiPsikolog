<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
/*
  Handle anything about auth. There is no any load view here. Only add, edit, delete, transaction process.
*/
    public function __construct()
    {
        parent::__construct();
        //load_model
        $this->load->model('M_auth');
        $this->load->library('session');
    }

    public function login(){

      if ($this->M_auth->login_client()){      
        
        redirect('/Home');

      } else if ($this->M_auth->login_psy()) {
        
        $data = array(
          'id'=>$this->M_auth->login_psy['id'],
          'name'=>$this->M_auth->login_psy['name'],
          'role'=>$this->M_auth->login_psy['role'],
        );
        
        $this->session->set_userdata($data);
        redirect('/Home')

      } else if ($this->M_auth->login_admin()) {
        $data = array(
          'id'=>$this->M_auth->login_admin['id'],
          'name'=>$this->M_auth->login_admin['name'],
          'role'=>$this->M_auth->login_admin['role'],
        );
      
        $this->session->set_userdata($data)
      
      } else () {
      
        redirect('/Home/login')
      
      }
    }

    public function index()
    {
      $this->load->view('login');
    }

    
    public function logout()
    {
      $this->session->sess_destroy();
      redirect('/Home/login');
    }
}

/* End of file Auth.php */

?>