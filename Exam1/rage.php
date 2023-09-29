<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$db = "meow";
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$incrementation = $conn->prepare("UPDATE `evenement` SET `rage` = `rage` + 1 WHERE `id` = 1");
$incrementation->bind_param("i", $id);
$id = 1;
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickRage'] = time();
header('Location: index.php');
