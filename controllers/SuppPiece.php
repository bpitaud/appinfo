<?php 

session_start();

require_once("../Models/capteurs.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['selected_capteur'])){
      $capteur = test_input($_SESSION["selected_capteur"]);
      }
      if ($capteur){
          $suppCapteur = SuppCapteur($capteur); 
      }
  
    if ($suppCapteur == true) { 
      header("Location: ../Liste capteurs/Listecapteurs.php?supp=true");   
    }
    else {
      header("Location: ../Liste capteurs/Listecapteurs.php?supp=false");
    }  
  
  }

?>