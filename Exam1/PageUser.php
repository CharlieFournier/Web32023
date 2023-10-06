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

        if (empty($_POST['nom'])) {
            $nomErreur = "Le nom est requis";
            $erreur = true;
        } else {
            $nom = test_input($_POST["nom"]);
        }
        $image = test_input($_POST["image"]);


        // Inserer dans la base de données
        //SI erreurs, on réaffiche le formulaire
    }

    /*$servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";

    $conn = new mysqli($servername, $username, $password, $db);*/

    require("ConnexionServeur.php");


    $sql = "SELECT * FROM user";

    $result = $conn->query($sql);

    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {


    ?>

        <div class="container-fluid h-100" id="test">
            <div class="row h-100">

            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0">
                    <div class="container-fluid navbar p-0">

                        <a class="navbar-brand p-0" href="https://www.cegeptr.qc.ca/" target="_blank"><img src="Cegep3rLogo.jpg" id="logoNavBar"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active navText" aria-curent="page" href="PageModeration.php">Page d'accueil</a>
                                <a class="nav-link navText" href="PageUser.php">Users</a>
                                <a class="nav-link navText" href="PageEvents.php">Évènements</a>
                                <a class="nav-link navText" href="index.php">Page Vote</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="p-0 test1">
                    <table class="table table-dark">
                        <thead>

                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Mdp</th>
                                <th scope="col">Email</th>
                                <th scope="col">IP</th>
                                <th></th>
                                <!--<th></th>          -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $row["user"] ?></td>
                                    <td><?php echo $row["password"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["ip"] ?></td>
                                    <td><a class="btn btn-info" role="button" href="modifier.php?id=<?php echo $row["id"] ?>">Modifier </td>

                                </tr>

                </div>

        <?php
                            }
                        }


                        function test_input($data)
                        {
                            $data = trim($data);
                            $data = addslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

        ?>
            </div>
        </div>
</body>

</html>

<!--<td><a class="btn btn-info" role="button" href="modifier.php?id=< echo $row["id"] ?>"> Modifier </td>
                        <td><a class="btn btn-info" role="button" href="delete.php?id=< echo $row["id"] ?>"> Delete </td> -->