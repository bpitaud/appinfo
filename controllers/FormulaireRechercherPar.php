<?php

require_once("../Models/user.php");

function test_input($data) {
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
  $telephone = test_input($_POST["telephone"]);
  }
  if (isset($_POST['email'])){
  $email = test_input($_POST["email"]);
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

  if ($recup == true) {
    header("Location: ../ConfirmationClient/ConfClient.php?user=".$recherche[0][0]);
  } else {
    header("Location: ../RechercherPar/RechercherPar.php?recherche=error");
  }  
    


}

?>