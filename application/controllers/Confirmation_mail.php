<?php

class Confirmation_mail extends CI_Controller{
    
    
    public function index () {
        
        $this->load->model('Confirmation_mail_model');
        $this->load->library('session');
        $this->load->view('Confirmation_mail_view');
        $id=$_GET['id'];
        $verif_activation=$this->Confirmation_mail_model->verif_activation($id);
        $session=$this->Confirmation_mail_model->session($id);
     
        foreach ($verif_activation as $verif_activation_){
           
        
            if ($verif_activation_->user_activation==1){
                
                 echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
            }
            else {
                $this->Confirmation_mail_model->confirm_mail($id);
                foreach ($session as $row) {
                    $data = array(
                        'login' => $row->user_login,
                        'id' => $row->user_id,
                        'name' => $row->user_name,
                        'firstname' => $row->user_firstname,
                        'mail' => $row->user_mail,
                        'password' => $row->user_password,
                        'password_verif' => $row->user_password,
                        'loggedin'=>1,

                        'type' => $row->user_type,
                        'enigme'=>$row->_enigme_id,
                        'blocage'=>$row->user_blocage
                        
                    );
                    
                    $this->session->set_userdata($data);
                  redirect('MonCompte');
    }
              
      
      
        
    }
    }
    }
}

?>