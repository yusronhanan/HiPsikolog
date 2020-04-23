<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_psy extends CI_Model {
/*
Handle anything about pyschologist
*/
    public function add_psy($photo){
         
         $data = array(
            'psyID' => $this->randomString_psyID(), /* Using random String to generate the ID*/
            'psyName' => $this->input->post('psyName'),
            'psyEmail' => $this->input->post('psyEmail'),
            'psyPassword' => $this->input->post('psyPassword'),
            'psyPhoneNumber' => $this->input->post('psyPhoneNumber'),
            'psyDesc' => $this->input->post('psyDesc'),
            'psyPhoto' => $photo['file_name']
        );

        $this->db->insert('psy', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function edit_psy($psy_id,$photo){
        $data = array(
            'psyName' => $this->input->post('psyName'),
            'psyEmail' => $this->input->post('psyEmail'),
            'psyPassword' => $this->input->post('psyPassword'),
            'psyPhoneNumber' => $this->input->post('psyPhoneNumber'),
            'psyDesc' => $this->input->post('psyDesc')
        );
        
        if($photo['file_name']!=""){
            $data['psyPhoto'] = $photo['file_name'];
        }
        
        $this->db->where('psyID',$psy_id)->update('psy', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }

    public function delete_psy($psy_id){
        $this->db->where('psyID',$psy_id)
                ->delete('psy');
                
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    public function get_AllPsy(){
        return $this->db->get('psy')->result();
    }

    public function get_AllPsy_limit($limit,$start){
        return $this->db->limit($limit,$start)
                        ->get('psy')
                        ->result();
    }

    public function get_Psy_ById($psy_id){
        return $this->db->where('psyID',$psy_id)
                        ->get('psy')
                        ->row();
    }

    public function get_Psy_ByEmail($psy_email){
        return $this->db->where('psyEmail',$psy_email)
                        ->get('psy')
                        ->row();
    }

    public function get_Psy_ByWhere($where){
        return $this->db->where($where)
                        ->get('psy')
                        ->result();
    }

    public function randomString_psyID()
    {
        $id = random_string('alnum', 10);
        $query = $this->db->where('psyID',$id)->get('psy');
		if ($query->num_rows() > 0){
            return randomString_psyID();
        } else{
            return $id;
        }
    }
}

/* End of file M_psy.php */

?>