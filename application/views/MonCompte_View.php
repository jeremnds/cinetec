<?php
$this->session->userdata();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Votre profil</h1>
    <form action="<?php echo base_url()?>Traitement_profil" method="post">
        <input type="text" name="name" placeholder="nom" value="<?php echo $_SESSION['name'] ?>">
<?php echo form_error('name', '<div class="error">', '</div>'); ?>
        <input type="text" name="firstname" placeholder="prenom" value="<?php echo $_SESSION['firstname'] ?>">
        <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
        <input type="text" name="mail" placeholder="adresse email" value="<?php echo $_SESSION['mail'] ?>">
        <?php echo form_error('mail', '<div class="error">', '</div>'); ?>
        <input type="text" name="login" placeholder="login" value="<?php echo $_SESSION['login']; ?>">
        <?php echo form_error('login', '<div class="error">', '</div>'); ?>
        <input type="password" name="password" placeholder="password" value="<?php echo $_SESSION['password'] ?>">
        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
        <input type="password" name="password_verif" placeholder="retapez mot de passe" value="<?php echo $_SESSION['password_verif'] ?>">
        <?php echo form_error('password_verif', '<div class="error">', '</div>'); ?>
       
    

        
        <input type="submit">
        </form>
        
        <a href="<?php echo base_url()?>Enigme">Reprendre Enigme</a>
    <a href="Deconnexion">Deconnexion</a>
    <?php  print_r($this->session->all_userdata());
 ?>
</body>
</html>


