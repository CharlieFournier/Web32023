<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Accueil Modérateur</title>
    <link rel="stylesheet" href="Style.css"> <!-- Assurez-vous que le chemin est correct -->
</head>

<body>
    <?php

    $jour = 0;

    $erreur = false;

    $servername2 = "localhost";
    $username2 = "root";
    $password2 = "root";
    $db2 = "meow";

    $conn2 = new mysqli($servername2, $username2, $password2, $db2);

    $sql2 = "SELECT * FROM evenement";

    $result2 = $conn2->query($sql2);


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $password = sha1($password, false);

        $servername = "localhost";
        $username = "root";
        $passworddb = "root";
        $db = "meow";

        $conn = new mysqli($servername, $username, $passworddb, $db);

        if (!$conn && !$conn2) {
            die("Connection failed: " . $mysqli_connect_error());
        }

        $sql = "SELECT * FROM user where user='$user' and password='$password'";

        $result = $conn->query($sql);
    }
    if ($erreur == false) {
    ?>

        <div class="container-fluid h-100 p-0 text-center">
            <div class="row">

            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0">
                    <div class="container-fluid navbar p-0">

                        <a class="navbar-brand p-0" href="https://www.cegeptr.qc.ca/" target="_blank"><img src="Cegep3rLogo.jpg" id="logoNavBar"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active navText" aria-curent="page" href="PageModeration.php" >Page d'accueil</a>
                                <a class="nav-link navText" href="PageUser.php">Users</a>
                                <a class="nav-link navText" href="PageEvents.php">Évènements</a>
                            </div>
                        </div>
                    </div>
                </nav>





                <div class="col-3">

                </div>

                <div class="col-6 test1">
                <a href="AjoutEvents.php"><button class="btn-index">
                            Ajout Events
                        </button></a>
                    <div class="row p-0 align-items-center">
                        <?php
                        while ($row = $result2->fetch_assoc()) {
                        ?>
                            <div class="col-4">
                                <a href="modificationEvents.php?id=<?php echo $row["id"] ?>" id="Link">
                                    <div class="card">
                                        <div>
                                            <h2><?php echo $row["nomEvent"] ?></h2>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php    } ?>
                    </div>


                </div>

                <div class="col-3">

                </div>
            </div>
        </div>

    <?php } ?>
</body>

</html>