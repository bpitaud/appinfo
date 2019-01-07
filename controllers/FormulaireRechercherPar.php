<?php

require_once("../Models/user.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $telephone = test_input($_POST["telephone"]);
  $email = test_input($_POST["email"]);

  if (isset($telephone)&& trim($telephone)!=""){
    $recherche = RecupUserByTel($telephone);
  }

  if (isset($email)&& trim($email)!=""){
    $recherche = RecupUserByEmail($email);
    if (!($recherche == 1)) {
      $recup = true;
    }
  }

  if ($recup == true) {
    header("Location: ../Liste logements/listelogements.php?modif=true");
  } else {
    header("Location: ../Liste logements/listelogements.php?modif=false");
  }  
    

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>