<?php


 class MoncompteBloque extends CI_Controller{
     
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
         
 if ($_SESSION['blocage'] == 0) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'MonCompte");</script>';
            } 
    
        
          $this->load->model('MonCompteBloque_Model');
         $data['select_archive']=$this->MonCompteBloque_Model->select_archive($_SESSION['id']);
         $data['select_last']=$this->MonCompteBloque_Model->select_last($_SESSION['id']);
          $data['select_user']=$this->MonCompteBloque_Model->select_user($_SESSION['id']);
          $this->load->view('MonCompteBloque_View',$data);


    
         
     }
 }
?>