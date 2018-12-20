<?php

session_start();

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
    $ancien= test_input($_POST['mdp']); 
    $nouveau = test_input($_POST['conf_mdp']);
}



?>

