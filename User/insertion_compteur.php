<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation des compteurs</title>
    <?php include "Connexion.php" ?>
    <?php include "Header1.php" ?>
</head>
<body>
    <br><br>
    <section id="comment-form">
        <h1>Inserez Compteur </h1>
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
                    <input type="number" name="compt" id="compt" require pattern="\[0-9]*">
                </label>
            </div>
            <br><br>
            <div class="form-control">
                <label for="type">
                    Type
                    <input type="text" name="type" id="type" require>
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

                $trouvecompt = $bdd->prepare("Select * from Compteur where num_compteur= :compteur");
                $trouvecompt->bindParam(':compteur', $recupNum, PDO::PARAM_STR);
                $trouvecompt->execute();
                if($trouvecompt->rowCount() > 0){
                    echo "Compteur existe deja";
                }
                else{
                    $insertcompt = "insert into Compteur(client,num_compteur,type) values('$recupClient','$recupNum','$recupType')";
                    $bdd->exec($insertcompt); 
                    header("location: affichage_compteur.php");
                }

            }
        ?>
</section>
</body>
</html>