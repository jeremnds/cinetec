<?php

class Confirmation_mail extends CI_Controller{
    
    
    public function index () {
        
        $this->load->model('Confirmation_mail_model');
        
        $this->load->view('Confirmation_mail_view');
        $id=$_GET['id'];
        $verif_activation=$this->Confirmation_mail_model->verif_activation($id);
     
        foreach ($verif_activation as $verif_activation_){
           
        }
            if ($verif_activation_->user_activation==1){
                
                 echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
            }
            else {
                $this->Confirmation_mail_model->confirm_mail($id);
    }
        
      
      
        
    }
    }

?>