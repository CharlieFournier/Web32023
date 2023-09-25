<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="container-fluid h-100" id="test">
        <div class="row h-100">
            <?php

            $nom = $image = "";


            $nomErreur = "";


            $erreur = false;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //Si on entre, on est dans l'envoie du formulaire

                if (empty($_POST['nom'])) {
                    $nomErreur = "Le nom est requis";
                    $erreur = true;
                } else {
                    $nom = test_input($_POST["nom"]);
                }
                $image = test_input($_POST["image"]);


                // Inserer dans la base de données
                //SI erreurs, on réaffiche le formulaire
            }

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $db = "meow";

            $conn = new mysqli($servername, $username, $password, $db);


            $sql = "SELECT * FROM evenement";

            $result = $conn->query($sql);

            if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {


            ?>
                <div class="p-0">
                    <table class="table table-dark">
                        <thead>

                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">NomEvent</th>
                                <th scope="col">Date</th>
                                <th scope="col">Lieu</th>
                                <th scope="col">Département</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["nomEvent"] ?></td>
                                    <td><?php echo $row["date"] ?></td>
                                    <td><?php echo $row["lieu"] ?></td>
                                    <td><?php echo $row["departement"] ?></td>
                                    <td><a class="btn btn-info" role="button" href="modificationEvents.php?id=<?php echo $row["id"] ?>">Modifier </td>

                                </tr>

                </div>
        <?php
                            }
                        }


                        function test_input($data)
                        {
                            $data = trim($data);
                            $data = addslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

        ?>
        </div>
    </div>
</body>

</html>