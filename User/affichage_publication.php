<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <?php 
        include "Connexion.php" ;
        $affichagePub = $bdd->query("Select * from Publication");
        // $dataRecup = $affichagePub->fetch(); //recuperation des donnees de la bd
    ?>

    <?php include "Header.php" ?>
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
            </tr>
            <?php 
                while ( $dataRecup = $affichagePub->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["objectif"]; ?></td>
                    <td><?php echo $dataRecup["publicite"]; ?></td>
                    <td><?php echo $dataRecup["date_pub"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>