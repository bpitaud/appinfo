<?php

require_once("../Models/database.php");

// Hachage du mot de passe
$mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);


// ajouter un utilisateur à la base de données
function ajoutUtilisateur($nom, $prenom, $email, $genre, $naissance, $telephone, $adresse, $pays, $codepostale, $mdp_hache){
    $conn = connect() -> prepare("INSERT INTO utilisateur(nom, prenom, email, genre,naissance,telephone,adresse,pays,codepostale,mdp) VALUES (:nom, :prenom, :email, :genre, :naissance, :telephone, :adresse, :pays, :codepostale, :mdp)");
    $conn->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'genre' => $genre,
        'naissance' => $naissance,
        'telephone' => $telephone,
        'adresse' => $adresse,
        'pays' => $pays,
        'codepostale' => $codepostale,
        'mdp' => $mdp_hache,
    ));

    }

// Connexion d'un utilisateur 

// récupérer le user par son email
function RecupUserByEmail($email){
    $conn = connect() -> prepare('SELECT utilisateurID , mdp from `utilisateur` WHERE email=:email');
    $conn-> execute(array('email'=> $email));
    $resultat = $conn -> fetch();
    return $resultat;
}


// Comparaison du pass envoyé via le formulaire avec la base de données
$isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

// vérifier si email et mdp  
/*function VerifIdentifiants ($email , $mdp){
    $conn = connect() -> prepare('SELECT mdp from `utilisateur` WHERE email=?' );
    $conn  -> execute(array($email));
    if (password_verify($mdp, $hash) == true){
        return true;
    }
    return false;*/
    
// supprimer un utilisateur 
// modifier les infos d'un utilisateur 
// modifier le mot de passe 
// récupérer les infos d'un utilisateur 


?> 




