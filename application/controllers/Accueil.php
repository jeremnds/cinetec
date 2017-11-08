<?php

class Accueil extends CI_Controller{
    
    public function index(){
        $this->load->library('session');
        $this->load->view('Accueil_View');
        $this->session->set_userdata('loggedin', 0);
        print_r($this->session->all_userdata());
    }
}

?>