<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Contactez_nous</title>
    <?php 
        include "Connexion.php" ;
        $affichageContact = $bdd->query("Select * from Contactez_nous");
        // $dataRecup = $affichagePub->fetch(); //recuperation des donnees de la bd
    ?>

    <?php include "Header.php" ?>
</head>
<body>
    <br><br>
    <div class="container">
    
        <h1>Contactez_nous</h1>
        <table  border="1" cellpadding="1" cellspacing="7" align="center" bgcolor = "white">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Objet</th>
                <th>Message</th>
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
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>