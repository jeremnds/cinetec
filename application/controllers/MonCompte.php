<?php


 class Moncompte extends CI_Controller{
     
     public function index(){
        $this->load->library('session');
         $this->load->view('MonCompte_View');

        
     }
 }
?>