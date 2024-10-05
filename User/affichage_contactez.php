<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Contactez_nous</title>
    <?php 
        include "Connexion.php" ;
        $affichageContact = $bdd->query("Select * from Contactez_nous order by id_cont DESC");
    ?>

    <?php
        if(isset($_GET["sup"])){
            $suppressionCont = $bdd->query("delete from Contactez_nous where id_cont=".$_GET['sup']);
            
        }
    ?>

    <?php include "Header1.php" ?>
</head> 
<body>
    <br><br>
    <div class="container">
    
        <h1>Contactez_nous</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Objet</th>
                <th>Message</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageContact->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td><?php echo $dataRecup["prenom"]; ?></td>
                    <td><?php echo $dataRecup["adresse"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td><?php echo $dataRecup["objet"]; ?></td>
                    <td><?php echo $dataRecup["message"]; ?></td>
                    <td><a href="affichage_contactez.php?sup=<?php echo $dataRecup["id_cont"]; ?>">Supprimer</a></td>
                    <td><a href="modif_Contactez_nous.php?mod=<?php echo $dataRecup["id_cont"]; ?>">Modifier</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>