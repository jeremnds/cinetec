<?php 

$title="Accueil";
include 'header.php';


?>

<body>



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






    

           
            
         
    

        <div class="col-md-12 popup ">
           
           <img src="assets/img/close.png" alt="" class="col-md-1 col-md-offset-11 closecross">
            
            

            <div class="espace-connexion col-md-8 col-md-offset-2">

                <div class="connexion col-md-6">
                    <h2>Connexion</h2>
                    <div class="row">
                     <form action="<?php echo base_url() ?>Traitement_connexion" method="get">
                        <input type="text" name="login" placeholder="Login" required class="col-md-12">
            <span class="error"><?php echo $text_wrong_login_echo ?></span>
                       
                        <input type="password" placeholder="Password" name="password" required class="col-md-12">
            <span class="error"><?php echo $text_wrong_password_echo ?></span>
                        
                        
                    </div>
                    <div class="row">
                    <a href="<?php echo base_url()?>Forgot_password">Mot de passe oublié</a>
                    </div>
                    <input type="submit" class="col-md-6 col-md-offset-3">
                    </form>
                    
                    
                </div>




                <div class="inscription col-md-6">
                    <h2>Inscription</h2>
                    <form action="<?php echo base_url()?>Traitement_inscription" method="post">
                        <input type="text" name="name" placeholder="nom" value="<?php echo set_value('name'); ?>" class="col-md-12">
                        <?php echo form_error('name', '<div class="error">', '</div>'); ?>



                        <input type="text" name="firstname" placeholder="prenom" value="<?php echo set_value('firstname'); ?>" class="col-md-12">
                        <?php echo form_error('firstname', '<div class="error">', '</div>'); ?>

                        <input type="email" name="mail" placeholder="adresse email" value="<?php echo set_value('mail'); ?>" class="col-md-12">
                        <?php echo form_error('mail', '<div class="error">', '</div>'); ?>

                        <input type="text" name="login" placeholder="login" value="<?php echo set_value('login'); ?>" class="col-md-12">
                        <?php echo form_error('login', '<div class="error">', '</div>'); ?>

                        <input type="password" name="password" placeholder="password" value="" class="col-md-12">
                        <?php echo form_error('password', '<div class="error">', '</div>'); ?>

                        <input type="password" name="password_verif" placeholder="retapez mot de passe" value="" class="col-md-12">
                        <?php echo form_error('password_verif', '<div class="error">', '</div>'); ?>

                        <input type="submit" class="col-md-6 col-md-offset-3">
                    </form>

                </div>
            </div>

        </div>

        <header>

            <div class="header-container">
                <nav>

                    <ul>
                        <a href="#" class="connexion">
                            <li>Connexion</li>
                        </a>
                        <a href="#" class="connexion">
                            <li>Inscription</li>
                        </a>


                    </ul>
                </nav>

                <img src="assets/img/pelicule.png" alt="pelicule" class="banniere-header">

                <div class="video-container">
                    <video preload="true" autoplay="autoplay" loop="loop" muted>
                
                <source src="assets/video/video_test.mp4" type="video/mp4">
                
                
            </video>


                </div>

                <img src="assets/img/masque.png" alt="masque" class="masque-header">
            </div>



        </header>

        <section>

            <div class="col-md-10 col-md-offset-1" id="presentation">
                <h2> But du Jeu</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis natus est voluptatum iste ullam obcaecati laboriosam animi aliquam consequatur! Cum inventore nesciunt, explicabo praesentium ex reiciendis sunt soluta tempore. Placeat. dLorem ipsum dolor sit amet, consectetur adipisicing elit. Eum recusandae molestias delectus consectetur suscipit accusantium aperiam officia numquam eos minima atque voluptatum a asperiores, unde, aliquam error, velit, et ab?</p>

            </div>


            <div id="presentation-icone" class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

                <div class="col-md-2" id="icone-question">
                    <div class="row"><img src="assets/img/picto-_.png" class="img-responsive col-md-11 " alt=""></div>
                    <div class="row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis nihil magni id ullam deleniti, esse in dicta rem ipsum.</div>
                </div>


                <div class="col-md-2 col-md-offset-3" id="icone-game">
                    <div class="row"><img src="assets/img/pictojeu.png" alt="" class="img-responsive col-md-11 "></div>
                    <div class="row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad illum vero necessitatibus veniam, accusantium dolores suscipit.</div>
                </div>

                <div class="col-md-2 col-md-offset-3 col-xs-12" id="icone-camera">
                    <div class="row"><img src="assets/img/pictocam.png" alt="" class="img-responsive col-md-11 c"></div>
                    <div class="row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam explicabo est numquam nihil ipsam neque debitis suscipit.</div>
                </div>
            </div>


            <div id="jouer" class="col-md-12">

                <img src="assets/img/rouage.png" class="col-md-5 img-reponsive" id="img-rouage" alt="">
                <a href="#"><img src="assets/img/jouer.png" alt="bouton jouer" class="col-md-6 col-md-offset-2 img-reponsive" id="boutton-jouer"></a>

            </div>

            <div id="regle-icone" class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

                <div class="col-md-2" id="icone-un">
                    <div class="row"><img src="assets/img/1.png" class="img-responsive col-md-11 " alt=""></div>
                    <div class="row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis nihil magni id ullam deleniti, esse in dicta rem ipsum.</div>
                </div>


                <div class="col-md-2 col-md-offset-3" id="icone-deux">
                    <div class="row"><img src="assets/img/2.png" alt="" class="img-responsive col-md-11 "></div>
                    <div class="row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad illum vero necessitatibus veniam, accusantium dolores suscipit.</div>
                </div>

                <div class="col-md-2 col-md-offset-3 col-xs-12" id="icone-trois">
                    <div class="row"><img src="assets/img/3.png" alt="" class="img-responsive col-md-11 c"></div>
                    <div class="row">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam explicabo est numquam nihil ipsam neque debitis suscipit.</div>
                </div>
            </div>



            <div id="contact" class="col-md-12">
                <h2>Formulaire de Contact</h2>
                <div class="formulaire col-md-8 col-md-offset-2">
                <form action="<?php echo base_url() ?>Traitement_contact" method="post">
                    <div class="row">

                        <input type="text" id="contact-prenom" name="contact-prenom" placeholder="Prenom" class="col-md-6" required>
                        <?php echo form_error('contact-prenom', '<div class="error">', '</div>'); ?>
                        <input type="text" id="contact-nom" name="contact-nom" placeholder="Nom" class="col-md-5 col-md-offset-1" required>
                        <?php echo form_error('contact-nom', '<div class="error">', '</div>'); ?>

                    </div>

                    <div class="row">

                        <input type="email" id="contact-mail" name="contact-mail" placeholder="Votre adresse mail" class="col-md-6" required>
                        <?php echo form_error('contact-mail', '<div class="error">', '</div>'); ?>
                        <input type="text" id="contact-sujet" name="contact-sujet" placeholder="sujet" class="col-md-5 col-md-offset-1">
                        <?php echo form_error('contact-sujet', '<div class="error">', '</div>'); ?>

                    </div>
                    <div class="row">
                        <textarea name="contact-texte" id="contact-texte" cols="30" rows="10" class="col-md-12" placeholder="Votre message..." required></textarea>
                        <?php echo form_error('contact-texte', '<div class="error">', '</div>'); ?>
                    </div>

            
                <input type="submit">
                    </form>
                   </div>
                <img src="assets/img/camera2.png" alt="image camera" class="col-md-3 camera-photo">
            </div>
        </section>








</body>

</html>