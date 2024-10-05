<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factures</title>
    <?php 
        include "Connexion.php" ;
        $affichageFact = $bdd->query("Select * from Facture as f join (Compteur as cp join Client as cl on cp.client = cl.id_client) on f.compteur = cp.id_compt order by id_fact DESC");

    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionFact = $bdd->query("delete from Facture where id_fact=".$_GET['sup']);
            
        }
    ?>

    <?php include "Header1.php" ?>
</head>
<body>
    <br><br> 
    <div class="container">
    
        <h1>Factures</h1>
        <table>
            <tr>
                <th>Client</th>
                <th>Telephone</th>
                <th>Numero de Compteur</th>
                <th>Montant</th>
                <th>Etat</th>
                <th>Date de Paiement</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageFact->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td ><?php echo $dataRecup["num_compteur"]; ?></td>
                    <td><?php echo $dataRecup["montant"]; ?></td>
                    <td><?php echo $dataRecup["etat"]; ?></td>
                    <td><?php echo $dataRecup["date_pay"]; ?></td>
                    <td><a href="affichage_facture.php?sup=<?php echo $dataRecup["id_fact"]; ?>">Supprimer</a></td>
                    <td><a href="modif_facture.php?mod=<?php echo $dataRecup["id_fact"]; ?>">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>