<?php

 class Traitement_connexion_model extends CI_Model{
      public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
     
     public function password($login){
         $querry_connect=$this->db->query("SELECT * FROM user WHERE user_login ='$login' ");
         return $querry_connect->result();
     }
     
     public function login($login){
         $querry_connect=$this->db->query("SELECT user_login FROM user");
         return $querry_connect->result();
     }
     
     public function session($login){
        $req = $this->db->query("SELECT * FROM user INNER JOIN resoudre ON user.user_id=resoudre._user_id WHERE user_login ='$login' ");
        return $req->result();
        
     }
<<<<<<< HEAD
          public function block($login){
=======
     public function block($login){
>>>>>>> 81c5c030de8c99f39e83080f55377ee1b272afe4
          $req=$this->db->query("SELECT user_blocage FROM user WHERE user_login='$login'");
         return $req->result();
     }
 }

?>