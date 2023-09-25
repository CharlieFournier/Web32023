<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Options</title>
    <link rel="stylesheet" href="Style.css"> <!-- Assurez-vous que le chemin est correct -->
</head>

<body class="options-page">
    <?php
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
    }
    if ($erreur == false) {
    ?>
        <div class="container-fluid align-items-center text-center">
            <div class="options">
                <a href="PageUser.php"><button type="submit" class="btn-custom">Utilisateur</button></a>
                <a href="PageEvents.php"><button type="submit" class="btn-custom">Événements</button></a>
                <a href="index.php"><button type="submit" class="btn-custom">Accueil</button></a>
            </div>
        </div>
    <?php } ?>
</body>

</html>