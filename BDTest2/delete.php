<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "meow";
    // create connection
    $conn = new mysqli($servername, $username, $password, $db);

    if ($erreur == false) {

        $sql ="DELETE FROM `meow` WHERE id='$id'";

        if($conn->query($sql) === TRUE) {
            echo "mise a jour effectuer correctement";
            header('Location: http://localhost/Web32023/BDTest2/index.php');
        } else {
            echo "erreur dans la mise a jour". $conn->error;
        }

    if (!$conn) {
    die("Connection failed: " . $mysqli_connect_error());
}
    }




if ($_SERVER["REQUEST_METHOD"] != "POST" || $erreur == true) {

    if ($erreur == true) { ?>
        <div class="text-center"> <?php echo "Erreur ou 1ere fois"; ?> </div>
    <?php } ?>

    <div class="container">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="was-validated row g-2" novalidate>

                <div class="col-md-4">
                    <label for="validationServer01" class="form-label">ID a delete</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" value="" name="id" required>
                </div>

                <span style="color:red" ;><?php echo $nomErreur; ?></span><br>

            <input type="submit">
        </form>
    </div>
    <?php
    }
?>

</body>
</html>