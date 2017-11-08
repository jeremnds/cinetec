<?php

class Confirmation_mail_model extends CI_Model{
      
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function verif_activation($id){
        
        $query=$this->db->query("SELECT user_activation FROM user WHERE user_id=$id");
        return $query->result();
    }
    
    public function confirm_mail($id){
        $query=$this->db->query("UPDATE user SET user_activation=1 WHERE user_id=$id");
    }
}

?>