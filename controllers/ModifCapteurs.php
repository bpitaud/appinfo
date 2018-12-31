<?php 

session_start();

require_once('../Models/capteurs.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = $type = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    
    $capteurID = $_SESSION['capteurID'];
    $capteur = RecupCapteurbyID($capteurID);
    $modif = false;

    if (isset($nom)&& trim($nom)!=""){
        $change = ModifNomCapteur($capteurID,$nom);
        if (!($change == 1)) {
          $modif = true;
        }
      }

      if (isset($type)&& trim($type)!=""){
        $change = ModifNomCapteur($capteurID,$type);
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
 