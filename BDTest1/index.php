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
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "chiens";
    // create connection
    $conn = new mysqli($servername, $username, $password, $db);
    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // ça fait rien ça fait juste creer une string avec une requete
    $sql = "SELECT * FROM chiens";

    $result = $conn->query($sql);

    if($result->num_rows > 0 ) {
        while($row = $result->fetch_assoc()) {
              echo "id: " . $row["id"] . " - race: " . $row["race"] . "<br>";
        }
    }else {
        echo "0 results";
    }
    $conn->close();
    ?>

Nom : <input type="text" name="nom" maxlength="15"><br>


                Mdp : <input type="password" name="mdp" maxlength="15"><br>


</body>

</html>