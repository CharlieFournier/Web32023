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
    //require("ConnexionServeur.php");
    $nom = $image = "";


    $nomErreur = "";
    $delaiRage = $delaiNeutre = $delaiYes = "";

    $id = -1;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Si on entre, on est dans l'envoie du formulaire

        if (empty($_POST['nom'])) {
            $nomErreur = "Le nom est requis";
            $erreur = true;
        } else {
            $nom = test_input($_POST["nom"]);
        }
        $image = test_input($_POST["image"]);
        $disabledRage = "";

        if (isset($_SESSION['ClickRage']) && (time() - $_SESSION['ClickRage'] < 2)) {
            $delaiRage = "disabled";
        }

        if (isset($_SESSION['ClickNeutre']) && (time() - $_SESSION['ClickNeutre'] < 2)) {
            $delaiNeutre = "disabled";
        }

        if (isset($_SESSION['ClickYes']) && (time() - $_SESSION['ClickYes'] < 2)) {
            $delaiYes = "disabled";
        }


        // Inserer dans la base de données
        //SI erreurs, on réaffiche le formulaire
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
    ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0">
            <div class="container-fluid navbar p-0">

                <a class="navbar-brand p-0" href="https://www.cegeptr.qc.ca/" target="_blank"><img src="Cegep3rLogo.jpg" id="logoNavBar"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a href="index.php" class="btn" role="button" id="lienAjout"><button type="button" id="btnConnexion">Connexion</button></a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid align-items-center text-center h-100">

            <div class="row h-100 align-items-center">

                <div class="col-4">

                    <a href="rage1.php?id=<?php echo $id ?>" id="rageEnt"><img src="rage.png"></a>



                </div>

                <div class="col-4">

                    <a href="neutre1.php?id=<?php echo $id ?>" id="neutreEnt"><img src="neutre.png"></a>

                </div>

                <div class="col-4">

                    <a href="yes2.php?id=<?php echo $id ?>" id="yesEnt"><img src="yes.png"></a>

                </div>

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