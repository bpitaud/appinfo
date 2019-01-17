<?php 

session_start();

require_once("../Models/pieces.php");

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
      header("Location: ../Views/Listepieces.php?supp=true");   
    }
    else {
      header("Location: ../Views/Listepieces.php?supp=false");
    }  
  
  }

?>