<?php 
class Traitement_profil extends CI_Controller{
    
    public function index(){
   $this->load->model('Traitement_profil_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->output->enable_profiler(TRUE);
        $this->session->userdata();
        
        /** VARIABLE **/
        $name = $this->input->post('name');
        $firstname = $this->input->post('firstname');
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $login = $this->input->post('login');
        $id= $_SESSION['id'];
        $mailsess = $_SESSION['mail'];
        $loginsess = $_SESSION['login'];
        $reponse = $this->Traitement_profil_model->mailsess($mailsess);
        $reponse2 = $this->Traitement_profil_model->loginsess($loginsess);
        $erreur=0;
        $err=0;
        $link='?';
        $message='';
        
        
        /** REGLE POUR LE FORMULAIRE **/
        $this->form_validation->set_rules('name', 'Nom', 'trim|required'); /** LE DERNIER CHAMPS CORRESPONDS AUX REGLES **/
        
        $this->form_validation->set_rules('firstname', 'Prenom', 'trim|required');
        
        $this->form_validation->set_rules('password', 'Mot de passe','trim|required');
        
        $this->form_validation->set_rules('password_verif', 'Confirmation du mot de passe', 'trim|required|matches[password]',  array(
                'matches'     => 'Les mots de passes ne correspondent pas',

        ));
        $this->form_validation->set_rules('mail', 'Mail', 'trim|required|valid_email',  array(
                'valid_email'     => "L'adresse e-mail doit être valide"
        ));
        $this->form_validation->set_rules('login', 'Pseudo', 'trim|required|min_length[5]',  array(
                'min_length'     => "Le pseudo doit être composé de 5 caractères minimum"
        ));
        
        $this->form_validation->set_message('required', 'Le champs %s est obligatoire'); 
        /** FIN DES REGLES **/ 
        
        print_r($this->session->all_userdata());
          print_r($reponse2);
        foreach ($reponse as $row){
              
if($mail == $row->user_mail) 
{ 
echo 'pb mail';
$erreur=1;
$message='wrong_login=1&';
$link=$link.$message;
break;
   
}    
elseif($mail == $mailsess)
{ 
$erreur=0;
$message='';

}

        }
      
foreach ($reponse2 as $row){

if($login == $row->user_login) 
{ 
echo 'pb log';
$err=1;
$link=$link.'wrong_password=1&';
    break;
    
   
} 
     
elseif($login == $loginsess){
    $err=0; 
}
  
}


        
        /** PARTIE OBLIGATOIRE SI LES REGLES NE SONT PAS RESPECTEES (false) bref lol on se comprends sans ça le formulaire ne fonctionne pas **/
           
                if ($this->form_validation->run() == FALSE || $erreur == 1 || $err == 1)
                {
                    $this->load->view('MonCompte_view');
        
                echo 'nn le man';
       
                  
                }
       
                else
                {
                    
                    
         $this->Traitement_profil_model->update($name,$firstname,$mail,$password, $login,$id); 
             

               
        $this->session->set_userdata('name', $name);
        $this->session->set_userdata('firstname', $firstname);
        $this->session->set_userdata('mail', $mail);
        $this->session->set_userdata('password', $password);
        $this->session->set_userdata('login', $login); 
        $this->load->view('Traitement_profil_view');
                    
                    
                    echo 'yessos';
                    
                    

                }

    /** FIN DE LA CHICK **/
         
}
}
    