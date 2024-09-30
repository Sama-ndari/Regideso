<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'un compte Regideso</title>
    <?php include "Menu1.php" ?>
</head>
<body>
    <br><br>
    <section id="comment-form">
        <h1> Creer Compte </h1>
        <form action="" method="post">
            <div class="form-control">
                <label for="name">
                    Votre Nom d'Utilisateur: 
                    <input type="text" name="name" id="name" require autofocus>
                </label>
            </div>
            <br><br>
            <div class="form-control">
                <label for="pswd">
                    Mot de passe:
                    <input type="password" name="pswd" id="pswd">
                </label>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    <a href="Reclamer.php">Login si vous avez compte</a>
</section>
</body>
</html>