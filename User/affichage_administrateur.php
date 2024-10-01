<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage Contactez_nous</title>
    <?php 
        include "Connexion.php" ;
        $affichageAdmin = $bdd->query("Select * from Administrateur");
        // $dataRecup = $affichagePub->fetch(); //recuperation des donnees de la bd
    ?>

    <?php include "Header.php" ?>
</head>
<body> 
    <br><br>
    <div class="container">
    
        <h1>Admins</h1>
        <table  border="1" cellpadding="1" cellspacing="7" align="center" bgcolor = "white">
            <tr>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php 
                while ( $dataRecup = $affichageAdmin->fetch()) {         
            ?>
                <tr>
                    <td ><?php echo $dataRecup["username"]; ?></td>
                    <td><?php echo $dataRecup["password"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>