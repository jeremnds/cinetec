<<<<<<< HEAD
<?php

class Enigme extends CI_Controller{
    public function index(){
        $this->load->library('session');
        
if($_SESSION['loggedin']==0){
    redirect('Accueil');
}
     
        if (empty($_SESSION['login'])) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
            }        
     
        $type=$_SESSION['type'];
        if($type==1){
            echo '<script type="text/javascript">document.location.replace("' . base_url() . 'Accueil_Admin");</script>';
        }
         
               $blocage=$_SESSION['blocage'];
                
                if ($blocage == 1){
                     echo '<script type="text/javascript">document.location.replace("'.base_url().'MonCompteBloque");</script>';
                }
               
               $id_load=$_SESSION['enigme'];
        $link_view='Enigme_view'.$id_load;
        $this->load->view($link_view);
        
            
     
    }
    
}

=======
<?php

class Enigme extends CI_Controller{
    public function index(){
        $this->load->library('session');
        $this->load->model('Enigme_model');
        $this->load->view('Enigme_view');
        $this->session->userdata();
      
         
        if (empty($_SESSION['login'])) {
           echo '<script type="text/javascript">document.location.replace("'.base_url().'Accueil");</script>';
            }        

               $blocage=$_SESSION['blocage'];
                
                if ($blocage == 1){
                     echo '<script type="text/javascript">document.location.replace("'.base_url().'MonCompteBloque");</script>';
                }
               
               
        
    }
    
}

>>>>>>> 81c5c030de8c99f39e83080f55377ee1b272afe4
?>