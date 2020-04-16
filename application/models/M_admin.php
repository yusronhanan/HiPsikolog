<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
/*
Handle anything about admin
*/
    
    public function get_Alladmin(){
        return $this->db->get('admin')->result();
    }

    public function get_Alladmin_limit($limit,$start){
        return $this->db->limit($limit,$start)
                        ->get('admin')
                        ->result();
    }

    public function get_admin_ById($admin_id){
        return $this->db->where('adminID',$admin_id)
                        ->get('admin')
                        ->row();
    }

    public function get_admin_ByEmail($admin_email){
        return $this->db->where('adminEmail',$admin_email)
                        ->get('admin')
                        ->row();
    }

    public function get_admin_ByWhere($where){
        return $this->db->where($where)
                        ->get('admin')
                        ->result();
    }

}

/* End of file M_admin.php */

?>