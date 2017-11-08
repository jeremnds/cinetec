<?php 

class Traitement_profil_model extends CI_Model {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
        public function update($name,$firstname,$mail,$password,$login,$id)
    { 
      
                
           
        
            
        $query= $this->db->query("UPDATE user SET user_name='$name', user_firstname='$firstname', user_mail='$mail', user_password='$password', user_login='$login' WHERE user_id=$id");  
                
            
     
      }
}

?>