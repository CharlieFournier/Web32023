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
    <?php

    $nom = $image = "";


    $nomErreur = "";


    $erreur = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Si on entre, on est dans l'envoie du formulaire
        
        if(empty($_POST['nom'])){
            $nomErreur = "Le nom est requis";
            $erreur = true;
        }
        else{
            $nom = test_input($_POST["nom"]); 
        }
        $image = test_input($_POST["image"]);


        // Inserer dans la base de données
        //SI erreurs, on réaffiche le formulaire 
    }
    if($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {


        ?>
        <table class="table table-dark">
            <thead>

                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User</th>
                    <th scope="col">Mdp</th>
                    <th scope="col">Email</th>
                    <th scope="col">IP</th>                 
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>

                    <tr>
                        <th scope="row"><?php echo $row["id"] ?></th>
                        <td><?php echo $row["User"] ?></td>
                        <td><?php echo $row["password"] ?></td>
                        <td><?php echo $row["mdp"] ?></td>
                        <td><img src="<?php echo $row["urlImage"] ?>"></td>
                        <td><a class="btn btn-info" role="button" href="modifier.php?id=<?php echo $row["id"] ?>"> Modifier </td>
                        <td><a class="btn btn-info" role="button" href="delete.php?id=<?php echo $row["id"] ?>"> Delete </td>
                        
                    </tr>
                    <?PHP
        }
    }
?>
    function test_input($data){
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>

    
</body>
</html>