<?php 

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/capteurs.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = "" ;

function RecupControleurID($controleurID){
  return RecupControleurbyID($controleurID);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    if (isset($_GET['capteur']) && $_GET['capteur'] != '') {
      $_SESSION['selected_capteur'] = $_GET['capteur'];
      }
    
    $controleurID = $_SESSION['selected_capteur'];
    $modif = false;

    if (isset($nom)&& trim($nom)!=""){
        $change = ModifNomControleur($controleurID,$nom);
        if (!($change == 1)) {
          $modif = true;
        }
      }

  if ($modif == true) {
    if ($langue =='fr'){
      header("Location: ../Views/listecapteurs.php?modif=true");
    } else {
      header("Location: ../Views/english/listecapteurs.php?modif=true");
    } 
  } else {
    if ($langue =='fr'){
      header("Location: ../Views/listecapteurs.php?modif=false");
    } else {
      header("Location: ../Views/english/listecapteurs.php?modif=false");
    } 
  }
}

?>