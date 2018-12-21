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

// récupérer le user par l'utilisateur ID 
function RecupUserByID($utilisateurID){
    $conn = connect() -> prepare('SELECT * from `utilisateur` WHERE utilisateurID=?');
    $conn-> execute(array($utilisateurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// rechercher si un utilisateur a des logements ou non
function Possede_logements($utilisateurID) {
    $logements = RecupLogements($utilisateurID);
    if (isset($logements[0][5])){
        return true;
    }
    return false;
}

// supprimer un utilisateur 
function SuppUtilisateur($utilisateurID){
    $conn = connect() -> prepare('DELETE * FROM `utilisateur` WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array($utilisateurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}


// modifier les infos d'un utilisateur 
function ModifNomUtilisateur($utilisateurID,$nom){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET nom=:nom WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'nom' => $nom,
            'utilisateurID'=> $utilisateurID,    
        ));
}

function ModifPrenomUtilisateur($utilisateurID,$prenom){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET prenom=:prenom WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'prenom' => $prenom,
            'utilisateurID'=> $utilisateurID,    
        ));
    }

function ModifEmailUtilisateur($utilisateurID,$email){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET email=:email WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'email' => $email,
            'utilisateurID'=> $utilisateurID,    
        ));
}

function ModifGenreUtilisateur($utilisateurID,$genre){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET genre=:genre WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'genre' => $genre,
            'utilisateurID'=> $utilisateurID,    
        ));
}

function ModifNaissanceUtilisateur($utilisateurID,$naissance){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET naissance=:naissance WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'naissance' => $naissance,
            'utilisateurID'=> $utilisateurID,    
        ));
}

function ModifTelUtilisateur($utilisateurID,$telephone){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET telephone=:telephone WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'telephone' => $telephone,
            'utilisateurID'=> $utilisateurID,    
        ));
        
}

function ModifAdresseUtilisateur($utilisateurID,$adresse){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET adresse=:adresse WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'adresse' => $adresse,
            'utilisateurID'=> $utilisateurID,    
        ));

}

function ModifPaysUtilisateur($utilisateurID,$pays){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET pays=:pays WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'pays' => $pays,
            'utilisateurID'=> $utilisateurID,    
        ));
}

function ModifZipcodeUtilisateur($utilisateurID,$codepostale){
    $conn = connect() -> prepare('UPDATE `utilisateur` SET codepostale=:codepostale WHERE utilisateurID =:utilisateurID');
    $conn -> execute(array(
            'codepostale' => $codepostale,
            'utilisateurID'=> $utilisateurID,    
        ));
        
}
// modifier le mot de passe 

function ModifMdp($email, $ancien, $nouveau) {
    $hache = mdp_hache($nouveau);
    $conn = connect() ->prepare('SELECT mdp FROM `utilisateur` WHERE email=:email');
    $conn->execute(array($email));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    if (count($resultat) == 0) {
        return false;
    }
    if(Verif_mdp($ancien, $resultat[0][0]) == false) {
        return false;
    }
    $conn = connect() ->prepare('UPDATE`utilisateur` SET  mdp=:mdp WHERE email=:email');
    $conn -> execute(array(
        'email' => $email,
        'mdp'=> $hache,    
    ));
    return true;    
}

function changeMdp($email, $nouveau) {
    $conn = connect() -> prepare('UPDATE`utilisateur` SET  mdp=:mdp WHERE email=:email');
    $hache = mdp_hache($nouveau);
    $conn-> execute(array(
        'email' => $email,
        'mdp' => $hache,
    ));    
    
}

?> 




