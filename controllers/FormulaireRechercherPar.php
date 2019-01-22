<?php

require_once __DIR__.'/../Models/user.php';
require_once __DIR__.'/../Models/capteurs.php';
session_start();
$langue = $_SESSION['language'];

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
    if ($langue =='fr'){
      header("Location: ../Views/ConfClient.php?user=".$recherche[0][0]);
    } else {
      header("Location: ../Views/english/ConfClient.php?user=".$recherche[0][0]);
    }
  } else {
    if ($langue =='fr'){
      header("Location: ../Views/RechercherPar.php?recherche=error");
    } else {
      header("Location: ../Views/english/RechercherPar.php?recherche=error");
    }
  }  
}

?>