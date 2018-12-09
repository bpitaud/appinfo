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

    if (empty($_POST["email"])) {
        $emailErr = "un email est requis";
      } else {
        $email = test_input($_POST["email"]);
      }
        
      if (empty($_POST["mdp"])) {
        $mdpErr = "un mot de passe est requis";
      } else {
        $mdp = test_input($_POST["mdp"]);
      }
      if (!$resultat)
      {
        echo 'Mauvais identifiant ou mot de passe !';
        header('Location: ../connexionn/connexion.php');
      }
      else
      {
        if ($isPasswordCorrect) {
          session_start();
          $_SESSION['utilisateurID'] = $resultat['utilisateurID'];
          $_SESSION['email'] = $email;
          header('Location: ../Liste logements/premierdomicile.php');
        }
        else {
          echo 'Mauvais identifiant ou mot de passe !';
          header('Location: ../connexionn/connexion.php');
        }
}

   

// si oui, récupérer l'utilisateur par le mail 
//puis récupérer les logements de l'utilisateur, si il n'en a pas dirigé vers la page de première connexion 
// sinon diriger vers la liste des logements 
// si mail ou mdp non valide, diriger vers page inscription
}
?>