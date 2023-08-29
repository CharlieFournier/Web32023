<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="meow.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test BD P1</title>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";
    // create connection
    $conn = new mysqli($servername, $username, $password, $db);
    //check connection

    /*
    if (!$conn) {
        die("Connection failed: " . $mysqli_connect_error());
    }

    $sql = "INSERT INTO meow (prenom, nom, mdp, urlImage)
    VALUES ('test1','bleuet','01')";            */

    $sql = "SELECT * FROM meow";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

    ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">prenom</th>
                    <th scope="col">nom</th>
                    <th scope="col">mdp</th>
                    <th scope="col">urlImage</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>

                    <tr>
                        <th scope="row"><?php echo $row["id"] ?></th>
                        <td><?php echo $row["prenom"] ?></td>
                        <td><?php echo $row["nom"] ?></td>
                        <td><?php echo $row["mdp"] ?></td>
                        <td><img src="<?php echo $row["urlImage"] ?>"></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table><?php
            } else {
                echo "0 results";
            }

            $conn->close();
                ?>

<a href="ajouter.php" class="btn btn-info" role="button">Link Button</a>

</body>

</html>