<?php 

session_start();
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

    $capteur = RecupCapteurbyID($_SESSION['selected_capteur']);
    $controleur = RecupControleurbyID($_SESSION['selected_capteur']);
    if ($capteur){
        $suppCapteur = SuppCapteur($capteurID); 
    }
    else {
    $suppControleur = SuppControleur($controleurID);
    }

  if ($suppCapteur or $suppControleur) { 
    header("Location: ../Liste_de_capteurs/Liste_de_capteurs.php?supp=true");   
  }
  else {
    header("Location: ../Liste_de_capteurs/Liste_de_capteurs.php?supp=false");
  }  

}

?>