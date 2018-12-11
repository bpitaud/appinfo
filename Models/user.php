<?php

require_once("../Models/database.php");
require_once("../Models/logements.php");

// ajouter un utilisateur à la base de données
function ajoutUtilisateur($nom, $prenom, $email, $genre, $naissance, $telephone, $adresse, $pays, $codepostale, $mdp){
    $conn = connect() -> prepare("INSERT INTO utilisateur(nom, prenom, email, genre,naissance,telephone,adresse,pays,codepostale,mdp,administrateur) VALUES (:nom, :prenom, :email, :genre, :naissance, :telephone, :adresse, :pays, :codepostale, :mdp, false)");
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
        'mdp' => $mdp,
    ));

    }

// hachage du mdp
function mdp_hache($mdp){
    return password_hash($mdp, PASSWORD_DEFAULT);
}

// vérifier si l'email rentré lors de l'inscription existe déjà dans la base de données
function Verif_email($email){
    $conn = connect()->prepare('SELECT * FROM utilisateur WHERE email=?');
    $conn -> execute(array($email));
    $resultat = $conn->fetchAll(PDO::FETCH_NUM);
    if (count($resultat) > 0){
        return true;
    }
    return false;
}

// envoi d'un mail de confirmation de compte
function send_email($to, $subject, $message, $headers){
    $to      = $email; // Envoyer un email à l'utilisateur
    $subject = 'Création de compte Domisep'; // Objet du mail
    $message = ' Bienvenue sur Domisep! Votre compte a été créé avec succès.'; 
    $headers = 'From: noreply@domisep.com' . "\r\n"; // Expediteur
    mail($to, $subject, $message, $headers); // envoi du mail
}

// cryptage du mdp de passe rentré lors de la connexion
function Verif_mdp($mdp, $hash){
    return password_verify($mdp , $hash);
}

// vérifier si email et mdp rentrés lors de la connexion existent dans la base de données
function VerifIdentifiants($email, $mdp){
    $conn = connect() -> prepare('SELECT mdp from `utilisateur` WHERE email=?' );
    $conn  -> execute(array($email));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    if (count($resultat) == 0) {
        return false;
    }
    if (Verif_mdp($mdp, $resultat[0][0])== true){ 
        return true;
    }
    return false; 
}

// récupérer le user par son email
function RecupUserByEmail($email){
    $conn = connect() -> prepare('SELECT * from `utilisateur` WHERE email=?');
    $conn-> execute(array($email));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

session_start();

// rechercher si un utilisateur a des logements ou non
function Possede_logements() {
    $logements = RecupLogements($_SESSION['utilisateurID']);
    if (isset($logements[0][5])){
        return true;
    }
    return false;
}





    
// supprimer un utilisateur 
// modifier les infos d'un utilisateur 
// modifier le mot de passe 


?> 




