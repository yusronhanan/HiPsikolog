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
        $this->load->model('Mod');
    }

    public function login(){
      $username = $this->input->post('usr');
      $password = $this->input->post('pwd');

      if ($this->Mod->login($data)){
        $session_data = array(
          'username' => $data['username']
        );
        $this->session->set_userdata('logged_in', $session_data);
        redirect('/Home');
      } else {
        $data['error_message'] = 'Invalid Username or Password';
        $this->load->view('login', $data);
      }
    }

    public function index()
    {
      $this->load->view('login');
    }

    
    public function logout()
    {
      $this->session->sess_destroy();
      redirect('Auth');
    }
}

/* End of file Auth.php */

?>