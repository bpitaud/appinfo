<?php 

session_start();

require_once('../Models/logements.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = $adresse = $codepostale = $surface = $pays = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    if (isset($_POST['adresse'])){
    $prenom = test_input($_POST["adresse"]);
    }
    if (isset($_POST['codepostale'])){
    $email = test_input($_POST["codepostale"]);
    }
    if (isset($_POST['surface'])){
    $genre = test_input($_POST["surface"]);
    }
    if (isset($_POST['pays'])){
    $naissance = test_input($_POST["pays"]);
    }

    $logementID = $_SESSION['logementID'];
    $logement = RecupLogementsbyID($logementID);
    $modif = false;

    if (isset($nom)&& trim($nom)!=""){
        $change = ModifNomLogement($logementID,$nom);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($adresse) && trim($adresse) !=""){
        $change = ModifAdresseLogement($logementID,$adresse);
        if (!($change == 1)) {
          $modif = true;
        }
      }

    if (!isset($codepostale) && trim($codepostale)!=""){
        $change = ModifZipcodeLogement($logementID,$codepostale);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($surface) && trim($surface)!=""){
        $change = ModifSurfaceLogement($logementID,$surface);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($pays) && trim($pays)!=""){
        $change = ModifPaysLogement($logementID,$pays);
        if (!($change == 1)) {
          $modif = true;
        }
    }

  if ($modif == true) {
    header("Location: ../Liste logements/listelogements.php?modif=true");
  } else {
    header("Location: ../Liste logements/listelogements.php?modif=false");
  }
}

?>
 
