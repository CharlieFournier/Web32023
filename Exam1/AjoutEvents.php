<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleModification.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php


    /*$servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";


    $conn = new mysqli($servername, $username, $password, $db); */

    require("ConnexionServeur.php");


    $nomEvent = $date = $lieu = $departement = $description = $url = "";


    $nomErreur = "";


    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Si on entre, on est dans l'envoie du formulaire

        if (empty($_POST['nomEvent'])) {
            $nomErreur = "Le nom de l'event est requis";
            $erreur = true;
        } else {
            $nomEvent = test_input($_POST["nomEvent"]);
        }

        if (empty($_POST['date'])) {
            $nomErreur = "La date de l'event est requis";
            $erreur = true;
        } else {
            $date = test_input($_POST["date"]);
        }

        if (empty($_POST['departement'])) {
            $nomErreur = "Le departement de l'event est requis";
            $erreur = true;
        } else {
            $departement = test_input($_POST["departement"]);
        }

        if (empty($_POST['description'])) {
            $nomErreur = "La description de l'event est requis";
            $erreur = true;
        } else {
            $description = test_input($_POST["description"]);
        }

        if (empty($_POST['lieu'])) {
            $nomErreur = "Le lieu de l'event est requis";
            $erreur = true;
        } else {
            $lieu = test_input($_POST["lieu"]);
        }

            $url = test_input($_POST["url"]);


        //---------------------------------------------------------------------------//
        if ($erreur == false) {

            $sql = "INSERT INTO `evenement` SET `nomEvent` = '$nomEvent', `departement` = '$departement', `date` = '$date', `lieu`='$lieu' , `description`='$description',`url`='$url', `positif` = 0, `neutre` = 0, `rage` = 0, `positifEnt` = 0, `neutreEnt` = 0, `rageEnt` = 0";

            if ($conn->query($sql) === TRUE) {
                echo "mise a jour effectuer correctement";
                header('Location: ./PageModeration.php?action=modifier');
            } else {
                echo "erreur dans la mise a jour" . $conn->error;
            }

            if (!$conn) {
                die("Connection failed: " . $mysqli_connect_error());
            }

            //---------------------------------------------------------------------------//

        }
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {

        if ($erreur == true) {
        } ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0">
            <div class="container-fluid navbar p-0">

                <a class="navbar-brand p-0" href="https://www.cegeptr.qc.ca/" target="_blank"><img src="Cegep3rLogo.jpg" id="logoNavBar"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active navText" aria-curent="page" href="PageModeration.php">Page d'accueil</a>
                        <a class="nav-link navText" href="AjoutUser.php"> Ajout Users</a>
                        <a class="nav-link navText" href="AjoutEvents.php"> Ajout Évènements</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="test1 container-fluid text-center h-100 ">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">


                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated row g-2" novalidate>

                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">nomEvent</label>
                            <input type="text" class="form-control is-valid" id="validationServer01" value="" name="nomEvent" required>
                        </div>

                        <div class="col-md-4">

                        </div>

                        <div class="col-md-4">


                            <label for="validationServer01" class="form-label">departement</label>
                            <input type="text" class="form-control is-valid" id="validationServer03" value="" name="departement" required>

                        </div>

                        <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">date</label>
                            <input type="date" class="form-control is-valid" id="validationServer04" value="" name="date" required>
                        </div>

                        <div class="col-md-4"></div>

                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">lieu</label>
                            <input type="text" class="form-control is-valid" id="validationServer05" value="" name="lieu" required>

                        </div>

                        <div class="col-12">
                            <label for="validationServer01" class="form-label">Description</label>
                            <input type="text" class="form-control is-valid" id="validationServer06" value="" name="description" required>

                        </div>
                        <div class="col-12">
                            <label for="validationServer01" class="form-label">Url Image</label>
                            <input type="text" class="form-control is-valid" id="validationServer07" value="" name="url">

                        </div>

                        <hr>

                        <input type="submit">
                    </form>
                </div>
                <div class="col-3"></div>

            </div>
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