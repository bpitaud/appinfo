<?php

session_start();

require_once("../Models/database.php");
require_once("../Models/user.php");

$nom = $prenom = $email = $genre = $naissance = $telephone = $adresse = $pays = $codepostale = $mdp_hache = ""; 

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
    $mdp= test_input($_POST['mdp']); 
    $confirme_mdp = test_input($_POST['conf_mdp']);
    if ($mdp == $confirme_mdp) {
        ajoutUtilisateur($nom, $prenom, $email, $genre, $naissance, $telephone, $adresse, $pays, $codepostale, $mdp_hache, false);
        $to      = $email; // Envoyer un email à l'utilisateur
        $subject = 'Création de compte Domisep'; // Objet du mail
        $message = ' Bienvenue sur Domisep! Votre compte a été créé avec succès.'; 
        $headers = 'From: noreply@domisep.com' . "\r\n"; // Expediteur
        mail($to, $subject, $message, $headers); // envoi du mail   
        header('Location: ../connexionn/connexion.php');

    }
     else {
        echo "les mots de passe ne correspondent pas";
        header('Location: ../inscription/inscription.php');
     }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>