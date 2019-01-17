<?php

require_once("../Models/user.php");
require_once("../Models/capteurs.php");


function test($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function RecupUserID($utilisateurID){
  return RecupUserByID($utilisateurID);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['telephone'])){
  $telephone = test($_POST["telephone"]);
  }
  if (isset($_POST['email'])){
  $email = test($_POST["email"]);
  }
  if (isset($_POST['capteurID'])){
    $capteurID = test($_POST["capteurID"]);
    }

  $recup =false;
  

  if (isset($telephone)&& trim($telephone)!=""){
    $recherche = RecupUserByTel($telephone);
    if ($recherche) {
      $recup = true;
    }
  }

  if (isset($email)&& trim($email)!=""){
    $recherche = RecupUserByEmail($email);
    if ($recherche) {
      $recup = true;
    }
  }

  if (isset($capteurID)&& trim($capteurID)!=""){
    $recherche = getUserByCapteurID($capteurID);
    if ($recherche) {
      $recup = true;
    }
  }

  if (isset($capteurID)&& trim($capteurID)!="" && $recup === false){
    $recherche = getUserByControleurID($capteurID);
    if ($recherche) {
      $recup = true;
    }
  }

  if ($recup == true) {
    header("Location: ../Views/ConfClient.php?user=".$recherche[0][0]);
  } else {
    header("Location: ../Views/RechercherPar.php?recherche=error");
  }  
}

?>