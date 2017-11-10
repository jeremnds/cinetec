<<<<<<< HEAD
<?php

class Traitement_connexion extends CI_Controller
{
    public function index()
    {
        $this->output->enable_profiler(TRUE);
        $this->load->library('session');
        
        
        $erreur  = 0;
        $link    = '?';
        $message = '';
        
        $login    = $_GET['login'];
        $password = $_GET['password'];
        
        $this->load->model('Traitement_connexion_model');
        
        $verif_login = $this->Traitement_connexion_model->login($login);
        
        $data['verif_login'] = $verif_login;
        
        $reponse = $this->Traitement_connexion_model->session($login);
        
        $blocage = $this->Traitement_connexion_model->block($login);
        
        $verif_password = $this->Traitement_connexion_model->password($login);
        
        $data['verif_password'] = $verif_password;
        
        foreach($verif_password as $line){
            
        }
        
        
        
        foreach ($verif_login as $verifloginn) {
            
            
            if ($login != $verifloginn->user_login) {
                $erreur = 1;
                
                
                $message = 'wrong_login=1&';
                
                
                
            } else {
                $message = '';
                $erreur  = 0;
                break;
            }
        }
        $link = $link . $message;
        
        
        
        
        foreach ($verif_password as $verifpasswordd) {
            $activation = $verifpasswordd->user_activation;
            $type= $verifpasswordd->user_type;
            
            if ($password != $verifpasswordd->user_password) {
                $erreur = 1;
                $link   = $link . 'wrong_password=1&';
                
                
                
                
            } else {
                $erreur = 0;
                
                break;
            }
            
            
        }
     
        
        
        
        
        
        
        
        if ($erreur == 1) {
            echo '<script type="text/javascript">document.location.replace("' . base_url() . 'Accueil' . $link . '");</script>';
            
        } else {
            
            
            if ($activation == 1) {
                foreach ($reponse as $row) {
                    $data = array(
                        'login' => $login,
                        'id' => $row->user_id,
                        'name' => $row->user_name,
                        'firstname' => $row->user_firstname,
                        'mail' => $row->user_mail,
                        'password' => $row->user_password,
                        'password_verif' => $row->user_password,

                        'type' => $row->user_type,
                        'enigme'=>$row->_enigme_id,
                        'blocage'=>$row->user_blocage,
                        'loggedin'=>1
                        
                    );
                    
                    $this->session->set_userdata($data);   
                    
                    
                }
                                foreach ($blocage as $row){
                
                if ($row->user_blocage != 0){
                    redirect('MonCompteBloque');
                }
                else{
                   redirect('MonCompte');
                    
                }
                                    
                
                }
                
      
                
            
            }
            
          
            
        }
    }
    
}
=======
<?php

class Traitement_connexion extends CI_Controller
{
    public function index()
    {
        $this->output->enable_profiler(TRUE);
        $this->load->library('session');
        
        
        $erreur  = 0;
        $link    = '?';
        $message = '';
        
        $login    = $_GET['login'];
        $password = $_GET['password'];
        
        $this->load->model('Traitement_connexion_model');
        
        $verif_login = $this->Traitement_connexion_model->login($login);
        
        $data['verif_login'] = $verif_login;
        $blocage = $this->Traitement_connexion_model->block($login);
        $reponse = $this->Traitement_connexion_model->session($login);
        
        $verif_password = $this->Traitement_connexion_model->password($login);
        
        $data['verif_password'] = $verif_password;
        
        
        
        
        
        foreach ($verif_login as $verifloginn) {
            
            
            if ($login != $verifloginn->user_login) {
                $erreur = 1;
                
                
                $message = 'wrong_login=1&';
                
                
                
            } else {
                $message = '';
                $erreur  = 0;
                break;
            }
        }
        $link = $link . $message;
        
        
        
        
        foreach ($verif_password as $verifpasswordd) {
            $activation = $verifpasswordd->user_activation;
            $type= $verifpasswordd->user_type;
            
            if ($password != $verifpasswordd->user_password) {
                $erreur = 1;
                $link   = $link . 'wrong_password=1&';
                
                
                
                
            } else {
                $erreur = 0;
                
                break;
            }
            
            
        }
     
        
        
        
        
        
        
        
        if ($erreur == 1) {
            echo '<script type="text/javascript">document.location.replace("' . base_url() . 'Accueil' . $link . '");</script>';
            
        } else {
            
            
            if ($activation == 1) {
                foreach ($reponse as $row) {
                    $data = array(
                        'login' => $login,
                        'id' => $row->user_id,
                        'name' => $row->user_name,
                        'firstname' => $row->user_firstname,
                        'mail' => $row->user_mail,
                        'password' => $row->user_password,
                        'password_verif' => $row->user_password,
                        'type' => $row->user_type,
                        'enigme'=>$row->_enigme_id,
                        'blocage'=>$row->user_blocage,
                        'loggedin'=> 1
                        
                    );
                    
                    $this->session->set_userdata($data);
                    
                    
                    
                    
                    
                    
                }
                 }
      
                if($type==0){
                    redirect('MonCompte');
                }
                else{
                    echo '<script type="text/javascript">document.location.replace("' . base_url() . 'Accueil_Admin");</script>';
                }
           
            
                      foreach ($blocage as $row){
                
                if ($row->user_blocage == 1){
                    redirect('MonCompteBloque');
                }
                else{
                   redirect('MonCompte');
                    
                }
                
                }

        }
    }
    
}
>>>>>>> 81c5c030de8c99f39e83080f55377ee1b272afe4
