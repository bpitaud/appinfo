<?php

// define variables and set to empty values
$telErr = $mailErr = $Err =  "";
$tel = $mail = $capteur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  
  if (empty($_POST["tel"])){
    $Err = "Rentrer une recherche";
  } else {
    $tel = test_input($_POST["tel"]);
    $mail = test_input($_POST["mail"]);
    $capteur = test_input($_POST["capteur"]);
  }
    
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



echo ($tel);
echo ($mail);
echo ($capteur);












?>