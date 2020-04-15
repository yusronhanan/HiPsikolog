<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_appoinment extends CI_Model {
/*
Handle anything about appoinment (Counseling Transactions)

Appoinment Status : requested, accepted, cancelled, or done.
*/
    public function add_appoinment(){
        $data = array(
            'appoinmentID' => randomString_appoinmentID(),
            'counsellingID' => $this->input->post('counsellingID'),
            'clientID' => $this->input->post('clientID'),
            'psyID' => $this->input->post('psyID'),
            'date' => $this->input->post('date'), //need to take care of, because the type is date
            'time' => $this->input->post('time'),
            'status' => $this->input->post('status')
        );

        $this->db->insert('appoinment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function edit_appoinment($appoinment_id){
        $data = array(
            'counsellingID' => $this->input->post('counsellingID'),
            'clientID' => $this->input->post('clientID'),
            'psyID' => $this->input->post('psyID'),
            'date' => $this->input->post('date'), //need to take care of, because the type is date
            'time' => $this->input->post('time'),
            'status' => $this->input->post('status')
        );

        $this->db->where('appoinmentID',$appoinment_id)->update('appoinment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function delete_appoinment($appoinment_id){
        $this->db->where('appoinmentID',$appoinment_id)
                ->delete('appoinment');
                
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function request_appoinment(){
        $data = array(
            'appoinmentID' => randomString_appoinmentID(),
            'counsellingID' => $this->input->post('counsellingID'),
            'clientID' => $this->input->post('clientID'),
            'psyID' => $this->input->post('psyID'),
            'date' => $this->input->post('date'), //need to take care of, because the type is date
            'time' => $this->input->post('time'),
            'status' => 'requested'
        );

        $this->db->insert('appoinment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }

    public function reply_requestAppoinment($appoinment_id){
        $data = array(
            'status' => $this->input->post('status') /* Appoinment Status will change either cancelled or accepted. */
        );

        $this->db->where('appoinmentID',$appoinment_id)->update('appoinment', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function get_AllAppoinment(){
        return $this->db->get('appoinment')->result();
    }

    public function get_AllAppoinment_limit($limit,$start){
        return $this->db->limit($limit,$start)
                        ->get('appoinment')
                        ->result();
    }

    public function get_Appoinment_ById($appoinment_id){
        return $this->db->where('appoinmentID',$appoinment_id)
                        ->get('appoinment')
                        ->row();
    }

    public function get_Appoinment_ByWhere($where){
        return $this->db->where($where)
                        ->get('appoinment')
                        ->result();
    }

    public function randomString_appoinmentID()
    {
        $id = random_string('alnum', 10);
        $query = $this->db->where('appoinmentID',$id)->get('appoinment');
		if ($query->num_rows() > 0){
            return randomString_appoinmentID();
        } else{
            return $id;
        }
    }
}

/* End of file M_appoinment.php */

?>