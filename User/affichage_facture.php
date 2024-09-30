<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factures</title>
    <?php 
        include "Connexion.php" ;
        $affichageFact = $bdd->query("Select * from Facture");
        // $dataRecup = $affichagePub->fetch(); //recuperation des donnees de la bd
    ?>

    <?php include "Header.php" ?>
</head>
<body>
    <br><br>
    <div class="container">
    
        <h1>Factures</h1>
        <table>
            <tr>
                <th>Compteur</th>
                <th>Montant</th>
                <th>Etat</th>
                <th>Date de Paiement</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageFact->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["compteur"]; ?></td>
                    <td><?php echo $dataRecup["montant"]; ?></td>
                    <td><?php echo $dataRecup["date_pay"]; ?></td>
                    <td><?php echo $dataRecup["etat"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>