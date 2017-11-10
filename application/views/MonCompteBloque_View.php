<?php
$this->session->userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    input {
        float: left;
        clear: both;
        margin-top: 30px;
    }    
    .error{
          color: red;
        float: left;
        clear: both;

    }

    span.error {
        color: red;
        float: left;
        clear: both;
    }

    h2 {
        clear: both;
        float: left;
    }
<<<<<<< HEAD
    table{
        float: left;
        clear: both;
        
    }
</style>
<body>
    <h1 style="color:red">Votre profil est bloqué</h1>
    
 <h2>HISTORIQUES</h2>
<table>
    <th>Enigme</th>
    <th>Nombre d'essais</th>
    <th>Temps</th>
    <th></th>
    <?php
    foreach($select_archive as $line){
    ?>
    <tr>
        <td>Enigme n° <?php echo $line->_enigme_id?></td>
        <td bgcolor="grey"> <?php echo $line->enigme_nbessai?></td>
        <td > <?php echo $line->enigme_temps_passe?>s</td>
    </tr>
    <?php
    }
    ?>
    <?php
    foreach($select_last as $line){
    ?>
    <tr >
        <td>Enigme n° <?php echo $line->_enigme_id?></td>
        <td bgcolor="grey"> <?php echo $line->enigme_nbessai?></td>
        <td > <?php echo $line->enigme_temps_passe?>s</td>
    </tr>
    <?php
    }
    ?>
</table>

   <h2>Classement</h2>
   <table>
      <th>Classement</th>
       <th>Nom</th>
       <th>Enigme</th>
       <th>Temps Total</th>
       
       
       <?php
       $i=1;
    foreach($select_user as $line){
        if ($line->user_id==$_SESSION['id']){
            $style='bgcolor="red"';
        }
        else{
            $style='';
        }
       ?>
       
       <tr <?php echo $style?></t>
           
           <td><?php echo $i ?></td>
           <td><?php echo $line->user_login ?></td>
           <td>Enigme n°<?php echo $line->_enigme_id ?></td>
           <td><?php echo $line->temps_total ?>s</td>
          
           
       </tr>
       
       <?php
           $i++;
    }
       ?>
   </table>
    
<h2>MON COMPTE</h2>
    <form action="<?php echo base_url()?>Traitement_profil_bloque" method="post">
=======
    
    
</style>
<body>
   <h2 style="color:red">Votre compte est bloqué</h2>
    <h3>Votre profil</h3>
    <form action="<?php echo base_url()?>Traitement_profil" method="post">
>>>>>>> 81c5c030de8c99f39e83080f55377ee1b272afe4
        <input type="text" name="name" placeholder="nom" value="<?php echo $_SESSION['name'] ?>">
<?php echo form_error('name', '<div class="error">', '</div>'); ?>
        <input type="text" name="firstname" placeholder="prenom" value="<?php echo $_SESSION['firstname'] ?>">
        <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
<<<<<<< HEAD
        <input type="email" name="mail" placeholder="adresse email" value="<?php echo $_SESSION['mail'] ?>">
=======
        <input type="text" name="mail" placeholder="adresse email" value="<?php echo $_SESSION['mail'] ?>">
>>>>>>> 81c5c030de8c99f39e83080f55377ee1b272afe4
        <?php echo form_error('mail', '<div class="error">', '</div>'); ?>
        <input type="text" name="login" placeholder="login" value="<?php echo $_SESSION['login']; ?>">
        <?php echo form_error('login', '<div class="error">', '</div>'); ?>
        <input type="password" name="password" placeholder="password" value="<?php echo $_SESSION['password'] ?>">
        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
        <input type="password" name="password_verif" placeholder="retapez mot de passe" value="<?php echo $_SESSION['password_verif'] ?>">
        <?php echo form_error('password_verif', '<div class="error">', '</div>'); ?>
       
    

        
        <input type="submit">
        </form>
        
<<<<<<< HEAD
      
    <a href="Deconnexion">Deconnexion</a>
  
=======
    <a href="Deconnexion">Deconnexion</a>

>>>>>>> 81c5c030de8c99f39e83080f55377ee1b272afe4
</body>
</html>



