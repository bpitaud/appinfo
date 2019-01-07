<?php

// define variables and set to empty values
$Err =  "";
$tel = $mail = $capteur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  
  if ((empty($_POST["tel"]))&&(empty($_POST["mail"]))&&(empty($_POST["capteur"]))){
    $Err = "Rentrer une recherche";
  } else {
    $telephone = test_input($_POST["telephone"]);
    $email = test_input($_POST["email"]);
    $capteurID = test_input($_POST["capteurID"]);
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