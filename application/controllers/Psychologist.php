<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Psychologist extends CI_Controller {
/*
  Handle anything about psychologist. There is no any load view here. Only add, edit, delete, transaction process.
*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_client');
        $this->load->model('M_psy');
        $this->load->model('M_auth');
        $this->load->model('M_appointment');

    }

    public function addPsychologist()
      {
      $this->form_validation->set_rules('psyName', 'Name', 'required');
      $this->form_validation->set_rules('psyEmail', 'Email', 'required');
      $this->form_validation->set_rules('psyPassword', 'Password', 'required');
      $this->form_validation->set_rules('psyPhoneNumber', 'Phone Number', 'required');
      $this->form_validation->set_rules('psyDesc', 'Phone Number', 'required');


      
      if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('psyEmail');

                if (!$this->M_auth->check_email_psy($email)){
                  $initialize = $this->upload->initialize(array(
                    'upload_path' => './assets/img/',
                    'allowed_types' => 'gif|jpg|jpeg|png'
                  ));
                  if($this->upload->do_upload('uploadImage')){
                    $photo = $this->upload->data();
                    if ($this->M_psy->add_psy($photo)) {
                      $this->session->set_flashdata('type', 'success');
                      $this->session->set_flashdata('notif', 'Success Added data');
                    } else {
                      $this->session->set_flashdata('notif', 'Failed to add account');
                    }
                  } else {
                    $this->session->set_flashdata('notif', 'Failed to upload image');     
                  }
                } else {    
                  $this->session->set_flashdata('notif', 'Email already exist');
                }
      } else {      
              $this->session->set_flashdata('notif', 'One of required input is empty');
      }

        redirect('/home/psychologistList');/* need to modified */

      }

      public function editPsychologist($id)
      {
          $this->form_validation->set_rules('psyName', 'Name', 'required');
          $this->form_validation->set_rules('psyEmail', 'Email', 'required');
          $this->form_validation->set_rules('psyPassword', 'Password', 'required');
          $this->form_validation->set_rules('psyPhoneNumber', 'Phone Number', 'required');
          $this->form_validation->set_rules('psyDesc', 'Phone Number', 'required');


          
          if ($this->form_validation->run() == TRUE) {
                    $email = $this->input->post('psyEmail');

                    if (!empty($this->M_psy->get_Psy_ById($id))){

                        $initialize = $this->upload->initialize(array(
                          'upload_path' => './assets/img/',
                          'allowed_types' => 'gif|jpg|jpeg|png'
                        ));
                        $this->upload->do_upload('uploadImage'); 
                        // $photo = $this->upload->data();
                        
                        if ($this->M_psy->edit_psy($id, $this->upload->data())) {
                        $this->session->set_flashdata('type', 'success');
                          $this->session->set_flashdata('notif', 'Success Updated data');
                        } else {
      
                          $this->session->set_flashdata('notif', 'Failed to edit the data');
                        }
                      
                    } else {
                      
                      $this->session->set_flashdata('notif', 'Data is not exist exist');
                    }
          } else {
                  
                  $this->session->set_flashdata('notif', 'One of required input is empty');
          }
          if($this->session->userdata('role') == "admin"){
            redirect('/home/psychologistList');/* need to modified */
          } else {
            redirect('/home/myprofile');
          }
      }

      public function deletePsychologist($id)
      {
        if($this->M_psy->delete_psy($id)){
          $this->session->set_flashdata('type', 'success');
          $this->session->set_flashdata('notif', 'Success delete the data');
        } else{
           
          $this->session->set_flashdata('notif', 'Failed to delete the data');
        }
        redirect('/home/psychologistList');
      }


}

/* End of file Psychologist.php */

?>
