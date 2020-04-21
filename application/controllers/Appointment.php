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
    
    public function requestAppointment()
    {
      $this->form_validation->set_rules('psyID', 'Psychologist', 'required');
      $this->form_validation->set_rules('counsellingID', 'Counselling Package', 'required');
      $this->form_validation->set_rules('time', 'Time', 'required');
      $this->form_validation->set_rules('date', 'Date', 'required');


      
      if ($this->form_validation->run() == TRUE) {
                
                    if ($this->M_appointment->request_appointment()) {
                      $this->session->set_flashdata('type', 'success');
                      $this->session->set_flashdata('notif', 'Success request appointment');
                      redirect('/home/counselling'); /* need to modified */
                    
                    } else {
                      $this->session->set_flashdata('notif', 'Failed to request appointment');
                      redirect('/home/counselling'); /* need to modified */
                    }
      } else {
              $this->session->set_flashdata('notif', 'One of required input is empty');
              redirect('/home/clientList'); /* need to modified */
      }
    }
    public function addAppointment()
    {
      /* by admin*/
      $this->form_validation->set_rules('clientID', 'Client Name', 'required');
      $this->form_validation->set_rules('psyID', 'Psychologist Name', 'required');
      $this->form_validation->set_rules('counsellingID', 'Package Name', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');
      $this->form_validation->set_rules('time', 'Time', 'required');
      $this->form_validation->set_rules('date', 'Date', 'required');


      
      if ($this->form_validation->run() == TRUE) {
                
                  
                    if ($this->M_appointment->add_appointment()) {
                      $this->session->set_flashdata('type', 'success');
                      $this->session->set_flashdata('notif', 'Success added data');
                      redirect('/home/appointmentList'); /* need to modified */
                    
                    } else {
                      $this->session->set_flashdata('notif', 'Failed to add data');
                      redirect('/home/appointmentList'); /* need to modified */
                    
                    }
                  
               
              
      } else {
              $this->session->set_flashdata('notif', 'One of required input is empty');
              redirect('/home/clientList'); /* need to modified */
      }
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
      $this->form_validation->set_rules('clientID', 'Client Name', 'required');
      $this->form_validation->set_rules('psyID', 'Psychologist Name', 'required');
      $this->form_validation->set_rules('counsellingID', 'Package Name', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required');
      $this->form_validation->set_rules('time', 'Time', 'required');
      $this->form_validation->set_rules('date', 'Date', 'required');


      
      if ($this->form_validation->run() == TRUE) {
                
                if (!empty($this->M_appointment->get_Appointment_ById($id))){
                  
                    if ($this->M_appointment->edit_appointment($id)) {
                      $this->session->set_flashdata('type', 'success');
                      $this->session->set_flashdata('notif', 'Success updated data');
                      redirect('/home/appointmentList'); /* need to modified */
                    
                    } else {
                      $this->session->set_flashdata('notif', 'Failed to update data');
                      redirect('/home/appointmentList'); /* need to modified */
                    
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

    public function updateStatus()
    {
      $status = $this->uri->segment(3); 
      $id = $this->uri->segment(4);
      if($this->M_appointment->update_Appointment_ByWhere($id,'status',$status)){
        $this->session->set_flashdata('type', 'success');
        $this->session->set_flashdata('notif', 'Success cancel appointment');
      }
      redirect('/home/myappointment');
    }

}

/* End of file Appointment.php */

?>