<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Accueil Modérateur</title>
    <link rel="stylesheet" href="Moderation.css">
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

    $sql = "SELECT * FROM user";

    $result = $conn2->query($sql);


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
    }
    if ($erreur == false) {
    ?>

        <div class="container-fluid h-100 p-0 text-center">
        <div class="col-12 h-1 background-details navbarHeader"></div>
            <div class="row h-100">

                <div class="col-12" style="padding-left: 40px;">
                    <div class="container-fluid p-0 h-100">
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
                                            <a class="nav-link navText" href="AjoutUser.php"> Ajout Users</a>
                                            <a class="nav-link navText" href="AjoutEvents.php"> Ajout Évènements</a>
                                        </div>
                                    </div>
                                </div>
                            </nav>

                            

                            <div class="col-9 h-100 text-start card card-conteneur p-0 navbarHeader2" id="cardEvent1">

                                <div class="col-12 card card-event-design">
                                    <h1 id="text-event"> ÉVÈNEMENTS </h1>
                                </div>

                                <?php while ($row = $result2->fetch_assoc()) { ?>
                                    <div class="col-12 align-items-center" style="padding: 40px;">

                                        <a href="modificationEvents.php?id=<?php echo $row["id"] ?>" id="Link">

                                            <div class="card taille-card">
                                                <div class="container-fluid h-100 p-0 text-center align-items-center">
                                                    <div class="row h-100 align-items-center">
                                                        <div class="col-3">
                                                            <div class="col-1"></div>
                                                            <div class="col-11 h-100">
                                                                <img src="<?php echo $row["url"] ? $row["url"] : "https://upload.wikimedia.org/wikipedia/fr/d/dd/C%C3%A9gep_Trois-Rivi%C3%A8res_Logo.jpg"; ?>" class="card-img-top" alt="Event Image" style="padding-left:30px">
                                                            </div>
                                                        </div>

                                                        <div class="col-9">
                                                            <h2><?php echo $row["nomEvent"] ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </a>
                                    </div>
                                <?php    } ?>


                            </div>



                            <div class="col-3 p-0 navbarHeader2">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                        <div class="col-1 h-100"></div>
                                        <div class="col-10 h-100 card card-conteneur p-0" id="cardEvent2">

                                            <div class="col-12 card card-event-design text-start ">
                                                <h1 id="text-event"> USERS </h1>
                                            </div>

                                            <?php while ($row = $result->fetch_assoc()) { ?>
                                                <div class="col-1"></div>
                                                <div class="col-11 align-items-center" style="padding: 40px;">

                                                    <a href="modificationUser.php?id=<?php echo $row["id"] ?>" id="Link">

                                                        <div class="card taille-card">
                                                            <div class="container-fluid h-100 p-0 align-items-center">
                                                                <div class="row h-100 align-items-center">
                                                                    <div class="col-3">
                                                                        <div class="col-1"></div>
                                                                        <div class="col-11 h-100">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <h2><?php echo $row["user"] ?></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </a>
                                                </div>
                                            <?php    } ?>

                                            <div class="col-1 h-100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 h-3 background-details2 navbarHeader"></div>
        </div>

    <?php } ?>
</body>

</html>