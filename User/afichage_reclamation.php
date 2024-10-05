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

    <style>
        .image-preview {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
        }
    </style>

    <?php include "Header1.php" ?>
</head>
<body>
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
                <th>Image</th>
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
                    <td>
                        <?php if (!empty($dataRecup["image_path"])): ?>
                            <img src="uploads/<?php echo htmlspecialchars($dataRecup["image_path"]); ?>" alt="Reclamation Image" class="image-preview">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td><a href="afichage_reclamation.php?sup=<?php echo $dataRecup["id_recl"]; ?>">Supprimer</a></td>
                    <td><a href="modif_reclamation.php?mod=<?php echo $dataRecup["id_recl"]; ?>">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>