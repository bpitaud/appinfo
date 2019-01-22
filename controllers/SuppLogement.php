<?php 

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/logements.php';

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
        if ($langue =='fr'){
          header("Location: ../Views/Listelogements.php?supp=true");   
        } else {
          header("Location: ../Views/english/Listelogements.php?supp=true");   
        }
      } else {
        if ($langue =='fr'){
          header("Location: ../Views/Listelogements.php?supp=false");   
        } else {
          header("Location: ../Views/english/Listelogements.php?supp=false");   
        }
      }   
  }

?>