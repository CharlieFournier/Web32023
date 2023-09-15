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

    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        if($action == "ajouter") {
            ?>
            <div class="alert alert-primary" role="alert">
            ajout fait correctement
            </div>
            <?php
            }

            else if($action == "modifier") {
                ?>
                <div class="alert alert-primary" role="alert">
                modification fait correctement
                </div>
                <?php
                }

            else if($action == "delete") {
                ?>
                <div class="alert alert-primary" role="alert">
                suppression fait correctement
                </div>
                <?php
                }
    }




    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";

    $conn = new mysqli($servername, $username, $password, $db);


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
                    <th></th>
                    <th></th>                    
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
                        <td><a class="btn btn-info" role="button" href="ModifierUser.php?id=<?php echo $row["id"] ?>"> Modifier </td>
                        <td><a class="btn btn-info" role="button" href="DeleteUser.php?id=<?php echo $row["id"] ?>"> Delete </td>
                        
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

<a href="ajouter.php" class="btn btn-info" role="button">Ajouter</a>

</body>

</html>