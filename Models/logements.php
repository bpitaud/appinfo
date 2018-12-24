<?php

require_once("../Models/database.php");

// Ajouter un logement 
function ajoutLogement($logementID, $nom, $adresse, $codepostale, $surface, $utilisateurID, $pays){
    $reponse = connect() -> prepare("INSERT INTO logement(logementID, nom, adresse, codepostale, surface, utilisateurID, pays) VALUES (:logementID, :nom, :adresse, :codepostale, :surface, :utilisateurID, :pays)");
    $reponse->execute(array(
        'logementID' => $logementID,
        'nom' => $nom,
        'adresse' => $adresse,
        'codepostale' => $codepostale,
        'surface' => $surface,
        'utilisateurID' => $utilisateurID,
        'pays' => $pays,
    ));
    }

// Récupérer les données d'un logement dans un compte utilisateur
function RecupLogements($utilisateurID){
    $conn = connect() -> prepare('SELECT * FROM logement WHERE utilisateurID =?');
    $conn -> execute(array($utilisateurID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

function RecupLogementsbyID($logementID){
    $conn = connect() -> prepare('SELECT * FROM logement WHERE logementID =?');
    $conn -> execute(array($logementID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}

// récupérer un logement pour l'afficher dans liste logement
function getLogement($utilisateurID) {
    $listLogement = array();
    $sql =  'SELECT nom FROM logement WHERE utilisateurID ='.$utilisateurID.'';
    foreach  (connect()->query($sql) as $row) {
        array_push($listLogement, $row['nom']);
    }
    return $listLogement;
}

 
// Modifier les données d'un logement 
function ModifNomLogement($logementID,$nom){
    $conn = connect() -> prepare('UPDATE logement SET nom=:nom WHERE logementID =:logementID');
    $conn -> execute(array(
            'nom' => $nom,
            'logementID'=> $logementID,    
        ));
}

function ModifAdresseLogement($logementID,$adresse){
    $conn = connect() -> prepare('UPDATE logement SET adresse=:adresse WHERE logementID =:logementID');
    $conn -> execute(array(
            'adresse' => $adresse,
            'logementID'=> $logementID,    
        ));
}

function ModifZipcodeLogement($logementID,$codepostale){
    $conn = connect() -> prepare('UPDATE logement SET codepostale=:codepostale WHERE logementID =:logementID');
    $conn -> execute(array(
            'codepostale' => $codepostale,
            'logementID'=> $logementID,    
        ));
}

function ModifSurfaceLogement($logementID,$surface){
    $conn = connect() -> prepare('UPDATE logement SET surface=:surface WHERE logementID =:logementID');
    $conn -> execute(array(
            'surface' => $surface,
            'logementID'=> $logementID,    
        ));
}

function ModifPaysLogement($logementID,$pays){
    $conn = connect() -> prepare('UPDATE logement SET pays=:pays WHERE logementID =:logementID');
    $conn -> execute(array(
            'pays' => $pays,
            'logementID'=> $logementID,    
        ));
}

// Supprimer un logement
function SuppLogement($logementID){
    $conn = connect() -> prepare('DELETE * FROM logement WHERE logementID =:logementID');
    $conn -> execute(array($logementID));
    $resultat = $conn -> fetchAll(PDO::FETCH_NUM);
    return $resultat;
}
?>  
