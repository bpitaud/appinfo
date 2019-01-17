<?php
require_once("../Models/logements.php");

session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = test_input($_POST["nom"]);
    $adresse = test_input($_POST["adresse"]);
    $codepostale = test_input($_POST["codepostale"]);
    $surface = test_input($_POST["surface"]);
    $pays = test_input($_POST["pays"]);
    $utilisateurID = $_SESSION['utilisateurID'];
    $logementID = uniqid();
    ajoutLogement($logementID,$nom,$adresse,$codepostale,$surface,$utilisateurID,$pays); // ajout dans la database 
    header('Location: ../Views/listelogements.php?user='.$utilisateurID);  
    }     


function RecupLogementController($utilisateurID){
  return RecupLogements($utilisateurID);
}

?>
