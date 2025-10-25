<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "gestion_patient";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "connexion échouée: " . $e->getMessage();
}
?>