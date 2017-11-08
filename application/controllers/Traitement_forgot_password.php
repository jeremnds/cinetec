<?php

class Traitement_forgot_password extends CI_Controller{
    
    public function index(){
        
      $this->load->model('Traitement_forgot_password_model');
        
        $mail=$_GET['mail'];
        $id=$this->Traitement_forgot_password_model->recup_id($mail);
        
        foreach ($id as $line){
            $password= $line->user_password;
            $this->load->library('email');

                    $this->email->from('codec.cinetec@gmail.com', 'Cinetec');
                    $this->email->to($mail);
                    

                    $this->email->subject('Votre mot de passe');
                    $this->email->message('Votre mot de passe est '.$password.'
                    ');
                    
                    $this->email->send();
        }
         echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
    }
    
}
?>