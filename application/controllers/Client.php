<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
/*
  Handle anything about client. There is no any load view here. Only add, edit, delete, transaction process.
*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_client');
        $this->load->model('M_psy');
        $this->load->model('M_appointment');

    }
    public function editClient($id)
    {
      $this->form_validation->set_rules('clientName', 'Name', 'required');
      $this->form_validation->set_rules('clientEmail', 'Email', 'required');
      $this->form_validation->set_rules('clientPassword', 'Password', 'required');
      $this->form_validation->set_rules('clientPhoneNumber', 'Phone Number', 'required');

      
      if ($this->form_validation->run() == TRUE) {
                if (!empty($this->M_client->get_Client_ById($id))){
                  $initialize = $this->upload->initialize(array(
                    'upload_path' => './assets/img/',
                    'allowed_types' => 'gif|jpg|jpeg|png'
                  ));
                    $this->upload->do_upload('uploadImage');
                    $photo = $this->upload->data();
                    if ($this->M_client->edit_client($id,$photo)) {
                      $this->session->set_flashdata('type', 'success');
                      $this->session->set_flashdata('notif', 'Success updated data');                     
                    } else {
                      $this->session->set_flashdata('notif', 'Failed to update data');                      
                    }                  
                } else {
                  $this->session->set_flashdata('notif', 'Data is not exist');                  
                }
              
      } else {
              $this->session->set_flashdata('notif', 'One of required input is empty');
              
      }
      if($this->session->userdata('role') == "admin"){
        redirect('/home/clientList');
      } else {
        redirect('/home/myprofile');
      }
    }

    public function deleteClient($id)
    {
      if($this->M_client->delete_client($id)){
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('notif', 'Success delete the data');
      } else{
        $this->session->set_flashdata('notif', 'Failed to delete the data');
      }
      redirect('/home/clientList');
    }

}

/* End of file Client.php */

?>