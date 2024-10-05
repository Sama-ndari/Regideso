<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des Factures</title>
    <?php 
        include "Connexion.php";
        $modifFact = $bdd->query("Select * from Facture as f join (Compteur as cp join Client as cl on cp.client = cl.id_client) on f.compteur = cp.id_compt where id_fact=".$_GET['mod']);
        $dataRecup = $modifFact->fetch();   

    ?>
    <?php include "Header1.php" ?>
</head>
<body>
    <br><br>
    <section id="comment-form">
        <h1>Modifiez Facture </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="compt">
                    Compteur
                    <select name="compt" id="compt">
                        <?php  
                            $affichageCompt = $bdd->query("Select * from Compteur");
                            while($dataCompt = $affichageCompt->fetch()){

                        ?>
                            <option value=" <?php echo $dataCompt["id_compt"]; ?> ">
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
                    <input type="number" value="<?php echo $dataRecup["montant"]; ?>" name="montant" id="montant" require pattern="\[0-9]*">
                </label>
            </div>
            <br><br>
            <button type="submit" name="valider">Envoyer</button>

        </form>
        <?php
            if(isset($_POST["valider"])){

                $recupCompt = $_POST["compt"];
                $recupMontant = $_POST["montant"];
                
                $modiffact = "update Facture set compteur='$recupCompt',montant='$recupMontant' where id_fact=".$_GET['mod'];
                $bdd->exec($modiffact); 
                header("location: affichage_facture.php");
                

            }
        ?>
</section>
</body>
</html>