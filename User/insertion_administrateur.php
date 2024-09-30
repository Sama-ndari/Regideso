<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Regideso</title>
    <?php include "Connexion.php" ?>
    <?php include "Header.php" ?>
</head>
<body>
    <br><br>
    <section id="comment-form">
        <h1> Reclamer </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="username">
                    Username
                    <input type="text" name="username" id="username">
                </label>
            </div>

            <div class="form-control">
                <label for="descr">
                    Mot de passe
                    <input name="pswd" id="pswd" require>
                </label><br><br>
            </div>
            <button type="submit" name="valider">Envoyer</button>
            
        </form>

        <?php
            if(isset($_POST["valider"])){
                $recupUsername = $_POST["username"];
                $recupPswd = $_POST["pswd"];
    
                $insertAdmin = "insert into Administrateur(username,password) values('$recupUsername','$recupPswd')";

                $bdd->exec($insertAdmin); 
                header("location:affichage_administrateur.php");

            }
        ?>
    </section>
</body>
</html>