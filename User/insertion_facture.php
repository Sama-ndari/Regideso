<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation des Factures</title>
    <?php include "Connexion.php" ?>
    <?php include "Header_admin.php" ?>
</head>
<body>
    <br><br>
    <section id="comment-form">
        <h1>Inserez Facture </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="compt">
                    Compteur
                    <select name="compt" id="compt">
                        <?php  
                            $affichageCompt = $bdd->query("Select * from Compteur");
                            while($dataCompt = $affichageCompt->fetch()){

                        ?>
                            <option value=" <?php echo $dataClient["id_compt"]; ?> ">
                                <?php echo $dataCompt["num_compteur"]." - ".$dataCompt["type"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <br><br>
            <div class="form-control">
                <label for="montant">
                    Montant
                    <input type="number" name="montant" id="montant" require>
                </label>
            </div>
            <br><br>
            <button type="submit" name="valider">Envoyer</button>

        </form>
        <?php
            if(isset($_POST["valider"])){

                $recupCompt = $_POST["compt"];
                $recupMontant = $_POST["montant"];
    
                $insertPub = "insert into Facture(compteur,montant) values('$recupCompt','$recupMontant')";

                $bdd->exec($insertPub); 
                header("location:affichage_facture.php");

            }
        ?>
</section>
</body>
</html>