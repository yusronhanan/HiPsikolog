<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
/*
  Handle anything about view only. There is no any transactions. Only display

  "Modal" is pop up view
*/
  
      public function __construct()
      {
        parent::__construct();
        //load_model
      }

      /* START No need to login Pages */
      
      public function index() /* Beranda */
        {
        $this->load->view('welcome_message');
            
      }

      public function register()
      {
        
      }

      public function login()
      {
        
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