<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="meow.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <?php

    $user = $email = $password = "";

    $nomErreur = "";

    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $password = sha1($password, false);

        $servername = "localhost";
        $username = "root";
        $passworddb = "root";
        $db = "meow";

        $conn = new mysqli($servername, $username, $passworddb, $db);

        if (!$conn) {
            die("Connection failed: " . $mysqli_connect_error());
        }

        $sql = "SELECT * FROM user where user='$user' and password='$password'";

        $result = $conn->query($sql);

        if (isset($result)) {

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["connexion"]  = true;
            } else {
                echo "<h2 style='color:red';>Nom d'usager ou mot de passe incorrect</h2>";                                  #  IMPORTANT
                $erreur = true;
            }
        } else {
            echo "<h2 style='color:red';>Nom d'usager ou mot de passe incorrect</h2>";                                      #  IMPORTANT
            $erreur = true;
        }
        $conn->close();
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //------------------------------------------------
        if (empty($_POST['user'])) {
            $nomErreur = "User ou mot de passe incorrect";
            $erreur = true;
        } else {
            $user = test_input($_POST["user"]);
        }
        //------------------------------------------------
        if (empty($_POST['password'])) {
            $nomErreur = "User ou mot de passe incorrect";
            $erreur = true;
        } else {
            $password = test_input($_POST["password"]);
        }
        //------------------------------------------------
        if ($erreur == false) {
            header('Location: Option.php'); // Rediriger vers option.php
            exit();
        }
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {

    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            User : <input type="text" name="user" size="25" maxlength="30">

            <br>
            <span style="color:red" ;><?php echo $nomErreur; ?></span>
            <br>

            Password : <input type="password" name="password" size="25" maxlength="15"><br>

            <input type="submit" value="Connexion">
        </form>

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