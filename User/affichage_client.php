<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Client</title>
    <?php 
        include "Connexion.php" ;
        $affichageClient = $bdd->query("Select * from Client as cl join Adresse as ad on cl.adresse  = ad.id_adr order by id_client DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionClient = $bdd->query("delete from Client where id_client=".$_GET['sup']);
            
        }
    ?>

    <?php include "Header_admin.php" ?>
</head>
<body> 
    <br><br>
    <div class="container">
    
        <h1>Clients</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Username</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageClient->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td><?php echo $dataRecup["prenom"]; ?></td>
                    <td><?php echo $dataRecup["commune"]." - ".$dataRecup["quartier"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td><?php echo $dataRecup["email"]; ?></td>
                    <td><?php echo $dataRecup["username"]; ?></td>
                    <td><a href="affichage_client.php?sup=<?php echo $dataRecup["id_client"]; ?>">Supprimer</a></td>
                    <td><a href="#">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>