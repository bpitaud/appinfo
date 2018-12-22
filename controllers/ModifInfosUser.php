<?php

session_start();

require_once('../Models/user.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = $prenom = $email = $genre = $naissance = $telephone = $adresse = $pays = $codepostale = $mdp = "";

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
    /*if (isset($_POST['ancien_mdp'])){
    $ancien= test_input($_POST['ancien_mdp']);
    }
    if (isset($_POST['nouveau_mdp'])){
    $nouveau = test_input($_POST['nouveau_mdp']);
    }*/

    $utilisateurID = $_SESSION['utilisateurID'];
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
    
    /*if (isset($ancien) && isset($nouveau) != ""){
        $modif = ModifMdp($utilisateur[0][3], $ancien, $nouveau);
        if (!($change == 1)){
            $modif = true;
        }
    }*/

  if ($modif == true) {
    header("Location: ../mesInfosUser/MesInfosUser.php?modif=true");
  } else {
    header("Location: ../mesInfosUser/MesInfosUser.php?modif=false");
  }
}

?>

