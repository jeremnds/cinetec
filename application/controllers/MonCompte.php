<?php


 class Moncompte extends CI_Controller{
     
     public function index(){
        $this->load->library('session');
        $this->session->userdata();
       
              if ($_SESSION['loggedin'] == 0) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
            }  
            
        $type=$_SESSION['type'];
        if($type==1){
            echo '<script type="text/javascript">document.location.replace("' . base_url() . 'Accueil_Admin");</script>';
        }
         
        if ($_SESSION['blocage'] == 1) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'MonCompteBloque");</script>';
            } 
        
          $this->load->model('MonCompte_Model');
         $data['select_archive']=$this->MonCompte_Model->select_archive($_SESSION['id']);
         $data['select_last']=$this->MonCompte_Model->select_last($_SESSION['id']);
          $data['select_user']=$this->MonCompte_Model->select_user($_SESSION['id']);
         $data['login']=$_SESSION['login'];
          $this->load->view('MonCompte_View',$data);


    
     }
 }
?>