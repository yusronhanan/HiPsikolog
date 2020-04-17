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
        $this->load->model('M_psy');
        $this->load->model('M_appointment');
        $this->load->model('M_admin');
        $this->load->model('M_auth');
        $this->load->model('M_client');

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
         /* If the status already login (logged_in = true), redirect to home, load register view otherwise
         - Masa udah login, bisa regsiter ? kan ngga */
         if ($this->session->userdata('logged_in')) { 
          redirect('home');
        } else{
          $data['title'] = 'Register';
          $data['main_view'] = 'v_register';
			    $this->load->view('v_layout', $data);
        }
          
      }

      public function login()
      {
        /* If the status already login (logged_in = true), redirect to home, load login view otherwise
        - Masa udah login, bisa balik ke halaman login lagi ? kan ngga */
        if ($this->session->userdata('logged_in')) { 
          redirect('home');
        } else{
          $data['title'] = 'Login';
          $data['main_view'] = 'v_login';
			    $this->load->view('v_layout', $data);
        }
          
      }

      /* END No need to login Pages */


      /* START Admin Pages (Need Login)*/

      public function appointmentList()
      {
        /* Add and Edit will be included in this view, using modal */
        $data = array(
          'data_appointment' => $this->M_appointment->get_AllAppointment(),
          'main_view' => 'v_appointmentList',
          'title' => 'Appointment Data'
        );
		    $this->load->view('v_layout',$data);
      }

      public function psychologistlist()
      {
        /* Add and Edit will be included in this view, using modal */
        $data = array(
          'data_psy' => $this->M_psy->get_AllPsy(),
          'main_view' => 'v_psyList',
          'title' => 'Psychologist Data'
        );
		    $this->load->view('v_layout',$data);
      }

      
      public function clientList()
	    {
        $data = array(
          'data_client' => $this->M_client->get_AllClient(),
          'main_view' => 'v_clientList',
          'title' => 'Client Data'
        );
		    $this->load->view('v_layout',$data);
	    }

     

      /* END Admin Pages (Need Login)*/

      /* START Client Pages (Need Login)*/

      public function counselling()
      {
        /* 
        Display counselling package price and can directly doing request an appointment
        "Request an appointment" view will be included in this view, using modal, 
        then it will redirect to psychologistAppointment() to choose the psychologist for the appointment */
        $data["main_view"] = "v_counselling";
        $data['title'] = 'Counselling';
        
        $data['counsellingpackage'] = $this->M_appointment->get_AllCounselling();
        $this->load->view('v_layout', $data);
      }
      
      public function psychologistAppointment() 
      {
        /* View psychologist information in List, its the pages to choose the psychologist for the appointment
        "Psychologist information in detail" will be included in this view, using modal */
        if (!$this->session->userdata('logged_in')) { 
          redirect('/home/login');
        } else{
          $data['title'] = 'Psychologist Appointment';
          $data['main_view'] = 'v_psyAppointment';
          $data['psyAppointment'] = $this->M_psy->get_AllPsy();
			    $this->load->view('v_layout', $data);
        }

      }

      public function myappointment()
      {
        /* View psychologist information will be included in this view, using modal 
        "Appointment information in detail" will be included in this view, using modal */
        
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