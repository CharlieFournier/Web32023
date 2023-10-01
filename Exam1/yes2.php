<?php
session_start();

//require("ConnexionServeur.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

$incrementation = $conn->prepare("UPDATE `evenement` SET `yesEnt` = `yesEnt` + 1 WHERE `id` = 1");
$incrementation->bind_param("i", $id);
$id = 1;
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickYes'] = time();
header('Location: indexEntreprise.php');
