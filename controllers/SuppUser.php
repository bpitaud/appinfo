<?php 

session_start();

require_once("../Models/user.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['utilisateurID'])){
      $utilisateur = test_input($_SESSION["utilisateurID"]);
      }
      $utilisateur;
      if ($utilisateur){
          $suppUser = SuppUtilisateur($utilisateur); 
      }
  
    if ($suppUser == true) { 
      header("Location: ../Views/home.php?supp=true");   
    }
    else {
      header("Location: ../Views/home.php?supp=false");
    }  
  
  }

?>

