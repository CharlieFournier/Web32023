<?php

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$servername = "localhost";
$username = "root";
$password = "root";
$db = "meow";
// create connection
$conn = new mysqli($servername, $username, $password, $db);

if ($erreur == false) {

    $sql = "DELETE FROM `evenement` WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "mise a jour effectuer correctement";
        header('Location: PageModeration.php?action=delete');
    } else {
        echo "erreur dans la mise a jour" . $conn->error;
    }

    if (!$conn) {
        die("Connection failed: " . $mysqli_connect_error());
    }
}
?>
