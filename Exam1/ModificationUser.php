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
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";

    $conn = new mysqli($servername, $username, $password, $db);

    $user = $email = $password = $ip="";


    $nomErreur = "";


    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Si on entre, on est dans l'envoie du formulaire

        if (empty($_POST['user'])) {
            $userErreur = "Le nom est requis";
            $erreur = true;
        } else {
            $user = test_input($_POST["user"]);
        }
        if (empty($_POST['email'])) {
            $emailErreur = "L'email' est requis";
            $erreur = true;
        } else {
            $email = test_input($_POST["email"]);
        }
        if (empty($_POST['password'])) {
            $passwordErreur = "Le mot de passe est requis";
            $erreur = true;
        } else {
            $password = test_input($_POST["password"]);
        }
        if (empty($_POST['ip'])) {
            $ipErreur = "L'ip est requise";
            $erreur = true;
        } else {
            $ip = test_input($_POST["ip"]);
        }

        


        if ($erreur == false) {

            $sql = "UPDATE `user` SET `user` = '$user', `email` = '$email', `password` = '$password', `ip` = '$ip' WHERE `user`.`id` = $id;";

            if ($conn->query($sql) === TRUE) {
                echo "mise a jour effectuee correctement";
                header('Location: ./PageModeration.php?action=modifier');
            } else {
                echo "erreur dans la mise a jour " . $conn->error;
            }

            if (!$conn) {
                die("Connection failed: " . $mysqli_connect_error());
            }

            //---------------------------------------------------------------------------//

        }
    }
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id='$id'";

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();

        if ($erreur == true) {

            ?>
            <?php } ?>
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
                    </div>
                </div>
            </div>
        </nav>


        <div class="test1 container-fluid align-items-center text-center h-100">
            <div class="row h-100">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="card align-items-center">
                    <div class="card-body">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated row g-2" novalidate>
                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">Nom utilisateur</label>
                            <input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $row["user"] ?>" name="user" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">Email</label>
                            <input type="text" class="form-control is-valid" id="validationServer02" value="<?php echo $row["email"] ?>" name="email" required>
                        </div>

                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">Mot de passe</label>
                            <input type="text" class="form-control is-valid" id="validationServer03" value="<?php echo $row["password"] ?>" name="password" required>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer01" class="form-label">ip</label>
                            <input type="text" class="form-control is-valid" id="validationServer04" value="<?php echo $row["ip"] ?>" name="ip" required>
                        </div>
                        <div class="col-md-4">
                            <input type="submit">
                            <a href="DeleteUser.php?id=<?php echo $row["id"] ?>" style="text-decoration: none;"> <button class="btn-index btn-modif"> Supprimer </button> </a>

                        </div>
                        <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

                    </form>
                </div>
            </div>
        </div>
        <?php }
    

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