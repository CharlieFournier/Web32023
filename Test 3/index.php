<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <?php
    //On crée les variables du formulaire vide
    $nom = $mdp = $cmdp = $email = $avatar = $date = $transport = $genre = "";

    //On crée les variables d'erreurs vides
    $nomErreur = "";

    //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //echo "POST";
        //Si on entre, on est dans l'envoie du formulaire

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
            if ($_POST['mdp'] == $_POST['cmdp'])
                $mdp = test_input($_POST["mdp"]);
            else {
                $nomErreur = "la confirmation de mdp n'est pas bonne";
                $erreur = true;
            }
        }


        if (empty($_POST['date'])) {
            $nomErreur = "La date est requise";
            $erreur = true;
        } else {
            $date = test_input($_POST["date"]);
        }


        if (empty($_POST['email'])) {
            $nomErreur = "L'email est requis";
            $erreur = true;
        } else {
            $email = test_input($_POST["email"]);
        }


        if (empty($_POST['avatar'])) {
            $nomErreur = "L'avatar est requis";
            $erreur = true;
        } else {
            $avatar = test_input($_POST["avatar"]);
        }

        if (empty($_POST['genre'])) {
            $nomErreur = "Le genre est requis";
            $erreur = true;
        } else {
            $genre = test_input($_POST["genre"]);
        }

        if (empty($_POST['transport'])) {
            $nomErreur = "Le moyen de transport est requis";
            $erreur = true;
        } else {
            $transport = test_input($_POST["transport"]);
        }

        if ($erreur == false) {
    ?>
            <div class="container align-items-center">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-center ">
                                <h1> <?php echo $nom ?> </h1>
                            </div>

                            <div class="card-body">
                                <div class="align-items-center text-center">
                                    <img src="<?php echo $avatar ?>">
                                </div>
                                <hr>

                                <h2>Courriel: <?php echo $email ?> </h2>
                                <hr>

                                <h2>Date de naissance: <?php echo $date ?> </h2>
                                <hr>

                                <h2>Genre: <?php echo $genre ?> </h2>
                                <hr>

                                <h2>Moyen de transport: <?php echo $transport ?> </h2>
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
        ?>
        if ($erreur == true){
        <div class="text-center"> <?php echo "Erreur ou 1ere fois"; ?> </div>
    }
        <div class="container">


            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated row g-2" novalidate>

                <div class="col-md-4">


                    <label for="validationServer01" class="form-label">Nom</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="Kaffee" name="nom" required>
                    
                </div>

                <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">Mdp</label>
                    <input type="password" class="form-control is-valid" id="validationServer01" value="" name="mdp" required>

                </div>

                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">cMdp</label>
                    <input type="password" class="form-control is-valid" id="validationServer01" value="" name="cmdp" required>

                </div>

                <div class="col-12">
                    <label for="validationServer01" class="form-label">Courriel</label>
                    <input type="email" class="form-control is-valid" id="validationServer01" value="" name="email" required>

                </div>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">Avatar</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="opera.png" name="avatar" required>

                </div>

                <div class="col-md-4"> </div>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">Date de Naissance</label>
                    <input type="date" class="form-control is-valid" id="validationServer01" value="" name="date" required>

                </div>

                <hr>
                Genre: <div></div>

                Masculin
                <input class="form-check-input" type="radio" name="genre" id="radio1" value="masculin" checked>
                <label class="form-check-label" for="radio1">

                </label>
                Féminin
                <input class="form-check-input" type="radio" name="genre" id="radio2" value="feminin">
                <label class="form-check-label" for="radio2">

                </label>
                Non genré
                <input class="form-check-input" type="radio" name="genre" id="radio3" value="non-genre">
                <label class="form-check-label" for="radio2">
                </label>
                <hr>

                Transport: <div></div>
                Auto
                <input class="form-check-input" type="checkbox" value="Auto" id="Auto" name="transport">
                <label class="form-check-label" for="flexCheckDefault">
                </label>

                Autobus
                <input class="form-check-input" type="checkbox" value="Bus" id="Bus" name="transport">
                <label class="form-check-label" for="flexCheckDefault">
                </label>

                Marche
                <input class="form-check-input" type="checkbox" value="Marche" id="Marche" name="transport" checked>
                <label class="form-check-label" for="flexCheckDefault">
                </label>

                Vélo
                <input class="form-check-input" type="checkbox" value="Velo" id="Velo" name="transport">
                <label class="form-check-label" for="flexCheckDefault">
                </label>
                <hr><br>


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