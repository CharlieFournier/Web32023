<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleModification.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <style>
        .pie-chart {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            margin: 20px;
            display: inline-block;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-0">
            <div class="container-fluid navbar p-0">

                <a class="navbar-brand p-0" href="https://www.cegeptr.qc.ca/" target="_blank"><img src="Cegep3rLogo.jpg" id="logoNavBar"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active navText" aria-curent="page" href="PageModeration.php">Page d'accueil</a>
                        <a class="nav-link navText" href="PageUser.php">Users</a>
                        <a class="nav-link navText" href="PageEvents.php">Évènements</a>
                        <a class="nav-link navText" href="index.php">Page Vote</a>
                    </div>
                </div>
            </div>
        </nav>
    <div class="container text-center">
        <?php
        $id = $_GET['id'] ?? $_POST['id'] ?? null;
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $db = "meow";

        $conn = new mysqli($servername, $username, $password, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT
    SUM(positif) as totalPositif,
    SUM(neutre) as totalNeutre,
    SUM(rage) as totalRage,
    SUM(positifEnt) as totalPositifEnt,
    SUM(neutreEnt) as totalNeutreEnt,
    SUM(rageEnt) as totalRageEnt
    FROM evenement
    WHERE id = $id";
        if (is_null($id) || !is_numeric($id)) {
            die("Invalid event ID");
        }

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $totalGeneral = $row['totalPositif'] + $row['totalNeutre'] + $row['totalRage'];
        $totalEntreprise = $row['totalPositifEnt'] + $row['totalNeutreEnt'] + $row['totalRageEnt'];

        $percentagePositif = ($totalGeneral > 0) ? ($row['totalPositif'] / $totalGeneral) * 100 : 0;
        $percentageNeutre = ($totalGeneral > 0) ? ($row['totalNeutre'] / $totalGeneral) * 100 : 0;
        $percentageRage = ($totalGeneral > 0) ? ($row['totalRage'] / $totalGeneral) * 100 : 0;

        $percentagePositifEnt = ($totalEntreprise > 0) ? ($row['totalPositifEnt'] / $totalEntreprise) * 100 : 0;
        $percentageNeutreEnt = ($totalEntreprise > 0) ? ($row['totalNeutreEnt'] / $totalEntreprise) * 100 : 0;
        $percentageRageEnt = ($totalEntreprise > 0) ? ($row['totalRageEnt'] / $totalEntreprise) * 100 : 0;


echo '<div class="pie-chart" style="background: conic-gradient(#8bc34a 0% ' . $percentagePositif . '%, #9e9e9e ' . $percentagePositif . '% ' . ($percentagePositif + $percentageNeutre) . '%, #d32f2f ' . ($percentagePositif + $percentageNeutre) . '% 100%);"></div>';

echo '<div class="pie-chart" style="background: conic-gradient(#001F3F 0% ' . $percentagePositifEnt . '%, #FFFFFF ' . $percentagePositifEnt . '% ' . ($percentagePositifEnt + $percentageNeutreEnt) . '%, #000000 ' . ($percentagePositifEnt + $percentageNeutreEnt) . '% 100%);"></div>';


        
        ?>

<div class="bar" data-value="<?php echo $row['totalPositif']; ?>">
    <?php $totalPourLaBarre = $row['totalPositif'] + $row['totalNeutre'] + $row['totalRage']; ?>
    <div class="inner-bar" style="background-color: #4caf50; width: <?php echo ($totalPourLaBarre > 0) ? ($row['totalPositif'] / $totalPourLaBarre) * 100 : 0; ?>%;">
    </div>
    <div class="bar-text">Positif : <?php echo $row['totalPositif']; ?></div>
</div>
<div class="bar" data-value="<?php echo $row['totalNeutre']; ?>">
    <div class="inner-bar" style="background-color: #FFC107; width: <?php echo ($totalPourLaBarre > 0) ? ($row['totalNeutre'] / $totalPourLaBarre) * 100 : 0; ?>%;">
    </div>
    <div class="bar-text">Neutre : <?php echo $row['totalNeutre']; ?></div>
</div>
<div class="bar" data-value="<?php echo $row['totalRage']; ?>">
    <div class="inner-bar" style="background-color: #f44336; width: <?php echo ($totalPourLaBarre > 0) ? ($row['totalRage'] / $totalPourLaBarre) * 100 : 0; ?>%;">
    </div>
    <div class="bar-text">Negatif : <?php echo $row['totalRage']; ?></div>
</div>

<?php $totalPourLaBarreEnt = $row['totalPositifEnt'] + $row['totalNeutreEnt'] + $row['totalRageEnt']; ?>
<div class="bar" data-value="<?php echo $row['totalPositifEnt']; ?>">
    <div class="inner-bar" style="background-color: #4caf50; width: <?php echo ($totalPourLaBarreEnt > 0) ? ($row['totalPositifEnt'] / $totalPourLaBarreEnt) * 100 : 0; ?>%;">
    </div>
    <div class="bar-text">Positif Entreprise: <?php echo $row['totalPositifEnt']; ?></div>
</div>
<div class="bar" data-value="<?php echo $row['totalNeutreEnt']; ?>">
    <div class="inner-bar" style="background-color: #FFC107; width: <?php echo ($totalPourLaBarreEnt > 0) ? ($row['totalNeutreEnt'] / $totalPourLaBarreEnt) * 100 : 0; ?>%;">
    </div>
    <div class="bar-text">Neutre Entreprise : <?php echo $row['totalNeutreEnt']; ?></div>
</div>
<div class="bar" data-value="<?php echo $row['totalRageEnt']; ?>">
    <div class="inner-bar" style="background-color: #f44336; width: <?php echo ($totalPourLaBarreEnt > 0) ? ($row['totalRageEnt'] / $totalPourLaBarreEnt) * 100 : 0; ?>%;">
    </div>
    <div class="bar-text">Negatif Entreprise: <?php echo $row['totalRageEnt']; ?></div>
</div>

<a href="PageModeration.php"><button class="btn-index">Retour</button></a>

    </div>
</body>

</html>