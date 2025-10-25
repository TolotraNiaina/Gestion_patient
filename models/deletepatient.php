<?php
include 'config.php';

if(isset($_GET['idpatient'])) {
    $idpatient = $_GET['idpatient'];
    $stmt = $conn->prepare("DELETE FROM patient WHERE idpatient = ?");
    $stmt->execute([$idpatient]);

    echo "Utilisateur supprimé avec succès!";

    header('Location: ../models/patient.php');
}else{
    echo "Erreur de suppression!";
}
?>