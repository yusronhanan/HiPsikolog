<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
/*
Handle anything about authentication : Login, Register (Create Account for Client), Set Session
*/

    public function register($photo)
    {
        /* Register, create account for client only */

        $data = array(
            'clientID' => $this->randomString_clientID(), /* Using random String to generate the ID*/
            'clientName' => $this->input->post('clientName'),
            'clientEmail' => $this->input->post('clientEmail'),
            'clientPassword' => $this->input->post('clientPassword'),
            'clientPhoneNumber' => $this->input->post('clientPhoneNumber'),
            'clientPhoto' => $photo['file_name']
        );

        $this->db->insert('client', $data);
		return ($this->db->affected_rows() > 0); /* if success return true, false otherwise  */
    }
    public function login_client()
    {
        $data = array(
            'clientEmail' => $this->input->post('email'),
            'clientPassword' => $this->input->post('password')
        );
        $query = $this->db->where($data)->get('client');
		return ($query->num_rows() > 0); /* if exist return true, false otherwise  */
    }

    public function login_psy()
    {
        $data = array(
            'psyEmail' => $this->input->post('email'),
            'psyPassword' => $this->input->post('password')
        );
        $query = $this->db->where($data)->get('psy');
		return ($query->num_rows() > 0); /* if exist return true, false otherwise  */
    }

    public function login_admin()
    {
        $data = array(
            'adminEmail' => $this->input->post('email'),
            'adminPassword' => $this->input->post('password')
        );
        $query = $this->db->where($data)->get('admin');
		return ($query->num_rows() > 0); /* if exist return true, false otherwise  */
    }
    
    public function check_email_client($client_email)
    {
        $query = $this->db->where('clientEmail',$client_email)->get('client');
		return ($query->num_rows() > 0); /* if exist return true, false otherwise  */
    }

    public function check_email_psy($psy_email)
    {
        $query = $this->db->where('psyEmail',$psy_email)->get('psy');
		return ($query->num_rows() > 0); /* if exist return true, false otherwise  */
    }

    public function randomString_clientID()
    {
        $id = random_string('numeric', 10);
        $query = $this->db->where('clientID',$id)->get('client');
		if ($query->num_rows() > 0){
            return randomString_clientID();
        } else{
            return $id;
        }
    }
}

/* End of file M_auth.php */

?>