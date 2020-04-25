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
        if($this->session->userdata('role') == "admin"){
          $data = array(
            'data_appointment' => $this->M_appointment->get_AllAppointment(),
            'data_psy' => $this->M_psy->get_AllPsy(),
            'data_client' => $this->M_client->get_AllClient(),
            'data_package' => $this->M_appointment->get_AllCounselling(),
            'main_view' => 'v_appointmentList',
            'title' => 'Appointment Data',
            'arrTime' =>$this->M_appointment->getTimeList(),
            'arrStatus' =>$this->M_appointment->getStatusList()

          );
          $this->load->view('v_layout',$data);
        } else{
           $this->session->set_flashdata('notif', "You don't have access to this page/Login please");
          redirect('home');
        }
      }

      public function psychologistlist()
      {
        /* Add and Edit will be included in this view, using modal */
          if($this->session->userdata('role') == "admin"){
        
          $data = array(
            'data_psy' => $this->M_psy->get_AllPsy(),
            'main_view' => 'v_psyList',
            'title' => 'Psychologist Data'
          );
          $this->load->view('v_layout',$data);
        } else{
           $this->session->set_flashdata('notif', "You don't have access to this page/Login please");
          redirect('home');
        }
      }

      
      
      public function clientList()
	    {
        /* Edit will be included in this view, using modal */

          if($this->session->userdata('role') == "admin"){

            $data = array(
              'data_client' => $this->M_client->get_AllClient(),
              'main_view' => 'v_clientList',
              'title' => 'Client Data'
            );
            $this->load->view('v_layout',$data);
          } else{
             $this->session->set_flashdata('notif', "You don't have access to this page/Login please");
            redirect('home');
          }
      }
      public function menuAdmin()
	    {
        if($this->session->userdata('role') == "admin"){
              $data = array(
                'data_client' => $this->M_client->get_AllClient(),
                'main_view' => 'v_menuAdmin',
                'title' => 'Menu Admin'
              );
              $this->load->view('v_layout',$data);
            } else{
               $this->session->set_flashdata('notif', "You don't have access to this page/Login please");
              redirect('home');
            }
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
      
      public function requestAppointment() 
      {
        /* View psychologist information in List, its the pages to choose the psychologist for the appointment
        "Psychologist information in detail" will be included in this view, using modal */
        if ($this->session->userdata('role') != "client") { 
          $this->session->set_flashdata('notif', "You can't access this page/Login please");
          redirect('/home');
        } else{
          // $hour = date('H:i:s');
          // $data['hour'] = $hour;
          $data['pkg'] = $this->uri->segment(3);
          $data['data_package'] = $this->M_appointment->get_AllCounselling();
          $data['arrTime'] =$this->M_appointment->getTimeList();
          $data['psyDescList'] = $this->M_psy->psyDescList();
          $data['title'] = 'Request Appointment';
          $data['main_view'] = 'v_requestAppointment';
          // $data['psyAppointment'] = $this->M_psy->get_AllPsy();
			    $this->load->view('v_layout', $data);
        }

      }

     
      
      public function myappointment()
      {
        /* View psychologist/client information will be included in this view, using modal  */
      
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') != "admin") {
            $id = $this->session->userdata('id');
        
            if($this->session->userdata('role') == "client"){
              $data['main_view'] = 'v_myappointmentClient';
              $data['data_psy'] = $this->M_psy->get_AllPsy();
              $data['data_appointment'] = $this->M_appointment->get_Appointment_ByWhere('clientID',$id);
            } else{
            //psy
            $data['main_view'] = 'v_myappoinmentPsy';
            $data['data_client'] = $this->M_client->get_AllClient();

            $data['data_appointment'] = $this->M_appointment->get_Appointment_ByWhere('psyID',$id);
            }

            $data['title'] = 'My Appointment';
            $data['data_package'] = $this->M_appointment->get_AllCounselling();
            $this->load->view('v_layout', $data);
          
        } else{
          $this->session->set_flashdata('notif', "You don't have access to this page/Login please");
          redirect('/home/login');
          
        }
      }


      /* END Client Pages (Need Login)*/

      /* START Psychologist Pages (Need Login)*/

      public function clientRequest()
      {
       /* View client request 
       "Request Appointment in detail" will be included in this view, using modal*/ 
      
      }

      public function myprofile()
      {
       /* View client information 
       "Client information in detail" will be included in this view, using modal*/
       if($this->session->userdata('role') == "client"){
          $id = $this->session->userdata('id');
          $data['title'] = 'My Profile';
          $data['main_view'] = 'v_myprofileClient';
          $data['data_client'] = $this->M_client->get_Client_ById($id);
          $this->load->view('v_layout', $data);
       }else{
          $id = $this->session->userdata('id');
          $data['title'] = 'My Profile';
          $data['main_view'] = 'v_myprofilePsy';
          $data['data_psy'] = $this->M_psy->get_Psy_ById($id);
			   $this->load->view('v_layout', $data);
       }  
      }

      /* END Psychologist Pages (Need Login)*/

  


}

/* End of file Home.php */

?>