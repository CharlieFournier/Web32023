<?php
session_start();

//require("ConnexionServeur.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

/*$servername = "localhost";
$username = "root";
$password = "root";
$db = "meow";
$conn = new mysqli($servername, $username, $password, $db); */

require("ConnexionServeur.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$incrementation = $conn->prepare("UPDATE `evenement` SET `neutre` = `neutre` + 1 WHERE `id` = $id");
$incrementation->bind_param("i", $id);
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickNeutre'] = time();
header('Location: Rating.php?id='.$id);
?>
