<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Reclamations</title>
    <?php 
        include "Connexion.php" ;
        $affichageRecl = $bdd->query("Select * from Reclamation as recl join (Facture as f join (Compteur as cp join Client as cl on cp.client = cl.id_client) on f.compteur = cp.id_compt) on recl.num_fact = f.id_fact order by id_recl DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionRecl = $bdd->query("delete from Reclamation where id_recl=".$_GET['sup']);
            
        }
    ?>

    <?php include "Header_admin.php" ?>
</head>
<body>
    <br><br>
    <div class="container">
    
        <h1>Nos Reclamations</h1>
        <table>
            <tr>
                <th>Client</th>
                <th>Telephone</th>
                <th>Numero de Compteur</th>
                <th>Numero Facture</th>
                <th>Description</th>
                <th>Date de Reclamation</th>
                <th>Etat</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageRecl->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td ><?php echo $dataRecup["num_compteur"]; ?></td>
                    <td ><?php echo $dataRecup["num_fact"]; ?></td>
                    <td><?php echo $dataRecup["description"]; ?></td>
                    <td><?php echo $dataRecup["date_recl"]; ?></td>
                    <td><?php echo $dataRecup["etat"]; ?></td>
                    <td><a href="afichage_reclamation.php?sup=<?php echo $dataRecup["id_recl"]; ?>">Supprimer</a></td>
                    <td><a href="#">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>