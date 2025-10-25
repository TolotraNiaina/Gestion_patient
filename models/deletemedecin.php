<?php
include 'config.php';

if(isset($_GET['idmedecin'])) {
    $idmedecin = $_GET['idmedecin'];
    $stmt = $conn->prepare("DELETE FROM medecine WHERE idmedecin = ?");
    $stmt->execute([$idmedecin]);

    echo "Utilisateur supprimé avec succès!";

    header('Location: ../models/patient.php');
}else{
    echo "Erreur de suppression!";
}
?>