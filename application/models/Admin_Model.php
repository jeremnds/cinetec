<?php 

 class Admin_Model extends CI_Model{
         public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
     
     public function select_user(){
         $query=$this->db->query("SELECT * FROM user INNER JOIN resoudre ON user.user_id=resoudre._user_id ORDER BY user_type DESC, _enigme_id DESC, temps_total ASC");
         return $query->result();
     }
     
      public function select_enigme(){
         $query=$this->db->query("SELECT * FROM enigme");
         return $query->result();
     }
 }

?>