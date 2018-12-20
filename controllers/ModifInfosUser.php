<?php

session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nom = $prenom = $email = $genre = $naissance = $telephone = $adresse = $pays = $codepostale = $mdp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = test_input($_POST["nom"]);
    $prenom = test_input($_POST["prenom"]);
    $email = test_input($_POST["email"]);
    $genre = test_input($_POST["genre"]);
    $naissance = test_input($_POST["naissance"]);
    $telephone = test_input($_POST["telephone"]);
    $adresse = test_input($_POST["adresse"]);
    $pays = test_input($_POST["pays"]);
    $codepostale = test_input($_POST["codepostale"]);
    $ancien= test_input($_POST['ancien_mdp']);
    $nouveau = test_input($_POST['nouveau_mdp']);

    $utilisateurID = $_SESSION['utilisateurID'];
    $utilisateur = RecupUserByID($utilisateurID);
    $modif = false;

    if (isset($nom)!= ""){
        $change = ModifNomUtilisateur($utilisateurID,$nom);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($prenom)!= ""){
        $change = ModifPrenomUtilisateur($utilisateurID,$prenom);
        if (!($change == 1)) {
          $modif = true;
        }
      }

    if (isset($email)!= ""){
        $change = ModifEmailUtilisateur($utilisateurID,$email);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($genre)!= ""){
        $change = ModifPrenomUtilisateur($utilisateurID,$prenom);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($naissance)!= ""){
        $change = ModifNaissanceUtilisateur($utilisateurID,$naissance);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($telephone)!= ""){
        $change = ModifTelUtilisateur($utilisateurID,$telephone);
        if (!($change == 1)) {
          $modif = true;
        }
      }

    if (isset($adresse)!= ""){
        $change = ModifAdressexUtilisateur($utilisateurID,$adresse);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($pays)!= ""){
        $change = ModifPaysUtilisateur($utilisateurID,$pays);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($codepostale)!= ""){
        $change = ModifZipcodeUtilisateur($utilisateurID,$codepostale);
        if (!($change == 1)) {
          $modif = true;
        }
      }
    
    if (isset($ancien) && isset($nouveau) != ""){
        $modif = ModifMdp($utilisateur[0][3], $ancien, $nouveau);
        if (!($change == 1)){
            $modif = true;
          } 
    }

  if ($modif == true) {
    header("Location: ../mesInfosUser/MesInfosUser.php?modif=true");
  } else {
    header("Location: ../mesInfosUser/MesInfosUser.php?modif=false");
  }
}


?>

