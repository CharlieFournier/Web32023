<?php
session_start();
?>
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
    $user = $email = $password = $ip = "";

    //On crée les variables d'erreurs vides
    $nomErreur = "";

    $erreur = false;

    $id = -1;

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";
    $conn = new mysqli($servername, $username, $password, $db);

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "POST";


        if ($erreur == false) {

            $sql = "UPDATE `evenement` SET `positif` = `positif` + 1 WHERE `id` = $id";

            if ($conn->query($sql) === TRUE) {

                echo "mise a jour effectuer correctement";
                header('Location: indexEntreprise.php');
            } else {
                echo "erreur dans la mise a jour" . $conn->error;
            }

            if (!$conn) {
                die("Connection failed: " . $mysqli_connect_error());
            }

            echo "test";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {

        if ($erreur == true) { ?>


            <h1>test</h1>

        <?php } ?>

        <h1><?php echo $id ?></h1>
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