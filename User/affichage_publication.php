<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <?php 
        include "Connexion.php" ;
        $affichagePub = $bdd->query("Select * from Publication");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionPub = $bdd->query("delete from Publication where id_pub=".$_GET['sup']);
            
        }
    ?>

    <?php include "Header_admin.php" ?>
</head>
<body>
    <br><br>
    <div class="container">
    
        <h1>Nos Publications</h1>
        <table>
            <tr>
                <th>Objectif</th>
                <th>Publicite</th>
                <th>Date de Publication</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichagePub->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["objectif"]; ?></td>
                    <td><?php echo $dataRecup["publicite"]; ?></td>
                    <td><?php echo $dataRecup["date_pub"]; ?></td>
                    <td><a href="affichage_publication.php?sup=<?php echo $dataRecup["id_pub"]; ?>">Supprimer</a></td>
                    <td><a href="#">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
