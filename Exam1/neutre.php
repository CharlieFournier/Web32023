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

$stmt = $conn->prepare("UPDATE `evenement` SET `neutre` = `neutre` + 1 WHERE `id` = 1");
$stmt->bind_param("i", $id);
$id = 1;
$stmt->execute();
$stmt->close();
$_SESSION['ClickNeutre'] = time();
header('Location: index.php');
?>
