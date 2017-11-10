<?php
$this->session->userdata();
?>
<?php 

$title="Mon Compte";
include 'header_compte.php';

$url='assets/img/enigme_'.rand(1,10).'.jpg';

?>

<body>


    <style>
        body {
            background-image: url(<?php echo $url ?>);

        }
    </style>


    <img src="assets/img/pelicule.png" alt="" class="col-md-12" id="pellicule">

    <div id="compte" class="col-md-8 col-md-offset-2 col-xs-12">

        <h1>Bonjour
            <?php echo $login;?>
        </h1>

        <div class="row">
            <img src="assets/img/profil/default.jpg" alt="" class="col-md-4 col-md-offset-4 col-xs-12 img-responsive img-profil">
        </div>
        <div class="row">
        <a href="<?php echo base_url()?>Enigme">
            <div class="col-md-8 col-md-offset-2 col-xs-12 navigation" style="">
                JOUER
            </div>
        </a>
        </div>
        <div class="row">
        <a href="#">
            <div class="col-md-8 col-md-offset-2 col-xs-12 navigation" style="">
                TELECHARGER LA CARTE
            </div>
        </a>
        </div>
        <div class="row">
        <a href="Deconnexion">
            <div class="col-md-8 col-md-offset-2 col-xs-12 navigation" style="">
                DECONNEXION
            </div>
        </a>
        </div>
        
        
        <div class="row">
        <h2>HISTORIQUE</h2>
        </div>
        <div class="row">
            <table class="col-md-10 col-md-offset-1 col-xs-12">
                <th>Enigme</th>
                <th>Nombre d'essais</th>
                <th>Temps</th>
                <th></th>
                <?php
    $a=1;
    foreach($select_archive as $line){
        if(($a%2)==0){
            $tr_style='bgcolor="#d0d0d0"';
        }
        else{
            $tr_style='bgcolor="#888686"';
        }
        $a++;
    ?>
                   
                    <tr <?php echo $tr_style?>>
                        <td>Enigme n°
                            <?php echo $line->_enigme_id?>
                        </td>
                        <td >
                            <?php echo $line->enigme_nbessai?>
                        </td>
                        <td>
                            <?php echo $line->enigme_temps_passe?>s</td>
                    </tr>
                    <?php
    }
    ?>
                        <?php
    foreach($select_last as $line){
    ?>
                            <tr bgcolor="#47a83a">
                                <td class="col-md-5">Enigme n°
                                    <?php echo $line->_enigme_id?>
                                </td>
                                <td class="col-md-3">
                                    <?php echo $line->enigme_nbessai?>
                                </td>
                                <td class="col-md-4">
                                    <?php echo $line->enigme_temps_passe?>s</td>

                            </tr>
                            <?php
    }
    ?>
            </table>
        </div>
        <div class="row">
        
        
        
        

        <h2>Classement</h2>
        </div>
        <div class="row">
        <table class="col-md-10 col-md-offset-1 col-xs-12">
            <th>Classement</th>
            <th>Nom</th>
            <th>Enigme</th>
            <th>Temps Total</th>


            <?php
       $i=1;
    foreach($select_user as $line){
        if(($i%2)==0){
            $style='bgcolor="#888686"';
        }
        else{
            $style='bgcolor="#d0d0d0"';
        }
       
        if ($line->user_id==$_SESSION['id']){
            $style= 'bgcolor="#47a83a"';
        }
        
         
       ?>

                <tr <?php echo $style?>
                    </t>

                    <td>
                        <?php echo $i ?>
                    </td>
                    <td>
                        <?php echo $line->user_login ?>
                    </td>
                    <td>Enigme n°
                        <?php echo $line->_enigme_id ?>
                    </td>
                    <td>
                        <?php echo $line->temps_total ?>s</td>


                </tr>

                <?php
           $i++;
    }
       ?>
        </table>
    </div>
        <div class="row">
        <h2>MON COMPTE</h2>
    </div>
        <form action="<?php echo base_url()?>Traitement_profil" method="post">
           
               <span class="titre-input col-md-6 col-md-offset-3 col-xs-12">Nom</span>
            <input type="text" name="name" placeholder="nom" value="<?php echo $_SESSION['name'] ?>" required class="col-md-6 col-md-offset-3 col-xs-12">
            <?php echo form_error('name', '<div class="error">', '</div>'); ?>
            
            <span class="titre-input col-md-6 col-md-offset-3 col-xs-12">Prenom</span>
            <input type="text" name="firstname" placeholder="prenom" value="<?php echo $_SESSION['firstname'] ?>" required class="col-md-6 col-md-offset-3 col-xs-12">
            <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>
            
            <span class="titre-input col-md-6 col-md-offset-3 col-xs-12">Email</span>
            <input type="email" name="mail" placeholder="adresse email" value="<?php echo $_SESSION['mail'] ?>" required class="col-md-6 col-md-offset-3 col-xs-12">
            <?php echo form_error('mail', '<div class="error">', '</div>'); ?>
            
            <span class="titre-input col-md-6 col-md-offset-3 col-xs-12">Login</span>
            <input type="text" name="login" placeholder="login" value="<?php echo $_SESSION['login']; ?>" required class="col-md-6 col-md-offset-3 col-xs-12">
            <?php echo form_error('login', '<div class="error">', '</div>'); ?>
            
            <span class="titre-input col-md-6 col-md-offset-3 col-xs-12">Mot de passe</span>
            <input type="password" name="password" placeholder="password" value="<?php echo $_SESSION['password'] ?>" required class="col-md-6 col-md-offset-3 col-xs-12">
            <?php echo form_error('password', '<div class="error">', '</div>'); ?>
            
            <span class="titre-input col-md-6 col-md-offset-3 col-xs-12">Confirmation mot de passe</span>
            <input type="password" name="password_verif" placeholder="retapez mot de passe" value="<?php echo $_SESSION['password_verif'] ?>" required class="col-md-6 col-md-offset-3 col-xs-12">
            <?php echo form_error('password_verif', '<div class="error">', '</div>'); ?>




            <input type="submit" class="col-md-4 col-md-offset-4 col-xs-12" value="Enregistrer les modification">
        </form>


        






    </div>

</body>

</html>