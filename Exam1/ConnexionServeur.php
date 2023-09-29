<?php 
 $servername = "cours.cegep3r.info";
 $username = "root";
 $password = "root";
 $db = "meow";
 $conn = new mysqli($servername, $username, $password, $db);
 $sql = "SELECT * FROM evenement";
$result = $conn->query($sql);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>