<?php

class Enigme extends CI_Controller{
    public function index(){
        $this->load->library('session');
        $this->load->model('Enigme_model');
        $this->load->view('Enigme_view');
        $this->session->userdata();
      
         
        if (empty($_SESSION['login'])) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
            }        

               $blocage=$_SESSION['blocage'];
                
                if ($blocage == 1){
                     echo '<script type="text/javascript">document.location.replace("'.base_url().'MonCompteBloque");</script>';
                }
               
               
        
    }
    
}

?>