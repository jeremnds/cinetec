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
</style>
<body>
    <h1>Votre profil</h1>
    <form action="<?php echo base_url()?>Traitement_profil" method="post">
        <input type="text" name="name" placeholder="nom" value="<?php echo $_SESSION['name'] ?>" required>
<?php echo form_error('name', '<div class="error">', '</div>'); ?>
        <input type="text" name="firstname" placeholder="prenom" value="<?php echo $_SESSION['firstname'] ?>"required>
        <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
        <input type="text" name="mail" placeholder="adresse email" value="<?php echo $_SESSION['mail'] ?>" required>
        <?php echo form_error('mail', '<div class="error">', '</div>'); ?>
        <input type="text" name="login" placeholder="login" value="<?php echo $_SESSION['login']; ?>" required>
        <?php echo form_error('login', '<div class="error">', '</div>'); ?>
        <input type="password" name="password" placeholder="password" value="<?php echo $_SESSION['password'] ?>"required>
        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
        <input type="password" name="password_verif" placeholder="retapez mot de passe" value="<?php echo $_SESSION['password_verif'] ?>"required>
        <?php echo form_error('password_verif', '<div class="error">', '</div>'); ?>
       
    

        
        <input type="submit">
        </form>
        
        <a href="<?php echo base_url()?>Enigme">Reprendre Enigme</a>
    <a href="Deconnexion">Deconnexion</a>
</body>
</html>



