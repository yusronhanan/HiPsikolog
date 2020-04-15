<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
/*
  Handle anything about view only. There is no any transactions. Only display

  - "Modal" is pop up view
  - v_layout contains header and footer
  - main_view will be loaded inside v_layout
*/
  
      public function __construct()
      {
        parent::__construct();
        //load_model
        $this->load->model('M_auth');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
      }

      /* START No need to login Pages */
      
      public function index() /* Beranda */
        {
          $data['title'] = 'Home';
          $data['main_view'] = 'v_home';

          $this->load->view('v_layout',$data);
            
      }

      public function register()
      {
        $email = $this->input->post('clientEmail');
		    $password = $this->input->post('clientPassword');
		    $repass = $this->input->post('re-password');
		    if($email){
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
                    'username' => $this->input->post('clientName')
                  );
                  $this->session->set_userdata('logged_in', $session_data);
                  redirect('/home'); /* need to modified */
                } else {
                  $data['main_view'] = 'v_register';
                  $data['error_message'] = 'Failed to register account';
                  $this->load->view('v_layout', $data);
                }
              } else {
                $data['main_view'] = 'v_register';
                $data['error_message'] = 'Failed to upload image';
                $this->load->view('v_layout', $data);
              }
            } else {
              $data['main_view'] = 'v_register';
              $data['error_message'] = 'Username already exist';
              $this->load->view('v_layout', $data);
            }
          } else {
            $data['main_view'] = 'v_register';
            $data['error_message'] = 'Password and Re-Enter Password is not match';
            $this->load->view('v_layout', $data);
          }
        } else {
          $data['title'] = 'Register';
          $data['main_view'] = 'v_register';
			    $this->load->view('v_layout', $data);
        }
      }

      public function login()
      {
        if($this->input->post('email')){
          if($this->M_auth->login_client()||$this->M_auth->login_psy()||$this->M_auth->login_admin()){
            redirect('/home');
          } else {
            $data['main_view'] = 'v_login';
				    $data['error_message'] = 'Invalid Username or Password';
				    $this->load->view('v_layout', $data);
          }
        } else {
          $data['title'] = 'Login';
          $data['main_view'] = 'v_login';
			    $this->load->view('v_layout', $data);
        }
      }

      /* END No need to login Pages */


      /* START Admin Pages (Need Login)*/

      public function appoinmentlist()
      {
        /* Add and Edit will be included in this view, using modal */
      }

      public function psychologistlist()
      {
        /* Add and Edit will be included in this view, using modal */

        
      }

      public function clientlist()
      {
        /* Add and Edit will be included in this view, using modal */
        
      }

      /* END Admin Pages (Need Login)*/

      /* START Client Pages (Need Login)*/

      public function counsellingpackage()
      {
        /* "Request an appoinment" view will be included in this view, using modal, 
        then it will redirect to psychologistAppoinment() to choose the psychologist for the appoinment */

        
      }
      
      public function psychologistAppoinment() 
      {
        /* View psychologist information in List, its the pages to choose the psychologist for the appoinment
        "Psychologist information in detail" will be included in this view, using modal */

      }

      public function myappoinment()
      {
        /* View psychologist information will be included in this view, using modal 
        "Appoinment information in detail" will be included in this view, using modal */
        
      }
      


      /* END Client Pages (Need Login)*/

      /* START Psychologist Pages (Need Login)*/

      public function clientRequest()
      {
       /* View client request 
       "Request Appointment in detail" will be included in this view, using modal*/ 
      
      }

      public function myclient()
      {
       /* View client information 
       "Client information in detail" will be included in this view, using modal*/ 
        
      }

      /* END Psychologist Pages (Need Login)*/

  


}

/* End of file Home.php */

?>