<?php

session_start();

require_once("../Models/database.php");
require_once("../Models/user.php");

// envoi d'un mail de confirmation de compte
// function send_email($to, $subject, $message, $headers){
//     $to      = $email; // Envoyer un email à l'utilisateur
//     $subject = 'Création de compte Domisep'; // Objet du mail
//     $message = ' Bienvenue sur Domisep! Votre compte a été créé avec succès.'; 
//     $headers = 'From: noreply@domisep.com' . "\r\n"; // Expediteur
//     mail($to, $subject, $message, $headers); // envoi du mail
// }

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
    $mdp= test_input($_POST['mdp']); 
    $confirme_mdp = test_input($_POST['conf_mdp']);
    $email_existe = Verif_email($email);
    if ($mdp == $confirme_mdp && !$email_existe) {
        ajoutUtilisateur($nom, $prenom, $email, $genre, $naissance, $telephone, $adresse, $pays, $codepostale, mdp_hache($mdp));   
        //send_email($to, $subject, $message, $headers);
        header('Location: ../connexionn/connexion.php');

    }
     else {
        header('Location: ../inscription/inscription.php?inscription=error');
     }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>