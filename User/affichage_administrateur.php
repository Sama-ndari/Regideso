<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Contactez_nous</title>
    <?php 
        include "Connexion.php" ;
        $affichageAdmin = $bdd->query("Select * from Administrateur");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionAdmin = $bdd->query("delete from Administrateur where id_admin=".$_GET['sup']);
            
        }
    ?>

    <?php include "Header1.php" ?>
</head>
<body> 
    <br><br>
    <div class="container">
    
        <h1>Admins</h1>
        <table>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageAdmin->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["username"]; ?></td>
                    <td><?php echo md5($dataRecup["password"]); ?></td>
                    <td><a href="affichage_administrateur.php?sup=<?php echo $dataRecup["id_admin"]; ?>">Supprimer</a></td>
                    <td><a href="modif_administrateur.php?mod=<?php echo $dataRecup["id_admin"]; ?>">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>