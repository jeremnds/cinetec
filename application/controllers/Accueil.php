<?php

class Accueil extends CI_Controller{
    
    public function index(){
        $this->load->library('session');
        $this->load->view('Accueil_View');
        
    }
}

?>