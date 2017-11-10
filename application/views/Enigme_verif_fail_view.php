<?php 

$title="Bonne Reponse";
include 'header_checkpoint.php';


?>
  <style>
      body{
       background-image: url('assets/img/enigme_3.jpg');
         
      }
    </style>
<body class="">
   
   <img src="assets/img/pellicule3.png" alt="" class="col-md-12" id="pellicule">
    
    <div id="reponse" class="col-md-8 col-md-offset-2 col-xs-12">
        
        <h1>Mauvaise Reponse</h1>
                
                <p style="text-align:center;">Il vous reste <b>  <?php echo $try; ?></b> essais...</p>
               
             <a href="<?php echo base_url()?>MonCompte">   
            <div class="col-md-5 col-xs-12 navigation">
                Mon Compte
            </div>
            </a>
            
            
            <a href="<?php echo base_url()?>Enigme">
            <div class="col-md-5 col-xs-12 navigation" style="float:right;">
                Revenir à l'Enigme
            </div>
                   </a>
                   
                 
                    
                
                
            </div>
            
           
            
      
            
      
        
    </div>
    
</body>


</html>