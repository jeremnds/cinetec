<?php
class Accueil_Admin extends CI_Controller{
    public function index(){
            $this->load->library('session');
        $this->session->userdata();
        
         if($_SESSION['loggedin']==0){
            echo '<script type="text/javascript">document.location.replace("' . base_url() . 'Accueil");</script>';
        }
        
         if($_SESSION['blocage']!=0){
           echo '<script type="text/javascript">document.location.replace("' . base_url() . 'MonCompteBloque");</script>';
       } 
        

        
        $type=$_SESSION['type'];
        if($type==0){
            echo '<script type="text/javascript">document.location.replace("' . base_url() . 'MonCompte");</script>';
            
        }
        
 
        $this->load->model('Admin_Model');
        $data['select_user']=$this->Admin_Model->select_user();
        $data['select_enigme']=$this->Admin_Model->select_enigme();
        $this->load->view('Accueil_Admin_View',$data);
    
      
 
    }
}
?>