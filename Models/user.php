<?php

require_once("../Models/database.php");

// ajouter un utilisateur à la base de données

function ajoutUtilisateur($utilisateurID, $nom, $prenom, $email, $genre, $naissance, $telephone, $adresse, $pays, $codepostale, $mdp){
    $conn = connect() -> prepare("INSERT INTO `utilisateur` VALUES (:utilisateurID, :nom, :prenom, :email, :genre, :naissance, :telephone, :adresse, :pays, :codepostale, :mdp)");
    $conn->execute(array(
        'utilisateurID' => '',
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'genre' => $genre,
        'naissance' => $naissance,
        'telephone' => $telephone,
        'adresse' => $adresse,
        'pays' => $pays,
        'codepostale' => $codepostale,
        'mdp' => $mdp,
    ));

    }

// Connexion d'un utilisateur 

//hacher un mdp dans la base de données (le sécuriser)
function passwordHash ($mdp){
    return password_hash($mdp, PASSWORD_DEFAULT);
}

// vérifier si email et mdp existent dans la base de données
function UserByEmail($email){
    $conn = connect() -> prepare('SELECT * from `utilisateur` WHERE email=?');
    $conn-> execute(array($email));
    return $conn;
}

// récupérer le user par son email 
function VerifIdentifiants ($email , $mdp){
    $conn = connect() -> prepare('SELECT mdp from `utilisateur` WHERE email=?' );
    $conn  -> execute(array($email));
    if (password_verify($mdp, $hash) == true){
        return true;
    }
    return false;    

}
?> 




