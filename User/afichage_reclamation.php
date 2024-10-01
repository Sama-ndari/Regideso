<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Reclamations</title>
    <?php 
        include "Connexion.php" ;
        $affichageRecl = $bdd->query("Select * from Reclamation");
        // $dataRecup = $affichagePub->fetch(); //recuperation des donnees de la bd
    ?>

    <?php include "Header.php" ?>
</head>
<body>
    <br><br>
    <div class="container">
    
        <h1>Nos Reclamations</h1>
        <table  border="1" cellpadding="1" cellspacing="7" align="center" bgcolor = "white">
            <tr>
                <th>Numero Facture</th>
                <th>Description</th>
                <th>Date de Reclamation</th>
                <th>Etat</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageRecl->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["num_fact"]; ?></td>
                    <td><?php echo $dataRecup["description"]; ?></td>
                    <td><?php echo $dataRecup["date_recl"]; ?></td>
                    <td><?php echo $dataRecup["etat"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>