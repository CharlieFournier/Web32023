<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$compteur=0;

$nomErreur = "";


$erreur = false;
$servername = "localhost";
$username = "root";
$password = "root";
$db = "meow";
$sql = "SELECT * FROM evenement";
$result = $conn->query($sql);
$conn = new mysqli($servername, $username, $password, $db);
// On récupère la donnée envoyée
$compteur_yes=UPDATE `evenement` SET `yes` = (`yes`+1) WHERE `evenement`.`id` = 1
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

    ?>
</body>
</html>