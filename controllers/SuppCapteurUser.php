<?php 

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/capteurs.php';

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
      if ($langue =='fr'){
        header("Location: ../Views/listecapteurs.php?supp=true");   
      } else {
        header("Location: ../Views/english/listecapteurs.php?supp=true");   
      }
    } else {
      if ($langue =='fr'){
        header("Location: ../Views/listecapteurs.php?supp=false");   
      } else {
        header("Location: ../Views/english/listecapteurs.php?supp=false");   
      }
    }  
}

?>