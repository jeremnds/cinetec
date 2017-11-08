<!DOCTYPE html>
<?php
$this->session->userdata();
?>
<?php

$enigme_num=$_SESSION['enigme'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enigme n°<?php echo $enigme_num?></title>
</head>
<body>
   <form action="<?php echo base_url()?>Enigme_verif" method="post">
   <input type="text" placeholder="Votre réponse ici" name="answer">
   <input type="hidden" name="numero" value="<?php echo $enigme_num?>">
    
   <input type="submit">
    </form>
    
</body>
</html>