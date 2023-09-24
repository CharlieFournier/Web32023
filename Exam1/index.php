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
    $delaiRage = $delaiNeutre = $delaiYes = "";



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
        <a href="Connexion.php" class="btn" role="button" id="lienAjout"><button type="button" id="btnConnexion">Connexion</button></a>

        <a href="Connexion.php" class="btn" role="button" id="lienAjout"><img src=""></a>

        <div class="container-fluid align-items-center text-center">

            <div class="row">

                <div class="col-4">

                    <form action="rage.php" method="post">
                        <button type="submit" name="rage" <?= $delaiRage ?>>
                            <img src="rage3.png">
                        </button>
                    </form>


                </div>

                <div class="col-4">

                    <form action="neutre.php" method="post">
                        <button type="submit" name="neutre" <?= $delaiNeutre ?>>
                            <img src="neutre3.png">
                        </button>
                    </form>
                </div>

                <div class="col-4">

                    <form action="yes.php" method="post">
                        <button type="submit" name="yes" <?= $delaiYes ?>>
                            <img src="yes3.png">
                        </button>
                    </form>
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