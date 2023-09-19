<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php

    $nom = $image = "";


    $nomErreur = "";


    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Si on entre, on est dans l'envoie du formulaire
        
        if(empty($_POST['nom'])){
            $nomErreur = "Le nom est requis";
            $erreur = true;
        }
        else{
            $nom = test_input($_POST["nom"]); 
        }
        $image = test_input($_POST["image"]);


        // Inserer dans la base de données
        //SI erreurs, on réaffiche le formulaire 
    }
    if($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
    ?>
    <a href="Connexion.php" class="btn" role="button" id="lienAjout"><button type="button" id="btnConnexion">Connexion</button></a>

    <a href="Connexion.php" class="btn" role="button" id="lienAjout"><img src=""></a>

<div class="container-fluid">

            <div class="row">

                <div class="col-4">

                    <a href="pageUser.php"><img src="rage2.png"></a>

                    accueil

                </div>

                <div class="col-4">

                    <a><img src="neutre2.png"></a>

                </div>

                <div class="col-4">

                    <a><img src="yes2.png"></a>

                </div>

            </div>

        </div>


    <?php
    }

    function test_input($data){
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    
</body>
</html>