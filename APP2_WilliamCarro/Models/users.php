<?php

require_once("..Models/database.php");

// ajouter un utilisateur à la base de données
function addUsers($login, $passeword){
    $conn = connect() -> prepare("INSERT INTO utilisateur(`login`, `password`) VALUES (:`login`, :`password`)");
    $conn->execute(array(
        'login' => $login,
        'password' => $passeword,
    ));

    }

// hachage du mdp
function Passewordhache($mdp){
    return password_hash($mdp, PASSWORD_DEFAULT);
}

// cryptage du mdp de passe rentré lors de la connexion
function PassewordVerify($mdp, $hash){
    return password_verify($mdp , $hash);
}

// vérifier si l'email rentré lors de l'inscription existe déjà dans la base de données
function loginExisting($login){
    $conn = connect()->prepare('SELECT * FROM user WHERE `login`=?');
    $conn -> execute(array($login));
    $resultat = $conn->fetchAll(PDO::FETCH_NUM);
    if (count($resultat) > 0){
        return true;
    }
    return false;
}

?> 