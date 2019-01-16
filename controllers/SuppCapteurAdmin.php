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

if (isset($_GET['capteur']) && $_GET['capteur'] != '') {
  $_SESSION['selected_capteur'] = $_GET['capteur'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $capteur = test_input($_SESSION['selected_capteur']);
    $controleur = test_input($_SESSION['selected_capteur']);
    if ($capteur){
        $suppCapteur = SuppCapteur($_SESSION['selected_capteur']); 
    }
    else {
    $suppControleur = SuppControleur($_SESSION['selected_capteur']);
    }

  if ($suppCapteur or $suppControleur) { 
    header("Location: ../Liste_de_capteurs/Liste_de_capteurs.php?supp=true");   
  }
  else {
    header("Location: ../Liste_de_capteurs/Liste_de_capteurs.php?supp=false");
  }  

}

?>