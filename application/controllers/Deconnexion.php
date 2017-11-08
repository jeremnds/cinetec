<?php

class Deconnexion extends CI_Controller{
    
    public function index(){
        
$this->load->library('session');

session_unset();
// On détruit notre session
$this->session->sess_destroy();
// On redirige le visiteur vers la page d'accueil
redirect('Accueil');
        
    }
}

?>