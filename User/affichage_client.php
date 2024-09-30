<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Client</title>
    <?php 
        include "Connexion.php" ;
        $affichageClient = $bdd->query("Select * from Client");
        // $dataRecup = $affichagePub->fetch(); //recuperation des donnees de la bd
    ?>

    <?php include "Header.php" ?>
</head>
<body>
    <br><br>
    <div class="container">
    
        <h1>Clients</h1>
        <table>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageClient->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["nom"]; ?></td>
                    <td><?php echo $dataRecup["prenom"]; ?></td>
                    <td><?php echo $dataRecup["adresse"]; ?></td>
                    <td ><?php echo $dataRecup["telephone"]; ?></td>
                    <td><?php echo $dataRecup["email"]; ?></td>
                    <td><?php echo $dataRecup["username"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>