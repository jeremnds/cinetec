<?php

    class Enigme_verif extends CI_Controller{
        
        public function index(){
               
           $this->load->library('session');
            $this->session->userdata();
     
            $answer=$_POST['answer'];
            $numero=$_SESSION['enigme'];
            $temps_initial=$_POST['temps'];
            $temps_fin=time();
            $chrono=$temps_fin-$temps_initial;
           
                        
            $answer=strtolower($answer);
            $answer=trim($answer);
            
           
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
                $user_temps_total=$line->temps_total;
            }
            
            
            
            
            
            
            if($answer==$answer_verif){
             
                 $id_load=$_SESSION['enigme'];
        $link_view='Enigme_verif_view'.$id_load;
        $this->load->view($link_view);
                /*Changer Carac generale de l'enigme*/
                $enigme_success=$enigme_success+1;
                $enigme_try=$enigme_try+1;
                $enigme_ratio=($enigme_success/$enigme_try)*100;
                $this->Enigme_verif_model->update_carac($enigme_try,$enigme_success,$numero,$enigme_ratio);
                
                /*TRANSFERER INFOS DANS LES ARCHIVES PERSO*/
                $user_essai=$user_essai+1;
                $user_enigme=$_SESSION['enigme']+1;
                 $new_temps=$user_temps+$chrono;
                $temps_total_new=$user_temps_total+$chrono;
                $this->Enigme_verif_model->insert_archive($id,$_SESSION['enigme'],$user_essai,$new_temps);
                $this->Enigme_verif_model->update_user($id,$user_enigme,0,0,$temps_total_new);
                $this->session->set_userdata('enigme', $user_enigme);
                
               
                    /*RAJOUTER TEMPS ICI*/
                
            }
            else{
               
                $enigme_try=$enigme_try+1;
                $enigme_ratio=($enigme_success/$enigme_try)*100;
                $this->Enigme_verif_model->update_carac($enigme_try,$enigme_success,$numero,$enigme_ratio);
                $user_essai=$user_essai+1;
                if($user_essai>=$enigme_try_max){
                    $blocage=1;
                    $this->Enigme_verif_model->update_user_blocage($id,$blocage);
                    $this->session->set_userdata('blocage', $blocage);
                    redirect('MonCompte');
                    
                }
                
                $data['try']=$enigme_try_max-$user_essai;
                $new_temps=$user_temps+$chrono;
                $temps_total_new=$user_temps_total+$chrono;
                $this->Enigme_verif_model->update_user($id,$user_enigme,$user_essai,$new_temps,$temps_total_new);
                
                $this->load->view('Enigme_verif_fail_view',$data);
            }
            
         
            
            
    
           
        }
    }

?>