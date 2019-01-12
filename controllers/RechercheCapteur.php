<?php 

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['capteurID'])){
  $capteurID = test_input($_POST["capteurID"]);
  }

    $utilisateurID = $_SESSION['selected_user'];
    $recup = false;

  if (isset($capteurID)&& trim($capteurID)!=""){
    $recherche = RecupCapteurbyID($capteurID);
    if ($recherche) {
      $recup = true;
    }
  }

  if (isset($capteurID)&& trim($capteurID)!=""){
    $recherche = RecupControleurbyID($capteurID);
    if ($recherche) {
      $recup = true;
    }
  }


  if ($recup == true) {
    header("Location: ../Liste_de_capteurs/Liste_de_capteurs.php?user=".$_SESSION['selected_user']."&capteur=".$capteurID);
  } else {
    header("Location: ../Liste_de_capteurs/Liste_de_capteurs.php?recup=error");
  }  

}

?>