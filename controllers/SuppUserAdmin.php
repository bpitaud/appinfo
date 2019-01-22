<?php 

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/user.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['selected_user'])){
      $utilisateur = test_input($_SESSION['selected_user']);}
      $utilisateur;
      if ($utilisateur){
          $suppUser = SuppUtilisateur($utilisateur); 
      }
  
      if ($suppUser == true) { 
        if ($langue =='fr'){
          header("Location: ../Views/RechercherPar.php?supp=true");   
        } else {
          header("Location: ../Views/english/RechercherPar.php?supp=true");   
        }
      } else {
        if ($langue =='fr'){
          header("Location: ../Views/RechercherPar.php?supp=false");   
        } else {
          header("Location: ../Views/english/RechercherPar.php?supp=false");   
        }
      }
  }

?>