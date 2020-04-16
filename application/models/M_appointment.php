<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_appointment extends CI_Model {
/*
Handle anything about appointment (Counseling Transactions) and Counselling Package

Appointment Status : requested, accepted, cancelled, or done.
*/
    public function add_appointment(){
        $data = array(
            'appointmentID' => $this->randomString_appointmentID(),
            'counsellingID' => $this->input->post('counsellingID'),
            'clientID' => $this->input->post('clientID'),
            'psyID' => $this->input->post('psyID'),
            'date' => $this->input->post('date'), //need to take care of, because the type is date
            'time' => $this->input->post('time'),
            'status' => $this->input->post('status')
        );

        $this->db->insert('appointment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function edit_appointment($appointment_id){
        $data = array(
            'counsellingID' => $this->input->post('counsellingID'),
            'clientID' => $this->input->post('clientID'),
            'psyID' => $this->input->post('psyID'),
            'date' => $this->input->post('date'), //need to take care of, because the type is date
            'time' => $this->input->post('time'),
            'status' => $this->input->post('status')
        );

        $this->db->where('appointmentID',$appointment_id)->update('appointment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function delete_appointment($appointment_id){
        $this->db->where('appointmentID',$appointment_id)
                ->delete('appointment');
                
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function request_appointment(){
        $data = array(
            'appointmentID' => randomString_appointmentID(),
            'counsellingID' => $this->input->post('counsellingID'),
            'clientID' => $this->input->post('clientID'),
            'psyID' => $this->input->post('psyID'),
            'date' => $this->input->post('date'), //need to take care of, because the type is date
            'time' => $this->input->post('time'),
            'status' => 'requested'
        );

        $this->db->insert('appointment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }

    public function reply_requestAppointment($appointment_id){
        $data = array(
            'status' => $this->input->post('status') /* Appointment Status will change either cancelled or accepted. */
        );

        $this->db->where('appointmentID',$appointment_id)->update('appointment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function get_AllAppointment(){
        return $this->db->get('appointment')->result();
    }

    public function get_AllAppointment_limit($limit,$start){
        return $this->db->limit($limit,$start)
                        ->get('appointment')
                        ->result();
    }

    public function get_Appointment_ById($appointment_id){
        return $this->db->where('appointmentID',$appointment_id)
                        ->get('appointment')
                        ->row();
    }

    public function get_Appointment_ByWhere($where){
        return $this->db->where($where)
                        ->get('appointment')
                        ->result();
    }

    public function get_AllCounselling(){
        return $this->db->get('counsellingpackage')->result();
    }

    public function randomString_appointmentID()
    {
        $id = random_string('alnum', 10);
        $query = $this->db->where('appointmentID',$id)->get('appointment');
		if ($query->num_rows() > 0){
            return randomString_appointmentID();
        } else{
            return $id;
        }
    }
}

/* End of file M_appointment.php */

?>