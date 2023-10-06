<?php 
 $servername = "cours.cegep3r.info";
 $username = "2052524";
 $password = "2052524";
 $db = "a2023_420326_gr01_2052524-charlie-fournier";
 $conn = new mysqli($servername, $username, $password, $db);
 
 $sql = "SELECT * FROM evenement";
 $sql2 = "SELECT * FROM user";

$result = $conn->query($sql);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>