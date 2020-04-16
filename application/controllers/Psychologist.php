<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Psychologist extends CI_Controller {
/*
  Handle anything about psychologist. There is no any load view here. Only add, edit, delete, transaction process.
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

}

/* End of file Psychologist.php */

?>
