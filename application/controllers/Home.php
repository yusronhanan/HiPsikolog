<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
		$this->load->view('welcome_message');
        
    }
    public function try()
    {
		$this->load->view('welcome_message');
        
    }

}

/* End of file Home.php */

?>