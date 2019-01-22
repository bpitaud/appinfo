<?php 

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/user.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['utilisateurID'])){
      $utilisateur = test_input($_SESSION["utilisateurID"]);
      }
      $utilisateur;
      if ($utilisateur){
          $suppUser = SuppUtilisateur($utilisateur); 
      }
  

      if ($suppUser == true) { 
        if ($langue =='fr'){
          header("Location: ../Views/home.php?supp=true");   
        } else {
          header("Location: ../Views/english/home.php?supp=true");   
        }
      } else {
        if ($langue =='fr'){
          header("Location: ../Views/home.php?supp=false");   
        } else {
          header("Location: ../Views/english/home.php?supp=false");   
        }
      } 
  }

?>

