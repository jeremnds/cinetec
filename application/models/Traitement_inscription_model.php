<?php 

class Traitement_inscription_model extends CI_Model {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
        public function insert($id,$name,$firstname,$img,$mail,$password,$login,$type,$blocage,$activation)
    { 
      
                
           
        
            
        $query= $this->db->query("INSERT INTO  user ( user_id,	user_name, user_firstname, user_img, user_mail, user_password, user_login, user_type, user_blocage, user_activation) VALUES ($id, '$name', '$firstname', '$img', '$mail', '$password', '$login', $type, $blocage, $activation)");  
                
            
     
      }
         public function session($login){
        $req = $this->db->query("SELECT user_id, user_name, user_firstname, user_mail, user_password FROM user WHERE user_login ='$login' ");
        return $req->result();
        
     }
    
    public function create_enigme($id){
        $this->db->query("INSERT INTO `resoudre`(`_user_id`, `_enigme_id`, `enigme_nbessai`, `enigme_temps_passe`) VALUES ($id,1,0,0)");
    }
}

?>