<?php 
class Traitement_profil extends CI_Controller{
    
    public function index(){
   $this->load->model('Traitement_profil_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->session->userdata();
        $data['login']=$_SESSION['login'];
        
        
      
         $data['select_archive']=$this->Traitement_profil_model->select_archive($_SESSION['id']);
         $data['select_last']=$this->Traitement_profil_model->select_last($_SESSION['id']);
          $data['select_user']=$this->Traitement_profil_model->select_user($_SESSION['id']);


        
        
        /** VARIABLE **/
        $name = $this->input->post('name');
        $firstname = $this->input->post('firstname');
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $login = $this->input->post('login');
        $id= $_SESSION['id'];
        
        
        
        /** REGLE POUR LE FORMULAIRE **/
        $this->form_validation->set_rules('name', 'Nom', 'trim'); /** LE DERNIER CHAMPS CORRESPONDS AUX REGLES **/
        
        $this->form_validation->set_rules('firstname', 'Prenom', 'trim');
        
        $this->form_validation->set_rules('password', 'Mot de passe','trim');
        
        $this->form_validation->set_rules('password_verif', 'Confirmation du mot de passe', 'trim|matches[password]',  array(
                'matches'     => 'Les mots de passes ne correspondent pas',

        ));
        $this->form_validation->set_rules('mail', 'Mail', 'trim|valid_email|callback_check_mail',  array(
                'valid_email'     => "L'adresse e-mail doit être valide"
        ));
        $this->form_validation->set_rules('login', 'Pseudo', 'trim|min_length[5]|callback_check_login',  array(
                'min_length'     => "Le pseudo doit être composé de 5 caractères minimum"
        ));
        
        /** FIN DES REGLES **/ 
        
   
        
        /** PARTIE OBLIGATOIRE SI LES REGLES NE SONT PAS RESPECTEES (false) bref lol on se comprends sans ça le formulaire ne fonctionne pas **/
           
                if ($this->form_validation->run() == FALSE )
                {
                
                    $this->load->view('MonCompte_view',$data);
                    
                   
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

                }

    /** FIN DE LA CHICK **/
         
}
    public function check_mail($mail){
  $mailsess = $_SESSION['mail'];      
  $reponse = $this->Traitement_profil_model->mailsess($mailsess);      
        foreach ($reponse as $row){
              
if($mail == $row->user_mail) 
{ 
$this->form_validation->set_message('check_mail','Cette adresse email est déjà utilisée !');
return false;
break;
   
}    
elseif($mail == $mailsess)
{ 

return true;
}
        }
}
    public function check_login($login){
  $loginsess = $_SESSION['login'];
  $reponse2 = $this->Traitement_profil_model->loginsess($loginsess);      
        foreach ($reponse2 as $row){

if($login == $row->user_login) 
{ 
$this->form_validation->set_message('check_login','Ce pseudo est déjà utilisé !');
return false;
break;   
   
} 
     
elseif($login == $loginsess){
return true;
}
  
    }
    }
    
}
