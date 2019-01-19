<?php 

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    $recupCapteur = RecupCapteurbyID($capteur);
    if ($recupCapteur == true){
      $suppCapteur = SuppCapteur($capteur); 
    } else if ($recupCapteur == false) {
          $recupControleur = RecupControleurbyID($capteur);
          if ($recupControleur == true) {
            $suppControleur = SuppControleur($capteur);
          }
        }
    }

  if ($suppCapteur or $suppControleur) { 
    header("Location: ../Views/Listecapteurs.php?supp=true");   
  }
  else {
    header("Location: ../Views/Listecapteurs.php?supp=false");
  }  
}

?>