<?php

session_start();
$langue = $_SESSION['language'];

require_once __DIR__.'/../Models/user.php';
require_once("../controllers/mail.php");

$utilisateurID = $nom = $prenom = $email = $genre = $naissance = $telephone = $adresse = $pays = $codepostale = $mdp = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateurID = uniqid();
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
        ajoutUtilisateur($utilisateurID, $nom, $prenom, $email, $genre, $naissance, $telephone, $adresse, $pays, $codepostale, mdp_hache($mdp));   
        if ($langue =='fr'){
        EnvoiMailInscription ($email,$prenom);
        } else {
        SendMailRegistration ($email,$prenom);
        }
        if ($langue =='fr'){
            header('Location: ../Views/connexion.php');
        } else {
            header('Location: ../Views/english/connexion.php');
        }

    }
     else {
         if ($langue =='fr'){
            header('Location: ../Views/inscription.php?inscription=error');
        } else {
            header('Location: ../Views/english/inscription.php?inscription=error');
        }
     }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>