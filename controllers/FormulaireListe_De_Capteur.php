<?php
// define variables and set to empty values
$Err =  "";
$capteur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  
  if (empty($_POST["capt"])){
    $Err = "Rentrer une recherche";
  } else {
    $capteur = test_input($_POST["capt"]);
  }
    
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>