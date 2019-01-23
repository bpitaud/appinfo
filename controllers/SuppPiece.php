<?php 

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/pieces.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_SESSION['selected_piece'])){
      $piece = test_input($_SESSION["selected_piece"]);
      }
      if ($piece){
          $suppPiece = suppPiece($piece); 
      }
  

      if ($suppPiece == true) { 
        if ($langue =='fr'){
          header("Location: ../Views/listepieces.php?supp=true");   
        } else {
          header("Location: ../Views/english/listepieces.php?supp=true");   
        }
      } else {
        if ($langue =='fr'){
          header("Location: ../Views/listepieces.php?supp=false");   
        } else {
          header("Location: ../Views/english/listepieces.php?supp=false");   
        }
      }  
  }

?>