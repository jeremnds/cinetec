<?php

    class Enigme_verif extends CI_Controller{
        
        public function index(){
               
           $this->load->library('session');
            $this->session->userdata();
            $this->output->enable_profiler(TRUE);
            $answer=$_POST['answer'];
            $numero=$_POST['numero'];
            
           
            /*LIRE ENIGME*/
            $this->load->model('Enigme_verif_model');
            $verifenigme=$this->Enigme_verif_model->verifenigme($numero);
            
            
            
            foreach($verifenigme as $value){
                
                $answer_verif=$value->enigme_solution;
                $enigme_try=$value->enigme_tentative;
                $enigme_success=$value->enigme_succes;
                $enigme_try_max=$value->enigme_try_max;
                
                
            }
            
            /*LIRE RESULTAT DE L'UTILISATEUR SUR L'ENIGME*/
            $id=$_SESSION['id'];
            $lire_enigme_user=$this->Enigme_verif_model->recup_enigme_on($id);
            
            
            
            foreach($lire_enigme_user as $line){
                $user_essai=$line->enigme_nbessai;
                $user_temps=$line->enigme_temps_passe;
                $user_enigme=$line->_enigme_id;
            }
            
            
            
            
            
            
            if($answer==$answer_verif){
                echo 'yes';
                
                /*Changer Carac generale de l'enigme*/
                $enigme_success=$enigme_success+1;
                $enigme_try=$enigme_try+1;
                $enigme_ratio=($enigme_success/$enigme_try)*100;
                $this->Enigme_verif_model->update_carac($enigme_try,$enigme_success,$numero,$enigme_ratio);
                
                /*TRANSFERER INFOS DANS LES ARCHIVES PERSO*/
                $user_essai=$user_essai+1;
                $user_enigme=$_SESSION['enigme']+1;
                $this->Enigme_verif_model->insert_archive($id,$_SESSION['enigme'],$user_essai,$user_temps);
                $this->Enigme_verif_model->update_user($id,$user_enigme,0,0);
                $this->session->set_userdata('enigme', $user_enigme);
                
                
                    /*RAJOUTER TEMPS ICI*/
                
            }
            else{
                echo 'non';
                $enigme_try=$enigme_try+1;
                $enigme_ratio=($enigme_success/$enigme_try)*100;
                $this->Enigme_verif_model->update_carac($enigme_try,$enigme_success,$numero,$enigme_ratio);
                $user_essai=$user_essai+1;
                if($user_essai==$enigme_try_max){
                    $blocage=1;
                    $this->Enigme_verif_model->update_user_blocage($id,$blocage);
                    
                }
                $this->Enigme_verif_model->update_user($id,$user_enigme,$user_essai,$user_temps);
            }
            
         
            
            $this->load->view('Enigme_verif_view');
           
        }
    }

?>