<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$db = "meow";
$conn = new mysqli($servername, $username, $password, $db);
// On récupère la donnée envoyée
$compteur_rage= "UPDATE `evenement` SET `rage` = (`rage`+1) WHERE `evenement`.`id` = 1";
$redirect_page = 'index.php';
header('Location:'  .$redirect_page);
die();
?>
 <?php
    function test_input($data){
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$incrementation = $conn->prepare("UPDATE `evenement` SET `rage` = `rage` + 1 WHERE `id` = 1");
$incrementation->bind_param("i", $id);
$id = 1;
$incrementation->execute();
$incrementation->close();
$_SESSION['ClickRage'] = time();
header('Location: index.php');
