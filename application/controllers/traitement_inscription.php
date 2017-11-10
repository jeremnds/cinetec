<?php 
class Traitement_inscription extends CI_Controller{
    
    public function index(){
        $this->input->get(); 
        $this->output->enable_profiler(TRUE);
        $this->load->model('Traitement_inscription_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Nom', 'trim|required');
        $this->form_validation->set_rules('firstname', 'Prenom', 'trim|required');
        $this->form_validation->set_rules('password', 'Mot de passe','trim|required');
        $this->form_validation->set_rules('password_verif', 'Confirmation du mot de passe', 'trim|required|matches[password]',  array(
                'matches'     => 'Les mots de passes ne correspondent pas',

        ));
        $this->form_validation->set_rules('mail', 'Mail', 'trim|required|valid_email|is_unique[user.user_mail]',  array(
                'valid_email'     => "L'adresse e-mail doit être valide",                         'is_unique'     => "L'adresse e-mail existe déjà"
        ));
        $this->form_validation->set_rules('login', 'Pseudo', 'trim|required|min_length[5]|is_unique[user.user_login]',  array(
                'min_length'     => "Le pseudo doit être composé de 5 caractères minimum",                   'is_unique'     => "Le pseudo existe déjà"
        ));
        
        $this->form_validation->set_message('required', 'Le champs %s est obligatoire');
            
      
            
        /* VARIABLE */
        $activation=0;
        $type=0;
        $blocage=0; $img=base_url().'assets/img/avatar/default_avatar.png';
        $id=rand(100000000,999999999);
        $name = $this->input->post('name');
        $firstname = $this->input->post('firstname');
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $login = $this->input->post('login');
        $verif = $this->Traitement_inscription_model->verifid($id);
<<<<<<< HEAD

           foreach ($verif as $row){
            
       
   if ($id == $row->user_id){
       $id=rand(100000000,999999999);
   }

       }
           
        
        
        
=======

   
      foreach ($verif as $row){
            
       
   if ($id == $row->user_id){
       $id=rand(100000000,999999999);
   }

       }
>>>>>>> 81c5c030de8c99f39e83080f55377ee1b272afe4
                if ($this->form_validation->run() == FALSE)
                {
                   

                    function verif_get($get){
        
        if(!empty($_GET[$get])){
            $get=$_GET[$get];
        
        }
        else {
            $get=0;
        }
        return $get;
        
    }
        $this->load->view('Accueil_connexion_active_View');
                }
                else
                {
                   $this->load->library('email');

                    $this->email->from('codec.cinetec@gmail.com', 'Cinetec');
                    $this->email->to($mail);
                    

                    $this->email->subject('Confirmez votre adresse mail !');
                    $this->email->message('Bonjour '.$firstname.' ! Merci pour votre inscription, vous pouvez dès à présent confirmer votre inscription en cliquant sur le lien ci-dessous :
                    '.base_url().'Confirmation_mail?id='.$id.'
                    ');
                    
                    $this->email->send();
        $this->Traitement_inscription_model->insert($id,$name,$firstname,$img,$mail,$password,$login,$type,$blocage,$activation);
        $this->Traitement_inscription_model->create_enigme($id);
              

       echo '<script type="text/javascript">document.location.replace("'.base_url().'Validation_Mail");</script>';
                    
                    

                }
    
    }
}

?>