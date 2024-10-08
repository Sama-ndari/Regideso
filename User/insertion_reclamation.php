<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Regideso</title>
    <?php include "Connexion.php" ?>
    <?php include "Header1.php" ?>
</head> 
<body>
    <br><br>
    <section id="comment-form">
        <h1> Reclamer </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label for="facture">
                    Facture
                    <select name="facture" id="facture">
                        <?php  
                            $affichageFact = $bdd->query("Select * from Facture as f join Compteur as cp on f.compteur = cp.id_compt");
                            while($dataFact = $affichageFact->fetch()){

                        ?>
                            <option value=" <?php echo $dataFact["id_fact"]; ?> ">
                                <?php echo $dataFact["id_fact"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            </div>

            <div class="form-control">
                <label for="descr">
                    Description
                    <textarea name="descr" id="descr" cols="30" rows="5" require></textarea>
                </label><br><br>
            </div>

            </div>

            <div class="form-control">
                <label for="image">
                    Image
                    <input type="file" name="image" id="image" required>
                </label>
            </div>

            <button type="submit" name="valider">Envoyer</button>
            <?php
                if(isset($_POST["valider"])){
                    // conditions!!!!!!!!
                    $recupFact = $_POST["facture"];
                    $recupDescr = $_POST["descr"];
                    // recuperation de l'image
                    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
                    $image = $_FILES["image"]["name"];
                    $image_type = $_FILES["image"]["type"];
                    $destination = "uploads/".$image;
                    if(in_array($image_type, $allowed_types)) {
                        $deplacer = move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
                    }
                    else{
                        echo "Type de fichier inacceptable utiliser (jpeg ou png ou gif";
                    }
                    if ($deplacer) {
                        $trouverecla = $bdd->prepare("Select * from Reclamation where num_fact= :recla");
                        $trouverecla->bindParam(':recla', $recupFact, PDO::PARAM_STR);
                        $trouverecla->execute();
                        if($trouverecla->rowCount() > 0){
                            echo "Vous avez deja reclamme pour ce facture";
                        }
                        else{
                            $insertRecl = "insert into Reclamation(num_fact,description,image_path) values('$recupFact','$recupDescr','$image')";
                            $bdd->exec($insertRecl); 
                            header("location: afichage_reclamation.php");
                        }
                    }
                }
            ?>
        </form>
    </section>
      
    
</body>
</html>