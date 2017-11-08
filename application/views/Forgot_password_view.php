<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié</title>
</head>
<body>
   <h2>Entrez Votre mail ici</h2>
    <form action="<?php echo base_url()?>Traitement_forgot_password" method="get">
        
        <input type="text" name="mail" placeholder="Votre mail" required>
        <input type="submit">
    </form>
</body>
</html>