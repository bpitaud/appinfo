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
          $suppCapteur = SuppControleur($capteur); 
      }
  
    if ($suppControleur == true) { 
      header("Location: ../Views/Listecapteurs.php?supp=true");   
    }
    else {
      header("Location: ../Views/Listecapteurs.php?supp=false");
    }  
  
  }

?>