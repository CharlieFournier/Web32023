<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                header('Location: PageModeration.php'); // Rediriger vers Option.php
                exit();
            } else {
                echo "<h3 style='color:red';>Nom d'usager ou mot de passe incorrect</h3>";                                  #  IMPORTANT
                $erreur = true;
            }
        } else {
            echo "<h3 style='color:red';>Nom d'usager ou mot de passe incorrect</h3>";                                      #  IMPORTANT
            $erreur = true;
        }
        $conn->close();
    }
    ?>

    <div class="container-fluid align-items-center text-center h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card" style="margin-top: 0px;">
                    <div>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <img src="pp.png" width="100" height="100">

                            </div>
                            <div class="form-group">
                                <label for="user">User :</label>
                                <input type="text" name="user" id="user" class="form-control" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" class="form-control" maxlength="15">
                            </div>
                            <span style="color:red;"><?php echo $nomErreur; ?></span>
                            <br>
                            <input type="submit" value="Connexion" class="btn btn-custom">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>