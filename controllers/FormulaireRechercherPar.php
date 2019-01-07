<?php

require_once("../Models/user.php");

function RecupUserTel($telephone) {
  return RecupUserByTel($telephone);
}

function RecupUserEmail($email) {
  return RecupUserByEmail($email);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $telephone = test_input($_POST["telephone"]);
  $email = test_input($_POST["email"]);

  if (isset($telephone)&& trim($telephone)!=""){
    $recherche = RecupUserByTel($telephone);
  }

  if (isset($email)&& trim($email)!=""){
    $recherche = RecupUserByEmail($email);
  }

  RecupUserTel($logementID,$nom,$adresse,$codepostale,$surface,$utilisateurID,$pays); // ajout dans la database 
  header('Location: ../Liste logements/listelogements.php?user='.$utilisateurID);  
  }     

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>