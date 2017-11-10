<?php 

 class MonCompteBloque_Model extends CI_Model{
         public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    
     public function select_archive($id){
         $query=$this->db->query("SELECT * FROM archive WHERE _user_id=$id ORDER BY _enigme_id ASC");
         return $query->result();
     }
     
     public function select_last($id){
         $query=$this->db->query("SELECT * FROM resoudre WHERE _user_id=$id");
         return $query->result();
     }
      public function select_user(){
         $query=$this->db->query("SELECT * FROM user INNER JOIN resoudre ON user.user_id=resoudre._user_id WHERE user_type<>1 ORDER BY  _enigme_id DESC, temps_total ASC");
         return $query->result();
     }
 }

?>