<!DOCTYPE html>
<?php
$this->session->userdata();
?>
<?php

$enigme_num=$_SESSION['enigme'];
  $time_start=time();
?>

<?php 

$title="Enigme n°6";
include 'header_enigme.php';


?>
  <style>
      body{
       background-image: url('assets/img/enigme_6.jpg');
      }
    </style>
<body class="">
   
   <img src="assets/img/pellicule6.png" alt="" class="col-md-12" id="pellicule">
    
    <div id="enigme" class="col-md-8 col-md-offset-2 col-xs-12">
        
        <h1>Enigme 6</h1>
        
       
            <div class="col-md-10 col-md-offset-1">
                
                
                <div class="row">
                <div class="col-md-4 col-xs-12 indice">
                   <h2>INDICE 1</h2>
                  Régulièrement utilisée pour couper du bois
                
                </div>
                <div class="col-md-4 col-xs-12 indice">
                   <h2>INDICE 2</h2>
                  Ariane s’en est échappée
                </div>
                <div class="col-md-4 col-xs-12 indice">
                   <h2>INDICE 3</h2>
                   JACK NICHOLSON
                
                </div>
                </div>
                
                
                    
                
                
            </div>
            
 <form action="<?php echo base_url()?>Enigme_verif" method="post">
         
            <input type="text" class="col-md-6  col-xs-12" required placeholder="Votre reponse ici" name="answer">
            <input type="hidden" name="numero" value="<?php echo $enigme_num?>">
   <input type="hidden" name="temps" value="<?php echo $time_start?>">
            <input type="submit" class="send col-md-1 col-xs-4" value="">
            
            
            </form>
      
            
      
        
    </div>
    
</body>


</html>