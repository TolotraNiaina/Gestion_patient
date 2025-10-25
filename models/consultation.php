<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/FontAwesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/consultation.css">
    <title>consultation</title>
</head>
<body>

    <?php
include '../models/config.php';

if(isset($_POST['submit'])){
    $dateconsultation = $_POST['dateconsultation'];
    $daterdv = $_POST['daterdv'];
    $heureconsultation = $_POST['heureconsultation'];
    $idpatient = $_POST['idpatient'];
    $idmedecin = $_POST['idmedecin'];
    

    $stmt = $conn->prepare("INSERT INTO consultation (dateconsultation, daterdv, heureconsultation, idpatient , idmedecin) 
    VALUES (?, ?, ?, ? ,?)");
    $stmt->execute([$dateconsultation, $daterdv, $heureconsultation, $idpatient , $idmedecin]);
    

    echo "utilisateur ajouté avec succès!";
    header('Location: ../view/dashboard.php');
    exit();
    
}
?>
    <div>
        <?php
            require '../view/require.php'; 
        ?>
    </div>
    

        <div class="control"> 
        <form method="POST" action="../models/consultation.php" class="form-group">
            <label for="dateconsultation">DATE DE CONSULTATION:</label>
            <input type="date" name="dateconsultation" required class="form-control"><br>
            <label for="datedrv">DATE DU RENDEZ-VOUS:</label>
            <input type="date" name="daterdv" required class="form-control"><br>
            <label for="heureconsultation">HEURE DU RENDEZ-VOUS:</label>
            <input type="time" name="heureconsultation" required class="form-control"><br>
            <label for="idpatient">NOM PATIENT</label><br>
            <select name="idpatient" id="" class="form-select">
                <?php
                    $req_patient = $conn->query("SELECT * FROM patient");
                    while($row = $req_patient->fetch()){
                        echo"<option value='{$row['idpatient']}'>{$row['nompatient']} {$row['prenompatient']}</option>";
                    }
                ?>
            </select><br>
            <label for="idmedecin">NOM MEDECIN</label><br>
            <select name="idmedecin" id="" class="form-select">
                <?php
                    $req_medecin = $conn->query("SELECT * FROM medecine");
                    while($row = $req_medecin->fetch()){
                        echo"<option value='{$row['idmedecin']}'>{$row['nommedecin']} {$row['prenommedecin']}</option>";
                    }
                ?>
            </select><br><br>
            <input type="submit" name="submit" value="NOUVEAU CONSULTATION" class="btn btn-primary">
        </form>
        </div>


        <div class="tableau">
            <table class="table table-striped"> 
                <thead class="table-success">
                <tr>
                    <th>Matricule</th>
                    <th>Consultation</th>
                    <th>Date RDV</th>
                    <th>Patient</th>
                    <th>Medecin</th>
                </tr>
                </thead>    

                    <div>
                <?php
                
                include '../models/config.php';

                $stmt = $conn->query("SELECT consultation.idconsultation, consultation.dateconsultation, consultation.daterdv, patient.prenompatient, medecine.prenommedecin
                                    ,patient.nompatient, medecine.nommedecin FROM consultation 
                                    JOIN patient ON consultation.idpatient = patient.idpatient
                                    JOIN medecine ON consultation.idmedecin = medecine.idmedecin");
                //  $stmt = $conn->query("SELECT * FROM consultation");    
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo"<tr>
                            <td>{$row['idconsultation']}</td>
                            <td>{$row['dateconsultation']}</td>
                            <td>{$row['daterdv']}</td>
                            <td>{$row['nompatient']}</td>
                            <td>{$row['nommedecin']}</td>
                         </tr> ";
                }  
            
                ?>
                </table>  
                </div>
                </div>


</body>
</html>