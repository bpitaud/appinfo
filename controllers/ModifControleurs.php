<?php 

session_start();

require_once('../Models/capteurs.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    
    $controleurID = $_SESSION['controleurID'];
    $capteur = RecupControleurbyID($controleurID);
    $modif = false;

    if (isset($nom)&& trim($nom)!=""){
        $change = ModifNomControleur($controleurID,$nom);
        if (!($change == 1)) {
          $modif = true;
        }
      }

  if ($modif == true) {
    header("Location: ../Liste capteurs/listecapteurs.php?modif=true");
  } else {
    header("Location: ../Liste capteurs/listecapteurs.php?modif=false");
  }
}

?>