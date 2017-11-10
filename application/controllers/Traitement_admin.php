<?php

class Traitement_admin extends CI_Controller{
    public function index (){
        $this->load->model('Traitement_admin_model');
        $id=$_GET['id'];
        $blocage=$_GET['blocage'];
        $type=$_GET['type'];
        
       $this->Traitement_admin_model->update_db($id,$blocage,$type);
         echo '<script type="text/javascript">document.location.replace("' . base_url() . 'Accueil_Admin");</script>';
    }
}

?>