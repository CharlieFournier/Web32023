<?php
session_start();

require("ConnexionServeur.php")

$incrementation = $conn->prepare("UPDATE `evenement` SET `neutreEnt` = `neutreEnt` + 1 WHERE `id` = 1");
$incrementation->bind_param("i", $id);
$id = 1;
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickNeutreEnt'] = time();
header('Location: indexEntreprise.php');