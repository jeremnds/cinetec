 <?php
     class Traitement_forgot_password_model extends CI_Model{
      public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
         
         public function recup_id($mail){
             $query=$this->db->query("SELECT user_password FROM user WHERE user_mail='$mail'");
             return $query->result(); 
         }
     }

?>