<?php 
class Traitement_contact extends CI_Controller{
    
    public function index(){
        
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('contact-prenom', 'contact-prenom', 'trim|required');
        $this->form_validation->set_rules('contact-nom', 'contact-nom', 'trim|required');                   $this->form_validation->set_rules('contact-mail', 'contact-mail', 'trim|required');
        $this->form_validation->set_rules('contact-sujet', 'contact-sujet', 'trim|required'); 
        $this->form_validation->set_rules('contact-texte', 'contact-texte', 'required');
        
        $prenom = $this->input->post('contact-prenom');
        $nom = $this->input->post('contact-nom');
        $mail = $this->input->post('contact-mail');
        $sujet = $this->input->post('contact-sujet');
        $msg = $this->input->post('contact-texte');
        
        
                if ($this->form_validation->run() == FALSE)
                {           
        $this->load->view('Accueil_View');
           
                }
                else
                {
                   $this->load->library('email');

                    $this->email->from($mail, $prenom.' '.$nom);
                    $this->email->to('codec.cinetec@gmail.com');
                    $this->email->subject($sujet);
                    $this->email->message($msg);
                    
                    $this->email->send();
                    $this->load->view('Traitement_contact_view');
    }
}
}