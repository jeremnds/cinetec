<?php


 class Moncompte extends CI_Controller{
     
     public function index(){
        $this->load->library('session');
         $this->load->view('MonCompte_View');

          $this->session->userdata();
      
         
        if ($_SESSION['loggedin'] == 0) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
            }  
        if ($_SESSION['blocage'] == 1) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'MonCompteBloque");</script>';
            }     
     }
 }
?>