<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteurs</title>
    <?php 
        include "Connexion.php" ;
        $affichageCompt = $bdd->query("Select * from Compteur");
         
    ?>

    <?php include "Header.php" ?>
</head>
<body>
    <br><br>
    <div class="container">
    
        <h1>Compteurs</h1>
        <table>
            <tr>
                <th>Client</th>
                <th>Numero de Compteur</th>
                <th>Type</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageCompt->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["client"]; ?></td>
                    <td><?php echo $dataRecup["num_compteur"]; ?></td>
                    <td><?php echo $dataRecup["type"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>