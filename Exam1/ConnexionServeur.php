<?php 
 $servername = "cours.cegep3r.info";
 $username = "root";
 $password = "root";
 $db = "meow";
 $conn = new mysqli($servername, $username, $password, $db);
 $sql = "SELECT * FROM evenement";
$result = $conn->query($sql);

?>