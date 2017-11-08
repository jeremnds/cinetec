<?php 
class Traitement_profil extends CI_Controller{
    
    public function index(){
   $this->load->model('Traitement_profil_model');
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->session->userdata($data);
        $name = $this->input->post('name');
        $firstname = $this->input->post('firstname');
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $login = $this->input->post('login');
        $id= $_SESSION['id'];
        
        
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
        
                if ($this->form_validation->run() == FALSE)
                {

        $this->load->view('MonCompte_view');
                }
                else
                {
                   
        $this->Traitement_profil_model->update($name,$firstname,$mail,$password, $login,$id);
       echo 'Les modifications ont bien été prise en compte';
      
                    
                    

                }
    
        }
}
    