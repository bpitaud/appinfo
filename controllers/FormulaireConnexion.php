<?php

session_start(); 

$emailErr = $mdpErr = "";
$email = $mdp = "";

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
   
// Vérifier si le mail et le mot de passe sont valides 
// si oui, récupérer l'utilisateur par le mail 
//puis récupérer les logements de l'utilisateur, si il n'en a pas dirigé vers la page de première connexion 
// sinon diriger vers la liste des logements 
// si mail ou mdp non valide, diriger vers page inscription
}
?>