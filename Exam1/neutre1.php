<?php
session_start();

//require("ConnexionServeur.php")

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

$incrementation = $conn->prepare("UPDATE `evenement` SET `neutreEnt` = `neutreEnt` + 1 WHERE `id` = $id");
$incrementation->bind_param("i", $id);
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickNeutreEnt'] = time();
header('Location: indexEntreprise.php');