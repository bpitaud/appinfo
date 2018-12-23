<?php
require_once("../Models/database.php");
require_once("../Models/logements.php");

session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$nom = $adresse = $codepostale = $surface = $pays = $utilisateurID = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = test_input($_POST["nom"]);
    $adresse = test_input($_POST["adresse"]);
    $codepostale = test_input($_POST["codepostale"]);
    $surface = test_input($_POST["surface"]);
    $pays = test_input($_POST["pays"]);
    $utilisateurID = $_SESSION['utilisateurID'];
    ajoutLogement($nom,$adresse,$codepostale,$surface,$utilisateurID,$pays); // ajout dans la database 
    $resultat = RecupLogements($utilisateurID);
    $_SESSION['logementID'] = $resultat[0][0];
    var_dump($resultat[0][0]);
    header('Location: ../Liste logements/listelogements.php'); 
      
}

function getLogementController($utilisateurID){
  return getLogement($utilisateurID);
}

?>
