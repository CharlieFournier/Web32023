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
$clique = $_GET['clique'];
// La page se recharge, si elle a été envoyée avec l'option clique "ok"
if($clique == ok)
{
        // On récupère le nombre de cliques dans la bdd ( peut etre pas necessaire si deja fait )
        $retour_nb_cliques = (... SELECT COUNT...) $nb_cliques;
        // On incrémente la variable qu'on réinsère dans la bdd
        $nb_cliques++;
        mysql_query(UPDATE.......)
}

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