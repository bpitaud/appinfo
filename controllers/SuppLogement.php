<?php 

session_start();

require_once("../Models/logements.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['selected_logement'])){
      $logement = test_input($_SESSION['selected_logement']);
      }
      if ($logement){
          $suppLogement = SuppLogement($logement); 
      }
  
    if ($suppLogement == true) { 
      header("Location: ../Liste logements/Listelogements.php?supp=true");   
    }
    else {
      header("Location: ../Liste logements/Listelogements.php?supp=false");
    }  
  
  }

?>