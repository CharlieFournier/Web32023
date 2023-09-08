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

    //La variable qui permet de savoir s'il y a au moins une erreur dans le formulaire
    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "POST";
        //Si on entre, on est dans l'envoie du formulaire

        if (empty($_POST['user'])) {
            $nomErreur = "Le user est requis";
            $erreur = true;
        } else {
            $user = test_input($_POST["user"]);
        }
        if (empty($_POST['email'])) {
            $nomErreur = "L'email est requis";
            $erreur = true;
        } else {
            $email = test_input($_POST["email"]);
        }


        if (empty($_POST['password'])) {
            $nomErreur = "Le password est requis";
            $erreur = true;
        } else {
            $password = test_input($_POST["password"]);
        }



        if ($erreur == false) {

            $sql = "INSERT INTO `users` SET `user` = '$user', `email` = '$email', `password` = '$password', `ip`='inconnu' , `machine`='inconnu'";

            if ($conn->query($sql) === TRUE) {

                echo "mise a jour effectuer correctement";
                header('Location: http://localhost/Web32023/BDTest3/index.php?action=ajouter');
            } else {
                echo "erreur dans la mise a jour" . $conn->error;
            }

            if (!$conn) {
                die("Connection failed: " . $mysqli_connect_error());
            }
        }
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {

        if ($erreur == true) { ?>
            <div class="text-center"> <?php echo "Erreur ou 1ere fois"; ?> </div>
        <?php } ?>
        <div class="container">


            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated row g-2" novalidate>

                <div class="col-md-4">


                    <label for="validationServer01" class="form-label">User</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="Kaffee" name="user" required>

                </div>

                <div class="col-md-4"> </div>

                <div class="col-md-4">


                    <label for="validationServer01" class="form-label">Password</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="cafe" name="password" required>

                </div>

                <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

                <div class="col-12">
                    <label for="validationServer01" class="form-label">Email</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="" name="email" required>

                </div>

                <hr>

                <input type="submit">
            </form>
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