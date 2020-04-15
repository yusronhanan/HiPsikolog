<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_client extends CI_Model {
/*
Handle anything about Client
*/
    
    public function edit_client($client_id,$photo){
        $data = array(
            'clientID' => $client_id,
            'clientName' => $this->input->post('clientName'),
            'clientEmail' => $this->input->post('clientEmail'),
            'clientPassword' => $this->input->post('clientPassword'),
            'clientPhoneNumber' => $this->input->post('clientPhoneNumber')
        );
        if(!empty($photo)){
            $data['clientPhoto'] = $photo['file_name'];
        }
        
        $this->db->update('client', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }

    public function delete_client($client_id){
        $this->db->where('client_id',$client_id)
                ->delete('client');
        
        return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    
    /* ->result() kalau datanya > 1, ->row() kalau datanya =1*/
    public function get_AllClient(){
        return $this->db->get('client')->result();
    }

    public function get_AllClient_limit($limit,$start){
        return $this->db->limit($limit,$start)
                        ->get('client')
                        ->result();
    }


    public function get_Client_ById($client_id){
        return $this->db->where('clientID',$client_id)
                        ->get('client')
                        ->row();
    }

    public function get_Client_ByWhere($where){
        return $this->db->where($where)
                        ->get('client')
                        ->result();
    }

}

/* End of file M_client.php */

?>