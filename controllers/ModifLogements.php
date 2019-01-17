<?php 

session_start();

require_once('../Models/logements.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function RecupLogement($logementID){
  return RecupLogementsbyID($logementID);

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

    if (isset($_GET['log']) && $_GET['log'] != '') {
    $_SESSION['selected_logement'] = $_GET['log'];
    }


    $logementID = $_SESSION['selected_logement'];
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
    header("Location: ../Views/listelogements.php?modif=true");
  } else {
    header("Location: ../Views/listelogements.php?modif=false");
  }
}

?>
 
