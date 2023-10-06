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
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";

    $conn = new mysqli($servername, $username, $password, $db);

    $nom = $email = $pswd = $machine = "";


    $nomErreur = "";


    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Si on entre, on est dans l'envoie du formulaire

        if (empty($_POST['nom'])) {
            $nomErreur = "Le nom est requis";
            $erreur = true;
        } else {
            $user = test_input($_POST["nom"]);
        }
        if (empty($_POST['email'])) {
            $emailErreur = "L'email' est requis";
            $erreur = true;
        } else {
            $email = test_input($_POST["email"]);
        }
        if (empty($_POST['pswd'])) {
            $passwordErreur = "Le mot de passe est requis";
            $erreur = true;
        } else {
            $pswd = test_input($_POST["pswd"]);
        }
        if (empty($_POST['machine'])) {
            $machineErreur = "La machine est requise";
            $erreur = true;
        } else {
            $machine = test_input($_POST["machine"]);
        }



        if ($erreur == false) {

            $sql = "INSERT INTO `user` SET `nom` = '$user', `email` = '$email', `password` = '$pswd' , `machine`='$machine'";

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
        }

    ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0">
            <div class="container-fluid navbar p-0">

                <a class="navbar-brand p-0" href="https://www.cegeptr.qc.ca/" target="_blank"><img src="Cegep3rLogo.jpg" id="logoNavBar"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link navText" aria-curent="page" href="PageModeration.php">Page d'accueil</a>
                        <a class="nav-link navText" href="PageUser.php">Users</a>
                        <a class="nav-link navText" href="PageEvents.php">Évènements</a>
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
                            <label for="validationServer01" class="form-label">Nom utilisateur</label>
                            <input type="text" class="form-control is-valid" id="validationServer01" value="" name="nom" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">Email</label>
                            <input type="text" class="form-control is-valid" id="validationServer02" value="" name="email" required>
                        </div>
                        <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">Mot de passe</label>
                            <input type="text" class="form-control is-valid" id="validationServer03" value="" name="pswd" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">Machine</label>
                            <input type="text" class="form-control is-valid" id="validationServer04" value="" name="machine" required>
                        </div>
                        <div class="col-md-4">
                            <input type="submit">
                        </div>

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