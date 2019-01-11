<?php

session_start();

require_once('../Models/user.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


$mdp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['ancien_mdp'])){
    $ancien= test_input($_POST['ancien_mdp']);
    }
    if (isset($_POST['nouveau_mdp'])){
    $nouveau = test_input($_POST['nouveau_mdp']);
    }

    if (isset($_GET['user']) && $_GET['user'] != '') {
        $_SESSION['selected_user'] = $_GET['user'];
    }

    $utilisateurID = $_SESSION['selected_user'];
    $utilisateur = RecupUserByID($utilisateurID);
    $modif = false;
   
    if (isset($ancien) && isset($nouveau) && trim($ancien) && trim($nouveau) != ""){
        $modif = ModifMdp($utilisateur[0][3], $ancien, $nouveau);
        if (!($change == 1)){
            $modif = true;
        }
    }

  if ($modif == true) {
    header("Location: ../Admin_Compte/Compte_Admin.php?modif=true");
  } else {
    header("Location: ../Admin_Compte/Compte_Admin.php?modif=false");
  }
}

?>
