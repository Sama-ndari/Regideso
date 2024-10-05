<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des compteurs</title>
    <?php 
        include "Connexion.php";
        $modifCompt = $bdd->query("Select * from Compteur as cp join Client as cl on cp.client = cl.id_client where id_compt=".$_GET['mod']);
        $dataRecup = $modifCompt->fetch();   
    ?>
    <?php include "Header1.php" ?>
</head>
<body>
    <br><br>
    <section id="comment-form">
        <h1>Modifiez Compteur </h1>
        <form action="" method="POST">
            <div class="form-control">
                <label for="client">
                    Client
                    <select name="client" id="client">
                        <?php  
                            $affichageClient = $bdd->query("Select * from Client");
                            while($dataClient = $affichageClient->fetch()){

                        ?>
                            <option value=" <?php echo $dataClient["id_client"]; ?> ">
                                <?php echo $dataClient["nom"]." - ".$dataClient["telephone"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <br><br>
            <div class="form-control">
                <label for="compt">
                    Numero Compteur
                    <input type="number" value="<?php echo $dataRecup["num_compteur"]; ?>" name="compt" id="compt" require pattern="\[0-9]*">
                </label>
            </div>
            <br><br>
            <div class="form-control">
                <label for="type">
                    Type
                    <input type="text" value="<?php echo $dataRecup["type"]; ?>" name="type" id="type" require>
                </label>
            </div>
            <br><br>
            <button type="submit" name="valider">Envoyer</button>

        </form>
        <?php
            if(isset($_POST["valider"])){

                $recupClient = $_POST["client"];
                $recupNum = $_POST["compt"];
                $recupType = $_POST["type"];

                $modifcompt = "update Compteur set client='$recupClient',num_compteur='$recupNum',type='$recupType' where id_compt=".$_GET['mod'];
                $bdd->exec($modifcompt); 
                header("location: affichage_compteur.php");

            }
        ?>
</section>
</body>
</html>