<?php 
session_start();
require_once("../Models/capteurs.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function JoinCapteurModel($capteurID, $utilisateurID){
    return joinCapteur($capteurID,$utilisateurID);
}

function JoinControleurModel($controleurID, $utilisateurID){
    return joinControleur($controleurID, $utilisateurID);
}

if (isset($_GET['user']) && $_GET['user'] != '') {
  $_SESSION['selected_user'] = $_GET['user'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['capteurID'])){
  $capteurID = test_input($_POST["capteurID"]);
  }
  
    $utilisateurID = $_SESSION['selected_user'];
    $recup = false;
    $recup1 = false;

  if (isset($capteurID)&& trim($capteurID)!=""){
    $recherche = joinCapteur($capteurID, $_SESSION['selected_user']);
    if ($recherche) {
      $recup = true;
    }
  }

  if (isset($capteurID)&& trim($capteurID)!=""){
    $recherche = joinControleur($capteurID, $_SESSION['selected_user'] );
    if ($recherche) {
      $recup1 = true;
    }
  }

  if ($recup == true) { 
    header("Location: ../Views/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&capteur=".$capteurID);
  } else if ($recup1 == true){
    header("Location: ../Views/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&controleur=".$capteurID);
  } else {
    header("Location: ../Views/Liste_de_capteurs.php?recup=error&user=".$_SESSION['selected_user']);
  }  

}

?>