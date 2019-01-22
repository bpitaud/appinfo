<?php
 
 require_once __DIR__.'/../Models/user.php';
session_start();

$email = $mdp = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$langue = $_SESSION['language'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['email'])){
    $email = test_input($_POST["email"]);
  }
  if (isset($_POST['mdp'])){ 
    $mdp= test_input($_POST['mdp']);
  }
    $IdentifiantsOK = VerifIdentifiants($email,$mdp);
    if ($IdentifiantsOK){ // email et mdp valides
      $_SESSION['connexion'] = 1;
      //var_dump($_SESSION['connexion']);
      $resultat = RecupUserByEmail($email);
      $_SESSION['utilisateurID'] = $resultat[0][0]; // création session à partir de l'ID utilisateur // récupérer l'utilisateur par le mail
      $logements = Possede_logements($resultat[0][0]);// faire une fonction pour checker si l'utilisateur a des logements
      if ($resultat[0][11]== 1){ // vérifie si c'est un admin 
        $_SESSION['admin'] = 1;
        if ($langue =='fr'){
          header('Location: ../Views/RechercherPar.php'); // si admin, diriger vers Rechercher Par
        } else {
          header('Location: ../Views/english/RechercherPar.php');
        }
      } else {
        $_SESSION['admin'] = 0;
        if($logements){ // sinon , vérifie si cet utilisateur a des logements 
          if ($langue =='fr'){
            header('Location: ../Views/listelogements.php'); 
          } else {
            header('Location: ../Views/english/listelogements.php');
          }
        } else {
          if ($langue =='fr'){
            header('Location: ../Views/premierlogement.php'); 
          } else {
            header('Location: ../Views/english/premierlogement.php');
          }
        }
      }
    }
    else { // rester sur la page connexion car identifiants non valides
      $_SESSION['connexion'] = 0;
      if ($langue =='fr'){
        header('Location: ../Views/connexion.php?connexion=error'); // si admin, diriger vers Rechercher Par
      } else {
        header('Location: ../Views/english/connexion.php?connexion=error');
      }
    }      
}




?>