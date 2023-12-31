<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";
    // create connection
    $conn = new mysqli($servername, $username, $password, $db);


    //On crée les variables du formulaire vide
    $prenom = $nom = $mdp = $url = $action = "";

    //On crée les variables d'erreurs vides
    $nomErreur = "";

    //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //echo "POST";
        //Si on entre, on est dans l'envoie du formulaire

        if (empty($_POST['prenom'])) {
            $nomErreur = "Le prenom est requis";
            $erreur = true;
        } else {
            $prenom = test_input($_POST["prenom"]);
        }

        if (empty($_POST['nom'])) {
            $nomErreur = "Le nom est requis";
            $erreur = true;
        } else {
            $nom = test_input($_POST["nom"]);
        }


        if (empty($_POST['mdp'])) {
            $nomErreur = "Le mdp est requis";
            $erreur = true;
        } else {
            $mdp = test_input($_POST["mdp"]);
        }

        if (empty($_POST['url'])) {
            $nomErreur = "L'url est requis";
            $erreur = true;
        } else {
            $url = test_input($_POST["url"]);
        }
//---------------------------------------------------------------------------//
        if ($erreur == false) {

          $sql = "INSERT INTO `meow` SET `prenom` = '$prenom', `nom` = '$nom', `mdp` = '$mdp', `urlImage` = '$url'";      

          if($conn->query($sql) === TRUE) {

            echo "mise a jour effectuer correctement";
            $action = "ajouter";
            header('Location: http://localhost/Web32023/BDTest2/index.php?action=ajouter');
        } else {
            echo "erreur dans la mise a jour". $conn->error;
        }

    if (!$conn) {
    die("Connection failed: " . $mysqli_connect_error());
}
        }


//---------------------------------------------------------------------------//

        

        // Inserer dans la base de données
        //SI erreurs, on réaffiche le formulaire 
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {

        if ($erreur == true) { ?>
            <div class="text-center"> <?php echo "Erreur ou 1ere fois"; ?> </div>
        <?php } ?>
        <div class="container">


            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated row g-2" novalidate>

                <div class="col-md-4">


                    <label for="validationServer01" class="form-label">prenom</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="Kaffee" name="prenom" required>

                </div>

                <div class="col-md-4"> </div>

                <div class="col-md-4">


                    <label for="validationServer01" class="form-label">Nom</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="cafe" name="nom" required>

                </div>

                <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">Mdp</label>
                    <input type="password" class="form-control is-valid" id="validationServer01" value="" name="mdp" required>

                </div>

                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">url</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="citron.jpg" name="url" required>

                </div>

                <hr>

                <input type="submit">
            </form>
        </div>

    <?php
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
</body>

</html>