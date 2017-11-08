
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
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
    a{
        clear: both;
        float: left;
    }
</style>

<body>

   <form action="<?php echo base_url()?>traitement_inscription" method="post">
        <h1>Inscription</h1>
        <input type="text" name="name" placeholder="nom" value="<?php echo set_value('name'); ?>">
<?php echo form_error('name', '<div class="error">', '</div>'); ?>
        <input type="text" name="firstname" placeholder="prenom" value="<?php echo set_value('firstname'); ?>">
        <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
        <input type="text" name="mail" placeholder="adresse email" value="<?php echo set_value('mail'); ?>">
        <?php echo form_error('mail', '<div class="error">', '</div>'); ?>
        <input type="text" name="login" placeholder="login" value="<?php echo set_value('login'); ?>">
        <?php echo form_error('login', '<div class="error">', '</div>'); ?>
        <input type="password" name="password" placeholder="password" value="">
        <?php echo form_error('password', '<div class="error">', '</div>'); ?>
        <input type="password" name="password_verif" placeholder="retapez mot de passe" value="">
        <?php echo form_error('password_verif', '<div class="error">', '</div>'); ?>
       
    

        
        <input type="submit">
        </form>

    <?php
    

    function verif_get($get){
        
        if(!empty($_GET[$get])){
            $get=$_GET[$get];
        
        }
        else {
            $get=0;
        }
        return $get;
        
    }
    
    function error_text($erreur,$error_text,$text)
    {
        if($erreur==1){
            $error_text=$text;
        }
        
        else{
            $error_text='';
        }
        return $error_text;
    }
    
    $wrong_password='wrong_password';
    $text_wrong_password_echo='';
    $text_wrong_password='Mot de passe incorrect';
    $wrong_password=verif_get($wrong_password);
    $text_wrong_password_echo=error_text($wrong_password,$text_wrong_password_echo,$text_wrong_password);

    
      $wrong_login='wrong_login';
    $text_wrong_login_echo='';
    $text_wrong_login='Login incorrect';
    $wrong_login=verif_get($wrong_login);
    $text_wrong_login_echo=error_text($wrong_login,$text_wrong_login_echo,$text_wrong_login);

    ?>






        <h2>Connexion</h2>
        <form action="<?php echo base_url() ?>Traitement_connexion" method="get">

            <input type="text" name="login" placeholder="Login" required>
            <span class="error"><?php echo $text_wrong_login_echo ?></span>
           
            <input type="password" placeholder="Password" name="password" required>
              <span class="error"><?php echo $text_wrong_password_echo ?></span>
              
                    <a href="<?php echo base_url()?>Forgot_password">Mot de passe oublié</a>
            <input type="submit">
        </form>
  


</body>

</html>