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
        <form action="" method="post">
            <div class="form-control">
                <label for="facture">
                    Numero de Facture 
                    <input type="number" name="facture" id="facture">
                </label>
            </div>

            <div class="form-control">
                <label for="descr">
                    Description
                    <textarea name="descr" id="descr" cols="30" rows="5" require></textarea>
                </label><br><br>
            </div>
            <button type="submit" name="valider">Envoyer</button>
            
        </form>

        <?php
            if(isset($_POST["valider"])){
                // conditions!!!!!!!!
                $recupFact = $_POST["facture"];
                $recupDescr = $_POST["descr"];
    
                $insertRecl = "insert into Reclamation(num_fact,description) values('$recupFact','$recupDescr')";

                $bdd->exec($insertRecl); 
                header("location:affichage_reclamation.php");

            }
        ?>
    </section>
</body>
</html>