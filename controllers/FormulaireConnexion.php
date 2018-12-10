<?php
 
require_once('../Models/user.php');

$emailErr = $mdpErr = "";
$email = $mdp = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = test_input($_POST["email"]);
    $mdp= test_input($_POST['mdp']);
    $ok = VerifIdentifiants($email, $mdp);
    if ($ok){
      $resultat = RecupUserByEmail($email);
      $_SESSION['utilisateurID'] = $resultat['utilisateurID']; 
      $logements = '';// faire une fonction pour checker si l'utilisateur a des logements
      if($logements){
        header('Location: ../Liste logements/connexion.php');
      } else {
        header('Location: ../Liste logements/premierlogement.php');
      }
      if ($resultat[0][11]== 0){
        $SESSION_['admin'] = 0;
        header('Location: ../RechercherPar/RechercherPar.php');
      } else {
        if($logements){
          header('Location: ../Liste logements/connexion.php');
        } else {
          header('Location: ../Liste logements/premierlogement.php');
        }
      }
      
    }
    else {
      echo ("Email ou mot de passe incorrect(s)");
      header('Location: ../inscription/inscription.php');

    }
       
}


// si oui, récupérer l'utilisateur par le mail 
//puis récupérer les logements de l'utilisateur, si il n'en a pas dirigé vers la page de première connexion 
// sinon diriger vers la liste des logements 
// si mail ou mdp non valide, diriger vers page inscription
?>