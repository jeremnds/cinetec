<?php

class Confirmation_mail_model extends CI_Model{
      
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function verif_activation($id){
        
        $query=$this->db->query("SELECT * FROM user WHERE user_id=$id");
        return $query->result();
    }
    
    public function confirm_mail($id){
        $query=$this->db->query("UPDATE user SET user_activation=1 WHERE user_id=$id");
    }
    public function session($id){
        $req = $this->db->query("SELECT * FROM user INNER JOIN resoudre ON user.user_id=resoudre._user_id WHERE user_id='$id' ");
        return $req->result();
        
     }
}

?>