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

    $id = $nomEvent = $date = $heure = $lieu = $nom = $nom = "";


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
    if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {


        $id = $_GET['id'];

        $sql = "SELECT * FROM 2venement WHERE id='$id'";

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();

        if ($erreur == true) { ?>
            <div class="text-center"> <?php echo "Erreur ou 1ere fois"; ?> </div>
        <?php } ?>
        <div class="container">



            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated row g-2" novalidate>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">nomEvent</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $row["nomEvent"] ?>" name="nomEvent" required>
                </div>

                <div class="col-md-4"> </div>

                <div class="col-md-4">


                    <label for="validationServer01" class="form-label">departement</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $row["departement"] ?>" name="departement" required>

                </div>

                <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">date</label>
                    <input type="password" class="form-control is-valid" id="validationServer01" value="<?php echo $row["date"] ?>" name="date" required>
                </div>

                <div class="col-md-4">
                <label for="validationServer01" class="form-label">heure</label>
                <input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $row["heure"] ?>" name="heure" readonly="readonly" required>
                </div>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">lieu</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $row["lieu"] ?>" name="lieu" required>

                </div>

                <hr>

                <input type="submit">
            </form>
        </div>

    <?php
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>


</body>

</html>