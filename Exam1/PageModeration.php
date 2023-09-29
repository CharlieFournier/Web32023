<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Options</title>
    <link rel="stylesheet" href="Style.css"> <!-- Assurez-vous que le chemin est correct -->
</head>

<body>
    <?php

    
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
        <a href="PageUser.php"><button type="submit" class="btn-custom">Utilisateur</button></a>
        <a href="PageEvents.php"><button type="submit" class="btn-custom">Événements</button></a>
        <a href="index.php"><button type="submit" class="btn-custom">Accueil</button></a>

        <div class="container-fluid h-100 p-0">
            <div class="row">
                <div class="col-3">

                </div>

                <div class="col-6">
                    <div class="row p-0">
                                <?php
                                while ($row = $result2->fetch_assoc()) {
                                ?>
                                    <div class="col-4">
                                    <div class="card">
                                        <div>
                                            <h2><?php echo $row["nomEvent"] ?></h2>
                                        </div>
                                    </div>
                                    </div>
                    </div>
                <?php
                                } ?>
                </div>

                <div class="col-3">

                </div>
            </div>
        </div>

    <?php } ?>
</body>

</html>