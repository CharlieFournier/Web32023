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
    <div class="container text-center test1">
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

        
        ?>

<div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vote</h5>
                        <div class="pie-chart" style="background: conic-gradient(#8bc34a 0% <?php echo $percentagePositif; ?>%, #9e9e9e <?php echo $percentagePositif; ?>% <?php echo ($percentagePositif + $percentageNeutre); ?>%, #d32f2f <?php echo ($percentagePositif + $percentageNeutre); ?>% 100%);"></div>
                        <p class="card-text">Nombre de votes étudiants: <?php echo $totalGeneral; ?></p>
                        <p class="card-text">Nombre de votes positif:  <?php echo $row['totalPositif']; ?></p>
                        <p class="card-text">Nombre de votes negatif:  <?php echo $row['totalNeutre']; ?></p>
                        <p class="card-text">Nombre de votes neutre:  <?php echo $row['totalRage']; ?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vote Entreprise</h5>
                        <div class="pie-chart" style="background: conic-gradient(#001F3F 0% <?php echo $percentagePositifEnt; ?>%, #9e9e8e <?php echo $percentagePositifEnt; ?>% <?php echo ($percentagePositifEnt + $percentageNeutreEnt); ?>%, #000000 <?php echo ($percentagePositifEnt + $percentageNeutreEnt); ?>% 100%);"></div>
                        <p class="card-text">Nombre de votes entreprise: <?php echo $totalEntreprise; ?></p>
                        <p class="card-text">Nombre de votes positif: <?php echo $row['totalPositifEnt']; ?></p>
                        <p class="card-text">Nombre de votes neutre: <?php echo $row['totalNeutreEnt']; ?></p>
                        <p class="card-text">Nombre de votes negatif: <?php echo $row['totalRageEnt']; ?></p>

                    </div>
                </div>
            </div>
        </div>

        

        <a href="PageModeration.php"><button class="btn-index">Retour</button></a>

    </div>
</body>

</html>