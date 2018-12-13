<?php

session_start();

require_once("../Models/database.php");
require_once("../Models/user.php");

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
        send_email($to, $subject, $message, $headers);
        header('Location: ../connexionn/connexion.php');

    }
     else {
        echo "les mots de passe ne correspondent pas ou l'adresse mail existe déjà";
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