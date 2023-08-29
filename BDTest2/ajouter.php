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
    //On crée les variables du formulaire vide
    $prenom = $nom = $mdp = $avatar = "";

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

        if (empty($_POST['avatar'])) {
            $nomErreur = "L'avatar est requis";
            $erreur = true;
        } else {
            $avatar = test_input($_POST["avatar"]);
        }
//---------------------------------------------------------------------------//
        if ($erreur == false) {

        if (!$conn) {
        die("Connection failed: " . $mysqli_connect_error());
    }

    $sql = "INSERT INTO meow (prenom, nom, mdp, urlImage)
    VALUES ('$prenom','$nom','$mdp', '$avatar')";            
//---------------------------------------------------------------------------//

    ?>

            <div class="container align-items-center">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center ">
                                <h1> <?php echo $prenom ?> </h1>
                            </div>

                            <div class="card-body">
                                <div class="align-items-center text-center">
                                    <img src="<?php echo $avatar ?>">
                                </div>
                                <hr>

                                <h1> <?php echo $nom ?> </h1>
                                <h1> <?php echo $mdp ?> </h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <?php
        }

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
                    <label for="validationServer01" class="form-label">Avatar</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="opera.png" name="avatar" required>

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