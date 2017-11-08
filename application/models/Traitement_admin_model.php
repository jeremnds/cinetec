<?php

 class Traitement_admin_model extends CI_Model{
      public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
     
     public function update_db($id,$blocage,$type){
         $this->db->query("UPDATE user SET user_blocage=$blocage, user_type=$type WHERE user_id=$id ");
         
     }
     
 }

?>