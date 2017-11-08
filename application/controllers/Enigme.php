<?php

class Enigme extends CI_Controller{
    public function index(){
        $this->load->library('session');
        
        $this->load->view('Enigme_view');
    }
    
}

?>