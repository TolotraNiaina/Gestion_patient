<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/FontAwesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/patient.css">
    <title>Patient</title>
</head>
<body>

    <?php
include '../models/config.php';

if(isset($_POST['submit'])){
    $nompatient = $_POST['nompatient'];
    $prenompatient = $_POST['prenompatient'];
    $telpatient = $_POST['telpatient'];
    $adrpatient = $_POST['adrpatient'];
    

    $stmt = $conn->prepare("INSERT INTO patient (nompatient, prenompatient, telpatient, adrpatient) 
    VALUES (?, ?, ?, ?)");
    $stmt->execute([$nompatient, $prenompatient, $telpatient, $adrpatient]);
    

    echo "utilisateur ajouté avec succès!";
    header('Location: ../models/patient.php');
    exit();
    
}
?>
    <div>
        <?php
            require '../view/require.php'; 
        ?>
    </div>
    

    <div>
        <div class="control"> 
        <form method="POST" action="../models/patient.php" class="form-group">
            <label for="nompatient">NOM:</label>
            <input type="text" name="nompatient" required placeholder="Saisir votre Nom" class="form-control"><br>
            <label for="prenompatient">PRENOM:</label>
            <input type="text" name="prenompatient" required placeholder="Saisir votre Prenom" class="form-control"><br>
            <label for="telpatient">CONTACT:</label>
            <input type="text" name="telpatient" required placeholder="Saisir votre Contact" class="form-control"><br>
            <label for="adrpatient">ADRESSE:</label>
            <input type="text" name="adrpatient" required placeholder="Saisir votre Adresse" class="form-control"><br>
            <input type="submit" name="submit" value="Ajouter un patient" class="btn btn-primary">
        </form>
        </div>
    </div>

    <div class="tableau">
    <table class='table table-striped'>
                <thead class="table-success">
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Contact</th>
                    <th>Adresse</th>
                    <th>action</th>
                </tr>
                </thead>    
    <div>
    <?php
                
                include '../models/config.php';
               
                $stmt = $conn->query("SELECT * FROM patient");    
                while ($row = $stmt->fetch()){
                    echo"<tr>
                            <td>{$row['idpatient']}</td>
                            <td>{$row['nompatient']}</td>
                            <td>{$row['prenompatient']}</td>
                            <td>{$row['telpatient']}</td>
                            <td>{$row['adrpatient']}</td>

                            <td>
                                <a href='../models/updatepatient.php?idpatient={$row['idpatient']}' class='btn btn-primary'><i class='fa fa-pen'></i></a>
                                <a href='../models/deletepatient.php?idpatient={$row['idpatient']}' class='btn btn-danger'><i class='fa fa-trash'></i></a>
                            </td>
                         </tr> ";
                }  
                ?>
                </table>
                </div>
          </div>
          
</body>
</html>