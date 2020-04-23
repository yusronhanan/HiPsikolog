<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_appointment extends CI_Model {
/*
Handle anything about appointment (Counseling Transactions) and Counselling Package

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
            'appointmentID' => $this->randomString_appointmentID(),
            'counsellingID' => $this->input->post('counsellingID'),
            'clientID' => $this->session->userdata('id'),
            'psyID' => $this->input->post('psyID'),
            'date' => $this->input->post('date'), //need to take care of, because the type is date
            'time' => $this->input->post('time'),
            'status' => $this->getStatusList()[0]
        );

        $this->db->insert('appointment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }

    // public function reply_requestAppointment($appointment_id){
    //     $data = array(
    //         'status' => $this->input->post('status') /* Appointment Status will change either cancelled or accepted. */
    //     );

    //     $this->db->where('appointmentID',$appointment_id)->update('appointment', $data);
	// 	return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    // }
    
    public function get_AllAppointment(){
       
        return  $this->db->query("SELECT *, clientName,psyName,counsellingName,counsellingDuration FROM appointment natural join client natural join psy natural join counsellingpackage order by date desc")->result();
        
    }

    public function get_AllAppointment_limit($limit,$start){
        return $this->db->limit($limit,$start)
                        ->order_by('date','desc')
                        ->get('appointment')
                        ->result();
    }

    public function get_Appointment_ById($appointment_id){
        return $this->db->where('appointmentID',$appointment_id)
                        ->get('appointment')
                        ->row();
    }

    public function get_Appointment_ByWhere($where,$value){
        return $this->db->where($where,$value)
                        ->order_by('date','desc')
                        ->get('appointment')
                        ->result();
    }

    public function get_AllCounselling(){
        return $this->db->get('counsellingpackage')->result();
    }

    public function update_Appointment_ByWhere($appointment_id,$where,$value){
        $data = array(
            $where => $value
        );
        $this->db->where('appointmentID',$appointment_id)->update('appointment', $data);
		return ($this->db->affected_rows() > 0);
    }

    public function randomString_appointmentID()
    {
        $id = random_string('numeric', 10);
        $query = $this->db->where('appointmentID',$id)->get('appointment');
		if ($query->num_rows() > 0){
            return randomString_appointmentID();
        } else{
            return $id;
        }
    }

    public function getTimeList(){
        return ["08:00", "09:00", "10:00", "11:00", "13:00", "14:00", "15:00"];
    }
    public function getStatusList(){
        return ["Requested", "Accepted", "In Session", "Completed", "Decline", "Cancelled"];
    }
}

/* End of file M_appointment.php */

?>