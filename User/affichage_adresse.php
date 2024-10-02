<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <?php 
        include "Connexion.php" ;
        $affichageAdd = $bdd->query("Select * from Adresse");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionAdr = $bdd->query("delete from Adresse where id_adr=".$_GET['sup']);
            
        }
    ?>

    <?php include "Header_admin.php" ?>
</head> 
<body>
    <br><br>
    <div class="container">
    
        <h1>Adresses</h1>
        <table>
            <tr>
                <th>Pays</th>
                <th>Province</th>
                <th>Commune</th>
                <th>Quartier</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageAdd->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["pays"]; ?></td>
                    <td><?php echo $dataRecup["province"]; ?></td>
                    <td><?php echo $dataRecup["commune"]; ?></td>
                    <td><?php echo $dataRecup["quartier"]; ?></td>
                    <td><a href="affichage_adresse.php?sup=<?php echo $dataRecup["id_adr"]; ?>">Supprimer</a></td>
                    <td><a href="#">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>