<?php
session_start();

//require("ConnexionServeur.php");

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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$incrementation = $conn->prepare("UPDATE `evenement` SET `rage` = `rage` + 1 WHERE `id` = $id");
$incrementation->bind_param("i", $id);
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickRage'] = time();
header('Location: Rating.php?id='.$id);
?>
