<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publications</title>
    <?php 
        include "Connexion.php" ;
        $affichageAdd = $bdd->query("Select * from Adresse");
        // $dataRecup = $affichagePub->fetch(); //recuperation des donnees de la bd
    ?>

    <?php include "Header.php" ?>
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
            </tr>
            <?php 
                while ( $dataRecup = $affichageAdd->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["pays"]; ?></td>
                    <td><?php echo $dataRecup["province"]; ?></td>
                    <td><?php echo $dataRecup["commune"]; ?></td>
                    <td><?php echo $dataRecup["quartier"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>