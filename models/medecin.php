<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/FontAwesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/medecin.css">
    <title>Patient</title>
</head>
<body>

    <?php
include '../models/config.php';

if(isset($_POST['submit'])){
    $nommedecin = $_POST['nommedecin'];
    $prenommedecin = $_POST['prenommedecin'];
    $specialite = $_POST['specialite'];
    $telmedecin = $_POST['telmedecin'];
    

    $stmt = $conn->prepare("INSERT INTO medecine (nommedecin, prenommedecin, specialite, telmedecin) 
    VALUES (?, ?, ?, ?)");
    $stmt->execute([$nommedecin, $prenommedecin, $specialite, $telmedecin]);
    

    echo "utilisateur ajouté avec succès!";
    header('Location: ../models/medecin.php');
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
        <form method="POST" action="../models/medecin.php" class="form-group">
            <label for="nommedecin">NOM:</label>
            <input type="text" name="nommedecin" required placeholder="Saisir votre Nom" class="form-control"><br>
            <label for="prenommedecin">PRENOM:</label>
            <input type="text" name="prenommedecin" required placeholder="Saisir votre Prenom" class="form-control"><br>
            <label for="specialite">SPECIALITE:</label>
            <input type="text" name="specialite" required placeholder="Saisir le Specialite" class="form-control"><br>
            <label for="telmedecin">CONTACT:</label>
            <input type="text" name="telmedecin" required placeholder="Saisir votre Contact" class="form-control"><br>
            <input type="submit" name="submit" value="Ajouter un medecin" class="btn btn-primary">
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
                    <th>Specialite</th>
                    <th>Contact</th>
                    <th>action</th>
                </tr>
                </thead>    
    <div>
    <?php
                
                include '../models/config.php';


                $stmt = $conn->query("SELECT * FROM medecine");    
                while ($row = $stmt->fetch()){
                    echo"<tr>
                            <td>{$row['idmedecin']}</td>
                            <td>{$row['nommedecin']}</td>
                            <td>{$row['prenommedecin']}</td>
                            <td>{$row['specialite']}</td>
                            <td>{$row['telmedecin']}</td>

                            <td>
                                <a href='../models/updatemedecin.php?idmedecin={$row['idmedecin']}' class='btn btn-primary'><i class='fa fa-pen'></i></a>
                                <a href='../models/deletemedecin.php?idmedecin={$row['idmedecin']}' class='btn btn-danger'><i class='fa fa-trash'></i></a>
                            </td>
                         </tr> ";
                }  
        

                ?>
                </table>
                </div>
          </div>
</body>
</html>