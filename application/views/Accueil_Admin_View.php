<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
</head>



<?php
    
$tab_blocage=array('<option value="0">Non Bloqué</option>','<option value="1">Bloqué 12h</option>','<option value="2">Bloqué</option>');

    
?>





<body>

    <table>
        <tr>
            <th>Classement</th>
            <th>Login</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Mail</th>
            <th>Progression</th>
            <th>Activation</th>
            <th>Type</th>
             <th>Blocage</th>

        </tr>
        <?php
        $i=1;
            foreach($select_user as $line){
                
            if($line->user_type==1){
       
       ?>
       
    <tr>
                <td>--</td>
                <td>
                    <?php echo $line->user_login?>
                </td>
                <td>
                    <?php echo $line->user_firstname?>
                </td>
                <td>
                    <?php echo $line->user_name?>
                </td>
                <td>
                    <?php echo $line->user_mail?>
                </td>
                <td>
                   Enigme N° <?php echo $line->_enigme_id?>
                </td>
              
              
          <td bgcolor="green">&nbsp;</td>
                
            

          
            <td><select name="type" id="type">
               <option value="1">Admin</option>
               
           </select></td>
           <td><select name="blocage" id="Blocage">
               <option value="1">Non Bloqué</option>
               
           </select></td>
           
         
           </tr>
           <?php } else{?>
           
            <tr>
                <form action="<?php echo base_url()?>Traitement_admin">
                <input type="hidden" value="<?php echo $line->user_id?>" name="id">
                <td><?php echo $i?></td>
                <td>
                    <?php echo $line->user_login?>
                </td>
                <td>
                    <?php echo $line->user_firstname?>
                </td>
                <td>
                    <?php echo $line->user_name?>
                </td>
                <td>
                    <?php echo $line->user_mail?>
                </td>
                 <td>
                   Enigme N° <?php echo $line->_enigme_id?>
                </td>
                <?php if($line->user_activation==0){ ?>
                <td bgcolor="red">&nbsp;</td>
                <?php }
          
          else{?>
                <td bgcolor="green">&nbsp;</td>
                <?php }?>
            

           
           <td><select name="type"  >
              <option value="0">Utilisateur</option>
               <option value="1">Admin</option>
               
           </select></td>
           <td><select name="blocage"  >
             <?php echo $tab_blocage[$line->user_blocage]?>
              <option value="0">Non Bloqué</option>
               <option value="1">Bloqué 12h</option>
                <option value="2">Bloqué</option>

               
           </select></td>
           
           <td>
               <input type="submit">
               
           </td>
           
                </form>
           </tr>
           <?php $i=$i+1;}}?>
         
           
           
            
            </tr>
           


    </table>
    
    <table>
        <th>Enigme</th>
        <th>Tentatives</th>
        <th>Reussite</th>
        <th>Ratio</th>
           
        <?php foreach($select_enigme as $line){?>
          <tr>
              <td>Enigme n° <?php echo $line->enigme_id?></td>
              <td><?php echo $line->enigme_tentative?></td>
              <td><?php echo $line->enigme_succes?></td>
              <td><?php echo $line->enigme_ratio?>%</td>
              
          </tr>
        <?php } ?>
           
            
    </table>
    <a href="Deconnexion">Deconnexion</a>

</body>

</html>