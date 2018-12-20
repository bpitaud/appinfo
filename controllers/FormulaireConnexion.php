<?php
 
require_once('../Models/user.php');
session_start();


$email = $mdp = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['email'])){
    $email = test_input($_POST["email"]);
  }
  if (isset($_POST['mdp'])){ 
    $mdp= test_input($_POST['mdp']);
  }
    $IdentifiantsOK = VerifIdentifiants($email,$mdp);
    if ($IdentifiantsOK){ // email et mdp valides
      $resultat = RecupUserByEmail($email);
      $_SESSION['utilisateurID'] = $resultat[0][0]; // création session à partir de l'ID utilisateur // récupérer l'utilisateur par le mail
      $logements = Possede_logements($resultat[0][0]);// faire une fonction pour checker si l'utilisateur a des logements
      if ($resultat[0][11]== 1){ // vérifie si c'est un admin 
        $_SESSION['admin'] = 1;
        header('Location: ../RechercherPar/RechercherPar.php'); // si admin, diriger vers Rechercher Par
      } else {
        $_SESSION['admin'] = 0;
        if($logements){ // sinon , vérifie si cet utilisateur a des logements 
        header('Location: ../Liste logements/listelogements.php');
        } else {
        header('Location: ../Liste logements/premierlogement.php');
        }
      }
    }
    else { // rester sur la page connexion car identifiants non valides
      echo ("Email ou mot de passe incorrect(s)");
      header('Location: ../connexionn/connexion.php');

    }
       
}


?>