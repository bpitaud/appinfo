<?php

require_once("../Models/database.php");
require_once("../Models/pieces.php");
require_once("../controllers/FormulaireAjoutLogement.php");
session_start();

// ajouter un logement avec les paramètres
$nom  = $surface = $logementID = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nom = test_input($_POST["nom"]);
    $surface = test_input($_POST["surface"]);
    $logementID = $_SESSION['logementID'];
    ajoutLogement($nom,$adresse,$codepostale,$surface,$utilisateurID,$pays);
    header('Location: ../Liste logements/listelogements.php');
}

?>
