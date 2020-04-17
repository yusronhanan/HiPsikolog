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
        $this->load->model('M_client');
        $this->load->model('M_psy');
        $this->load->model('M_admin');
    }

    public function login(){
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      
      
      if ($this->form_validation->run() == TRUE) {
        if($this->M_auth->login_client()||$this->M_auth->login_psy()||$this->M_auth->login_admin()){
                $id ="";
                $name ="";
                $role = "";

                if($this->M_auth->login_admin){
                  $id =  $this->M_admin->get_Admin_ByEmail($this->input->post('email'))->adminID;
                  $name =$this->M_admin->get_Admin_ByEmail($this->input->post('email'))->adminEmail;
                  $role = "admin";
                } else if($this->M_auth->login_psy){
                  $id =  $this->M_psy->get_Psy_ByEmail($this->input->post('email'))->psyID;
                  $name =$this->M_psy->get_Psy_ByEmail($this->input->post('email'))->psyEmail;
                  $role = "psy";
                } else{
                  $id =  $this->M_client->get_Client_ByEmail($this->input->post('email'))->clientID;
                  $name =$this->M_client->get_Client_ByEmail($this->input->post('email'))->clientEmail;
                  $role = "client";
                }
                $session_data = array(
                  'id' => $id,
                  'name' => $name,
                  'role' => $role,
                  'logged_in' => true /* logged in means, the user success logged_in = true */
                );
                $this->session->set_userdata($session_data);
                redirect('/home');
        } else {
              $this->session->set_flashdata('notif', 'Invalid Username or Password');
              redirect('/home/login'); /* need to modified */
        }
      
      } else {
              $this->session->set_flashdata('notif', 'One of required input is empty');
              redirect('/home/login'); /* need to modified */
      }
      

    }

    public function register(){

      $this->form_validation->set_rules('clientName', 'Name', 'required');
      $this->form_validation->set_rules('clientEmail', 'Email', 'required');
      $this->form_validation->set_rules('clientPassword', 'Password', 'required');
      $this->form_validation->set_rules('re-password', 'Re-Password', 'required');
      $this->form_validation->set_rules('clientPhoneNumber', 'Phone Number', 'required');

      
      if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('clientEmail');
                $password = $this->input->post('clientPassword');
                $repass = $this->input->post('re-password');
              
              if ($password == $repass) {
                if (!$this->M_auth->check_email_client($email)){
                  $initialize = $this->upload->initialize(array(
                    'upload_path' => './assets/img/',
                    'allowed_types' => 'gif|jpg|jpeg|png'
                  ));
                  if($this->upload->do_upload('uploadImage')){
                    $photo = $this->upload->data();
                    if ($this->M_auth->register($photo)) {

                      $session_data = array(
                        'id' => $this->M_client->get_Client_ByEmail($client_email)->clientID,
                        'name' => $this->input->post('clientName'),
                        'role' => 'client',
                        'logged_in' => true /* logged in means, the user success logged_in = true */
                      );
                      $this->session->set_userdata($session_data);
                      redirect('/home'); /* need to modified */
                    
                    } else {
                      $this->session->set_flashdata('notif', 'Failed to register account');
                      redirect('/home/register'); /* need to modified */
                    
                    }
                  } else {
                    $this->session->set_flashdata('notif', 'Failed to upload image');
                    redirect('/home/register'); /* need to modified */
                  }
                } else {
                  $this->session->set_flashdata('notif', 'Email already exist');
                  redirect('/home/register'); /* need to modified */
                }
              } else {
                $this->session->set_flashdata('notif', 'Password and Re-Enter Password is not match');
                redirect('/home/register'); /* need to modified */
              }
      } else {
              $this->session->set_flashdata('notif', 'One of required input is empty');
              redirect('/home/register'); /* need to modified */
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