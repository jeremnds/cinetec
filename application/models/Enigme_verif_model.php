<?php

    class Enigme_verif_model extends CI_Model{
        
         public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
        public function verifenigme($numero){
            
            $query=$this->db->query("SELECT * FROM `enigme` WHERE enigme_id=$numero");
            return $query->result();
            
            
        }
        
        public function update_carac($update_try,$update_succes,$numero,$update_ratio){
             $query=$this->db->query("UPDATE `enigme` SET `enigme_succes`=$update_succes,`enigme_tentative`=$update_try, enigme_ratio=$update_ratio WHERE enigme_id=$numero ");
        }
        
        public function recup_enigme_on($id){
            $query=$this->db->query("SELECT * FROM resoudre WHERE _user_id=$id");
            return $query->result();
        }
        public function insert_archive($id,$enigme_id,$essai,$temps){
            $this->db->query("INSERT INTO `archive`(`_user_id`, `_enigme_id`, `enigme_nbessai`, `enigme_temps_passe`) VALUES ($id,$enigme_id,$essai,$temps)");
        }
        
         public function update_user($id,$enigme_id,$essai,$temps){
            $this->db->query("UPDATE `resoudre` SET `_enigme_id`=$enigme_id,`enigme_nbessai`=$essai,`enigme_temps_passe`=$temps WHERE _user_id=$id");
        }
        public function update_user_blocage($id,$blocage){
            $this->db->query("UPDATE `user` SET `user_blocage`=$blocage WHERE user_id=$id");
        }
      
    }
?>