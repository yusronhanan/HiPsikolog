<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {
/*
  Handle anything about appointment. There is no any load view here. Only add, edit, delete, transaction process.
*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_client');
        $this->load->model('M_psy');
        $this->load->model('M_appointment');
    }
    public function index()
    {
        
    }

    public function deleteAppointment($id)
    {
      if($this->M_appointment->delete_appointment($id)){
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('notif', 'Success delete the data');
      } else{
        $this->session->set_flashdata('notif', 'Failed to delete the data');
      }
      ;
      redirect('/home/appointmentList');
    }

    public function editAppointment($id)
    {
      $this->form_validation->set_rules('clientName', 'clientName', 'required');
      $this->form_validation->set_rules('psyName', 'psyName', 'required');
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
                      redirect('/home/clientList'); /* need to modified */
                    
                    } else {
                      $this->session->set_flashdata('notif', 'Failed to update data');
                      redirect('/home/clientList'); /* need to modified */
                    
                    }
                  
                } else {
                  $this->session->set_flashdata('notif', 'Data is not exist');
                  redirect('/home/clientList'); /* need to modified */
                }
              
      } else {
              $this->session->set_flashdata('notif', 'One of required input is empty');
              redirect('/home/clientList'); /* need to modified */
      }
    }

}

/* End of file Appointment.php */

?>