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
function RecupInfoUser($utilisateurID){
  return RecupUserByID($utilisateurID);

}

$nom = $prenom = $email = $genre = $naissance = $telephone = $adresse = $pays = $codepostale = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom'])){
    $nom = test_input($_POST["nom"]);
    }
    if (isset($_POST['prenom'])){
    $prenom = test_input($_POST["prenom"]);
    }
    if (isset($_POST['email'])){
    $email = test_input($_POST["email"]);
    }
    if (isset($_POST['genre'])){
    $genre = test_input($_POST["genre"]);
    }
    if (isset($_POST['naissance'])){
    $naissance = test_input($_POST["naissance"]);
    }
    if (isset($_POST['telephone'])){
    $telephone = test_input($_POST["telephone"]);
    }
    if (isset($_POST['adresse'])){
    $adresse = test_input($_POST["adresse"]);
    }
    if (isset($_POST['pays'])){
    $pays = test_input($_POST["pays"]);
    }
    if (isset($_POST['codepostale'])){
    $codepostale = test_input($_POST["codepostale"]);
    }

    if (isset($_GET['user']) && $_GET['user'] != '') {
        $_SESSION['selected_user'] = $_GET['user'];
    }

    $utilisateurID = $_SESSION['selected_user'];
    $utilisateur = RecupUserByID($utilisateurID);
    $modif = false;

    if (isset($nom)&& trim($nom)!=""){
        $change = ModifNomUtilisateur($utilisateurID,$nom);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($prenom) && trim($prenom) !=""){
        $change = ModifPrenomUtilisateur($utilisateurID,$prenom);
        if (!($change == 1)) {
          $modif = true;
        }
      }

    if (!isset($email) && trim($email)!=""){
        $change = ModifEmailUtilisateur($utilisateurID,$email);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($genre) && trim($genre)!=""){
        $change = ModifGenreUtilisateur($utilisateurID,$genre);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($naissance) && trim($naissance)!=""){
        $change = ModifNaissanceUtilisateur($utilisateurID,$naissance);
        if (!($change == 1)) {
          $modif = true;
        }
    }
    
    if (isset($telephone) && trim($telephone)!=""){
        $change = ModifTelUtilisateur($utilisateurID,$telephone);
        if (!($change == 1)) {
          $modif = true;
        }
      }

    if (isset($adresse) && trim($adresse)!=""){
        $change = ModifAdresseUtilisateur($utilisateurID,$adresse);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($pays)&& trim($pays)!=""){
        $change = ModifPaysUtilisateur($utilisateurID,$pays);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($codepostale) && trim($codepostale)!=""){
        $change = ModifZipcodeUtilisateur($utilisateurID,$codepostale);
        if (!($change == 1)) {
          $modif = true;

        }
      }

  if ($modif == true) {
    if ($langue =='fr'){
      header("Location: ../Views/Compte_Admin.php?modif=true");
    } else {
      header("Location: ../Views/english/Compte_Admin.php?modif=true");
    } 
  } else {
    if ($langue =='fr'){
      header("Location: ../Views/Compte_Admin.php?modif=false");
    } else {
      header("Location: ../Views/english/Compte_Admin.php?modif=false");
    } 
  }
}

?>