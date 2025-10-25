<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/FontAwesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <script src="../assets/chart.js-4.4.8/package/dist/chart.umd.js"></script>
    <title>Dashboard</title>
</head>
<body>

    <div>
        <?php
            require '../view/require.php'; 
        ?>
    </div>
    
    <div>
            <div class="patient">
                <p class="paragraph">NOMBRE DE PATIENT</p>
                  <h1 class="A">
                    <?php
                        include '../models/config.php';
                        $patient = $conn->query("SELECT COUNT(*) AS TOTAL FROM patient");
                        $row_patient = $patient->fetch(PDO::FETCH_ASSOC);
                        echo"
                        <div class='h5 nb-0 font-weight-bold text-gray-700' style='font-size:35px'>{$row_patient['TOTAL']}</div>"
                        ?>
                    </h1>
            </div>
        </div>
    
        <div>
            <div class="medecin">
                <p class="paragraph2">NOMBRE DE MEDECIN</p>
                  <h1 class="B">
                    <?php
                        include '../models/config.php';
                        $medecin = $conn->query("SELECT COUNT(*) AS TOTAL FROM medecine");
                        $row_medecin = $medecin->fetch(PDO::FETCH_ASSOC);
                        echo"
                        <div class='h5 nb-0 font-weight-bold text-gray-700' style='font-size:35px'>{$row_medecin['TOTAL']}</div>"
                        ?>
                    </h1>
            </div>
        </div>

        <div>
            <div class="consultation">
                <p class="paragraph3">CONSULTATION</p>
                  <h1 class="C">
                    <?php
                        include '../models/config.php';
                        $consulation = $conn->query("SELECT COUNT(*) AS TOTAL FROM consultation");
                        $row_consultation = $consulation->fetch(PDO::FETCH_ASSOC);
                        echo"
                        <div class='h5 nb-0 font-weight-bold text-gray-700' style='font-size:35px'>{$row_consultation['TOTAL']}</div>"
                        ?>
                    </h1>
            </div>
        </div>

        <?php
    include '../models/config.php';


    $sql = "SELECT dateconsultation AS date, COUNT(*) AS total FROM consultation GROUP BY dateconsultation ORDER BY dateconsultation ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Préparer les tableaux pour le graphique
$labels = [];
$data = [];

foreach ($resultats as $row) {
    // On formate la date ou on peut l'utiliser directement selon vos données
    $labels[] = $row['date'];
    $data[] = (int)$row['total'];
}
?>

   

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // Récupération des données PHP dans des variables JavaScript
        const labels = <?php echo json_encode($labels); ?>;
        const data = <?php echo json_encode($data); ?>;

        // Configuration du graphique
        const config = {
            type: 'bar',  // type de graphique (barres)
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre de Consultations par date.',
                    data: data,
                    backgroundColor: ['rgb(104, 163, 231)','rgb(73, 224, 86)',
                    'rgb(231, 173, 64)',,'rgb(64, 28, 226)'],
                    barThickness: 60
                }]
            },
            options: {
                responsive: true,
                // scales: {
                //     y: {
                //         beginAtZero: true,
                //         title: {
                //             display: true,
                //             text: 'Nombre de consultations'
                //         }
                //     },
                //     x: {
                //         title: {
                //             display: true,
                //             text: 'Date de consultation'
                //         }
                //     }
                // },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                }
            }
        };

        // Initialisation du graphique avec Chart.js
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, config);
    </script>

    <div class="cart">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Polyclinique service hopital</h5>
                <p class="card-text">Un service qui accessible à tous les employées dans l'hopital.
                    Polyclinique Ampasapito service hopital.
                </p>
                <a href="../models/patient.php" class="btn btn-primary">NOUVEAU PATIENT</a>
        </div>
    </div>
    </div>

</body>
</html>