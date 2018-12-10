<?php
 
require_once('../Models/user.php');

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
    $IdentifiantsOK = VerifIdentifiants($email,$mdp);
    if ($IdentifiantsOK){ // email et mdp valides
      $resultat = RecupUserByEmail($email); // récupérer l'utilisateur par le mail
      $_SESSION['utilisateurID'] = $resultat[0][0]; // création session à partir de l'ID utilisateur
      $logements = Possede_logements();// faire une fonction pour checker si l'utilisateur a des logements
      if ($resultat[0][0]== 1){ // vérifie si c'est un admin  POURQUOI [11] ne fonctionne pas ?? 
        $SESSION_['admin'] = 1;
        header('Location: ../RechercherPar/RechercherPar.php'); // si admin, diriger vers Rechercher Par
      } else {
        if($logements){ // sinon , vérifie si cet utilisateur a des logements 
          header('Location: ../Liste logements/connexion.php');
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