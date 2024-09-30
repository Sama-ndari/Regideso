<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include "Connexion.php" ?>
    <?php include "Header.php" ?>
</head>
<body>
    <br><br>

    <section id="comment-form">
        <h1>Creer Compte</h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="username">
                    Votre Username: 
                    <input type="text" name="username" id="username" require>
                </label>
            </div>
            <div class="form-control">
                <label for="pswd">
                    Mot de Passe:
                    <input type="password" name="pswd" id="pswd">
                </label>
            </div>
            <button type="submit" name="valider">Authentifier</button>
            </fieldset>
            
        </form>
        <?php
            if(isset($_POST["valider"])){

            

            }
        ?>
    </section>
</body>
</html>
