<?php
session_start();

require("ConnexionServeur.php")

$incrementation = $conn->prepare("UPDATE `evenement` SET `rageEnt` = `rageEnt` + 1 WHERE `id` = 1");
$incrementation->bind_param("i", $id);
$id = 1;
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickRageEnt'] = time();
header('Location: indexEntreprise.php');
