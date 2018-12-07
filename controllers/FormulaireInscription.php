<?php

session_start();

require_once("../Models/database.php");
require_once('/../Models/user.php');

$nom = $prenom = $email = $genre = $naissance = $telephone = $adresse = $pays = $codepostale = $motdepasse = $utilisateurID = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateurID = uniqid(00);
    $nom = test_input($_POST["nom"]);
    $prenom = test_input($_POST["prenom"]);
    $email = test_input($_POST["email"]);
    $genre = test_input($_POST["genre"]);
    $naissance = test_input($_POST["naissance"]);
    $telephone = test_input($_POST["telephone"]);
    $adresse = test_input($_POST["adresse"]);
    $pays = test_input($_POST["pays"]);
    $codepostale = test_input($_POST["codepostale"]);
    $motdepasse = test_input($_POST['mdp']); 
    $confirme_mdp = test_input($_POST['conf_mdp']);
    if ($motdepasse == $confirme_mdp) {
        ajoutUtilisateur($utilisateurID, $nom, $prenom, $email, $genre, $naissance, $telephone, $adresse, $pays, $codepostale, $mdp);
        header('Location: ../AjoutLogement/premierlogement.php');
    }
     else {
        echo "les mots de passe ne correspondent pas";
     }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>